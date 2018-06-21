// url: "?controller=Anuncio&action=anuncioImpress",

//responsável por armazenar os links de ativação ou desativação
var links = new Array("");

function returnJason(link){

    var retorno;

    $.ajax({
        url: link,
        type: "get",
        dataType:"json",
        data: "",
        async: false,

        success: function(data){
            retorno = data;
        }
    });

    return retorno;
}

//Renderiza apenas a página de acordo com o ID
function anunPorId(id, finalidade){

    var arrayAnuncioCompleto = returnJason("?controller=Anuncio&action=anuncioID&id=" + id);

    var html="";

    html += extraiAnuncio(arrayAnuncioCompleto['anuncio'], finalidade, status,extraiImagens(arrayAnuncioCompleto['imagens'], finalidade),extraiMensagens(arrayAnuncioCompleto['mensagem'], finalidade),extraiAvaliacao(arrayAnuncioCompleto['avaliacao'], finalidade),id);

    return html;

}

var url;

//Gera as opções para gerenciamento do anuncio dinâmicamente para o administrador do mesmo.
function geraOpcoes(anuncioID,status,link, statusPg){

    var excluAnun = "?controller=Anuncio&action=excluAnun&id="+anuncioID;
    var alterAnun = "?controller=Anuncio&action=viewAlterAnuncioId&id="+anuncioID;

    var html = "<h3 class='opc'>Opçoes:</h3>";

    //  linkInativa += anuncioID;

//'?controller=Anuncio&action=alterStatus&id="+anuncioID+"&status=1'
    if(status == "online"){

        //está sendo tratado como um array...
        html +="<button type='button' class='abrir'>Gerenciar</button>"+
      
        "<div class='paiM'>"+
            "<button type='button' class='fechar'></button>"+
            "<p>Opções</p>"+
              "<div>"+
                "<button type='button' class='but01'>Impulsionar</button>"+
                "<button type='button' class='but01' onclick='renderAlterAnun(\""+anuncioID+"\")'><a  >Editar</a></button>"+//criar método que chama o inner contendo a página de edição
                
                "<button type='button' class='but' id='butInativ' onclick='modAnunAssincStatusAtv(\""+link+"\")'>Congelar</button>"+
                "<button type='button' class='but' id='excAtiv' onclick='modAnunAssincStatusAtv(\""+excluAnun+"\")'>Excluir</button>"+
              "</div>"+
        "</div>";
    } else if (status == "inativo"){
        html +="<button type='button' class='abrir'>Gerenciar</button>"+
       
        "<div class='paiM'>"+
            "<button type='button' class='fechar'></button>"+
            "<p>Opções</p>"+
          "<div>"+
             "<button type='button' class='but01'>Impulsionar</button>"+
             "<button type='button' class='but01'><a href='?controller=Dashboard&action=ViewDashboard&option=alterAnun&anun="+anuncioID+"'>Editar</a></button>";
        if(statusPg == 8){

	     html +="<button type='button' class='but' id='butAtivar' onclick='assincStatusIna(\""+link+"\")'>Descongelar</button>";

	} else{

	      html +="<button type='button' id=''>Inativo</button>";
	}
           
           html +=   "<button type='button' class='but' id='excInat' onclick='assincStatusIna(\""+excluAnun+"\")'>Excluir</button>"+
          "</div>"+
       "</div>";
    }
    return html;
};

//método que monta as partes do html a serem exibidas. Ps: Anuncios ativos de acordo com o id do usuário.
function htmlImpressAnuncio(status, finalidade,valores,bairro,limit,sql){


    //Verifica se será gerado dinamicamente os anuncios ativos ou inativos
    if(status == "online"){

        var arrayAnuncioCompleto = returnJason("?controller=Anuncio&action=anuncioImpressAtivo");

    } else if (status == "inativo"){

        var arrayAnuncioCompleto = returnJason("?controller=Anuncio&action=anuncioImpressInativo");

    } else if (status == "onlineTodos"){

        var arrayAnuncioCompleto = returnJason("?controller=Anuncio&action=anuncioImpressAll"); // A principio o retorno de usuário por avaliação será feito nesta action

    } else if (status == "pesquisa"){

        var arrayAnuncioCompleto = returnJason("http://localhost/sn/?controller=Anuncio&action=anuncioPesquisaImpressAll&valores="+valores+"&bairro="+bairro+"&limit="+limit+"&count=not");

    } else if (status == "pesquisaFiltro"){

       var arrayAnuncioCompleto = returnJason("?controller=Anuncio&action=anuncioPesquisaImpressAll&sql="+sql);

    }

    else {

        return "Argumento não corresponde a nenhuma opção. =/";
    }


    var  anuncioHtml = "";
    var  anunInfo = "";
    var  imagens = "";
    var  avaliacao = "";
    var mensagens = "";

    if(arrayAnuncioCompleto == undefined){
        return "0";
    }

    //for responsável por percorrer cada anuncio.
    for (var i = 0; i < arrayAnuncioCompleto.length; i++) {

        //recebe como argumento os subArrays em que cada posição corresponde aos dados de uma tabela.
        if(!arrayAnuncioCompleto[i]['anuncio'] == null || !arrayAnuncioCompleto[i]['anuncio'].length == 0){

           anunInfo += extraiAnuncio(arrayAnuncioCompleto[i]['anuncio'], finalidade, status);

        }

        if(!arrayAnuncioCompleto[i]['imagens'] == null || !arrayAnuncioCompleto[i]['imagens'].length == 0){

            imagens = extraiImagens(arrayAnuncioCompleto[i]['imagens'], finalidade);

        }

        if(!arrayAnuncioCompleto[i]['avaliacao'] == null || !arrayAnuncioCompleto[i]['avaliacao'].length == 0){

            avaliacao = extraiAvaliacao(arrayAnuncioCompleto[i]['avaliacao'], finalidade);

        }

        if(!arrayAnuncioCompleto[i]['mensagem'] == null || !arrayAnuncioCompleto[i]['mensagem'].length == 0){

            mensagens = extraiMensagens(arrayAnuncioCompleto[i]['mensagem'], finalidade);

        }

            anuncioHtml += extraiAnuncio(arrayAnuncioCompleto[i]['anuncio'], finalidade, status,imagens,mensagens,avaliacao);


    }


    //retorna os anuncios devidamente convertidos em html.
    return anuncioHtml;


}

//Verifica se o campo foi marcado ou não, de acordo com o banco de dados.
function verificaStatusCheck(valor){

    if(valor == 1){
        return "checked";

    } else {

        return "";
    }
};

function extraiAnuncio(arrayAnuncio, finalidade, status,imagens,mensagens,avaliacao,idAnun){

    var html = "";

    //Gera a view de acordo com a finalidade, podendo ser anuncio completo ou parcial
    if(finalidade == "parcial"){

        for(var i = 0; i < arrayAnuncio.length; i++) {



            /*Esta eh a parte do anuncio onde sera aproveitado como preview e view*/
            /*Esta eh a parte do anuncio onde sera aproveitado como preview e view*/
          html += "<article>" +
            "<h2 class='tituH2' "+arrayAnuncio[i]['anuncio_id']+"> " + arrayAnuncio[i]['anuncio_titulo'] + "</h2>" +
            "<div class='PaiAnuncio'>"+
                "<p class='titu' "+arrayAnuncio[i]['anuncio_id']+"> " + arrayAnuncio[i]['anuncio_titulo'] + "</p>" +
                "<p class='inat'>"+arrayAnuncio[i]['status_anuncio_situacao']+"</p>"+  
                "<div class='divImg'>"+
                    "<a href='?controller=Anuncio&action=viewAnuncioIdAll&id="+arrayAnuncio[i]['anuncio_id']+"' hreflang='pt-br'>"+
                        "<img src='"+ arrayAnuncio[i]['anuncio_imagem_capa'] +"' >" +
                    "</a>"+
                "<div>"+
                    mensagens +
                    avaliacao +
                    "<p class='estrelas'>Média de avaliações " +  arrayAnuncio[i]['anuncio_media'] +"</p>"+
                    "<p>Quantidade de visualizações"+"<span>"+ arrayAnuncio[i]['cont_views_qtd_total'] + "</span>"  + "<a href='#'></a>" + "</p>"+
             "</div>"+
            "</div>"+
            
            "<div class='contBu'>"+
                "<ul>"+
                    "<li>"+
                     "<a href='?controller=Anuncio&action=viewAnuncioIdAll&id="+arrayAnuncio[i]['anuncio_id']+"' hreflang='pt-br'>Veja sua página"+"</a>"+
                    "</li>"+
                    "<li>"+
                      "<a href='?controller=Anuncio&action=viewGerenciaImgId&id="+arrayAnuncio[i]['anuncio_id']+"' hreflang='pt-br'>Gerenciar Fotos"+"</a>"+
                    "</li>"+
	
               "</ul>"+
            "</div>"+
            "<div class='escu'></div>"+
        "</div>";
            //gera o link de acordo com o status
            if(status == "online"){
                links[i] = '?controller=Anuncio&action=alterStatus&status=8&id='+arrayAnuncio[i]['anuncio_id'];//cod 8 == inativado pelo usuário
            } else if(status == "inativo"){

		//fazer lógica para somente poder colocar online se o anuncio estiver devidamente pago. Caso o pacote for gratuito o código de ativação é diferente. 
		if(arrayAnuncio[i]['anuncio_pacote'] == "Grátis"){

		    links[i] = '?controller=Anuncio&action=alterStatus&status=11&id='+arrayAnuncio[i]['anuncio_id'];

		} else {

		    links[i] = '?controller=Anuncio&action=alterStatus&status=3&id='+arrayAnuncio[i]['anuncio_id'];//cod 4 == online ps: retirar esses coments depois.

		}
	
	
		
            }
            //gera as opções de anuncio dinamicamente
            html += geraOpcoes(arrayAnuncio[i]['anuncio_id'], status, links[i], arrayAnuncio[i]['anuncio_status']);

            //foi adicionado um input inner para que possamos recuparar o id do anuncio em questão.
            html+= "<input type='hidden' class='idAnun' value='"+arrayAnuncio[i]['anuncio_id']+"'>";//deve ser criado um seletor para selecionar this.input.hidden.val

	   if(arrayAnuncio[i]['anuncio_status'] == 12){
				html += "<a class='finalizarP' href='?controller=Home&action=viewCarPt4&plano=Premium&pacote=Anual&anunRef="+arrayAnuncio[i]['anuncio_id']+"'>Não consta pagamento para este anúncio, Finalizar Pagamento</a>";
	   } else if(arrayAnuncio[i]['anuncio_pacote'] == "Grátis"){
				html += "<a class='finalizarP' href='?controller=Home&action=viewCarPt4&plano=Premium&pacote=Anual&anunRef="+arrayAnuncio[i]['anuncio_id']+"'>Faça Upgrade para o Premium e tenha mais recursos</a>";
	   }
              html +=  "</article>";

           }



    } else if(finalidade == "completo"){
//var teste = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        for(var i = 0; i < arrayAnuncio.length; i++){

   html +="<div>"+
            "<input type='hidden' id='anunName' value='"+arrayAnuncio[i]['anuncio_titulo']+"'>"+//para poder recuperar  valor
            "<p>" + arrayAnuncio[i]['anuncio_titulo'] +"</p>" +
            "<div class='divControler'>"+
              "<article>"+
                "<h2 class='h2Art'>"+ arrayAnuncio[i]['anuncio_titulo'] +"</h2>" +
                "<div class='PaiAnuncio'>"+
                    "<p>" + arrayAnuncio[i]['anuncio_titulo'] +"</p>" +
                    "<div class='divImg'>"+
                      "<div>"+
                        "<figure>"+
                          "<img src='"+ arrayAnuncio[i]['anuncio_imagem_capa'] +"' >" +
                        "</figure>"+
                      "</div>"+
                      "<div>"+
                             "<p>Mensagens<span id='men'></span></p>" +
                             "<p>Avaliações<span id='ava'></span></p>" +
                            "<p class='estrelas'>"+ arrayAnuncio[i]['anuncio_media'] +"</p>"+
                      "</div>"+
                    "</div>"+
               "<dl>"+
                    "<dt>Endereço:</dt>" +
                    "<dd>" + arrayAnuncio[i]['endereco_rua'] + "</dd>" +
                    "<dd>" + arrayAnuncio[i]['endereco_bairro'] + "</dd>" +
                    "<dd><strong>nº</strong>" + arrayAnuncio[i]['endereco_numero'] + "</dd>" +
                    "<dd>" + arrayAnuncio[i]['endereco_complemento'] + "</dd>" +
                    "<dd><strong>nº complemento</strong>" + arrayAnuncio[i]['endereco_numero_complemento'] + "</dd>" +
                    "<dd>" + arrayAnuncio[i]['endereco_cidade'] + "-</dd>" +
                    "<dd>" + arrayAnuncio[i]['endereco_estado'] + "</dd>" +
                    "<dd><strong>cep:</strong>" + arrayAnuncio[i]['endereco_cep'] + "</dd>" +
                    "<dd><strong>Categoria:</strong>" + arrayAnuncio[i]['sub_categoria_descricao'] + "</dd>" +

                    "<dl>"+
                        "<dt>Contato:"+"</dt>" +
                        "<dd><a href='tel:" + arrayAnuncio[i]['anuncio_tel_fixo'] + "'><strong></strong>" + arrayAnuncio[i]['anuncio_tel_fixo'] + "</a> </dd>" +
                        "<dd><a href='tel:" + arrayAnuncio[i]['anuncio_tel_cel'] + "'><strong></strong>" + arrayAnuncio[i]['anuncio_tel_cel']  + "</a> </dd>" +
                        "<dd><a href='tel:" + arrayAnuncio[i]['anuncio_whats'] + "'><strong></strong>" + arrayAnuncio[i]['anuncio_whats']  + "</a> </dd>" +
                        "<dt>Email:</dt>"+
                        "<dd><strong></strong>" + arrayAnuncio[i]['anuncio_email'] + "</dd>" +
                    "</dl>"+
                    "<dl class='sit'>"+
                        "<dt>Site do anunciante"+"</dt>" +
                        "<dd><a target='_blank' href='" + arrayAnuncio[i]['link_site'] + "' hreflang='pt-br' class='redeS site'><strong></strong>" + flag(arrayAnuncio[i]['link_site']) + "</a></dd>" +
                    "</dl>"+
                    "<dl id='verRed'>"+
                        "<dt>Redes sociais:</dt>"+
                        "<dd><a  target='_blank' href='"+ arrayAnuncio[i]['link_facebook'] + "' hreflang='pt-br' class='redeS faceb'><strong></strong>"+ flag(arrayAnuncio[i]['link_facebook']) + "</a></dd>" +
                        "<dd><a  target='_blank' href='" + arrayAnuncio[i]['link_twitter'] + "' hreflang='pt-br' class='redeS twit'><strong></strong>" + flag(arrayAnuncio[i]['link_twitter']) + "</a></dd>" +
                        "<dd><a  target='_blank' href='" + arrayAnuncio[i]['link_linkedin'] + "' hreflang='pt-br' class='redeS lik'><strong></strong>" + flag(arrayAnuncio[i]['link_linkedin']) + "</a></dd>" +
                        "<dd><a  target='_blank' href='" + arrayAnuncio[i]['link_lattes'] + "' hreflang='pt-br' class='redeS latt'><strong></strong>" + flag(arrayAnuncio[i]['link_lattes']) + "</a></dd>" +
                    "</dl>"+
                "</dl>"+
            "</div>"+
          "</article>"+
          "<div>"+
            "<div class='divHoras'>"+
                "<dl>"+

                  "<dt>Horário de funcionamento:" + "</dt>" +
                    "<dd>- De segunda à sexta feira das " + "<span class='seg'>" + arrayAnuncio[i]['horario_func_semana_inicio'] + " às " + arrayAnuncio[i]['horario_func_semana_termino'] + "</span>" + "</dd>" +
                    "<dd>- Sábado das " + "<span class='sab'>" + arrayAnuncio[i]['horario_func_sabado_inicio'] + " às " + arrayAnuncio[i]['horario_func_sabado_termino'] + "</span>" +"</dd>" +
                    "<dd>- Domingo das " + "<span class='dom'>" + arrayAnuncio[i]['horario_func_domingo_inicio'] + " às " + arrayAnuncio[i]['horario_func_domingo_termino'] + "</span>" + "</dd>" +
                "</dl>"+
            "</div>"+
            "<div class='paiBand mod'>"+
              "<div>"+
                "<h3>Formas de pagamentos: "+"</h3>" +

                "<input type='checkbox' name='forma_pag' value='boleto' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_boleto'])  + "/>" +
                "<span>Boleto</span>"+

                "<input type='checkbox' name='forma_pag' value='credito' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_credito'])  + "/>" +
                "<span>Crédito</span>"+

                "<input type='checkbox' name='forma_pag' value='débito' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_debito'])  + "/>" +
                "<span>Débito</span>"+

                "<input type='checkbox' name='forma_pag' value='vale alimentação' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_vale_alimentacao'])  + "/>" +
                "<span>Ticket</span>"+

                "<input type='checkbox' name='forma_pag' value='cheque' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_cheque'])  + "/>" +
                "<span>Chegue</span>"+

                "<input type='checkbox' name='forma_pag'  value='dinheiro' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_dinheiro'])  + "/>" +
                "<span>Dinheiro</span>"+
             "</div>"+
             "<div id='bandeira'>"+
                "<h3>Bandeiras aceitas"+"</h3>" +

                "<input type='checkbox' name='forma_pag' value='master' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_master_card'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='visa' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_visa'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='american express' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_american_express'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='diner club internacional' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_diner_club'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='elo' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_elo'])  + "/>" +
                "<span></span>"+
            
                "<input type='checkbox' name='forma_pag' value='pagseguro' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_pagseguro'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='pay pal' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_paypal'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='maercado pago' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_mercado_pago'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='sodexo' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_sodexo'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='ticket restaurant' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_ticket_restaurant'])  + "/>" +
                "<span></span>"+

                "<input type='checkbox' name='forma_pag' value='outros' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_outros_formPag'])  + "/>" + 
                "<span>Outros</span>"+
             "</div>"+
         "</div>"+
         // div que fecha paiband
         "<div class='paiFac mod'>"+
           //Facilidades oferecidas
           "<div id='facOfe'>"+
               "<h3>Facilidades oferecidas</h3>"+

               "<input type='checkbox' name='facilidades' value='estacionamento' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_estacionamento'])  + "/>" +
               "<span>Estacionamento</span>"+
              
               "<input type='checkbox' name='facilidades' value='seguranca' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_seguranca'])  + "/>" +
               "<span>Segurança</span>"+
              
               "<input type='checkbox' name='facilidades' value='assesibilidade' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_acessibilidade'])  + "/>" +
               "<span>Acesso a portadores de necessidades especiais</span>"+
              
               "<input type='checkbox' name='facilidades' value='ar' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_ar_condicionado'])  + "/>" +
               "<span>Ar-condicionado</span>"+
              
               "<input type='checkbox' name='facilidades' value='wifii' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_wifii'])  + "/>" +
               "<span>Wi-fi (internet)</span>"+
               
               "<input type='checkbox' name='facilidades' value='reservar' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_reservar'])  + "/>" +
               "<span>Reservas antecipadas</span>"+
               
               "<input type='checkbox' name='facilidades' value='animais' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_permite_animais'])  + "/>" +
               "<span>Permitido animais</span>"+
               
               "<input type='checkbox' name='facilidades' value='cupons' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_cupons_desconto'])  + "/>" +
               "<span>Cupons de descontos SempreNegócio</span>"+


               "<input type='checkbox' name='criancas' value='criancas' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_criancas'])  + "/>" +
               "<span class='crian'>Espaço para crianças</span>"+

                "<input type='checkbox' name='delivery' value='delivery' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_delivery'])  + "/>" +
                "<span class='delivery'>Delivery (entrega)</span>"+

            
           "</div>"+
           //Encerra facilidades
           //inivia planos
           "<div id='planoSa'>"+
               "<h3>Planos aceitos</h3>"+

               "<input type='checkbox' name='planos' value='unimed' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_unimed'])  + "/>" +
               "<span>- Unimed</span>"+
              
               "<input type='checkbox' name='planos' value='prontomed' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_prontomed'])  + "/>" +
               "<span>- Prontomed</span>"+
               
               "<input type='checkbox' name='planos' value='saudevida' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_saudevida'])  + "/>" +
               "<span>- Saúde Vida</span>"+
               
               "<input type='checkbox' name='planos' value='promed' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_promed'])  + "/>" +
               "<span>- Promed</span>"+
               
               "<input type='checkbox' name='planos' value='outros' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_outros'])  + "/>" +
               "<span>- Outros</span>"+
           "</div>"+
           //encerra planos
         "</div>"+
           // div paifacilidades e palnos aceitos
        "</div>"+
       "</div>"+
     "</div>"+
     "<div class='paiArt'>"+
      "<article>"+
         "<h2>Mais detalhes da empresa</h2>"+
          "<div>"+
             "<p>"+ arrayAnuncio[i]['anuncio_descricao']+"</p>"+
          "</div>"+
      "</article>"+
     "</div>";
     if(imagens != ""){

        html += "<section class='secFoto'>"+
        "<h3>Imagens do seu anúncio.</h3>"+
            "<div id='galeria'>"+
               "<div id='refe'>"+
                 "<ul>"+
                    imagens +
                 "</ul>"+
                "</div>" +
           "</div>"+
        "</section>";

     } else {

         html += "<section class='secFoto semFoto'>"+
        "<h3>O anúncio não possui imagens</h3>"+
        "</section>";

     }

    if(arrayAnuncio[i]['anuncio_pacote'] != "Grátis" && arrayAnuncio[i]['link_youtube'] != ""){

	  html += "<div class='youTube'>"+ 
            "<article>"+
                "<h3>Vídeo sobre a empresa</h3>"+
                "<figure>"+
                     "<div id='videoYou'>" + 
                            "<iframe width='420' height='315' src='"+arrayAnuncio[i]['link_youtube']+"' frameborder='0' allowfullscreen></iframe>"+
                     "</div>" +
                "</figure>"+
                "<figcaption>Vídeo do anunciante</figcaption>"+
            "</article>"+
         "</div>";

	}
   
      html += mensagens +
       avaliacao;

        }
    } else if(finalidade == "editarAnuncio"){



        for(var i = 0; i < arrayAnuncio.length; i++){


            //referente ao preenchimento do select do complemento do endereco de acordo com a base de dados.
            var arrayComple = {casa:"",ap:"",galp:"",sala:"",fundos:"",condo:"",outros:""};
            switch(arrayAnuncio[i]['endereco_complemento']){

                case "Casa":        arrayComple['casa']   =  "selected";break;
                case "Apartamento": arrayComple['ap']     =  "selected";break;
                case "Galpao":      arrayComple['galp']   =  "selected";break;
                case "Sala":        arrayComple['sala']   =  "selected";break;
                case "Fundos":      arrayComple['fundos'] =  "selected";break;
                case "Condominio":  arrayComple['condo']  =  "selected";break;
                case "Outros":      arrayComple['outros'] =  "selected";break;
		case "loja":      arrayComple['loja'] =  "selected";break;
                default :break;

            }

            //planos de saude
            var arrayPlanos = {unimed:"",saudeVida:"",prontomed:"",promed:"",outros:""};

            if(arrayAnuncio[i]['plano_saude_unimed'] == 1){
                arrayPlanos['unimed']    =  "checked";
            }
            if(arrayAnuncio[i]['plano_saude_saudevida'] == 1){
                arrayPlanos['saudeVida'] =  "checked";
            }
            if(arrayAnuncio[i]['plano_saude_prontomed'] == 1){
                arrayPlanos['prontomed'] =  "checked";
            }
            if(arrayAnuncio[i]['plano_saude_promed'] == 1){
                arrayPlanos['promed']    =  "checked";
            }
            if(arrayAnuncio[i]['plano_saude_outros'] == 1){
                arrayPlanos['outros']    =  "checked";
            }

            //horário
            var arrayHour = {sabado:"",domingo:"",semana:""};

            if(arrayAnuncio[i]['horario_func_sabado_inicio'] != ""){
                arrayHour['sabado'] = "checked";
            }
            if(arrayAnuncio[i]['horario_func_domingo_inicio'] != ""){
                arrayHour['domingo'] = "checked";
            }

            if(arrayAnuncio[i]['horario_func_semana_inicio'] != ""){
                    arrayHour['semana'] = "checked";
                }

            //Formas de pagamento
            var arrayFormPag = {boleto:"",credito:"",débito:"",valeAlimentação:"",cheque:"",dinheiro:"",outrosFormPag:"",master:"",
                                visa:"",americanExpress:"",diner:"",elo:"",pagseguro:"",pay:"",mercadoPago:"",sodexo:"",ticketRestaurant:"",outrosBand:""};

            if(arrayAnuncio[i]['forma_pag_boleto'] == 1)                         arrayFormPag['boleto']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_credito'] == 1)                        arrayFormPag['credito'] =  "checked";
            if(arrayAnuncio[i]['forma_pag_debito'] == 1)                         arrayFormPag['débito']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_vale_alimentacao'] == 1)               arrayFormPag['valeAlimentação']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_cheque'] == 1)                         arrayFormPag['cheque']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_dinheiro'] == 1)                       arrayFormPag['dinheiro']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_outros_formPag'] == 1)                 arrayFormPag['outrosFormPag']    =  "checked";
            if(arrayAnuncio[i]['forma_pag_master_card'] == 1)                    arrayFormPag['master']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_visa'] == 1)                           arrayFormPag['visa']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_american_express'] == 1)               arrayFormPag['americanExpress']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_diner_club'] == 1)                     arrayFormPag['diner'] =  "checked";
            if(arrayAnuncio[i]['forma_pag_elo'] == 1)                            arrayFormPag['elo']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_pagseguro'] == 1)                      arrayFormPag['pagseguro']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_paypal'] == 1)                         arrayFormPag['pay']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_mercado_pago'] == 1)                   arrayFormPag['mercadoPago']   =  "checked";
            if(arrayAnuncio[i]['forma_pag_sodexo'] == 1)                         arrayFormPag['sodexo']  =  "checked";
            if(arrayAnuncio[i]['forma_pag_ticket_restaurant'] == 1)              arrayFormPag['ticketRestaurant'] =  "checked";
            if(arrayAnuncio[i]['forma_pag_outros_band'] == 1)                    arrayFormPag['outrosBand']       =  "checked";

            //Facilidades
            var arrayFacili = {estacionamento:"",seguranca:"",acessibilidades:"",arCondicionado:"",wifi:"",reserva:"",animais:"",cupons:"",criancas:"",delivery:""};

            if(arrayAnuncio[i]['facilidades_estacionamento'] == 1)    arrayFacili['estacionamento'] = "checked";
            if(arrayAnuncio[i]['facilidades_seguranca'] == 1)         arrayFacili['seguranca'] = "checked";
            if(arrayAnuncio[i]['facilidades_acessibilidade'] == 1)    arrayFacili['acessibilidades'] = "checked";
            if(arrayAnuncio[i]['facilidades_ar_condicionado'] == 1)   arrayFacili['arCondicionado'] = "checked";
            if(arrayAnuncio[i]['facilidades_wifii'] == 1)             arrayFacili['wifi'] = "checked";
            if(arrayAnuncio[i]['facilidades_reservar'] == 1)          arrayFacili['reserva'] = "checked";
            if(arrayAnuncio[i]['facilidades_permite_animais'] == 1)   arrayFacili['animais'] = "checked";
            if(arrayAnuncio[i]['facilidades_cupons_desconto'] == 1)   arrayFacili['cupons'] = "checked";
            if(arrayAnuncio[i]['facilidades_criancas'] == 1)          arrayFacili['criancas'] = "checked";
            if(arrayAnuncio[i]['facilidades_delivery'] == 1)          arrayFacili['delivery'] = "checked";


              var html = "<div class='tudo'>" +

                "<div class='paiS'>" +
                    "<section>" +
                        "<h2 class='sumir'>Noite e dia sua empresa conectada !</h2>" +
                        "<div class='pa' id='backEdita'>";
                        // Gera a "escadinha de acordo com o status, caso for inativo muda os links da escadinha"
                        if(arrayAnuncio[i]['anuncio_status'] == 1){
                           html += "<p class='escada'> <a href='#' class='pain'>Painel</a> > <a href='?controller=Dashboard&action=ViewDashboard'>Anuncios Ativos</a> > <strong>Editar anuncio</strong> </p>";
                        } else {
                           html += "<p class='escada'> <a href='#' class='pain'>Painel</a> > <a href='?controller=Dashboard&action=ViewDashboard&option=anunInativ' > Anuncios Inativos</a> > <strong>Editar anuncio</strong> </p>";
                        }
                            
                          html +=  "<p>Mantenha seu anúncio atualizado e saia na frente.</p>" +
                            "<p>Seja vencedor!</p>" +
                        " </div>" +
                       "<h2>Atualizar dados.</h2>" +
                       "<p class='anunParagr'>Atualizar Anúncio</p>"+
                         "<div class='buscaCep'>"+
                            "<button type='button' id='fechaFram' value='fechar'>Fechar Janla</button>"+
                            "<iframe src='http://m.correios.com.br/movel/buscaCep.do' name='janela' id='frame'></iframe>"+
                         "</div>"+ 
                         "<div class='fundoAzul'></div>"+ 
                       "<div class='paiF'>" +
                       "<input type='hidden' name='MAX_FILE_SIZE' value='1024000' />" +
                            "<form  id='fileupload' action='?controller=Anuncio&action=atualiAnun' name='formAnuncio' method='post' enctype='multipart/form-data'>" +
                            "<fieldset>" +
                                "<legend class='sumir'>Preencher formulário</legend>" +

                                   "<fieldset class='PaiEnder'>" +
                                "<legend>Preencher dados da empresa</legend>" +

                                 "<fieldset>" +
                                        "<legend class='sumir'>Título/Endereço</legend>" +

                                        "<label for='tLog'>Título do anúncio" +
                                              "<input type='text' id='tLog' name='titulo' class='required' title='Ex:ExpressaHost Sistemas' value='"+arrayAnuncio[i]['anuncio_titulo']+"'>" +
					      "<div id='ret'></div>"+
					      "<span></span>"+
                                        "</label>" +

                                        "<label for='bairro'>Bairro:" +
                                              "<input type='text' id='bairro' name='bairro' class='required' title='Bairro' value='"+arrayAnuncio[i]['endereco_bairro']+"'>" +
					      "<span></span>"+
                                        "</label>" +

                                        "<label for='cep'>Cep:" +
                                             "<input type='text' id='cep' name='cep' class='required cep' title='Informe seu cep, ex: 35500-002' maxlength='9' value='"+arrayAnuncio[i]['endereco_cep']+"'>" +
					     "<span></span>"+
                                        "</label>" +

                                        "<button type='button' id='buttonBus' value='buscar por cep.'>Não sei meu cep !</button>"+    
                                        
                                        "<label for='rua'>Rua:" +
                                              "<input type='text' id='rua' name='rua' class='required' title='Nome da rua' value='"+arrayAnuncio[i]['endereco_rua']+"'>" +
					     "<span></span>"+
                                        "</label>" +
                                        "<label for='numero'>número:" +
                                              "<input type='number' id='numero' name='numero' class='required' title='Número da residencia' min='1' max='1000000' value='"+arrayAnuncio[i]['endereco_numero']+"'>" +
						"<span></span>"+
                                        "</label>" +
                                  "</fieldset>" +

                                  "<fieldset>"+
                                        "<legend>Complemento</legend>" +
                                        "<select name='cComplemento'>" +
                                           "<optgroup label='Complemento' ></optgroup>" +
                                            " <option value='Casa' "+arrayComple['casa']+">Casa</option>" +
                                            " <option value='Apartamento' "+arrayComple['ap']+">Apartamento</option>" +
                                            " <option value='Galpao' "+arrayComple['galp']+">Galpão</option>" +
					    " <option value='Loja' "+arrayComple['loja']+">Loja</option>" +
                                            " <option value='Sala' "+arrayComple['sala']+">Sala</option>" +
                                            " <option value='Fundos' "+arrayComple['fundos']+">Fundos</option>" +
                                            " <option value='Condominio' "+arrayComple['condo']+">Condomínio</option>" +
                                            " <option value='Outros' "+arrayComple['outros']+">Outros</option>" +
                                        "</select>" +
                                        "<label for='numCom'>Nº complemento" +
                                             "<input type='number' id='numCom' name='numCom' title='Número do apartamento' class='numCom' min='0' max='1000000' value='"+arrayAnuncio[i]['endereco_numero_complemento']+"'>" +
                                        " </label>" +
                                        " <label for='cidade'>Cidade" +
                                             " <input type='text' id='cidade' name='cidade' class='required'title='Cidade onde reside, ex:Divinópolis' value='"+arrayAnuncio[i]['endereco_cidade']+"'>" +
						"<span></span>"+
                                        " </label>" +
                                        " <label for='estado'>Estado" +
                                             " <input type='text' id='estado' name='uf'   title='ex:MG' value='"+arrayAnuncio[i]['endereco_estado']+"'>" +
						"<span></span>"+
                                        " </label>" +
                                   "</fieldset>" +
                               "</fieldset>" +

                               "<fieldset class='paiCont'>" +
                                 "<legend class='sumir'>Formas de contato</legend>" +

                                 " <fieldset>" +
                                    "<legend class='sumir'> seus contatos</legend>"+

                                     "<fieldset>" +
                                            "<legend>Contatos</legend>" +
                                            "<label for='tLo'>Email" +
                                                 "<input type='email' id='tLo' name='email' class='efeitoL' title='expressahost@outlook.com' value='"+arrayAnuncio[i]['anuncio_email']+"'>" +
						"<span></span>"+
                                            " </label>" +
                                            "<label for='tel-fixo'>Tel-01" +
                                                "<input type='text' id='tel-fixo' name='tel-fixo'  value='"+arrayAnuncio[i]['anuncio_tel_fixo']+"'>" +
						"<span></span>"+
                                            "</label>" +
                                            "<label for='tel-cel'>Tel-02" +
                                                 "<input type='text' id='tel-cel' name='tel-cel' value='"+arrayAnuncio[i]['anuncio_tel_cel']+"'>" +
                                            "</label>" +
                                             "<label for='tel-whatapp'>Whatsapp" +
                                                "<input type='text' class='tel-cel' id='tel-whatapp' value='"+arrayAnuncio[i]['anuncio_whats']+"' name='tel-whats'>" +
                                            "</label>" +
                                    "</fieldset>" +

                                    "<fieldset class='revelar'>" +
                                        " <legend class='sumir'>Adicione redes sociais</legend>" +
                                        "<button type='button'>Adicione redes sociais</button>" +
                                    "</fieldset>" +


                                     "<fieldset class='redes'>" +
                                        "<legend>Redes sociais</legend>" +

                                        " <label for='site'>Website da empresa:" +
                                             "<input type='text' id='site' name='site' title='Ex: www.expressahost.com.br' value='"+arrayAnuncio[i]['link_site']+"'>" +
                                        " </label>";

                                        if(arrayAnuncio[i]['anuncio_pacote'] == "Grátis"){
                                             html += "<label for='youtube'>Video do Youtube (Somente Premium)" +
                                                                 "<input type='text' id='youtube' name='youtube' value='"+arrayAnuncio[i]['link_youtube']+"' disabled>"+
                                                            "</label>";
                                        } else {
                                             html += "<label for='youtube'>Video do Youtube" +
                                                                 "<input type='text' id='youtube' name='youtube' value='"+arrayAnuncio[i]['link_youtube']+"'>"+
                                                            "</label>";
                                        }
                                      
                                      html +=  "<label for='face'>Facebook" +
                                            "<input type='text' id='face' name='facebook' value='"+arrayAnuncio[i]['link_facebook']+"'>" +
                                        "</label>" +
                                        "<label for='Twitter'>Twitter" +
                                            "<input type='text' id='Twitter' name='twitter' value='"+arrayAnuncio[i]['link_twitter']+"'>" +
                                        " </label>" +
                                        " <label for='Linkedin'>Linkedin" +
                                             "<input type='text' id='Linkedin' name='linkedin' value='"+arrayAnuncio[i]['link_linkedin']+"'>" +
                                        "</label>" +
                                        "<label for='lattes'>Lattes" +
                                        "  <input type='text' id='lattes' name='lattes' value='"+arrayAnuncio[i]['link_lattes']+"'>" +
                                        " </label>" +
                                    " </fieldset>" +
                                 " </fieldset>" +
                               "</fieldset>" +

                             "<fieldset class='categoria'>" +
                                "<legend>Informe sua categoria</legend>" +
                                "<fieldset>" +
                                    " <legend class='sumir'>Ver dica</legend>" +
                                    " <button type='button' id='dicaUm'>Dica importante!</button>" +
                                    " <p>"+
                                        " <button type='button' class='fec'>fechar</button>" +
                                        " As buscas são feitas por palavras chaves, sua categoria é uma, fique atento ao escolher," +
                                        " tente encontrar a categoria que melhor se enquadre á empresa." +
                                    "</p>" +

                                    "<p>No campo abaixo, escreva palavras que identifiquem com seu negócio. <br /> Essas são utilizadas nas pesquisas, aconselhamos  que escolha até 7 palvras chaves para seu anúncio." +
                                    " </p>" +

                                    "<div id='categ'></div>" +
                                "</fieldset>" +
                                "<fieldset>" +
                                    "<legend class='sumir'>Palavras chaves de seu anúncio</legend>" +

                                    " <label for='te'>Palavras chaves" +
                                        "<textarea id='te' name='brevDes' rows='4' cols='35' maxlength='100'>"+arrayAnuncio[i]['anuncio_breve_descricao']+"</textarea>" +
                                    " </label>" +
                                "</fieldset>" +
                             "</fieldset>" +
                          
                                 "<fieldset class='saud'>" +
                                    " <legend>Planos de saúde aceitos</legend>" +

                                    " <label for='cUni'>Unimed" +
                                          " <input type='checkbox' id='cUni' name='planos[]' value='unimed' "+arrayPlanos['unimed']+">" +
                                    " <span> </span></label>" +

                                    "<label for='cSaudVid'>Saúde Vida" +
                                         " <input type='checkbox' id='cSaudVid' name='planos[]' value='saudeVida' "+arrayPlanos['saudeVida']+">" +
                                    " <span> </span></label>" +

                                    "<label for='cPronto'>Prontomed" +
                                         " <input type='checkbox' id='cPronto' name='planos[]' value='prontomed' "+arrayPlanos['prontomed']+">" +
                                    " <span> </span></label>" +

                                    "<label for='cPromed'>Promed" +
                                         " <input type='checkbox' id='cPromed' name='planos[]' value='promed' "+arrayPlanos['promed']+">" +
                                    " <span> </span></label>" +

                                    "<label for='cOutrosPla'>Outros" +
                                        " <input type='checkbox' id='cOutrosPla' name='planos[]' value='outros' "+arrayPlanos['outros']+">" +
                                    " <span> </span></label>" +
                                 "</fieldset>" +

                                 "<fieldset class='desc'>" +
                                    "<legend>Descrição</legend>" +

                                    " <p class='textDica'>" +
                                         " Faça uma descrição completa de sua empresa, caso queira inclua números de telefones complementares.<br>" +
                                    " </p>" +
                                    " <label for='text'>Descrição do Anúncio" +
                                         "<textarea id='text' name='descricao' rows='4' class='required' cols='35' maxlength='2200'>"+arrayAnuncio[i]['anuncio_descricao']+"</textarea>" +
					"<span></span>"+
                                    " </label>" +
                                 "</fieldset>" +

                                "<fieldset  class='diasFunc'>" +
                                    "<legend class='sumir'>Dias de funcionamento</legend>" +
                                    "<!-- será gerado dinamicamente o código do fieldset responsável por exibir o select das categoria -->" +
                                    "<fieldset>" +
                                        "<legend class='sumir'>Horário e dias de funcionamento</legend>" +
                                        "<fieldset class='dias'>" +
                                            "<legend>Dias de funcionamento</legend>" +
                                             "<span class='cli'>Click na semana para validar seu horário</span>"+

                                            "<label for='diasUm'>Segunda a Sexta" +
                                                 " <input type='checkbox' id='diasUm' name='dias_expediente' value='Segunda à Sexta' "+arrayHour['semana']+">" +
                                                 "<span> </span>" +
                                            "</label>" +

                                            " <label for='diasDois'>Sábado" +
                                                " <input type='checkbox' id='diasDois' name='dias_expediente' value='Sabado' "+arrayHour['sabado']+">" +
                                                " <span> </span>" +
                                            "</label>" +

                                            "<label for='diasTres'>Domingo" +
                                                "<input type='checkbox' id='diasTres' name='dias_expediente' value='Domingo' "+arrayHour['domingo']+">" +
                                                "<span> </span>" +
                                            " </label>" +
                                        "</fieldset>" +

                                        "<fieldset class='horas'>" +
                                            "<legend class='sumir'>Horários</legend>" +
                                            "<!-- será impresso o option de horário dinâmicamente -->" +
                                            "<fieldset id='semana'>" +
                                                 "<legend>Segunda a sexta</legend>" +
                                            "</fieldset>" +
                                            "<!-- Sabado -->" +
                                            "<fieldset id='sabado'>" +
                                                "<legend>Sábado</legend>" +
                                            "</fieldset>" +
                                            "<!-- Domingo -->" +
                                            "<fieldset id='domingo'>" +
                                                " <legend>Domingo</legend>" +
                                            "</fieldset>" +
                                         "</fieldset>" +
                                    "</fieldset>" +
                                "</fieldset>" +

                                "<fieldset class='receb'>" +
                                   "<legend class='sumir'>Modo de recebimento</legend>" +
                                     "<fieldset>" +
                                       "<legend class='sumir'>Modos de pagamento</legend>" +
                                          "<fieldset class='paga'>" +
                                            "<legend>Escolha modo de pagamento da sua empresa.</legend>" +

                                            "<label for='tod'>Marcar todos" +
                                                  "<input type='checkbox' id='tod' name='forma-pag[]' value='todos'>" +
                                            "<span> </span></label>" +

                                            "<label for='bol'>Boleto Bancário" +
                                                 "<input type='checkbox' id='bol' name='forma-pag[]' value='boleto' "+arrayFormPag['boleto'] +">" +
                                            "<span> </span></label>" +

                                            "<label for='cr'> Crédito" +
                                                 "<input type='checkbox' id='cr' name='forma-pag[]' value='credito' "+arrayFormPag['credito'] +">" +
                                            "<span> </span></label>" +

                                            "<label for='de'> Débito" +
                                                  "<input type='checkbox' id='de' name='forma-pag[]' value='débito' "+arrayFormPag['débito'] +">Débito" +
                                            "<span> </span></label>" +

                                            "<label for='val'>Vale Alimentação" +
                                                 "<input type='checkbox' id='val' name='forma-pag[]' value='vale alimentação' "+arrayFormPag['valeAlimentação']+">" +
                                            "<span> </span></label>" +

                                            "<label for='ch'>Cheque" +
                                                "<input type='checkbox' id='ch' name='forma-pag[]' value='cheque' "+arrayFormPag['cheque']+">" +
                                            "<span> </span></label>" +

                                            "<label for='di'>Dinheiro" +
                                              "<input type='checkbox' id='di' name='forma-pag[]' value='dinheiro' "+arrayFormPag['dinheiro']+">" +
                                            "<span> </span></label>" +

                                            "<label for='ou'>Outros" +
                                              "<input type='checkbox' id='ou' name='forma-pag[]' value='outrosFormPag' "+arrayFormPag['outrosFormPag']+">" +
                                            "<span> </span></label>" +
                                         "</fieldset>" +

                                         "<fieldset class='band'>" +
                                            "<legend>Quais bandeiras são aceitas?</legend>" +

                                            "<label for='todos'>Marcar todos" +
                                                "<input type='checkbox' id='todos'  name='forma-pag[]' value='todos' >" +
                                            "<span> </span></label>" +

                                            "<label for='master'>Master card" +
                                              "<input type='checkbox' id='master' name='forma-pag[]' value='master' "+arrayFormPag['master']+">" +
                                            "<span> </span></label>" +

                                            "<label for='visa'>Visa electron" +
                                               "<input type='checkbox' id='visa' name='forma-pag[]' value='visa' "+arrayFormPag['visa']+">" +
                                            "<span> </span></label>" +

                                            "<label for='ameri'>American express" +
                                                "<input type='checkbox' id='ameri' name='forma-pag[]' value='american express' "+arrayFormPag['americanExpress']+">" +
                                            "<span> </span></label>" +

                                            "<label for='diner'>Diner club int." +
                                                "<input type='checkbox' id='diner' name='forma-pag[]' value='diner club internacional' "+arrayFormPag['diner']+">" +
                                            "<span> </span></label>" +

                                            "<label for='elo'>Elo" +
                                                 "<input type='checkbox' id='elo' name='forma-pag[]' value='elo' "+arrayFormPag['elo']+">" +
                                            "<span> </span></label>" +

                                            "<label for='pags'>Pagseguro" +
                                                 "<input type='checkbox' id='pags' name='forma-pag[]' value='pagseguro' "+arrayFormPag['pagseguro']+">" +
                                            "<span> </span></label>" +

                                            "<label for='pay'>Pay pal" +
                                                  "<input type='checkbox' id='pay' name='forma-pag[]' value='pay pal' "+arrayFormPag['pay']+">" +
                                            "<span> </span></label>" +

                                            "<label for='mer'>Mercado Pago" +
                                                "<input type='checkbox' id='mer' name='forma-pag[]' value='mercado pago' "+arrayFormPag['mercadoPago']+">" +
                                            "<span> </span></label>" +

                                            "<label for='sod'>Sodexo" +
                                                "<input type='checkbox' id='sod' name='forma-pag[]' value='sodexo' "+arrayFormPag['sodexo']+">" +
                                            "<span> </span></label>" +

                                            "<label for='tick'>Ticket restaurant" +
                                                 "<input type='checkbox' id='tick' name='forma-pag[]' value='ticket restaurant' "+arrayFormPag['ticketRestaurant']+">" +
                                            "<span> </span></label>" +

                                            "<label for='outr'>Outros" +
                                                 "<input type='checkbox' id='outr' name='forma-pag[]' value='outrosBand' "+arrayFormPag['outrosBand']+">" +
                                            "<span> </span></label>" +
                                        "</fieldset>" +
                                     "</fieldset>" +
                                 "</fieldset>" +

                                "<fieldset class='paifacil'>" +
                                   "<legend>Facilidades oferecidas</legend>" +
                                    "<fieldset>" +
                                         "<legend class='sumir'>Oque a empresa oferece</legend>" +

                                           "<label for='criancas'>Espaço para crianças" +
                                            "<input type='checkbox' id='criancas' name='facilidades[]' value='criancas' "+arrayFacili['criancas']+">" +
                                         "<span> </span></label>" +


                                        "<label for='cEstac'>Estacionamento" +
                                           "<input type='checkbox' id='cEstac' name='facilidades[]' value='estacionamento'  "+arrayFacili['estacionamento']+">" +
                                        "<span> </span></label>" +

                                        "<label for='cSegur'>Segurança" +
                                           "<input type='checkbox' id='cSegur' name='facilidades[]' value='seguranca' "+arrayFacili['seguranca']+">" +
                                        "<span> </span></label>" +

                                        "<label for='cCader'>Acesso para caderantes" +
                                            "<input type='checkbox' id='cCader' name='facilidades[]' value='acessibilidades' "+arrayFacili['acessibilidades']+">" +
                                        "<span> </span></label>" +

                                        "<label for='cAr'>Ar condicionado" +
                                        "<input type='checkbox' id='cAr' name='facilidades[]' value='arCondicionado' "+arrayFacili['arCondicionado']+">" +
                                        "<span> </span></label>" +



                                    "</fieldset>" +
                                    "<fieldset>" +
                                    "<legend class='sumir'>Oque a empresa oferece</legend>" +

                                    "<label for='cWifi'>Wi-fi" +
                                            "<input type='checkbox' id='cWifi' name='facilidades[]' value='wifi' "+arrayFacili['wifi']+">" +
                                        "<span> </span></label>" +

                                        "<label for='cReserv'>Necessita de reservas" +
                                            "<input type='checkbox' id='cReserv' name='facilidades[]' value='reserva' "+arrayFacili['reserva']+">" +
                                        "<span> </span></label>" +

                                        "<label for='cAnim'>Permite animais" +
                                            "<input type='checkbox' id='cAnim' name='facilidades[]' value='animais' "+arrayFacili['animais']+">" +
                                        "<span> </span></label>" +

                                        "<label for='cCupon'>Cupons de desconto sempreNegócio" +
                                            "<input type='checkbox' id='cCupon' name='facilidades[]' value='cupons' "+arrayFacili['cupons']+">" +
                                        "<span> </span></label>" +

                                         "<label for='delivery'>Delivery (entrega)" +
                                            "<input type='checkbox' id='delivery' name='facilidades[]' value='delivery' "+arrayFacili['delivery']+">" +
                                         "<span> </span></label>" +
                                    "</fieldset>" +
                                 "</fieldset>" +

                                 "<fieldset class='fo'>"+
                                    "<legend class='legenP'>Insira foto do Anúncio</legend>"+

                                    "<input type='file' name='img' id='image-upload' class='inputfile'>"+
                                    "<label for='image-upload'>"+
                                        "<span class='spanImg'>carregar foto</span>"+
                                    "</label>"+
                                    "<div class='paiFoto'>"+
                                        "<div id='image-preview'></div>"+
                                    "</div>"+

                                    "<button id='ex' type='button' class='excl'>Excluir</button>"+
                                "</fieldset>"+

                                "<div class='err'>"+
                                   " <p id='te'>Arquivo não suportado !</p>"+
                                    "<button type='button'></button>"+
                                "</div>"+
                                //inputs para localizar os registros de updates
                                  "<input type='hidden' name='endId'  value=' "+arrayAnuncio[i]['endereco_id']+"' />" +
                                  "<input type='hidden' name='hourId' value=' "+arrayAnuncio[i]['horario_func_id']+" '/>" +
                                  "<input type='hidden' name='pgId'   value=' "+arrayAnuncio[i]['forma_pag_id']+" '/>" +
                                  "<input type='hidden' name='faciId' value=' "+arrayAnuncio[i]['facilidades_id']+" '/>" +
                                  "<input type='hidden' name='plaId' value=' "+arrayAnuncio[i]['plano_saude_id']+" '/>" +
                                  "<input type='hidden' name='linkId' value=' "+arrayAnuncio[i]['link_id']+" '/>" +
                                  "<input type='hidden' name='anunId' value=' "+arrayAnuncio[i]['anuncio_id']+" '/>" +
                                "<div class='butCad'>" +
                                     "<input id='subirCur' class='sub' type='submit' name='cFinaliza' value='Alterar anúncio !'>" +
                                "</div>" +
                                "<!-- fecha a fieldset principal -->" +
                            "</fieldset>" +


                          "<!-- Aqui fecho o fieldset principal-->" +
                       "</form>" +
                  "</div>" +
               "</section>" +
            "</div>" +
                "<!-- fecha o divi pai section-->" +
        "</div>";

           

        }//encerra for

 return html;
    }

    else if(finalidade == "parcialTodos") {

            for (var i = 0; i < arrayAnuncio.length; i++) {

                /*Esta eh a parte do anuncio onde sera aproveitado como preview e view*/
                /*Esta eh a parte do anuncio onde sera aproveitado como preview e view*/
                html +=
                    "<article>" +
                    "<h2 class='sumir' " + arrayAnuncio[i]['anuncio_id'] + "> " + arrayAnuncio[i]['anuncio_titulo'] + "</h2>" +
                    "<div class='PaiAnuncio'>" +
                    "<a href='?controller=Anuncio&action=viewAnuncioIDAll&id=" + arrayAnuncio[i]['anuncio_id'] + "' hreflang='pt-br'>" +
                    "<div class='divImg'>" +
                    "<img src='" + arrayAnuncio[i]['anuncio_imagem_capa'] + "'>" +
                    "</div>" +
                    "<p class='titu' " + arrayAnuncio[i]['anuncio_id'] + "> " + arrayAnuncio[i]['anuncio_titulo'] + "</p>" +
                    "<dl>" +
                    "<dt class='sumir'>Dados do anúncio</dt>" +
                    "<dd>" + arrayAnuncio[i]['endereco_rua'] + "</dd>" +
                    "<dd>" + arrayAnuncio[i]['endereco_numero'] + "</dd>" +
                    "<dd>" + arrayAnuncio[i]['endereco_cidade'] + "-</dd>" +
                    "<dd>" + arrayAnuncio[i]['endereco_estado'] + "</dd>" +
                    "<dd class='ddTel'><a href='tel:" + arrayAnuncio[i]['anuncio_tel_fixo'] + "'>" + arrayAnuncio[i]['anuncio_tel_fixo'] + "</a> </dd>" +
                    "<dd class='categ'>" + arrayAnuncio[i]['sub_categoria_descricao'] + "</dd>" +
                    "</dl>" +
                    "<div class='qtdAv'>" +
                    avaliacao +
                    "<p class='estrelas'>"+ arrayAnuncio[i]['anuncio_media'] +"</p>"+
                    "</div>" +
                    "</a>" +
                    "<ul class='lin'>" +
                    "<li>" +
                    "<a href='anuncio-completo/" + arrayAnuncio[i]['anuncio_id'] + "' hreflang='pt-br'>ver anúncio" + "</a>" +
                    "</li>" +
                    "<li>" +
                    "<a href='tel:' hreflang='pt-br' " + arrayAnuncio[i]['anuncio_tel_fixo'] + ">Ligar" + "</a>" +
                    "</li>" +
                    "</ul>" +

                    "</div>";
                html += "</article>";
            }



    } else if(finalidade == "selectAnun"){

              for(var i = 0; i < arrayAnuncio.length; i++) {

            /*Esta eh a parte do anuncio onde sera aproveitado como preview e view*/
          html += "<article>" +
            "<h2 class='sumir' "+arrayAnuncio[i]['anuncio_id']+"> " + arrayAnuncio[i]['anuncio_titulo'] + "</h2>" +
            "<div class='divCup'>"+
                "<p class='titu' "+arrayAnuncio[i]['anuncio_id']+"> " + arrayAnuncio[i]['anuncio_titulo'] + "</p>" +
                "<div class='divImg'>"+
                    "<a href='?controller=Anuncio&action=viewAnuncioIDAll&id="+arrayAnuncio[i]['anuncio_id']+"' hreflang='pt-br'>"+
                       "<figure>"+
                          "<img src='"+ arrayAnuncio[i]['anuncio_imagem_capa'] +"' >" +
                        "</figure>"+
                    "</a>"+
                "</div>"+
             "<button type='button' class='butCup'><a href='?controller=Dashboard&action=ViewDashboard&option=cadasDesc&anun="+arrayAnuncio[i]['anuncio_id']+"'>Cadastrar Desconto</a></button> "+
             "<button type='button' class='butCup'><a href='?controller=Dashboard&action=ViewDashboard&option=cupAnun&anun="+arrayAnuncio[i]['anuncio_id']+"'>Gerenciar Desconto</button></a>"+
            "</div>";
            //foi adicionado um input inner para que possamos recuparar o id do anuncio em questão.
            html+= "<input type='hidden' class='idAnun' value='"+arrayAnuncio[i]['anuncio_id']+"' style='color:red;'>" +//deve ser criado um seletor para selecionar this.input.hidden.val
             "</article>";

        }


    } else if(finalidade == "completoTodos") {

       for(var i = 0; i < arrayAnuncio.length; i++){

            html +="<div class='paiAnunCompl'>"+
            "<div class='divControler'>"+
                "<article>"+
                    "<h2 class='sumir'>"+ arrayAnuncio[i]['anuncio_titulo'] +"</h2>" +
                    "<div class='PaiAnuncio'>"+
                        "<p>" + arrayAnuncio[i]['anuncio_titulo'] +"</p>" +
                        "<div class='divImg'>"+

                          "<div>"+
                             "<p id='media'>" + arrayAnuncio[i]['anuncio_media'] + "</p>"+
                                "<ul>"+
                                    "<li>"+
                                        "<a href='?controller=Anuncio&action=viewAnuncioIdAll&id="+arrayAnuncio[i]['anuncio_id']+"#avalia'>Avaliar</a>"+
                                    "</li>"+
                                "</ul>"+
                           "</div>"+
                            "<div>"+
                               "<figure>"+
                                    "<img src='"+ arrayAnuncio[i]['anuncio_imagem_capa'] +"' >" +
                               "</figure>"+
                            "</div>"+
                        "</div>"+
                     "<div class='dadosAnun'>"+
                        "<dl>"+
                            "<dt>Endereço:</dt>" +
                            "<dd>" + arrayAnuncio[i]['endereco_rua'] + "</dd>" +
                            "<dd>" + arrayAnuncio[i]['endereco_bairro'] + "</dd>" +
                            "<dd><strong>nº</strong>" + arrayAnuncio[i]['endereco_numero'] + "</dd>" +
                            "<dd>" + arrayAnuncio[i]['endereco_complemento'] + "</dd>" +
                            "<dd><strong>nº complemento</strong>" + arrayAnuncio[i]['endereco_numero_complemento'] + "</dd>" +
                            "<dd>" + arrayAnuncio[i]['endereco_cidade'] + "-</dd>" +
                            "<dd>" + arrayAnuncio[i]['endereco_estado'] + "</dd>" +
                            "<dd><strong>cep:</strong>" + arrayAnuncio[i]['endereco_cep'] + "</dd>" +
                            "<dd><strong>Categoria:</strong>" + arrayAnuncio[i]['sub_categoria_descricao'] + "</dd>" +
                            "<dl>"+
                                "<dt>Contato:"+"</dt>" +
                                "<dd><a href='tel:" + arrayAnuncio[i]['anuncio_tel_fixo'] + "'><strong></strong>" + arrayAnuncio[i]['anuncio_tel_fixo'] + "</a> </dd>" +
                                "<dd><a href='tel:" + arrayAnuncio[i]['anuncio_tel_cel'] + "'><strong></strong>" + arrayAnuncio[i]['anuncio_tel_cel']  + "</a> </dd>" +
                                "<dd><a href='tel:" + arrayAnuncio[i]['anuncio_whats'] + "'><strong></strong>" + arrayAnuncio[i]['anuncio_whats']  + "</a> </dd>" +
                               
                                "<dt>Email:</dt>"+
                                "<dd><strong></strong>" + arrayAnuncio[i]['anuncio_email'] + "</dd>" +
                            "</dl>"+
                        "</dl>"+
                        "<dl class='sit'>"+
                            "<dt>Site do anunciante"+"</dt>" +
                            "<dd><a target='_blank' href='" + arrayAnuncio[i]['link_site'] + "' hreflang='pt-br' class='redeS site'><strong></strong>" + flag(arrayAnuncio[i]['link_site']) + "</a></dd>" +
                        "</dl>"+
                        "<dl id='verRed'>"+
                            "<dt>Redes sociais:</dt>"+
                            "<dd><a target='_blank' href='"+ arrayAnuncio[i]['link_facebook'] + "' hreflang='pt-br' class='redeS faceb'><strong></strong>"+ flag(arrayAnuncio[i]['link_facebook']) + "</a></dd>" +
                            "<dd><a target='_blank' href='" + arrayAnuncio[i]['link_twitter'] + "' hreflang='pt-br' class='redeS twit'><strong></strong>" + flag(arrayAnuncio[i]['link_twitter']) + "</a></dd>" +
                            "<dd><a target='_blank' href='" + arrayAnuncio[i]['link_linkedin'] + "' hreflang='pt-br' class='redeS lik'><strong></strong>" + flag(arrayAnuncio[i]['link_linkedin']) + "</a></dd>" +
                            "<dd><a target='_blank' href='" + arrayAnuncio[i]['link_lattes'] + "' hreflang='pt-br' class='redeS latt'><strong></strong>" + flag(arrayAnuncio[i]['link_lattes']) + "</a></dd>" +
                        "</dl>"+
                      "</div>"+
                    "</div>"+
                "</article>"+
             "<div>"+
                    "<div class='divHoras'>"+
                    "<dl>"+
                        "<dt>Horário de funcionamento:" + "</dt>" +
                        "<dd>- De segunda à sexta feira das " + "<span class='seg'>" + arrayAnuncio[i]['horario_func_semana_inicio'] + " às " + arrayAnuncio[i]['horario_func_semana_termino'] + "</span>" + "</dd>" +
                        "<dd>- Sábado das " + "<span class='sab'>" + arrayAnuncio[i]['horario_func_sabado_inicio'] + " às " + arrayAnuncio[i]['horario_func_sabado_termino'] + "</span>" +"</dd>" +
                        "<dd>- Domingo das " + "<span class='dom'>" + arrayAnuncio[i]['horario_func_domingo_inicio'] + " às " + arrayAnuncio[i]['horario_func_domingo_termino'] + "</span>" + "</dd>" +
                    "</dl>"+
                   "</div>"+

                "<div class='paiBand mod'>"+
                    "<div>"+
                        "<h3>Formas de pagamentos: "+"</h3>" +
                        "<input type='checkbox' name='forma_pag' value='boleto' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_boleto'])  + "/>" +
                        "<span>Boleto</span>"+

                        "<input type='checkbox' name='forma_pag' value='credito' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_credito'])  + "/>" +
                        "<span>Crédito</span>"+

                        "<input type='checkbox' name='forma_pag' value='débito' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_debito'])  + "/>" +
                        "<span>Débito</span>"+

                        "<input type='checkbox' name='forma_pag' value='vale alimentação' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_vale_alimentacao'])  + "/>" +
                        "<span>Ticket</span>"+

                        "<input type='checkbox' name='forma_pag' value='cheque' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_cheque'])  + "/>" +
                        "<span>Chegue</span>"+

                        "<input type='checkbox' name='forma_pag' value='dinheiro' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_dinheiro'])  + "/>" +
                        "<span>Dinheiro</span>"+
                    "</div>"+

                    "<div id='bandeira'>"+
                        "<h3>Bandeiras aceitas"+"</h3>" +

                        "<input type='checkbox' name='forma_pag' value='master' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_master_card'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='visa' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_visa'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='american express' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_american_express'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='diner club internacional' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_diner_club'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='elo' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_elo'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='pagseguro' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_pagseguro'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='pay pal' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_paypal'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='maercado pago' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_mercado_pago'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='sodexo' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_sodexo'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='ticket restaurant' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_ticket_restaurant'])  + "/>" +
                        "<span></span>"+

                        "<input type='checkbox' name='forma_pag' value='elo' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['forma_pag_outros_formPag'])  + "/>" +
                        "<span>Outros</span>"+
                    //Facilidades oferecidas
                    "</div>"+
                "</div>"+

                   // div que fecha paiband
                "<div class='paiFac mod'>"+
                   //Facilidades oferecidas
                    "<div id='facOfe'>"+
                        "<h3>Facilidades oferecidas</h3>"+

                        "<input type='checkbox' name='facilidades' value='estacionamento' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_estacionamento'])  + "/>" +
                        "<span>Estacionamento</span>"+

                        "<input type='checkbox' name='facilidades' value='seguranca' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_seguranca'])  + "/>" +
                        "<span>Segurança</span>"+

                        "<input type='checkbox' name='facilidades' value='assesibilidade' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_acessibilidade'])  + "/>" +
                        "<span>Acesso a portadores de necessidades especiais</span>"+

                        "<input type='checkbox' name='facilidades' value='ar' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_ar_condicionado'])  + "/>" +
                        "<span>Ar-condicionado</span>"+

                        "<input type='checkbox' name='facilidades' value='wifii' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_wifii'])  + "/>" +
                        "<span>Wi-fi (internet)</span>"+

                        "<input type='checkbox' name='facilidades' value='reservar' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_reservar'])  + "/>" +
                        "<span>Reservas antecipadas</span>"+

                        "<input type='checkbox' name='facilidades' value='animais' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_permite_animais'])  + "/>" +
                        "<span>Permitido animais</span>"+

                        "<input type='checkbox' name='facilidades' value='cupons' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_cupons_desconto'])  + "/>" +
                        "<span>Cupons de descontos SempreNegócio</span>"+

                       "<input type='checkbox' name='criancas' value='criancas' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_criancas'])  + "/>" +
                        "<span class='crian'>Espaço para crianças</span>"+

                         "<input type='checkbox' name='delivery' value='delivery' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['facilidades_delivery'])  + "/>" +
                        "<span class='delivery'>Delivery (entrega)</span>"+
                    "</div>"+
                    //Encerra facilidades
                    //inivia planos
                    "<div id='planoSa'>"+
                        "<h3>Planos aceitos</h3>"+

                        "<input type='checkbox' name='planos' value='unimed' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_unimed'])  + "/>" +
                        "<span>- Unimed</span>"+

                        "<input type='checkbox' name='planos' value='prontomed' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_prontomed'])  + "/>" +
                        "<span>- Prontomed</span>"+

                        "<input type='checkbox' name='planos' value='saudevida' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_saudevida'])  + "/>" +
                        "<span>- Saúde Vida</span>"+

                        "<input type='checkbox' name='planos' value='promed' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_promed'])  + "/>" +
                        "<span>- Promed</span>"+

                        "<input type='checkbox' name='planos' value='outros' id='forma_pag' " + verificaStatusCheck(arrayAnuncio[i]['plano_saude_outros'])  + "/>" +
                        "<span>- Outros</span>"+
                    "</div>"+
                    //encerra planos
               "</div>"+
           // div paifacilidades e palnos aceitos
            "</div>"+
          "</div>"+
        "</div>"+

        "<div class='paiArt'>"+
            "<article>"+
                "<h2>Mais detalhes da empresa</h2>"+
                 "<div>"+
                     "<p>"+ arrayAnuncio[i]['anuncio_descricao']+"</p>"+
                 "</div>"+
            "</article>"+
        "</div>";
       
         if(imagens != ""){

        html += "<section class='secFoto'>"+
        "<h3>Veja fotos deste anúncio.</h3>"+
            "<div id='galeria'>"+
               "<div id='refe'>"+
                 "<ul>"+
                    imagens +
                 "</ul>"+
                "</div>" +
           "</div>"+
        "</section>";

     } else {

         html += "<section class='secFoto semFoto'>"+
        "<h3>O anuncio não possui imagens</h3>"+
        "</section>";

     }
       
	if(arrayAnuncio[i]['anuncio_pacote'] != "Grátis"){

	  if(arrayAnuncio[i]['link_youtube'] != ""){
	   html +=  "<div class='youTube'>"+
            "<article>"+
                "<h3>Vídeo sobre a empresa</h3>"+
                "<figure>"+
                     "<div id='videoYou'>" + 
                         "<iframe width='420' height='315' src='"+arrayAnuncio[i]['link_youtube']+"' frameborder='0' allowfullscreen></iframe>"+
                     "</div>" +
                "</figure>"+
                "<figcaption>Vídeo do anunciante</figcaption>"+
            "</article>"+
         "</div>";
		}
		
          html +=  CalculaDistancia(arrayAnuncio[i]['endereco_rua'] +" "+ arrayAnuncio[i]['endereco_numero'] +" "+ arrayAnuncio[i]['endereco_bairro'] +" "+ arrayAnuncio[i]['endereco_cidade'] +" "+ arrayAnuncio[i]['endereco_estado']) +

        "<section >" +
	   "<div id='rota'>"+
            "<h3 class='sumir'>Como chegar na empresa</h3>"+
             "<div class='rota'>" +
                "<p>Sem sustos, saiba a <strong>distância</strong> e tempo estimado para <strong>chegar</strong> até ao anunciante.</p>" +
             "</div>" +

	     "</div>"+
		
             "<div class='paiMapa'>" +
                "<div>"+
                    "<span id='litResultado'>&nbsp;</span>" +
                "</div>"+

		
		
                 "<div>" +
                      "<figure>" +
                         "<iframe  scrolling='no' frameborder='0' id='map' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?saddr="+arrayAnuncio[i]['endereco_rua'] +" "+ arrayAnuncio[i]['endereco_numero'] +" "+ arrayAnuncio[i]['endereco_bairro'] +" "+ arrayAnuncio[i]['endereco_cidade'] +" "+ arrayAnuncio[i]['endereco_estado']+"&output=embed'></iframe>" +
                         "<figcaption>Mapa do google</figcaption>" +
                      "</figure>" +
                 "</div>" +
             "</div>" +
        "</section>";

	}//encerra verificação de video e mapa 
      

           html += geraFormRevewAndMesseger() + avaliacao;
        }
    }




    return html;
};


//gera os formulários de revew e de envio de mensagem para o dono do anuncio.
function geraFormRevewAndMesseger(){

  var html ="<div class='paiMens'>"+
            "<article>"+
               "<h4>Solicite seu orçamento aqui !</h4>"+
              "<p>Somente a empresa poderá visulizar esta mensagem, aproveite para melhorar sua rede de contatos.</p>"+
               "<div>"+
                    "<form id='mensagem'>" +
                        "<fieldset>" +
                            " <legend>Insira seus dados para o anunciante poder entrar em contato.</legend>" +

                            "<label for='menNome' id='nome'>Nome:</label>" +
                            "<input type='text' id='menNome' class='required'>" +

                            "<label for='menTel' id='telefone'>Telefone:</label>" +
                            "<input type='text' class='tel-cel' id='menTel'>" +

                            "<label for='menEmail' id='email'>E-mail:</label>" +
                            "<input type='email' id='menEmail'>" +

                            "<label for='menText' id='mensa'>Mensagem:</label>" +
                            "<textarea id='menText'></textarea>" +

                            "<input type='button' id='envMenssage' value='Enviar Mensagem'>" +
			     "<p class='retorno'></p>"+
                        "</fieldset>" +
                    "</form>"+
               "</div>"+
            "</article>"+
        "</div>"+ 
        "<div class='paiAval' id='avalia'>" +
            "<article>"+
                 " <h4>Avalie este estabelecimento com sua opnião</h4>" +
             //Formulário do revew
                "<form>" +
                   "<fieldset>" +
                        "<legend>Qual sua opinião sobre este local ?</legend>" +
                        "<fieldset>"+
                            "<legend class='sumir'>estrelas</legend>"+
                            "<label for='nota1'>"+
                                "<input type='radio'id='nota1' class='trw' name='nota' value='1' >Uma estrela" +
                                "<span> </span>"+
                            "</label>"+

                            "<label for='nota2'>"+
                                "<input type='radio' id='nota2' class='trw' name='nota' value='2' >Duas estrelas" +
                                "<span> </span>"+
                            "</label>"+

                            "<label for='nota3'>"+
                                "<input type='radio' id='nota3' class='trw' name='nota' value='3' >Três estrelas" +
                                "<span> </span>"+
                            "</label>"+

                            "<label for='nota4'>"+
                                  "<input type='radio' id='nota4' class='trw' name='nota' value='4' >Quatro estrelas" +
                                   "<span> </span>"+
                            "</label>"+

                            "<label for='nota5'>"+
                                "<input type='radio' class='trw' id='nota5' name='nota' value='5'>Cinco estrelas" +
                                "<span> </span>"+
                            "</label>"+
                          "</fieldset>"+
                        "<fieldset class='fieldOpn'>"+
                            "<legend class='sumir'>sua opinião </legend>"+
                            "<label for='revTitulo' >Título da sua opinião"+
				
                                 "<input type='text' class='trw' id='revTitulo' placeholder='Muito Bom, Gostei, Ruim...'>" +
				"<span id='opTitle'></span>"+
                            "</label>" +
                            "<label for='revText' >Deixe sua opinião"+
				
                                "<textarea id='revText' class='trw' rows='4' cols='35'></textarea>" +
				"<br/><span id='op'></span>"+
                             "</label>" +
                            "<input type='button' id='envRevew' value='Enviar Avaliação' >" +
			 
                      "</fieldset>"+
                   "</fieldset>"+
		 "<br/><br/><br/><p class='retorno ret01'></p>"+
                "</form>" +
        "</div>";
    return html;

}


//gera formulário para resposta de revew PS: userRef vai ser impresso direto do php.
function revewRespost(vewRef){
   var html =
   "<div class='resp'>" +
        "<article>"+
            "<h5>Digite sua resposta:</h5>" +
            "<form>" +
                "<fieldset>" +
                    "<legend>Qual sua opinião sobre este local?</legend>" +

                    "<label for='respMen'></label>" +
                    "<textarea id='respMen'></textarea>" +

                    "<input type='hidden' id='vewRef' value='"+vewRef+"'>" +

                    "<input type='button' onclick='submitRes();' value='Enviar resposta' >" +
                "</fieldset>"+
            "</form>" +
	"<p id='retornoRes'></p>"
        "</article>"+
     "</div>";
    return html;
}

//função que imprime formulário de resposta
function exibeFormRes(vewRef){

    var idCli = $("#idCliAnu").val();

    if(idCli != 0){

        $("."+vewRef).html(revewRespost(vewRef));

    } else{  

        $('.fundoEscuro').fadeIn();
        $('div.logar').addClass('aparecer');
        $('.efetua').find('div:eq(0)').fadeIn(500);
    }

}


//extrai as imagens do array de anuncios. (lembrando que esse já é o subArray do array principal gerado.)
function extraiImagens(arrayImagens, finalidade){

    var html = "";

//Gera a view de acordo com a finalidade, podendo ser anuncio completo ou parcial
    if(finalidade == "parcial"){

    } else if(finalidade == "completo" || finalidade == "completoTodos"){

        for(var i = 0; i < arrayImagens.length; i++){


             //só gera se houver link persistido.
            if(arrayImagens[i]['imagem_localizacao'] != undefined){

                 html += "<li>"+
                    "<a href='#'>"+
                       "<img class='foto' src='upload/anuncio-images/"+ arrayImagens[i]['imagem_localizacao'] + "'>"+
                    "</a>"+
                "</li>";

            }

        }
    } else if(finalidade == "editar"){

        //ficará diferente na página de edição.
        for(var i = 0; i < arrayImagens.length; i++){

            html += "<img src='upload/anuncio-images/"+ arrayImagens[i]['imagem_localizacao'] + "'>";

        }
    }



    return html;

}


//extrai as mensagens do array de anuncios. (lembrando que esse já é o subArray do array principal gerado.)

function extraiMensagens(arrayMensagens, finalidade){

    var html ="<h2 class='tituMens'>Mensagens para sua empresa:</h2>";

//Gera a view de acordo com a finalidade, podendo ser anuncio completo ou parcial
    if(finalidade == "parcial"){

        var cont = 0;

        for(var i = 0; i < arrayMensagens.length; i++){

            if(arrayMensagens[i]['mensagem_id'] > 0){

                cont++;
            }

        }

        html ="<p id='mens'> Quantidade de Mensagens: " + "<span>" + cont + "</span>" + "<a href='#'></a>" +"</p>";

    } else if(finalidade == "completo"){

        for(var i = 0; i < arrayMensagens.length; i++){

            if(arrayMensagens[i]['mensagem_id'] > 0){

                     html +=
                "<div class='paiMensangem'>"+
                    "<article>"+

                        "<input type='hidden' id='menEmail"+arrayMensagens[i]['mensagem_id']+"' value='"+arrayMensagens[i]['mensagem_email']+"'>" + //email
                        "<input type='hidden' id='menName"+arrayMensagens[i]['mensagem_id']+"' value='"+arrayMensagens[i]['mensagem_nome']+"'>" + //nome de quem envio
                        "<h3>Mensagem enviada por: " + "<strong>" + arrayMensagens[i]['mensagem_nome'] + "</strong>" + "</h3>" +
                            "<p>" + arrayMensagens[i]['mensagem_texto'] + "<p/>" +
                            "<p>Email: " + "<strong>" + arrayMensagens[i]['mensagem_email'] + "</strong>" + "<p/>" +
                            "<p>Data de envio: " + arrayMensagens[i]['mensagem_data_insert'] + "<p/>" +
                            "<button type='button' class='butResClil'> Responder ao cliente</button>"+
                            "<button type='button' class='butDel'> Deletar Mensagem" + "</button>"+
                    "</article>"+
                      "<div class='paiSectRes'>"+
                        "<section>"+
                            "<h3 class='sumir'> Responder</h3>"+
                            "<div>"+
                                "<form>"+
                                   "<fieldset>"+
                                        "<legend>Responder</legend>"+
                                        "<div id='respReturn"+arrayMensagens[i]['mensagem_id']+"' style='font-size:25px;'></div>"+ //retorno
                                        "<label for='assunt'>"+
                                          "<input type='text' id='assunt"+arrayMensagens[i]['mensagem_id']+"' name='assunt' placeholder='Assunto'>"+
                                        "</label>"+
                                        "<label for='res'>Escreva sua resposta"+
                                           "<textarea id='res"+arrayMensagens[i]['mensagem_id']+"' name='res'></textarea>"+
                                        "</label>"+

                                        "<input type='button' id='respUse' name='butResp' onclick='respMen("+arrayMensagens[i]['mensagem_id']+");' value='Enviar Resposta'>"+
                                   "</fieldset>"+
                                "</form>"+
                            "</div>"+
                        "</section>"+
                    "</div>"+
                    "<div class='confirma'>"+
                        "<p>Realmente deseja deletar esta mensagem ?</p>"+
                       "<div>"+
                            "<button type='button' class='cancel'>Cancelar</button>"+
                            "<button type='button'  onclick='setExcluMen("+arrayMensagens[i]['mensagem_id']+");' class='delet'>Deletar</button>"+
                        "</div>"+
                    "</div>"+
                "</div>";

            }

        }

    } else if(finalidade == "editar"){

        //O html ficará diferente.
        for(var i = 0; i < arrayMensagens.length; i++){

            if(arrayMensagens[i]['mensagem_id'] > 0){

                html += "<p>Nome: " + arrayMensagens[i]['mensagem_nome'] + "<p/>" +
                "<p>Mensagem: " + arrayMensagens[i]['mensagem_texto'] + "<p/>" +
                "<p>Email: " + arrayMensagens[i]['mensagem_email'] + "<p/>" +
                "<p>Data de envio: " + arrayMensagens[i]['mensagem_data_insert'] + "<p/>";
            }

        }

    }

    return html;
}

//extrai as avaliações do array de anuncios. (lembrando que esse já é o subArray do array principal gerado.)
function extraiAvaliacao(arrayAvaliacao, finalidade){

    var html = "<p class='pAval'>Avaliações sobre a empresa.</p>";


    //Gera a view de acordo com a finalidade, podendo ser anuncio completo ou parcial
    if(finalidade == "parcial" || finalidade == "parcialTodos"){

        var cont = 0;

        for(var i = 0; i < arrayAvaliacao.length; i++){

            if(arrayAvaliacao[i]['avaliacao_id'] > 0){

                cont++;
            }

        }

         html = "<p>Avaliações: " + "<span>" + cont + "</span>" + "<a href='#'></a>" + "</p>";

    } else if(finalidade == "completo" || finalidade == "completoTodos"){

        //solicita joson contendo as informações necessárias para gerar as respostas das mensagens.
     var arrayRespostas = returnJason("?controller=Anuncio&action=returnRespRevew&idAnun="+arrayAvaliacao[0]['avaliacao_anuncio_ref']);

        for (var i = 0; i < arrayAvaliacao.length; i++) {

         //   alert(arrayAvaliacao[i]['avaliacao_id']);

            if(arrayAvaliacao[i]['avaliacao_id'] > 0){ //roda todas as avaliações, para cada avaliação compara as chaves, sendo que quando encontrado uma chave igual exibe os dois.


               html +="<div class='paiBlocoAva'>"+
                "<div class='avalicao'>" +
                    "<article>"+
                       "<h5 class='sumir'>Avaliações</h5>"+
                        "<figure class='imgRev'>"+
                            "<img  alt='imagem do usuário' src='" + arrayAvaliacao[i]['cli_foto'] + "'>"+
                        "</figure>"+
                        "<div>"+
                            "<p><strong>Nome:</strong> " + arrayAvaliacao[i]['cli_nome'] + "</p>"+
                            "<p><strong>Avaliado em:</strong> " + arrayAvaliacao[i]['avaliacao_data_horario'] + "</p>" +
                            "<p><strong>" + arrayAvaliacao[i]['avaliacao_titulo'] + "</strong>"+"</p>" +
                            "<p class='estrelas'>" + arrayAvaliacao[i]['avaliacao_nota'] + "<p/>" +
                        "</div>"+
                        "<div>"+
                            "<p><strong>Opinião:</strong> " + arrayAvaliacao[i]['avaliacao_comentario'] + "</p>"+
                        "</div>";


                //verificar se a avaliação possui resposta, se possuir imprime a resposta embaixo.
               // if(){ //passar posição atual de uma avaliação e verificar dentro da função se ela possui relacionamento com a chave estrangeira da avaliação resposta. O proble consiste
                //--> em criar uma forma de selecionar apenas as respostas vinculadas a revewa de apenas um dado anuncio. anuncio possui revew que possui resposta, porém a consulta deve retornar apenas as respostas de um dado id de anuncio, pois é inviável selecionar todas as respostas cadastradas no sistema.

                //verificar se o json possui algum valor, caso contrário não executa afunção..... caso não tiver nada retorna zero

                        if(arrayRespostas != undefined){
                            html +=   geraResposta(arrayAvaliacao[i]['avaliacao_id'], arrayRespostas);
                       }

                html += "<div>"+
                            "<button type='button' class='respo' onclick='exibeFormRes(" +arrayAvaliacao[i]['avaliacao_id'] + ");'>Responder</button>" +
                            "<button type='button' class='curt' onclick='incrementTop(" +arrayAvaliacao[i]['avaliacao_id'] + ");'>Curtir <span class='contLike"+arrayAvaliacao[i]['avaliacao_id']+"'>("+arrayAvaliacao[i]['avaliacao_curtidas']+")</span></button>" +
                            "<div class='"+arrayAvaliacao[i]['avaliacao_id']+"'></div>" +
                         "</div>"+
                        "</article>"+
                      "</div>"+
                    "</div>";
            }
        }
    } else if(finalidade == "editar"){ //verificar como está sendo a utilização deste.
        //ficará diferente o html
        for (var i = 0; i < arrayAvaliacao.length; i++) {

            if(arrayAvaliacao[i]['avaliacao_id'] > 0){


                html += "<p>Data da avaliação: " + arrayAvaliacao[i]['avaliacao_data_horario'] + "<p/>" +
                "<p>Atendimento: " + arrayAvaliacao[i]['avaliacao_nota_atendimento'] + "<p/>" +
                "<p>Localização: " + arrayAvaliacao[i]['avaliacao_nota_localizacao'] + "<p/>" +
                "<p>Preço: " + arrayAvaliacao[i]['avaliacao_nota_preco'] + "<p/>" +
                "<p>Nota final: " + arrayAvaliacao[i]['avaliacao_nota_final'] + "<p/>" +
                "<p>Avaliação comentário: " + arrayAvaliacao[i]['avaliacao_comentario'] + "<p/>";
            }
        }
    }
    return html;
}

//modifica o status do anuncio de forma assincrona (modificação solicitada pelo usuário.)
var modAnunAssinc = function(url){

    $.ajax({
        url: url,
        type:   "get",
        async: true,
        success: function(data){
         //   alert(data);
            location.reload();
        }
    });
};

//Essa mesma lógica vai funcionar para atualizar os revews da página.
    var modAnunAssincStatusAtv = function(url){

    $.ajax({
    url: url,
    type: "get",
    async: true,
    success: function(data){

        $("#inner").html(viewAnuncioAtivos());
        //imprime CSS necessário.
        $("#cssImpress").html(cssAnuncioAtivos());
        //imprime todo JS necesário para o funcionamento da página
        $("#jsImpress").html(jsAnuncioAtivos());
      }
    });
   };

    //realiza o processo de atualização após opção de delete e ativar
     var assincStatusIna = function(url){

    $.ajax({
    url: url,
    type: "get",
    async: true,
    success: function(data){

        $("#inner").html(viewAnunciosInativos());
        //imprime CSS necessário.
        $("#cssImpress").html(cssAnuncioInativos());
        //imprime todo JS necesário para o funcionamento da página
        $("#jsImpress").html(jsAnuncioInativo());
      }
    });
   };


//verifica veracidade da senha.
function verifiSenha(userEmail,userSenha,userNewSenha){

    alert("verifica a senha");

    if(userSenha == userNewSenha){

        alterDadosUser(userEmail,userSenha,userNewSenha);

    } else {

        alert("não funfou");
    }

};



//retorna os dados do posicionamento a ser gerado dinâmicamente.
function mapImpress(endereco){
    var map;
    $(document).ready(function(){
        map = new GMaps({
            el: '#map',
            lat: -12.043333,
            lng: -77.028333
        });

        //e.preventDefault();
        GMaps.geocode({
            address: endereco,
            callback: function(results, status){
                if(status=='OK'){

                    return results[0].geometry.location;

                    }
                }

        });

    });

};



function CalculaDistancia(destino) {


    var service = new google.maps.DistanceMatrixService();

    GMaps.geolocate({
        success: function(position){
            //esse function não pode retornar, por isso fiz dessa maneira.
            //executar o DistanceMatrixService
            service.getDistanceMatrix(
                {
                    //Origem
                    origins: [position.coords.latitude + " " + position.coords.longitude],
                    //Destino
                    destinations: [destino],
                    //Modo (DRIVING | WALKING | BICYCLING)
                    travelMode: google.maps.TravelMode.DRIVING,
                    //Sistema de medida (METRIC | IMPERIAL)
                    unitSystem: google.maps.UnitSystem.METRIC
                    //Vai chamar o callback
                }, callback);

            ////////////////////
        },
        error: function(error){

	   
            //alert('Geolocalização falhou: '+error.message); se a rota por geolocalização falhar, exibe apenas o mapa comum.
		$("#rota").html("");
	    
        },
        not_supported: function(){
            alert("Your browser does not support geolocation");
        },
        always: function(){

        }
    });

    $('#litResultado').html('Aguarde...');
    //Instanciar o DistanceMatrixService


}



//Tratar o retorno do DistanceMatrixService
function callback(response, status) {
    //Verificar o Status
    if (status != google.maps.DistanceMatrixStatus.OK)
    //Se o status não for "OK"
        $('#litResultado').html(status);
    else {
        //Se o status for OK
        //Endereço de origem = response.originAddresses
        //Endereço de destino = response.destinationAddresses
        //Distância = response.rows[0].elements[0].distance.text
        //Duração = response.rows[0].elements[0].duration.text
        $('#litResultado').html(
            "<p>Sua distância até ao anunciante é de: "+ "<strong>"+ response.rows[0].elements[0].distance.text +"</strong>"+ "</p> " +
            " <p>Tempo estimado: "+ "<strong>"+ response.rows[0].elements[0].duration.text+ "<strong>"+"</p>"
        );
        //Atualizar o mapa
        $("#map").attr("src", "https://maps.google.com/maps?saddr=" + response.originAddresses + "&daddr=" + response.destinationAddresses + "&output=embed");
    }
};



//gera html do input de categoria dinâmicamente
function geraOptionHorario(nomeIni,nomeTer,attIni,attTer,legenda,id){

var htmlHorario;
var rowHorario = returnJason("?controller=Anuncio&action=retDadosHor");
var dadosRetorno = returnJason("?controller=Anuncio&action=regHoraId&id=" + id);


    htmlHorario = "<fieldset  class='selec'>" +
    "<legend class='leg'> "+legenda+"</legend>" +
    "<p>Inicia: </p>" +
    "<select id='"+nomeIni+"' disabled name='"+nomeIni+"'>" +
    "<optgroup label='Horário de inicio'>Horário de inicio</optgroup>";

    for(var cont = 0; cont < rowHorario.length; cont++){

        htmlHorario += "<option value='"+rowHorario[cont]['horario_list_time']+"' >" + rowHorario[cont]['horario_list_time'] + "</option>";

        if(dadosRetorno.length > 0 && dadosRetorno[0][attIni] == rowHorario[cont]['horario_list_time']){

            htmlHorario += "<option value='"+rowHorario[cont]['horario_list_time']+"' selected >" + rowHorario[cont]['horario_list_time'] + "</option>";

        }

    }

    htmlHorario += "</select>";

     //gera o option do horário de encerramento
    htmlHorario += "<p>Encerra: </p>" +
    "<select id='"+nomeTer+"' disabled name='"+nomeTer+"'>" +
    "<optgroup label='Horário de término'>Horário de término</optgroup>";

    for(cont = 0; cont < rowHorario.length; cont++){

        htmlHorario += "<option value='"+rowHorario[cont]['horario_list_time']+"' >" + rowHorario[cont]['horario_list_time'] + "</option>";

        if(dadosRetorno.length > 0 && dadosRetorno[0][attTer] == rowHorario[cont]['horario_list_time']){
            htmlHorario += "<option value='"+rowHorario[cont]['horario_list_time']+"' selected >" + rowHorario[cont]['horario_list_time'] + "</option>";
        }


    }

    htmlHorario += "</select> </fieldset>";

    return htmlHorario;

}

//método responsável por chamar o método que gera os options dinâmicos. (Colocar ele em uma classe mais específica, pois ele não é utilizado apenas no curriculo)
function geraOptionCat(origemOption, id)
{
    var categorias;

    var rowCategoria = returnJason("?controller=Dashboard&action=retornaDadosCat");
    var rowSubCategoria = returnJason("?controller=Dashboard&action=retornaSubCat");
    //Realiza a chamada ao json de acordo com a finalidade
    var dadosCurriculo;
    var dadosAnuncio;



    if(origemOption == "curriculum"){

         dadosCurriculo = returnJason("?controller=DashboardCurriculo&action=retornaDadosCur");
         dadosAnuncio = 0;

   } else if(origemOption == "anuncio"){

         dadosAnuncio = returnJason("?controller=Anuncio&action=retornaRegAnun&id=" + id);
         dadosCurriculo = 0;

    }


   // alert(dadosAnuncio[0]["anuncio_categoria"] + " ------ " +  rowSubCategoria[0]['sub_categoria_descricao']);

    categorias = "<fieldset class='selec'>" +
                  "<legend class='leg'>Categoria</legend>" +
                  "<select name='cCategoria'>";


    for (var i = 0; i < rowCategoria.length; i++) {

        categorias += "<optgroup label='"+rowCategoria[i]['tipo_categoria_descricao']+"'>" + rowCategoria[i]['tipo_categoria_descricao'] + "</optgroup>";

        for (var j = 0; j < rowSubCategoria.length; j++) {


            if (rowCategoria[i]['tipo_categoria_id'] == rowSubCategoria[j]['sub_categoria_cat_ref']) {

                    //Se o usuário possuir curriculo, e o valor que possui no curriculo for igual ao value do option, seta o option como selected.
                   if(dadosCurriculo != 0 && dadosCurriculo[0]["curriculum_area_atuacao"] == rowSubCategoria[j]['sub_categoria_id']){

                    categorias += "<option value='"+rowSubCategoria[j]['sub_categoria_id']+"' selected>" + rowSubCategoria[j]['sub_categoria_descricao'] + "</option>";

               }


                     else if(dadosAnuncio != 0 && dadosAnuncio[0]["anuncio_categoria"] == rowSubCategoria[j]['sub_categoria_id']){

                      categorias += "<option value='"+rowSubCategoria[j]['sub_categoria_id']+"' selected>" + rowSubCategoria[j]['sub_categoria_descricao'] + "</option>";

                    }

                   else {

                   //caso contrário gera o option sem a opção select.
                   categorias += "<option value='"+ rowSubCategoria[j]['sub_categoria_id']+"'>"  + rowSubCategoria[j]['sub_categoria_descricao'] + "</option>";
                }

            }

        }//encerra segundo for

    }//encerra primeiro for



    categorias += "</select></fieldset>";



    return categorias;

}//encerra geraOption

//retorna 0 ou 1 se possui ou não elementos
function flag(valor){

    if(valor != ""){
        return 1;
    }else{
        return 0;
    }
}

//gera html responsável por apresentar os 10 ultimos revews realizados no sistema.
function geraRevewForHome(){

    var arrayRevewHome = returnJason("?controller=Home&action=retornaAnuncioHome");

    var html = "";


    for(var i = 0; i < arrayRevewHome.length; i++){

         html +=
        "<div>" +
            "<ul>"+
                "<li>"+
                   "<img alt='imagem do usuário, em formato circular.' src='" + arrayRevewHome[i]['cli_foto'] + "'/>" +
                   "<p>" + arrayRevewHome[i]['cli_nome'] + "</p>" +
                "</li>"+
            "</ul>"+
            "<ul>"+
                "<li>"+
                    "<a href='anuncio-completo/"+ arrayRevewHome[i]['anuncio_id'] +"' hreflag='pt-br'>" + arrayRevewHome[i]['anuncio_titulo'] + "</a>" +
                "</li>"+
                "<li>"+
                    "<a href='anuncio-completo/"+ arrayRevewHome[i]['anuncio_id'] +"' hreflag='pt-br'>" + arrayRevewHome[i]['avaliacao_titulo'] + "</a>" +
                "</li>"+
                "<li>"+
                    "<span id='estrelas'>" + arrayRevewHome[i]['avaliacao_nota'] + "</span>" +
                "</li>"+
                "<li>"+
                    "<p>Avaliado em: " + arrayRevewHome[i]['avaliacao_data_horario'] + "</p>" +
                "</li>"+
                "<li>"+
                    "<a href='anuncio-completo/"+ arrayRevewHome[i]['anuncio_id'] +"' hreflag='pt-br'>" + arrayRevewHome[i]['avaliacao_comentario'] + "</a>" +
                "</li>"+
            "</ul>"+
        "</div>";
    }
    return html;
}

//responsável por gerar html das respostas na base de dados.
function geraResposta(revewId, arrayResp){

  //  var html = "Numero revew" + revewId +" Numero resposta " +  arrayResp[0]['avaliacao_respostas_avaliacao_ref'];

    var html = " ";




    for(var i=0; i < arrayResp.length; i++){

        if(revewId == arrayResp[i]['avaliacao_respostas_avaliacao_ref']){

            html +=
            "<div class='respDeAn'>" +
                "<div>"+
                    "<figure>";
            //se for o dono do anuncio, a foto e nome serão do anunciante.
            if(arrayResp[i]['avaliacao_respostas_dono'] == 1){
                html += "<img src='" + arrayResp[i]['anuncio_imagem_capa']+ "'>";
            } else {
                html += "<img src='" + arrayResp[i]['cli_foto'] + "'>";
            }

                  html +=  "</figure>"+
                "</div>";
            if(arrayResp[i]['avaliacao_respostas_dono'] == 1) {
                html += "<p class='respParag'><strong>Nome: </strong>" + arrayResp[i]['anuncio_titulo'] + "</p>";
            } else {
                html += "<p class='respParag'><strong>Nome: </strong>" + arrayResp[i]['cli_nome'] + "</p>";
            }

                  html +=  "<p class='respParag'><strong>Respondido em: </strong> " + arrayResp[i]['avaliacao_respostas_data_hora'] + "</p>" +
                "<div>"+
                    "<p><strong>Resposta: </strong> " + arrayResp[i]['avaliacao_respostas_retorno'] + "</p>" +
                "</div>"+
             "</div>";
        }

    }

    return html;
}


function cssInsertAnuncio(){

    var html;
    html = "<link href='view/assets/estilo/formAnun01.css' rel='stylesheet'>"+
           "<link href='view/assets/estilo/breackFormAnun01.css' rel='stylesheet'>";
    return html;
}

function jsInsertAnuncio(idAnun){

    var html;

    html =  "<script src='view/assets/js/jquery.mask.min.js'></script>"+
        "<script src='view/assets/js/modernizr.custom.js'></script>"+
        "<script src='view/assets/js/efeito-foto.js'></script>"+
        "<script src='view/assets/js/viewFoto.js'></script>"+
        "<script src='view/assets/js/custom-file-input.js'></script>"+
        "<script src='view/assets/js/cep.js'></script>"+
        "<script src='view/assets/js/titleVeriry.js'></script>"+
        "<script src='view/assets/js/jquery.validate.js'></script>"+
        "<script src='view/assets/js/checkAnunc.js'></script>"+
        "<script src='view/assets/js/formAn.js'></script>";

    html += "<script type='text/javascript'>"+
            "$(document).ready(function() {"+
                "$.uploadPreview({"+
                    "input_field: '#image-upload',"+   // Default: .image-upload"+
                    "preview_box: '#image-preview',"+  // Default: .image-preview"+
                    "label_field: '#image-label',"+    // Default: .image-label"+
                    "label_default: '#Choose File',"+   // Default: Choose File"+
                    "label_selected: '#Change File',"+  // Default: Change File"+
                    "no_label: false"+                 // Default: false"+
                "});"+
            "});"+
        "</script>";

    //nomeInput,nomeInput2,attIni,attTer,Id (Como esse é apenas de insert, não necessita passar o id como argumento)

  html +=   "<script>"+
            "$('#semana').html(geraOptionHorario('semIni','semTer','horario_func_semana_inicio','horario_func_semana_termino','Horário de funcionamento',"+idAnun+"));"+
            "$('#sabado').html(geraOptionHorario('sabIni','sabTer','horario_func_sabado_inicio','horario_func_sabado_termino','Funcionamento no sábado',"+idAnun+"));"+
            "$('#domingo').html(geraOptionHorario('domIni','domTer','horario_func_domingo_inicio','horario_func_domingo_termino','Funcionamento no domingo',"+idAnun+"));"+
            "$('#categ').html(geraOptionCat('anuncio',"+idAnun+"));"+
            "</script>";

    return html;

}

///////////////////////////////////////////////////////////////////


////////////////////////Visualização dos anuncios ativos no sistema/////////////////////////////////////////

function viewAnuncioAtivos(){

var html;
html = "<div class='tudo' id='anunAt'>"+

    "<header>"+
        "<h1 class='tituAnunc'>Anúncios Ativos</h1>"+
    "</header>"+
        "<div class='controlaBa'>"+
            "<!-- div para controlar o banner e o conteudo do anuncio -->"+
            "<section class='sectAtv'>"+
                "<h2>Gerenciar anúncios ativos</h2>"+

                "<!--Retorna o anuncio, este eh o pai-->"+
                "<div class='reAnun' id='retAnun'>" + "</div>"+
            "</section>"+
        "</div>"+
        "<!--fim div paiRodape-->"+
"</div>";

return html;

}

function cssAnuncioAtivos(){

var html;

    html =
        "<link href='view/assets/estilo/anunciosAtiv.css' rel='stylesheet'>"+
        "<link href='view/assets/estilo/breakAnuncAt0.css' rel='stylesheet'>"+
        "<link href='view/assets/estilo/brackAnunAt01.css' rel='stylesheet'>";

        return html;
}

function jsAnuncioAtivos(){

var arrayAnuncioCompleto = returnJason('?controller=Anuncio&action=anuncioImpressAtivo');


if(arrayAnuncioCompleto == 0){
     $('.reAnun').wrap("<div class='container'></div>");
     $('.container').prepend("<p> Sua conta não possui anúncio ativo !<p>")
     $('.reAnun').html(
                    "<p>Não fique sem investir em sua empresa!</p>"+
                    "<ul>"+
                      "<li>"+
                         "<a href='?controller=Home&action=viewInvistaNegocio#pacotes' class='semAn' hreflang='pt-br'>Cadastre sua empresa!</a>")+
                      "</li>"+
                   "</ul>";
}
 else {
   $( '.reAnun' ).html(htmlImpressAnuncio('online', 'parcial'));


    }

}

////////////////////////Encerra visualização dos anuncios ativos no sistema/////////////////////////////////////////

//////////////////////Pag anuncios inativos////////////////////////////////


function viewAnunciosInativos(){

    var html;

html = "<div class='tudo'>"+

    "<header>"+
            "<h1 class='tituDes'>Anúncios Inativos</h1>"+
    "</header>"+
        "<div class='controlaBa'>"+
            "<!-- div para controlar o banner e o conteudo do anuncio -->"+
            "<aside class='asidAnunDes'>"+
               " <h2>Não deixe de investir</h2>"+
                "<div>"+
                    "<div>"+
                        "<p>Quem não é visto, não é lembrado!</p>"+
                        "<p>Seja nosso parceiro e ganhe mais visibilidade.</p>"+
                       " <ul>"+
                           " <li>"+
                                "<a href='http://adminsn.semprenegocio.com.br/?controller=Home&action=viewInvistaNegocio'>Ver oportunidades</a>"+
                            "</li>"+
                        "</ul>"+
                   " </div>"+
               " </div>"+
           " </aside>"+
            "<section>"+
                "<h2>Gerenciar anúncios Inativos</h2>"+
               " <!--Retorna o anuncio, este eh o pai-->"+

                "<div class='returnIna' id='retAnun'>"+"</div>"+

            "</section>"+
        "</div>"+
"</div>";


    return html;
}

function cssAnuncioInativos(){

var html;

html =
        "<link href='view/assets/estilo/anunciosAtiv.css' rel='stylesheet'>"+
        "<link href='view/assets/estilo/anunciosDes.css' rel='stylesheet'>"+
        "<link href='view/assets/estilo/breakAnuncAt0.css' rel='stylesheet'>"+
        "<link href='view/assets/estilo/brackAnunAt01.css' rel='stylesheet'>";

        return html;

}

function jsAnuncioInativo(){

var arrayAnuncioCompleto = returnJason('?controller=Anuncio&action=anuncioImpressInativo');

if(arrayAnuncioCompleto == 0){

     $('.returnIna').html("<p class='parInat'> Sua conta não possui anúncio inativos.</p>");
}
 else {
     $( '.returnIna' ).html(htmlImpressAnuncio('inativo', 'parcial'));

    }


}
//////////////////////encerra anuncios inativos///////////////////////////////////



/////////////////////Editar conta usuário///////////////////////////
function viewAlterCadastro(){

    var dadosUserImpress = returnJason("?controller=cliente&action=returnDadosCli&idUser="+dadosUser['id']);

    var estadoCivil = {casado:"",desquitado:"",divorciado:"",solteiro:"",viuvo:"",outros:""};
    switch(dadosUserImpress[0]['cli_estado_civil']){
        case "casado": estadoCivil['casado'] = "selected";break;
        case "desquitado": estadoCivil['desquitado'] = "selected";break;
        case "divorciado": estadoCivil['divorciado'] = "selected";break;
        case "solteiro": estadoCivil['solteiro'] = "selected";break;
        case "viuvo": estadoCivil['viuvo'] = "selected";break;
        case "outros": estadoCivil['outros'] = "selected";break;
        default: ;break;
    }

    //sexo
    var sex = {masc:"",fem:""};
    if(dadosUserImpress[0]['cli_sexo'] == "M")   sex['masc'] = "checked";
    if(dadosUserImpress[0]['cli_sexo'] == "F")   sex['fem'] = "checked";

var html;

html = "<div class='tudo'>"+
            "<div class='paiSec' id='alteraCadas' >"+
                "<section>"+
                    "<h2>Altere os dados do seu login</h2>"+
                   " <input type='hidden' name='MAX_FILE_SIZE' value='1024000' />"+
                    "<!-- ESTES DADOS SERÃO PREENCHIDOS DE ACRODO COM A BASE DE DADOS -->"+
                    "<div class='contForm'>"+
                        "<!--Controla form -->"+
                        "<form action='?controller=Anuncio&action=alterInfoUser' method='post' enctype='multipart/form-data'>"+
                            
                            "<fieldset class='fie'>"+
                                "<legend class='alter'>Edição de perfil</legend>"+
                                 "<fieldset class='fo'>"+
                                    "<legend class='legenP'>Adicionar / alterar foto do perfil</legend>"+

                                    "<input type='file' name='img' id='image-upload' class='inputfile'>"+
                                    "<label for='image-upload'>"+
                                        "<span class='spanImg'>carregar foto</span>"+
                                    "</label>"+
                                    "<div class='paiFoto'>"+
                                        "<div id='image-preview'></div>"+
                                    "</div>"+
                                    "<button id='ex' type='button' class='excl'>Excluir</button>"+
                                "</fieldset>"+

                                "<div class='err'>"+
                                   " <p id='te'>Arquivo não suportado !</p>"+
                                    "<button type='button'></button>"+
                                "</div>";

                              
				if(dadosUserImpress[0]['cli_userface'] == 0){

				  	
  			html +=     "<fieldset class='log'>"+
                                    "<legend>Editar login</legend>"+
                                    "<label for='login'>Email login</label>"+
                                    "<input type='text' id='login' name='email-login' value='"+dadosUser['email']+"'  class='efeitoL' disabled>"+
				    "<input type='hidden' name='login' value='"+dadosUser['email']+"' /> "+
                                    "</fieldset>"+
				    "<fieldset class='sen'>"+
                                    "<legend>Atualize sua senha</legend>"+
                                    "<label for='senh' id='newSe1'>Nova senha</label>"+
                                    "<input type='password' id='senh' name='novaSenha' class='efeitoL tSenhas'>"+
                                    "<input type='checkbox' id='chec01' class='mostraSe'>"+

                                    "<label for='novaSenh' id='newSe2'>Repetir Senha</label>"+
                                    "<input type='password' id='novaSenh' name='novaSenhaConfirm' class='efeitoL tSenhas'>"+
                                    "<input type='checkbox' class='mostraSe'>"+
                               	    "</fieldset>";
				}
                             
                                html += "<fieldset class='dadosP'>"+
                                  "<legend>Dados Pessoais</legend>"+


                                   "<label for='nom'>Nome</label>"+
                                   "<input type='text' id='nom' name='nome' value='"+dadosUser['nome']+"'  class='efeitoL'>"+

                                   "<label for='sob'>Sobrenome</label>"+
                                   "<input type='text' id='sob' name='sobNome' value='"+dadosUserImpress[0]['cli_sobrenome']+"' class='efeitoL'>"+
                              
                                   "<label for='data'>Data de nasc.</label>"+
                                   "<input type='text' id='data' value='"+dadosUserImpress[0]['cli_data_nasc']+"' name='data'>"+
                                "</fieldset>"+


                                "<fieldset class='sexo'>"+
                                  "<legend>Sexo</legend>"+

                                    "<label for=tMasculino>Masculino"+
                                        "<input type='radio' name='sexo'  value='M' id='tMasculino' "+sex['masc']+">"+
                                        "<span> </span></label>"+

                                    "<label for=tFeminino>Feminino"+
                                        "<input type='radio' name='sexo' id='tFeminino' value='F' "+sex['fem']+">"+
                                        "<span> </span></label>"+

                                "</fieldset>"+

                                "<fieldset class='civil'>"+
                                  "<legend>Estado civil</legend>"+

                                    "<select name='cEstado'>"+

                                        "<optgroup label='Estado civil'></optgroup>"+

                                        "<option value='casado' "+estadoCivil['casado']+">Casado</option>"+
                                        "<option value='desquitado' "+estadoCivil['desquitado']+">Desquitado</option>"+
                                        "<option value='divorciado' "+estadoCivil['divorciado']+">Divorciado</option>"+
                                        "<option value='solteiro' "+estadoCivil['solteiro']+">Solteiro</option>"+
                                        "<option value='viuvo' "+estadoCivil['viuvo']+">Viuvo</option>"+
                                        "<option value='outros' "+estadoCivil['outros']+">Outros</option>"+
                                    "</select>"+

                                     "<label for='sobre'>Sobre mim" +
                                        "<textarea id='sobre' name='sobre' rows='4' cols='35' maxlength='2200'>"+dadosUserImpress[0]['cli_descricao']+"</textarea>" +
                                    "</label>"+
                                "</fieldset>"+

                                "<fieldset class='local'>"+
                                  "<legend>Localidade</legend>"+
                                  
                                  "<label for='pais'>País"+
                                   "<input type='text' id='pais' name='pais' value='"+dadosUserImpress[0]['cli_pais']+"'>"+
                                   "</label>"+
                                  "<label for='uf'>Estado"+
                                     "<input type='text' id='uf' name='uf' value='"+dadosUserImpress[0]['cli_estado']+"'>"+
                                  "</label>"+
                                   "<label for='city'>Cidade</label>"+
                                   "<input type='text' id='city' name='coty' class='efeitoL' value='"+dadosUserImpress[0]['cli_cidade']+"'>"+
                              
                                    "<label for='ender'>Endereço</label>"+
                                   "<input type='text' id='ender' name='ender' class='efeitoL' value='"+dadosUserImpress[0]['cli_endereco']+"'>"+
                                    
                                    "<label for='comp'>Complemento</label>"+
                                   "<input type='text' id='comp' name='comp' class='efeitoL' value='"+dadosUserImpress[0]['cli_complemento']+"'>"+
                                "</fieldset>"+

                                "<fieldset class='sociais'>"+
                                    "<legend>Redes Sociais</legend>"+

                                    "<label for='fac'>Facebook</label>"+
                                    "<input type='text' id='fac' name='fac' class='efeitoL' value='"+dadosUserImpress[0]['cli_facebook']+"'>"+

                                    "<label for='tw'>Twitter</label>"+
                                    "<input type='text' id='tw' name='tw' class='efeitoL' value='"+dadosUserImpress[0]['cli_twitter']+"'>"+
                                "</fieldset>"+

                                "<input type='submit' id='subirCur' class='sub'  name='altera' value='Alterar dados'>"+
                                "<button type='button' value='Deletar minha conta' class='aparecer'>Deletar minha conta</button>"+
                                "<!-- fecha a fieldset principal -->"+
                            "</fieldset>"+
                       " </form>"+
                        "<!--Deletar cliente-->"+
                        "<!--Controla form -->"+

                      "<div class='paiDel'>"+
                        "<div class='divDel'>"+
                            "<section>"+
                                "<h4>Deletar minha conta</h4>"+
                                "<form action='?controller=Anuncio&action=excluiUsuario' method='post' enctype='multipart/form-data'>"+
                                    "<fieldset>"+
                                        "<legend>Apagar Conta</legend>"+
                                        "<p>É uma pena que esteja de saída, gostariamos de saber o motivo =/</p>";
					
					if(dadosUserImpress[0]['cli_userface'] == 1){

                                         html+= "<label for='userPass' style='visibility: hidden'>Senha atual</label>"+
		                              "<input type='password' style='visibility: hidden' id='userPass' name='senha01' value='' autofocus class='efeitoL tSenhas'>"+
		                              "<input type='checkbox' style='visibility: hidden' id='senhaDelet' class='mostraSe'>";

					} else {

					 html+= "<label for='userPass'>Senha atual</label>"+
		                              "<input type='password' id='userPass' name='senha01' value='' autofocus class='efeitoL tSenhas'>"+
		                              "<input type='checkbox' id='senhaDelet' class='mostraSe'>";
					}

                                       html+= "<div id='retornoSenha'></div>"+

                                        "<label for='motiv01'>Não atendeu minhas espectativas."+
                                            "<input type='radio' id='motiv01' name='motiv' value='Não atendeu minhas espectativas'>"+
                                            "<span></span></label>"+

                                        "<label for='motiv02'>Não consegui realizar meu anuncio."+
                                            "<input type='radio' id='motiv02' name='motiv' value='Não consegui realizar meu anuncio'>"+
                                            "<span></span></label>"+

                                        "<label for='motiv03'>Prefiro anunciar em outra plataforma."+
                                            "<input type='radio' id='motiv03' name='motiv' value='Prefiro anunciar em outra plataforma'>"+
                                            "<span></span></label>"+

                                        "<label for='motiv04'>Não concordei com os termos de uso."+
                                            "<input type='radio' id='motiv04' name='motiv' value='Não concordei com os termos de uso'>"+
                                            "<span></span></label>"+

                                        "<label for='motvDesc'>Deseja nos informar algum detalhe?</label>"+
                                        "<textarea name='motvDesc' id='motvDesc'></textarea>"+
					"<input type='hidden' id='faceLog' value='"+dadosUserImpress[0]['cli_userface']+"'>"+
                                        "<input type='button' class='can' value='Cancelar'>"+
                                        "<input type='button' class='sub' value='Deletar' id='delet'>"+
                                    "</fieldset>"+
				
                                    "<fieldset>"+
                                        "<legend>Deseja realmente não investir ?</legend>"+
                                        "<p>Obs: Ao deletar sua conta, todos os seus dados serão deletados do sistema!</p>"+
                                        "<input type='button' value='Cancelar' class='can'>"+
                                        "<input type='submit' name='delet' value='Deletar' class='sub'>"+
                                    "</fieldset>"+
                                "</form>"+
                            "</section>"+
                        "</div>"+
                        "<!--Deletar cliente -->"+
                      "</div>"+
                    "</div>"+
               "</section>"+
            "</div>"+
            "<!--Fecha controla section -->"+
       "<!-- seta o id do cliente logado -->"+
       "<input type='hidden' id='idUs' value='"+dadosUser['id']+"' />"+
"</div>"+
"<div class='fundoEsc'></div>";
return html;

}


function cssViewAlterCadastro(){

var html;

html =
        "<link href='view/assets/estilo/editaLogin.css' rel='stylesheet'>"+
        "<link href='view/assets/estilo/breackEditLogin.css' rel='stylesheet'>"+
        "<link href='view/assets/estilo/breakReset.css' rel='stylesheet'>";

        return html;
}


function jsViewAlterCadastro(){



var html;



    html =  "<script src='view/assets/js/jquery.mask.min.js'></script>"+
            "<script src='view/assets/js/modernizr.custom.js'></script>"+
            "<script src='view/assets/js/efeito-foto.js'></script>"+
            "<script src='view/assets/js/viewFoto.js'></script>"+
            "<script src='view/assets/js/custom-file-input.js'></script>"+
            "<script src='view/assets/js/revelaSenha.js'></script>"+
	    "<script src='view/assets/js/passValidade.js'></script>"+
            "<script src='view/assets/js/efeitoLabel.js'></script>"+
            "<script src='view/assets/js/revelaBloco.js'></script>"+

        "<script type='text/javascript'>"+
            "$(document).ready(function() {"+
                "$.uploadPreview({"+
                    "input_field: '#image-upload',"+   // Default: .image-upload"+
                    "preview_box: '#image-preview',"+  // Default: .image-preview"+
                    "label_field: '#image-label',"+    // Default: .image-label"+
                    "label_default: '#Choose File',"+   // Default: Choose File"+
                    "label_selected: '#Change File',"+  // Default: Change File"+
                    "no_label: false"+                 // Default: false"+
                "});"+
            "});"+
        "</script>"+

        "<script>"+

            "$('input#userPass').focusout(function(){"+

                "var senha = $('#userPass').val();"+
                "var idUser = $('#idUs').val();"+

                "$.post('index.php', {"+
                        "controller: 'cliente',"+
                        "action: 'checkPassSolic',"+
                        "idUser: idUser,"+
                        "senha: senha"+
                    "},"+

                    "function (result) {"+

                        "$('#retornoSenha').html(result);"+

                    "});"+

            "});"+
        "</script>";


        return html;


}

/////////////////////Editar conta usuário///////////////////////////

////////////////////ViewInsert curriculo///////////////////////////
function viewinsertCurriculo(){

var html;

html = "<div class='tudo'>"+
        "<div class='paiS'>"+
            "<section>"+
                "<h2 class='sumir'>Encontre Profissionais Qualificados!</h2>"+
                "<div class='pa'>"+
                    "<p>A SempreNegócio te ajuda a encontrar o profissional ideal!</p>"+
                "</div>"+
                "<h2 class='tituCur'>Ganhe mais visibilidade entre candidatos</h2>"+
                "<p class='anunParagr'>Envie sua vaga e ganhe mais visibilidade !</p>"+
                "<div class='fundoAzul'></div>"+  
                "<!--controla form -->"+
                "<div class='paiF'>"+
                "<h3 class='preen'>Preencha o formulário com as exigencias da vaga</h3>"+
                "<input type=hidden name=MAX_FILE_SIZE value=1024000 />"+
                    "<form action='?controller=Dashboard&action=submitVagaEmail' method='post' enctype='multipart/form-data'>"+ // ?controller=DashboardCurriculo&action=insertCadastroCurriculo  
                        "<!-- Determinamos via HTML um tamanho máximo para a nossa imagem-->"+
                        
                        "<fieldset>"+
                            "<!-- Este eh o fieldset principal -->"+
                            "<legend class='sumir'>Preencha seus dados, é simples e rápido!</legend>"+
                            "<fieldset class='paiDados'>"+
                                "<legend class='sumir'>Idade, sexo e nascionalidade</legend>"+
                                "<fieldset>"+
                                    "<legend>Perfil Desejado</legend>"+

                                    "<label for='nEmp'>Nome da Empresa"+
                                        "<input type='text' id='nEmp' class='required' placeholder='Informe o nome da sua empresa' name='nEmp' title='Nome da sua empresa'>"+
					"<span></span>"+
                                    "</label>"+
                                    
                                    "<select class='genero' name='genero'>"+

                                        "<optgroup label='Gênero'></optgroup>"+

                                        "<option value='masculino'>Masculino</option>"+
                                        "<option value='feminino'>Feminino</option>"+
                                        "<option value='exigencia'>Mas / Fem</option>"+
                                        "<option value='outros'>Outros</option>"+
                                    "</select>"+

                                "</fieldset>"+

                                "<fieldset class='select'>"+
                                    "<legend class='leg'>Estado civil</legend>"+
                                    "<select name='cEstado'>"+

                                        "<optgroup label='Estado civil'></optgroup>"+

                                        "<option value='casado'>Casado</option>"+
                                        "<option value='desquitado'>Desquitado</option>"+
                                        "<option value='divorciado'>Divorciado</option>"+
                                        "<option value='solteiro' selected>Solteiro</option>"+
                                        "<option value='viuvo'>Viuvo</option>"+
                                        "<option value='outros'>Outros</option>"+

                                    "</select>"+
                                "</fieldset>"+

                            "</fieldset>"+
                            "<!-- será gerado dinamicamente o código do fieldset responsável por exibir o select das categoria -->"+
                            "<fieldset class='exper'>"+
                                "<legend class='sumir'>Formação Acadêmica</legend>"+
                                "<fieldset>"+
                                    "<legend class='leg'>Formação Acadêmica</legend>"+
                                   " <select class='box' name='cEscolaridade'>"+

                                        "<optgroup label='formação'></optgroup>"+

                                        "<option value='Ensino fundamental'>Ensino fundamental</option>"+
                                        "<option value='Ensino médio' selected>Ensino médio</option>"+
                                        "<option value='Técnico'>Técnico</option>"+
                                        "<option value='Graduando'>Cursando</option>"+
                                        "<option value='Ensino superior'>Ensino superior</option>"+
                                        "<option value='Ensino superiorincompleto'>Ensino superior inclopleto</option>"+
                                        "<option value='Pós graduado'>Pós graduado</option>"+
                                        "<option value='Mestrado'>Mestrado</option>"+
                                    "</select>"+
                                "</fieldset>"+

                                "<fieldset>"+
                                    "<legend class='leg'>Idiomas</legend>"+
                                   " <select class='box' name='Idiomas'>"+

                                        "<optgroup label='formação'></optgroup>"+
                                        "<option value='por'>Português</option>"+
                                        "<option value='Inglês' selected>Inglês Avançado</option>"+
                                        "<option value='Inglês inter'>Inglês Intermediário</option>"+
                                        "<option value='Inglês Bas'>Inglês Básico</option>"+
                                        "<option value='Espanhol Avan'>Espanhol Avançado</option>"+
                                        "<option value='Espanhol Inter'>Espanhol Intermediário</option>"+
                                        "<option value='Espanhol Basi'>Espanhol Básico</option>"+
                                        "<option value='Frances'>Francês</option>"+
                                        "<option value='Mandarim'>Mandarim</option>"+
                                        "<option value='Japonês'>Japonês</option>"+
                                        "<option value='Outros'>Outros</option>"+
                                        "<option value='sem'>Não quero especificar</option>"+
                                    "</select>"+
                                "</fieldset>"+

                                "<fieldset>"+
                                    "<legend>Cursos Desejados</legend>"+
                                    "<label for='curso'>Escrever curso"+
                                        "<input type='text' name='curso' id='curso' placeholder='Ex:curso de secretária'"+
                                    "</label>"+
                                "</fieldset>"+
                            "</fieldset>"+

                            "<fieldset class='hab'>"+
                                "<legend class='sumir'>Habilitação</legend>"+

                                "<fieldset>"+
                                    "<legend class='neces'>Necessário Habilitação</legend>"+

                                    "<label for='catA'>a"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='A' id='catA'>"+
                                        "<span></span></label>"+

                                    "<label for='catB'>b"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='B'  id='catB'>"+
                                        "<span></span></label>"+

                                    "<label for='catC'>c"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='C'  id='catC'>"+
                                        "<span></span></label>"+

                                    "<label for='catD'>d"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='D'  id='catD'>"+
                                        "<span></span></label>"+

                                    "<label for='catE'>e"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='E'  id='catE'>"+
                                        "<span></span></label>"+
                                "</fieldset>"+
                            "</fieldset>"+

                                "<fieldset class='veiculo'>"+
                                    "<legend>Necessário possuir veículo</legend>"+
                                    " <select name='exigVec'>"+
                                        "<optgroup label='Selecione'></optgroup>"+
                                        "<option value='Carro'>Carro</option>"+
                                        "<option value='Camionete'>Camionete</option>"+
                                        "<option value='Moto'>Moto</option>"+
                                        "<option value='Caminhão'>Caminhão</option>"+
                                        "<option value='Carreta'>Carreta</option>"+
                                        "<option value='Outros'>Outros</option>"+
                                        "<option value='sem necessidade' selected>Não é necessário</option>"+
                                    "</select>"+
                                "</fieldset>"+
                            "<fieldset class='experiência exigida'>"+
                                "<legend>Experiência Exigida</legend>"+
                                " <select name='exig'>"+
                                        "<optgroup label='Selecione a experiência'></optgroup>"+
                                        "<option value='Sem Experiência'>Sem Experiência</option>"+
                                        "<option value='1 ano'>Experiência Min. 1 Ano</option>"+
                                        "<option value='2 anos'>Experiência Min. 2 Ano</option>"+
                                        "<option value='Experiência Comprovada' selected>Experiência Comprovada</option>"+
                                "</select>"+
                            "</fieldset>"+

                            "<fieldset class='hora'>"+
                                "<legend>Horários</legend>"+
                                "<label for='Descr'>Horário do Cargo"+
                                   "<input type='text' id='Descr' name='hora' placeholder='Ex:Horário comercial'>"+
                                "</label>"+

                                "<label for='folga'>Dias Trabalhados"+
                                    "<input type='text' placeholder='Ex:Uma folga na semana...' name='folga' id='folga'"+
                                "</label>"+
                                "<label for='Disp'>Disponabilidade de horário"+
                                        "<input type='checkbox' name='disp' id='Disp' value='Necessita disponibilidade'>"+
                                "</label>"+        
                            "</fieldset>"+

                            "<fieldset  class='desc'>"+
                                "<legend>Suas observações</legend>"+
                                
                                "<label for='tObs'>Qualificações de Desejadas"+
                                    "<textarea id='tObs' name='cObs' placeholder='Ex:pessoa que goste de criança, tenha habilidade com cobrança... '></textarea>"+
                                "</label>"+
                            "</fieldset>"+

                            "<fieldset class='carg'>"+
                                "<legend>Cargo Oferecido e Salário</legend>"+
                                "<label for='nomeCar'>Cargo"+
                                    "<input type='text' name='nomeCar' class='required' id='nomeCar' placeholder='Ex:Secretária'>"+
				    "<span></span>"+
                                "</label>"+
                                 "<label for='salario'>Salário"+
                                    "<input type='text' name='salario' class='required' id='salario' placeholder='Ex:Salário a combinar'>"+
				    "<span></span>"+
                                "</label>"+
                                 "<label for='Tarefas'>Tarefas"+
                                    "<input type='text' name='Tarefas' id='Tarefas' placeholder='Ex:Atender Telefone'>"+
                                "</label>"+
                                "<fieldset>"+
                                    "<legend>Contato RH</legend>"+
                                    "<label for='dLogin'>Email"+
                                        "<input type='email' id='dLogin' name='cEmail'  title='ex: contato@hotmail.com'>"+
                                    "</label>"+
                                    "<label for=tel-fixo>Tel-fixo"+
                                        "<input type='tel' id='tel-fixo' name='tel-fixo' maxlength='15'>"+
                                    "</label>"+
                                    "<label for='tel-cel'>Tel-cel"+
                                        "<input type='tel' id='tel-cel' name='tel-cel' maxlength='15'>"+
                                    "</label>"+
                                    "<input type='submit' class='envia' name='enviar' value='Enviar Vaga'>"+

                                "</fieldset>"+
                            "</fieldset>"+
                    "</form>"+
                "</div>"+
                "<!-- fecha pai form -->"+
            "</section>"+
        "</div>"+
        "<!--Fim da Section Principal -->"+
"</div>";
return html;
}

function cssViewInsertCurriculo(){

var html =  "<link href='view/assets/estilo/formAnunCur.css' rel='stylesheet'>"+
            "<link href='view/assets/estilo/viewCurr.css' rel='stylesheet'>"+
            "<link href='view/assets/estilo/breackViewCurr.css' rel='stylesheet'>"+
            "<link href='view/assets/estilo/breakReset.css' rel='stylesheet'>";

            return html;

}

function jsViewInsertCurriculo(){

var html;

html =  "<script src='view/assets/js/jquery.mask.min.js'></script>"+
        "<script src='view/assets/js/modernizr.custom.js'></script>"+

        "<script src='view/assets/js/efeito-foto.js'></script>"+
        "<script src='view/assets/js/viewFoto.js'></script>"+
        "<script src='view/assets/js/custom-file-input.js'></script>"+
        "<script src='view/assets/js/cep.js'></script>"+
        "<script src='view/assets/js/formAn.js'></script>"+
	"<script src='view/assets/js/jquery.validate.js'></script>"+
	"<script src='view/assets/js/jquery.mask.js'></script>";

html += "<script>$(document).ready(function(){ $('#cIdade').mask('00');"+
	"$('#tel-fixo').mask('(00)00000-0000');"+
	"$('#tel-cel').mask('(00)00000-0000'); alert('desgraça'); });</script> "; 


html += "<!--os dois abaixo eh suporte para medias queries e html5-->"+
        "<!-- [If lt IE 9]>"+
        "<script  src = 'js/html5shiv.js'></script>"+
        "<script  src='js/css3-mediaqueries.js'></script>"+
        "<[endif]-->"+
        "<!-- build:js js/index.min.js -->"+

        "<script type='text/javascript'>"+
            "$(document).ready(function() {"+
                "$.uploadPreview({"+
                    "input_field: '#image-upload',"+   // Default: .image-upload"+
                    "preview_box: '#image-preview',"+  // Default: .image-preview"+
                    "label_field: '#image-label',"+    // Default: .image-label"+
                    "label_default: '#Choose File',"+   // Default: Choose File"+
                    "label_selected: '#Change File',"+  // Default: Change File"+
                    "no_label: false"+                 // Default: false"+
                "});"+
            "});"+
        "</script>";


  //  html += "$('#categ').html(geraOptionCat('curriculum'))";


        return html;
}


////////////////////ViewInsertCurriculo////////////////////////////
function viewCurriculo(){

    var dadosCur = returnJason('?controller=DashboardCurriculo&action=retornaDadosCur');

   var html ="<section class='curri'>"+
             "<h1 class='sumir'>Currículo</h1>"+
                "<div>"+
                    "<img src='"+dadosCur[0]['curriculum_foto']+"'>"+
                "</div>"+
                    "<!--h2 eh o nome em destaque, nome do candidato-->"+
                "<div class='nome'>"+
                    "<h3>"+dadosCur[0]['curriculum_nome']+"</h3>"+
                "</div>"+
                "<div class='controlCon'>"+
                    "<dl>"+
                            "<dt>Dados Pessoais</dt>"+
                            "<dd>idade: <em>"+dadosCur[0]['curriculum_idade']+"</em> </dd>"+
                            "<dd>Nac: <em>"+dadosCur[0]['curriculum_nacionalidade']+"</em></dd>"+
                            "<dd>sexo: <em>"+dadosCur[0]['curriculum_sexo']+"</em></dd>"+
                            "<dd> Estado civil: <em>"+dadosCur[0]['curriculum_estado_civil']+"</em></dd>"+

                        "<dt>Endereço</dt>"+
                            "<dd><em>"+dadosCur[0]['endereco_rua']+"</em></dd>"+
                            "<dd><em>"+dadosCur[0]['endereco_numero']+"</em></dd>"+
                            "<dd><em>"+dadosCur[0]['endereco_complemento']+"</em></dd>"+
                            "<dd>Comp:<em>"+dadosCur[0]['endereco_numero_complemento']+"</em></dd>"+

                            "<dd  class='bairro'><em>"+dadosCur[0]['endereco_bairro']+"</em></dd>"+

                            "<dd class='sub'><em>"+dadosCur[0]['endereco_cidade']+"</em></dd>"+
                            "<dd class='sub'><em>"+dadosCur[0]['endereco_estado']+"</em></dd>"+
                            "<dd class='sub ceps'>Cep: <em>"+dadosCur[0]['endereco_cep']+"</em></dd>"+

                            "<dl class='contatos'>"+
                                "<dt>Contato</dt>"+
                                    "<dd>Cel: <em>"+dadosCur[0]['curriculum_tel_cel']+"</em></dd>"+
                                    "<dd class='fixo'>Fixo: <em>"+dadosCur[0]['curriculum_tel_fixo']+"</em> </dd>"+
                                    "<dd class='email'> Email: <em>"+dadosCur[0]['curriculum_email']+"</em> </dd>"+
                                    "<dd class='face'>Facebook: <em>"+dadosCur[0]['curriculum_facebook']+"</em></dd>"+
                                    "<dd class='lattes'>Currículo: lattes <em>"+dadosCur[0]['curriculum_lattes']+"</em></dd>"+
                                    "<dd class='linke'>Linkedin: <em>"+dadosCur[0]['curriculum_linkedin']+"</em></dd>"+
                                "<dt class='formacao'>Formação acadêmica</dt>"+
                                    "<dd>Escolaridade: <em>"+dadosCur[0]['curriculum_escolaridade']+"</em></dd>"+
                            "</dl>"+
                        "<dt class='cursoEven'>Cursos e Eventos</dt>"+
                        "<dd class='qualif'>Qualificações: <em>"+dadosCur[0]['curriculum_descricao']+"</em></dd>"+

                        "<dt class='exper'>Experiência Profissional</dt>"+
                            "<dd>Nome da ultima empresa ou atual:  <em>"+dadosCur[0]['curriculum_nome_empresa']+"</em></dd>"+
                            "<dd class='dat'>Data de admissão: <em>"+dadosCur[0]['curriculum_data_admissao']+"</em></dd>"+
                            "<dd class='dat'>Data de demissão: <em>"+dadosCur[0]['curriculum_data_demissao']+"</em></dd>"+
                            "<dd class='cargo'>Cargo ocupado: <em>"+dadosCur[0]['curriculum_cargo']+"</em> </dd>"+
                            "<dd class='qualif ativ'>Atividades realizadas:<em>"+dadosCur[0]['curriculum_atividades_realizadas']+"</em></dd>"+

                        "<dl class='paiObs'>"+
                           "<dt class='infor'>Informações Adicionais</dt>"+
                            "<dd class='hab'>Habilitação: <em>"+dadosCur[0]['curriculum_habilitacao']+"</em></dd>"+
                            "<dd class='qualif obs' >Observações: <em>"+dadosCur[0]['curriculum_observacoes']+"</em></dd>"+
                        "</dl>"+
                    "</dl>"+
                "</div>"+
            "</section>";
    return html;
}

function jsViewCurriculo(){
    html = "<script src='view/assets/js/viewCur.js'></script>";

    return html;
}



////////////////////Encerra view Curriculo cadastrado/////////////////////

/////Alteração de curriculo

////////////////////Inicio  viewAlterCurriculo/////////////////////////////
function viewAlterCurriculo(){

    var dadosCur = returnJason('?controller=DashboardCurriculo&action=retornaDadosCur');

    var html;
    //estado civil
    var estadoCivil = {casado:"",desquitado:"",divorciado:"",solteiro:"",viuvo:"",outros:""};
    switch(dadosCur[0]['curriculum_estado_civil']){
        case "casado": estadoCivil['casado'] = "selected";break;
        case "desquitado": estadoCivil['desquitado'] = "selected";break;
        case "divorciado": estadoCivil['divorciado'] = "selected";break;
        case "solteiro": estadoCivil['solteiro'] = "selected";break;
        case "viuvo": estadoCivil['viuvo'] = "selected";break;
        case "outros": estadoCivil['outros'] = "selected";break;
        default: ;break;
    }
    //complemento
            var arrayComple = {casa:"",ap:"",galp:"",sala:"",fundos:"",condo:"",outros:""};
            switch(dadosCur[0]['endereco_complemento']){

                case "Casa":        arrayComple['casa']   =  "selected";break;
                case "Apartamento": arrayComple['ap']     =  "selected";break;
                case "Galpao":      arrayComple['galp']   =  "selected";break;
                case "Sala":        arrayComple['sala']   =  "selected";break;
                case "Fundos":      arrayComple['fundos'] =  "selected";break;
                case "Condominio":  arrayComple['condo']  =  "selected";break;
                case "Outros":      arrayComple['outros'] =  "selected";break;
                default :break;

            }

      //habilitação
           var habili = {A:"",B:"",C:"",D:""};
           if(dadosCur[0]['curriculum_habilitacao'].indexOf("A") != -1) habili['A'] = "checked";
           if(dadosCur[0]['curriculum_habilitacao'].indexOf("B") != -1) habili['B'] = "checked";
           if(dadosCur[0]['curriculum_habilitacao'].indexOf("C") != -1) habili['C'] = "checked";
           if(dadosCur[0]['curriculum_habilitacao'].indexOf("D") != -1) habili['D'] = "checked";
           if(dadosCur[0]['curriculum_habilitacao'].indexOf("E") != -1) habili['E'] = "checked";

    //sexo
            var sex = {masc:"",fem:""};
            if(dadosCur[0]['curriculum_sexo'] == "Masculino")  sex['masc'] = "checked";
            if(dadosCur[0]['curriculum_sexo'] == "Feminino")   sex['fem'] = "checked";

    //Escolaridade
    var escola = {fundamen:"",medio:"",superInc:"",superCom:"",pos:"",mestra:"",tecni:""};
    switch(dadosCur[0]['curriculum_escolaridade']){
        case "Ensino fundamental": escola['fundamen'] = "selected";break;
        case "Ensino médio": escola['medio'] = "selected";break;
        case "Ensino superior": escola['superCom'] = "selected";break;
        case "Ensino superiorincompleto": escola['superInc'] = "selected";break;
        case "Pós graduado": escola['pos'] = "selected";break;
        case "Mestrado": escola['mestra'] = "selected";break;
        case "Técnico": escola['tecni'] = "selected";break;
        default :break;
    }


html = "<div class='tudo'>"+

        "<!--section principal da pg -->"+
        "<div class='paiS'>"+
            "<section>"+
                "<h2 class='sumir'>Matenha seu currículo atualizado!</h2>"+
                "<div class='pa' id='alteraCur'>"+
                    "<p>Se capacitou? Não perca tempo, acrescente no seu currículo.</p>"+
                "</div>"+
                "<h2 class='tituCur'>Seu currículo conectado em tempo real!</h2>"+
                "<p class='anunParagr'>Seu currículo conectado em tempo real !</p>"+
                "<div class='buscaCep'>"+
                        "<button type='button' id='fechaFram' value='fechar'>Fechar Janla</button>"+
                        "<iframe src='http://m.correios.com.br/movel/buscaCep.do' name='janela' id='frame'></iframe>"+
                "</div>"+ 
                "<div class='fundoAzul'></div>"+ 
                "<!--controla form -->"+
                "<div class='paiF'>"+
                 "<input type=hidden name=MAX_FILE_SIZE value=1024000 />"+
                    "<form action='?controller=DashboardCurriculo&action=curUpdate' method='post' enctype='multipart/form-data'>"+
                        "<!-- Determinamos via HTML um tamanho máximo para a nossa imagem-->"+
                       
                        "<fieldset>"+
                            "<!-- Este eh o fieldset principal -->"+
                            "<legend class='sumir'>Preencha seus dados, é simples e rápido!</legend>"+
                            "<fieldset class='paiDados'>"+
                                "<legend class='sumir'>Nome, idade, sexo e nascionalidade</legend>"+
                                "<fieldset>"+
                                    "<legend>Dados Pessoais</legend>"+

                                   " <label for='tLogin'>Nome"+
                                        "<input type='text' id='tLogin' name='cNome' required title='Informe seu nome completo' value='"+dadosCur[0]['curriculum_nome']+"'>"+
                                    "</label>"+

                                    "<label for=cIdade>Idade"+
                                        "<input type='text' id='cIdade' name='cIdade' title='Sua idade, exemplo 20'  value='"+dadosCur[0]['curriculum_idade']+"'>"+
                                    "</label>"+

                                    "<label for=cNacio>Nacionalidade"+
                                        "<input type='text' id='cNacio' name='cNacio' title='Ex:Brasileiro' value='"+dadosCur[0]['curriculum_nacionalidade']+"'>"+
                                    "</label>"+

                                    "<label for=tMasculino>Masculino"+
                                        "<input type='radio' name='sexo'  value='Masculino' id='tMasculino' "+sex['masc']+" >"+
                                        "<span> </span></label>"+

                                    "<label for=tFeminino>Feminino"+
                                        "<input type='radio' name='sexo' id='tFeminino' value='Feminino' "+sex['fem']+">"+
                                        "<span> </span></label>"+
                                "</fieldset>"+

                                "<fieldset class='select'>"+
                                    "<legend class='leg'>Estado civil</legend>"+
                                    "<select name='cEstado'>"+

                                        "<optgroup label='Estado civil'></optgroup>"+

                                        "<option value='casado' "+estadoCivil['casado']+">Casado</option>"+
                                        "<option value='desquitado' "+estadoCivil['desquitado']+">Desquitado</option>"+
                                        "<option value='divorciado' "+estadoCivil['divorciado']+">Divorciado</option>"+
                                        "<option value='solteiro' "+estadoCivil['solteiro']+">Solteiro</option>"+
                                        "<option value='viuvo' "+estadoCivil['viuvo']+">Viuvo</option>"+
                                        "<option value='outros' "+estadoCivil['outros']+">Outros</option>"+

                                    "</select>"+
                                "</fieldset>"+

                            "</fieldset>"+

                            "<fieldset class='PaiEnder'>"+
                                "<legend class='sumir'>Preencher dados de seu currículo</legend>"+

                                "<fieldset class='teste'>"+
                                   "<legend class='sumir'>Endereço completo</legend>"+
                                   " <fieldset>"+
                                        "<legend>Endereço</legend>"+

                                        "<label for='bairro'>Bairro:"+
                                            "<input type='text' id='bairro' name='bairro'  title='Bairro' value='"+dadosCur[0]['endereco_bairro']+"'>"+
                                        "</label>"+

                                        "<label for='cep'>Cep:"+
                                            "<input type='text' id='cep' name='cep'  title='Informe seu cep, ex: 35500-002'  maxlength='9' value='"+dadosCur[0]['endereco_cep']+"'>"+
                                        "</label>"+
                                        
                                        "<button type='button' id='buttonBus' value='buscar por cep.'>Não sei meu cep !</button>"+    

                                        "<label for='rua'>Rua:"+
                                            "<input type='text' id='rua' name='rua'  title='Nome da rua' value='"+dadosCur[0]['endereco_rua']+"'>"+
                                        "</label>"+
                                        "<label for='numero'>número:"+
                                            "<input type='text' id='numero' name='numero' required title='Número da residencia' value='"+dadosCur[0]['endereco_numero']+"'>"+
                                        "</label>"+
                                    "</fieldset>"+

                                    "<fieldset class='compl'>"+
                                        "<legend>Complemento</legend>"+
                                        "<select name='cComplemento'>" +
                                           "<optgroup label='Complemento' ></optgroup>" +
                                            " <option value='Casa' "+arrayComple['casa']+">Casa</option>" +
                                            " <option value='Apartamento' "+arrayComple['ap']+">Apartamento</option>" +
                                            " <option value='Galpao' "+arrayComple['galp']+">Galpão</option>" +
                                            " <option value='Sala' "+arrayComple['sala']+">Sala</option>" +
                                            " <option value='Fundos' "+arrayComple['fundos']+">Fundos</option>" +
                                            " <option value='Condominio' "+arrayComple['condo']+">Condomínio</option>" +
                                            " <option value='Outros' "+arrayComple['outros']+">Outros</option>" +
                                        "</select>" +
                                        "<label for='numCom'>Nº complemento"+
                                            "<input type='text' id='numCom' name='numCom' title='Número do apartamento' maxlength='6' class='efeitoL' value='"+dadosCur[0]['endereco_numero_complemento']+"'>"+
                                        "</label>"+

                                        "<label for='cidade'>Cidade"+
                                            "<input type='text' id='cidade' name='cidade'  title='Cidade onde reside, ex:Divinópolis' value='"+dadosCur[0]['endereco_cidade']+"'>"+
                                        "</label>"+

                                        "<label for='estado'>Estado"+
                                            "<input type='text' id='estado' name='uf' title='Estado onde reside, ex: MG' value='"+dadosCur[0]['endereco_estado']+"'>"+
                                        "</label>"+
                                    "</fieldset>"+

                                "</fieldset>"+
                            "</fieldset>"+

                            "<fieldset class='paiCont'>"+
                                "<legend class='sumir'>Formas de contato</legend>"+
                                "<fieldset>"+
                                    "<legend>Contato</legend>"+
                                    "<label for='dLogin'>Email"+
                                        "<input type='email' id='dLogin' name='cMail' required title='ex: contato@hotmail.com' value='"+dadosCur[0]['curriculum_email']+"'>"+
                                    "</label>"+
                                    "<label for=tel-fixo>Tel-fixo"+
                                        "<input type='tel' id='tel-fixo' name='tel-fixo' maxlength='15' value='"+dadosCur[0]['curriculum_tel_fixo']+"'>"+
                                    "</label>"+
                                    "<label for='tel-cel'>Tel-cel"+
                                        "<input type='tel' id='tel-cel' name='tel-cel' required maxlength='15' value='"+dadosCur[0]['curriculum_tel_cel']+"'>"+
                                    "</label>"+
                                "</fieldset>"+
                                "<fieldset class='revelar'>"+
                                    "<legend class='sumir'>Adicione redes sociais</legend>"+
                                    "<button type='button'>Adicione redes sociais</button>"+
                                "</fieldset>"+
                                "<fieldset class='redes'>"+
                                    "<legend>Redes sociais</legend>"+
                                    "<label for='cFace'>Facebook"+
                                        "<input type='text' id='cFace' name='cFace' title='Caso queira, informe seu facebook' value='"+dadosCur[0]['curriculum_facebook']+"'>"+
                                    "</label>"+
                                    "<label for='cCur'>Lattes"+
                                        "<input type='text' id=cCur name='cCur' title='Caso queira, informe seu currículo lattes' value='"+dadosCur[0]['curriculum_lattes']+"'>"+
                                    "</label>"+
                                    "<label for='cLink'>Linkedin"+
                                        "<input type='text' id='cLink' name='cLink' title='Caso queira, informe seu linkedin' value='"+dadosCur[0]['curriculum_linkedin']+"'>"+
                                    "</label>"+
                               " </fieldset>"+
                           "</fieldset>"+
                            "<fieldset class='capacit dicas'>"+
                                "<legend class='sumir'>Capacitações</legend>"+
                               "<fieldset>"+
                                    "<legend class='leg'>Escolaridade</legend>"+
                                   " <select name='cEscolaridade'>"+

                                        "<optgroup label='formação'></optgroup>"+
                                        "<option value='Ensino fundamental' "+escola['fundamen']+">Ensino fundamental</option>"+
                                        "<option value='Ensino médio' "+escola['medio']+">Ensino médio</option>"+
                                        "<option value='Técnico' "+escola['tecni']+">Técnico</option>"+
                                        "<option value='Ensino superior' "+escola['superCom']+">Ensino superior</option>"+
                                        "<option value='Ensino superiorincompleto' "+escola['superInc']+">Ensino superior inclopleto</option>"+
                                        "<option value='Pós graduado' "+escola['pos']+">Pós graduado</option>"+
                                        "<option value='Mestrado' "+escola['mestra']+">Mestrado</option>"+
                                    "</select>"+
                                "</fieldset>"+

                                "<fieldset>"+
                                    "<legend>Detalhar qualificações</legend>"+
                                    "<label for='tTex' class='sumir'>Detalhes de suas qualificações !</label>"+
                                    "<textarea id='tTex' name='cDescricao' rows='4' cols='35'>"+dadosCur[0]['curriculum_descricao']+"</textarea>"+
                                    "<button type='button' id='dicaUm'>Ver dica.</button>"+
                                    "<p class='dicaQua'>"+
                                        "Ex:Lorem Ipsum é simplesmente uma simulação de texto da indústria século XVI, desconhecido pegou uma bandeja de tipos e os para fazer um liv."+
                                        "<button type='button' class='fec'>Fechar</button>"+
                                    "</p>"+
                                "</fieldset>"+
                            "</fieldset>"+
                            "<!-- será gerado dinamicamente o código do fieldset responsável por exibir o select das categoria -->"+
                            "<fieldset class='exper'>"+
                                "<legend class='sumir'>Experiêcia Profissional</legend>"+

                                "<fieldset>"+
                                    "<legend>ultima experiência profissional</legend>"+

                                    "<label for='cExp'>Cargo"+
                                        "<input type='text' id='cExp' name='cExp' title='ex:Auxiliar administrativo' value='"+dadosCur[0]['curriculum_cargo']+"'>"+
                                    "</label>"+

                                    "<label for='cEmp'>Nome da empresa"+
                                        "<input type='text' id='cEmp' name='cEmp' title='Nome da última empresa que trabalhou ou que trabalha' value='"+dadosCur[0]['curriculum_nome_empresa']+"'>"+
                                    "</label>"+

                                    "<label for='cAtiv'>Atividades realizada</label>"+
                                    "<textarea id='cAtiv' name='cAtiv'>"+dadosCur[0]['curriculum_atividades_realizadas']+"</textarea>"+

                                    "<button type='button' id='dicaDois'>Ver dica.</button>"+
                                    "<p class='dicaAtiv'>"+
                                        "Faça uma breve descrição de sua empresa,tente resumir da melhor maneira possível, tente chamar atenção para seu anúncio!"+
                                        "<button type='button' class='fec'>Fechar</button>"+
                                    "</p>"+
                               " </fieldset>"+

                                "<fieldset>"+
                                    "<legend>Período de permanência na empresa</legend>"+
                                    "<label for='cAdm'>Data de admissão"+
                                        "<input type='text' id='cAdm' name='cAdm' class='date' value='"+dadosCur[0]['curriculum_data_admissao']+"'>"+
                                   " </label>"+
                                    "<label for='cDem'>Data de demissão"+
                                        "<input type='text' id='cDem' name='cDem' class='date' value='"+dadosCur[0]['curriculum_data_demissao']+"'>"+
                                    "</label>"+
                                "</fieldset>"+
                            "</fieldset>"+

                            "<fieldset class='hab'>"+
                                "<legend class='sumir'>Categorias de profissões</legend>"+

                               " <fieldset>"+
                                    "<legend>Escolha sua área de atuação</legend>"+
                                    "<div id='categ'></div>"+
                               " </fieldset>"+

                                "<fieldset>"+
                                    "<legend>Habilitacao</legend>"+

                                    "<label for='catA'>a"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='A' id='catA' "+habili['A']+">"+
                                        "<span></span></label>"+

                                    "<label for='catB'>b"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='B'  id='catB' "+habili['B']+">"+
                                        "<span></span></label>"+

                                    "<label for='catC'>c"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='C'  id='catC' "+habili['C']+">"+
                                        "<span></span></label>"+

                                    "<label for='catD'>d"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='D'  id='catD' "+habili['D']+">"+
                                        "<span></span></label>"+

                                    "<label for='catE'>e"+
                                        "<input type='checkbox' name='cHabilitacao[]' value='E'  id='catE' "+habili['E']+">"+
                                        "<span></span></label>"+
                                "</fieldset>"+
                            "</fieldset>"+

                            "<fieldset  class='desc'>"+
                                "<legend>Suas observações</legend>"+
                                "<p>"+
                                    "Faça uma descrição completa de sua empresa, caso queira inclua números de telefones complementares."+
                                "</p>"+
                                "<label for='tObs'>Faça suas observações !"+
                                    "<textarea id='tObs' name='cObs'>"+dadosCur[0]['curriculum_observacoes']+"</textarea>"+
                                "</label>"+
                            "</fieldset>"+
                            "<fieldset class='fo'>"+
                                "<legend class='legenP'>Inserir/alterar foto</legend>"+
                                "<input type='file' name='img' id='image-upload' class='inputfile'  data-multiple-caption={count} files selected>"+
                                "<label for='image-upload'>"+
                                    "<span class='spanImg'>carregar foto</span>"+
                                "</label>"+
                                "<div class='paiFoto'>"+
                                    "<div id='image-preview'></div>"+
                               " </div>"+
                                "<button id='ex' type='button' class='excl'>Excluir</button>"+
                            "</fieldset>"+

                            "<div class='err'>"+
                                "<p id='tes'>Arquivo não suportado !</p>"+
                                "<button type='button'></button>"+
                            "</div>"+
                            "<div class='butCad'>"+
                                "<input id='subirCur' class='sub' type='submit' name='cFinaliza' value='Alterar meus dados!'>"+
                            "</div>"+
                            "<!-- fecha a fieldset principal -->"+
                        "</fieldset>"+
                    "</form>"+
                "</div>"+
                "<!-- fecha pai form -->"+
            "</section>"+
        "</div>"+
        "<!--Fim da Section Principal -->"+
"</div>";
return html; 

}

////////////////////Encerra viewAlterCurriculo//////////////////////////// 

////////////////////Página para selecionar em qual anuncio será dado desconto///////////////////
function viewSelAnunDes(){

var html;
html = "<div class='tudo' id='anunAt'>"+
    "<header class='headDes'>"+
        "<h1>Cadastro de descontos</h1>"+
    "</header>"+
        "<div class='paiDesc'>"+
        "<p class='escada'><a href='#' class='pain'>Painel </a> > <a href='#'> <strong> Anuncios cupons </strong></a></p>"+
            "<!-- div para controlar o banner e o conteudo do anuncio -->"+
            "<section>"+
                "<h2>Gerenciar cupons</h2>"+
                "<!--Retorna o anuncio, este eh o pai-->"+
                "<div class='reAnun' id='retAnun'>" + "</div>"+
            "</section>"+
        "</div>"+
        "<!--fim div paiRodape-->"+
"</div>";

return html;

}
    
function cssSelAnunDes(){
  
    html = "<link href='view/assets/estilo/cupon.css' rel='stylesheet'>"+
           "<link href='view/assets/estilo/breakCupon.css' rel='stylesheet'>";

        return html;
}
    

    function jsSelAnunDes(){

var arrayAnuncioCompleto = returnJason('?controller=Anuncio&action=anuncioImpressAtivo');

if(arrayAnuncioCompleto == 0){
     $('.reAnun').wrap("<div class='container'></div>");
     $('.container').prepend("<p> Sua conta não possui anúncio ativo !<p>")
     $('.reAnun').html(
                    "<p>Não fique sem investir em sua empresa!</p>"+
                   "<ul>"+
                      "<li>"+
                        "<a href='http://adminsn.semprenegocio.com.br/?controller=Home&action=viewInvistaNegocio' class='semAn' hreflang='pt-br'>Invista em sua empresa!</a>")+
                      "</li>"+
                   "</ul>";
}
 else {

    $('.reAnun').html(htmlImpressAnuncio('online', 'selectAnun'));

    }

}

////////////////////Encerra página de selecionar anuncio para desconto ////////////////////////

///////////////////inicia parte de cadastro de descontos no sistema //////////////////////////

function viewCadDes(idAnun){
 
 var statusPag = returnJason('?controller=Anuncio&action=returnStatusPG&id='+idAnun);

	if(statusPag[0]['anuncio_status'] != 11){

	var html = "<input type='hidden' name='MAX_FILE_SIZE' value='1024000'>"+
            "<h1 class='bemV'>Seja bem vindo ao cadastro de descontos!</h1>";

html += "<section class='sectCup'>"+
            "<h2>Cadastro de cupons</h2>"+
                "<form action='?controller=Anuncio&action=insertCupon' method='post' enctype='multipart/form-data'>"+
                 "<p class='escada'><a href='#' class='pain'>Painel </a> > <a href='?controller=Dashboard&action=ViewDashboard&option=selAnunDes'> Anuncios cupons </a> > <strong>Cadastro de cupon<strong></p>"+
                    "<fieldset>"+

                        "<legend>Cadastre seu desconto</legend>"+
                        
                        "<label for='tituCupon'>Título do cupon"+
                            "<input type='text' id='tituCupon' name='tituCupon'>"+
			     "<span id='tit'></span>"+
                        "</label>"+

                        "<label for='desCupon'>Descreva os detalhes da promoção"+
                            "<textarea id='desCupon' name='dCupon'></textarea>"+
			    "<span id='descr'></span>"+
                        "</label>"+

                        "<label for='qtdCupon'>Quantidade de cupons"+
                            "<input type='text' maxlength='2' placeholder='máximo 99 cupons' id='qtdCupon' name='quanCupon'>"+
			    "<span id='qtCup'></span>"+
                        "</label>"+

                        "<label for='ilimit'>Quantidade ilimitada"+
                             "<input type='checkbox' id='ilimit' name='limite' value='ilimitada'>"+
                        "</label>"+

                        "<label for='inicio'>Inicio"+
                          "<input type='text' placeholder='exemplo: 10/05/2018' class='date' maxlength='10' id='inicio' name='pInicio'>"+
			  "<span id='dIni'></span>"+
                        "</label>"+

                        "<label for='termino'>Término"+
                             "<input type='text' placeholder='exemplo: 10/07/2018' class='date' maxlength='10' id='termino' name='termino'>"+
			     "<span id='dTer'></span>"+
                        "</label>"+

                        "<fieldset class='desc'>"+
                          "<legend>Escolha o tipo de desconto</legend>"+
                          "<select name='tipoDesc' id='tDes'>"+
                                "<option value='porcentagem'> Porcentagem</option>"+
                                "<option value='dePara'>Mais barato</option>"+
                                "<option value='gratis'>Grátis</option>"+
                          "</select>"+
                        "</fieldset>"+

                        "<fieldset class='porcent'>"+
                            "<legend class='sumir'>Desconto com porcentagen</legend>"+
                            "<label for='percent'>Informe a porcentagem de desoconto"+
                               "<input type='text' maxlength='4' placeholder='Exemplo: 50%' class='dp' id='percent' name='percentVal'>"+
				"<span id='percente'></span>"+
                            "</label>"+
                        "</fieldset>"+

                        "<fieldset class='dePor'>"+
                            "<legend>Informe o valor seguido do valor com desconto</legend>"+

                            "<label for='valde'>De"+
                               "<input type='text' placeholder='Exemplo: 150,00' maxlength='7' class='dp' id='valde' name='deVal'>"+
				"<span id='vDe'></span>"+
                            "</label>"+

                            "<label for='para'>Por"+
                              "<input type='text' placeholder='Exemplo: 100,00' maxlength='7' class='dp' id='para' name='paraVal'>"+
			      "<span id='vPara'></span>"+
                            "</label>"+
                        "</fieldset>"+

                        "<fieldset class='fo'>"+
                                "<legend class='legenP'>Inserir/alterar foto</legend>"+
                                "<input type='file' name='img' id='image-upload' class='inputfile'  data-multiple-caption={count} files selected>"+
                                "<label for='image-upload'>"+
                                    "<span class='spanImg'>carregar foto</span>"+
                                "</label>"+
                                "<div class='paiFoto'>"+
                                    "<div id='image-preview'></div>"+
                               " </div>"+
                                "<button id='ex' type='button' class='excl'>Excluir</button>"+
                            "</fieldset>"+

                            "<div class='err'>"+
                                "<p id='tes'>Arquivo não suportado !</p>"+
                                "<button type='button'></button>"+
                            "</div>"+
                            "<input type='hidden' name='idAnun' value='"+idAnun+"'>"+
                            "<input type='submit' class='cadCupon' value='Cadastrar cupon'>"+
                    "</fieldset>"+
                "</form>"+
                "<div class='aviso'>"+
                     "<p>Quando todos os cupons forem impressos, ou o prazo de validade expirar, o cupon automaticamente será excluído !"+"</p>"+
                "</div>"+
        "</section>";


	} else {

		html += "<section class='sectCup' style='margin-top: 150px;'>"+
		 	"<h1>Este anuncio não permite oferecer cupons. <br/> Quero realizar </h1>"+
			 "</section>";

	}


return html;

}

function cssCadDes(){

var html;

    html = "<link href='view/assets/estilo/cadasCup.css' rel='stylesheet'>";
        return html; 
}

function jsCadDes(){
    
    var html;

   html = "<script src='view/assets/js/jquery.mask.min.js'></script>"+
        "<script src='view/assets/js/modernizr.custom.js'></script>"+
        "<script src='view/assets/js/efeito-foto.js'></script>"+
        "<script src='view/assets/js/viewFoto.js'></script>"+
        "<script src='view/assets/js/cadCupon.js'></script>"+
        "<script src='view/assets/js/custom-file-input.js'></script>"+
	"<script src='view/assets/js/jquery.validate.js'></script>"+
	"<script src='view/assets/js/validCadCup.js'></script>";

   html += "<script>$('#qtdCupon').mask('00');"+
		    "$('#percent').mask('00');"+   
		    "$('#valde').mask('000000');"+ 
		    "$('#para').mask('000000');"+ 
	   "</script>";    

	

    html += "<!--os dois abaixo eh suporte para medias queries e html5-->"+
        "<!-- [If lt IE 9]>"+
        "<script  src = 'js/html5shiv.js'></script>"+
        "<script  src='js/css3-mediaqueries.js'></script>"+
        "<[endif]-->"+
        "<!-- build:js js/index.min.js -->"+

        "<script type='text/javascript'>"+
            "$(document).ready(function() {"+
                "$.uploadPreview({"+
                    "input_field: '#image-upload',"+   // Default: .image-upload"+
                    "preview_box: '#image-preview',"+  // Default: .image-preview"+
                    "label_field: '#image-label',"+    // Default: .image-label"+
                    "label_default: '#Choose File',"+   // Default: Choose File"+
                    "label_selected: '#Change File',"+  // Default: Change File"+
                    "no_label: false"+                 // Default: false"+
                "});"+
            "});"+
        "</script>";

   return html;
}

////////////////// encerra parte de cadastro de descontos no sistema //////////


//////////////// inicia encerra  cupons de desconto online //////////////////////////////////////////
function viewCuponVirt(){
 
 var cuponsVirt = returnJason("?controller=Anuncio&action=viewDesVirtual");

     

      var html = "<h2>Aprovite as ofertas em lojas online!</h2>"+
                 "<p class='city'>Divinópolis-Mg</p>";

     for(var i = 0; i < cuponsVirt.length; i++){

        html +=     "<!-- sera gerado varios div deste -->"+
                        "<div>"+
                          "<ul>"+
                            "<li>"+
                                "<a href='?controller=Anuncio&action=viewCuponPorId&tipoCupon=virtual&cupon="+cuponsVirt[i]['desconto_virtual_id']+"' hreflang='pr-br'></a>"+//link que irá levar a página principal do anuncio. 
                            "</li>"+
                          "</ul>"+
                        //  "<!-- imagem da empresa -->"+
                            "<figure>"+
                               "<img src='"+cuponsVirt[i]['desconto_virtual_img']+"' alt='Imagen do cupon'>"+
                            "</figure>"+

                           // "<!-- este eh a descricao do desconto -->"+
                            "<p>"+cuponsVirt[i]['desconto_virtual_titulo']+"</p>";

                           // "<!-- valor do desconto -->"+
                             if(cuponsVirt[i]['desconto_virtual_tipo'] == "porcentagem"){

                                    html += "<p>Desconto de "+cuponsVirt[i]['desconto_virtual_percent']+"%</p>";

                                }else if(cuponsVirt[i]['desconto_virtual_tipo'] == "dePara"){

                                 html += "<p class='deP'><strong>De <del>R$"+cuponsVirt[i]['desconto_virtual_valor_de']+"</del></strong> por R$"+cuponsVirt[i]['desconto_virtual_valor_para']+"</p>";


                             }else {
                                    html += "<p>Gratuito</p>";
                                }


                           // "<!-- nome da empresa -->"+
                         html +="<p>"+cuponsVirt[i]['desconto_virtual_nome_loja']+"</p>"+
                    "</div>";


    }

    return html;


}

function cssCuponVirt(){

}

function jsCuponVirt(){
    
}

//////////////// encerra  cupons de desconto online //////////////////////////////////////////



///////////////// página que renderiza todos os cupons cadastrados de um dado anuncio ///////////////////

function viewCuponForAnun(idAnun){

    
 
var arrayCuponsAnun = returnJason("?controller=Anuncio&action=soliCupons&idAnun="+idAnun);

var html = "";

 

if(arrayCuponsAnun == 0){

    html += "<div class='semC'>"+

            "<p>Você não possui Cupons cadastrados para este anúncio</p>"+
            "<p>Cadastres seu cupon e atraia mais clientes para seu negócio!</p>"+
            "<ul>"+
                "<li>"+
                   "<a href='cadastrar-cupon/'>Cadastrar Desconto</a>"+    
                "</li>"+
            "</ul>"+
         "</div>";
} else {

    var infinit = "";

    html += "<p class='escada'><a href='#' class='pain'>Painel </a> > <a href='?controller=Dashboard&action=ViewDashboard&option=selAnunDes'> Anuncios cupons </a> > <strong>Gerenciar cupons</strong></p>";

     for(var i = 0; i < arrayCuponsAnun.length; i++){

        html += "<div class='paiC'>"+
                    "<div class='caixa'>"+
                        "<p>Seu cupon foi exclído com sucesso</p>"+
                        "<button type='button' class='conC'>Concluir"+"</button>"+
                    "</div>"+
                "</div>"+
                "<div class='escu'></div>"+
        "<article class='art' id='"+arrayCuponsAnun[i]['cupon_desconto_id']+"'>"+
            "<div class='paiCad'>"+
                "<div>"+
                    "<button type='button'><a href='?controller=Dashboard&action=ViewDashboard&option=alterDes&anun="+arrayCuponsAnun[i]['cupon_desconto_id']+"'>Editar</a></button>" +
                    "<button type='button' onclick='excluCupon("+arrayCuponsAnun[i]['cupon_desconto_id']+")'>Deletar</button>";
                    
                    if(arrayCuponsAnun[i]['cupon_desconto_qtd_impress'] != null){    
                        infinit = "off";
                    } else {
                        infinit = "on";
                    }

                    html += "<button type='button'><a href='?controller=Anuncio&action=relCupon&idCupon="+arrayCuponsAnun[i]['cupon_desconto_id']+"&infinit="+infinit+"' target='_blank'>Baixar relatório atualizado</a></button>" +
                "</div>"+
                "<figure>"+
                    "<img src='"+ arrayCuponsAnun[i]['cupon_desconto_img'] +"' >" +
                "</figure>"+
                "<div>"+
                    "<p>"+arrayCuponsAnun[i]['cupon_desconto_titulo']+"</p>"+
                    "<p>Válido até:<strong>"+arrayCuponsAnun[i]['cupon_desconto_termino']+"</strong></p>";
                    
                    if(arrayCuponsAnun[i]['cupon_desconto_qtd_impress'] == null){
                      html += "<p>Cupons ilimitados</p>";
                    } else {
                      html += "<p>Quantidade disponibilizada:<strong> "+arrayCuponsAnun[i]['cupon_desconto_qtd_impress']+"</strong></p>"+
                              "<p>Foram impressos:<strong>"+arrayCuponsAnun[i]['cupon_desconto_impressos']+"</strong></p>"+
                              "<p>Restam:<strong>"+arrayCuponsAnun[i]['cupon_desconto_restantes']+"</strong></p>";
                    }
                
                    if(arrayCuponsAnun[i]['cupon_desconto_tipo'] == "porcentagem"){

                    html += "<p>Desconto de "+arrayCuponsAnun[i]['cupon_desconto_percent']+"%</p>";

                    }else if(arrayCuponsAnun[i]['cupon_desconto_tipo'] == "dePara"){

                        html += "<p class='valor'>Preço de R$ <del>"+arrayCuponsAnun[i]['cupon_desconto_valor_de']+"</del> <strong> Por R$"+arrayCuponsAnun[i]['cupon_desconto_valor_para']+"</strong></p>";


                    }else {
                    html += "<p>Gratuito</p>";
                }

              html += "</div><p><strong>Status - Ativo</strong></p>"+
              "</div>"+"</article>";
    }
}


return html;

}

function cssCuponForAnun(){
var html;

    html = "<link href='view/assets/estilo/gerencCup.css' rel='stylesheet'>";
        return html; 
}

function jsCuponForAnun(){
    
}

//////////////// encerra renderização dos cupons cadastrados //////////////////////////////////////////


/////inicia a  parte de alteração do cupon de desconto /////////////////

function viewAlterCadDes(idCupon){

    var arrayCupon = returnJason("?controller=Anuncio&action=cuponForId&idCupon="+idCupon);


    var tipoDesconto = {dePara:"",porcentagem:"",gratis:""};
    switch(arrayCupon [0]['cupon_desconto_tipo']){
        case "dePara": tipoDesconto['dePara'] = "selected";break;
        case "porcentagem": tipoDesconto['porcentagem'] = "selected";break;
        case "gratis": tipoDesconto['gratis'] = "selected";break;
        default: ;break;
    }

var html = "<input type='hidden' name='MAX_FILE_SIZE' value='1024000'>"+
            "<h1 class='bemV'>Atualize seu desconto e venda mais!</h1>";

html += "<section class='sectCup'>"+
            "<h2>Gerencia de cupons</h2>"+
             "<p class='escada'><a href='#' class='pain'>Painel </a> > <a href='?controller=Dashboard&action=ViewDashboard&option=selAnunDes'> Anuncios cupons </a> > <a href='?controller=Dashboard&action=ViewDashboard&option=cupAnun&anun="+arrayCupon[0]['anuncio_id']+"' >Gerenciar cupons</a> ><strong> Atualizar cupon</strong></p>"+

                "<form action='?controller=Anuncio&action=atualiCupon' method='post' enctype='multipart/form-data'>"+
                    "<fieldset>"+
                     "<legend class='act'>Atualize seu cupon: Por questão de controle, só poderá ser alterado o título, descrição e imagem.</legend>"+

                        "<label for='tituCupon'>Titulo do cupon"+
                           "<input type='text'  id='tituCupon' name='tituCupon' value='"+arrayCupon[0]['cupon_desconto_titulo']+"'>"+
			   "<span id='tit'></span>"+
                        "</label>"+
                        
                        "<label for='desCupon'>Descreva os detalhes da promoção"+
                                
                            "<textarea id='desCupon' name='dCupon'>"+
                                arrayCupon[0]['cupon_desconto_descricao']+
                            "</textarea>"+
			    "<span id='descr'></span>"+
                        "</label>"+

                        "<label for='qtdCupon'>Quantidade de cupons"+
                           "<input type='text'  maxlength='2' placeholder='máximo 99 cupons' id='qtdCupon' name='quanCupon' value='"+arrayCupon[0]['cupon_desconto_qtd_impress']+"' disabled>"+
			   "<span id='qtCup'></span>"+
                        "</label>"+

                        "<label for='ilimit'>Quantidade ilimitada"+
                           "<input type='checkbox' id='ilimit' value='ilimitada' disabled>"+
                        "</label>"+

                        "<label for='inicio'>Inicio"+
                            "<input type='text' placeholder='exemplo: 10/05/2018' class='date' maxlength='10' id='inicio' name='pInicio' value='"+arrayCupon[0]['cupon_desconto_inicio']+"' disabled>"+
			    "<span id='dIni'></span>"+
                        "</label>"+

                        "<label for='termino'>Término"+
                            "<input type='text' placeholder='exemplo: 10/07/2018' class='date' maxlength='10' id='termino' name='termino' value='"+arrayCupon[0]['cupon_desconto_termino']+"' disabled>"+
			    "<span id='dTer'></span>"+
                        "</label>"+

                        "<fieldset class='desc'>"+
                          "<legend>Escolha o tipo de desconto</legend>"+
                            "<select name='tipoDesc' id='tDes' disabled>"+
                                "<option value='porcentagem' "+tipoDesconto['porcentagem']+">Porcentagem</option>"+
                                "<option value='dePara' "+tipoDesconto['dePara']+">Mais barato</option>"+
                                "<option value='gratis' "+tipoDesconto['gratis']+">Grátis</option>"+
                            "</select>"+
                        "</fieldset>"+
                        
                        "<fieldset class='porcent'>"+
                            "<legend class='sumir'>Desconto com porcentagen</legend>"+

                            "<label for='percent'>Informe a porcentagem de desoconto"+
                               "<input type='text' maxlength='4' placeholder='Exemplo: 50%' class='dp' id='percent' name='percentVal' value='"+arrayCupon[0]['cupon_desconto_percent']+"' disabled>"+
				"<span id='percente'></span>"+
                            "</label>"+
                        "</fieldset>"+

                        "<fieldset class='dePor'>"+
                            "<legend>Informe o valor seguido do valor com desconto</legend>"+

                            "<label for='valde'>De"+
                               "<input type='text' placeholder='Exemplo: 150,00' maxlength='7' class='dp' id='valde' name='deVal' value='"+arrayCupon[0]['cupon_desconto_valor_de']+"' disabled>"+
				"<span id='vDe'> </span>"+
                            "</label>"+

                            "<label for='para'>Por"+
                                "<input type='text' id='para' placeholder='Exemplo: 100,00' maxlength='7' class='dp' name='paraVal' value='"+arrayCupon[0]['cupon_desconto_valor_para']+"' disabled>"+
				"<span id='vPara'> </span>"+
                            "</label>"+
                        "</fieldset>"+

                        "<fieldset class='fo'>"+
                                "<legend class='legenP'>Inserir/alterar foto</legend>"+
                                "<input type='file' name='img' id='image-upload' class='inputfile'  data-multiple-caption={count} files selected>"+
                                "<label for='image-upload'>"+
                                    "<span class='spanImg'>carregar foto</span>"+
                                "</label>"+
                                "<div class='paiFoto'>"+
                                    "<div id='image-preview'></div>"+
                               " </div>"+
                                "<button id='ex' type='button' class='excl'>Excluir</button>"+
                            "</fieldset>"+

                            "<div class='err'>"+
                                "<p id='tes'>Arquivo não suportado !</p>"+
                                "<button type='button'></button>"+
                            "</div>"+
                       "<input type='hidden' name='idCupon' value='"+arrayCupon[0]['cupon_desconto_id']+"'>"+
                       "<input type='submit' class='cadCupon' value='Alterar cupon'>"+
                    "</fieldset>"+
                "</form>"+
        "</section>";

return html;

}
function cssAlterCadDes(){
 html = "<link href='view/assets/estilo/cadasCup.css' rel='stylesheet'>";
        return html; 
}

function jsAlterCadDes(){
   var html;

   html = "<script src='view/assets/js/jquery.mask.min.js'></script>"+
        "<script src='view/assets/js/modernizr.custom.js'></script>"+
        "<script src='view/assets/js/efeito-foto.js'></script>"+
        "<script src='view/assets/js/viewFoto.js'></script>"+
        "<script src='view/assets/js/cadCupon.js'></script>"+
        "<script src='view/assets/js/custom-file-input.js'></script>"+
	"<script src='view/assets/js/validCadCup.js'></script>"; 

    html += "<!--os dois abaixo eh suporte para medias queries e html5-->"+
        "<!-- [If lt IE 9]>"+
        "<script  src = 'js/html5shiv.js'></script>"+
        "<script  src='js/css3-mediaqueries.js'></script>"+
        "<[endif]-->"+
        "<!-- build:js js/index.min.js -->"+

        "<script type='text/javascript'>"+
            "$(document).ready(function() {"+
                "$.uploadPreview({"+
                    "input_field: '#image-upload',"+   // Default: .image-upload"+
                    "preview_box: '#image-preview',"+  // Default: .image-preview"+
                    "label_field: '#image-label',"+    // Default: .image-label"+
                    "label_default: '#Choose File',"+   // Default: Choose File"+
                    "label_selected: '#Change File',"+  // Default: Change File"+
                    "no_label: false"+                 // Default: false"+
                "});"+
            "});"+
        "</script>";

   return html;  
}


////encerra a parte de alteração do cupon de desconto /////////////////





//realiza processo para renderizar a página de edição do anuncio
function renderAlterAnun(idAnun){

  

    //aproveitando o css e js do insertAnuncio.
    $( "#inner" ).html(anunPorId(idAnun, "editarAnuncio"));
    //imprime CSS necessário.
    $("#cssImpress").html(cssInsertAnuncio());
    //imprime todo JS necesário para o funcionamento da página
    $("#jsImpress").html(jsInsertAnuncio(idAnun));

 

}

//realiza chamada das rederizações de acorco com o click.
$(document).ready(function() {

    $("#alterCur").click(function(){
        editCur();
    });
/*
    $("#insertAnun").click(function(){
        insertAnuncio();
    });
*/

    $("#anunAtivos").click(function(){
        anunAtivos();
    });

    $("#anunInativos").click(function(){
        anunInativ();
    });

    $("#alterCad").click(function(){
        alterCad();
    });

    $("#cadCur").click(function(){
        insertCur();
    });

    $("#viewCur").click(function(){
        viewCur();
    });

    $("#viewSelDes").click(function(){
        viewSelectDes();
    }); 
    $("#viewCadDes").click(function(){
        CadDes();
    }); 
     $("#CuponForAnun").click(function(){
        CuponForAnun();
    }); 

});

//renderiza as páginas de acordo com o valor passado via get.
function renderizer(value,idAnun){

        

    switch(value){

        case "editCur"      : editCur();break;
        case "insertAnuncio": insertAnuncio();break;
        case "anunAtivos"   : anunAtivos();break;
        case "anunInativ"   : anunInativ();break;
        case "alterCad"     : alterCad();break;
        case "insertCur"    : insertCur();break;
        case "viewCur"      : viewCur();break;
        case "selAnunDes"   : viewSelectDes();break;
        case "cadasDesc"    : CadDes(idAnun);break;
        case "alterDes"     : alterDes(idAnun);break;
        case "cupAnun"      : CuponForAnun(idAnun);break;
        case "alterAnun"    : renderAlterAnun(idAnun);break;
        

    }

}





//realiza chamada de edição do currículo
function editCur(){

    //imprime html da página
    $("#inner").html(viewAlterCurriculo());
    //imprime CSS necessário.
    $("#cssImpress").html(cssViewInsertCurriculo());
    //imprime todo JS necesário para o funcionamento da página
    $("#jsImpress").html(jsViewInsertCurriculo());

}


//reliza chamada de inserir fotos no anuncio
function renderInsertFoto(){

}



//carrega as necessidades da viewInserAnuncio
function insertAnuncio(){

    //imprime html da página
    $("#inner").html(viewInsertAnuncio());
    //imprime CSS necessário.
    $("#cssImpress").html(cssInsertAnuncio());
    //imprime todo JS necesário para o funcionamento da página
    $("#jsImpress").html(jsInsertAnuncio());

}


//Carrega as necessidades da viewAnuncuiosAtivos
function anunAtivos(){

    //imprime html da página
    $("#inner").html(viewAnuncioAtivos());
    //imprime CSS necessário.
    $("#cssImpress").html(cssAnuncioAtivos());
    //imprime todo JS necesário para o funcionamento da página
    $("#jsImpress").html(jsAnuncioAtivos());


}


//Anuncios inativos
function anunInativ(){

    //imprime html da página
    $("#inner").html(viewAnunciosInativos());
    //imprime CSS necessário.
    $("#cssImpress").html(cssAnuncioInativos());
    //imprime todo JS necesário para o funcionamento da página
    $("#jsImpress").html(jsAnuncioInativo());

}


//Anuncios alterCadastro
function alterCad(){

	

    //imprime html da página
    $("#inner").html(viewAlterCadastro());
    //imprime CSS necessário.
    $("#cssImpress").html(cssViewAlterCadastro());
    //imprime todo JS necesário para o funcionamento da página
    $("#jsImpress").html(jsViewAlterCadastro());

}



//Anuncio inserCurriculo
function insertCur(){

    //imprime html da página
    $("#inner").html(viewinsertCurriculo());
    //imprime CSS necessário.
    $("#cssImpress").html(cssViewInsertCurriculo());
    //imprime todo JS necesário para o funcionamento da página
    $("#jsImpress").html(jsViewInsertCurriculo());
 
}



//view Curriculo cadastrado.///////
function viewCur(){

    //imprime html da página
    $("#inner").html(viewCurriculo()); //setar o id do usuário em alguma tag para poder recuperar
 //imprime todo JS necesário para o funcionamento da página
    $("#jsImpress").html(jsViewCurriculo());

}




//view para selecionar qual o anuncio que terá produtos/serviços com descontos
function viewSelectDes(){

     $("#inner").html(viewSelAnunDes());

     $("#jsImpress").html(jsSelAnunDes());

     $("#cssImpress").html(cssSelAnunDes());

}


//responsável por renderizar a página de cadasro de desconto. 
function CadDes(idAnun) {

 //   alert("entrou " + idAnun);
    
    $("#inner").html(viewCadDes(idAnun));
    
    $("#cssImpress").html(cssCadDes());
    
    $("#jsImpress").html(jsCadDes());

}

//renderiza página para edição do cupon de desconto
function alterDes(idCupon){

  
    $("#inner").html(viewAlterCadDes(idCupon));
    
    $("#cssImpress").html(cssAlterCadDes());
    
    $("#jsImpress").html(jsAlterCadDes());


}


//página que exibe os cupons do anuncio passado como argumento
function CuponForAnun(idAnun) {
    
    
    $("#inner").html(viewCuponForAnun(idAnun));
    $("#cssImpress").html(cssCuponForAnun());
        //$("#carregando_form").hide("slow");

}


//Gera input selec dos bairros dinâmicamente.
function geraSelectBairro(){

    var html;
    var arrayBairros = returnJason("?controller=Anuncio&action=solicBairros");

    html = "<div class='ui-widget'> <label for='ca'>Pesquisar por bairro</label>"+
        "<label>"+
        "<select id='combobox' name='bairroSelect'>";

    for(var cont = 0; cont < arrayBairros.length; cont++) {

        html +=  "<option value='"+arrayBairros[cont]['bairros_nome']+"'>"+arrayBairros[cont]['bairros_nome']+"</option>";
    }

    html += "</select>"+
        "</label>"+
        "</div>";

    return html;

}


//Gera filtro de categorias dinamicamente de acordo com afinidade do texto de pesquisa com as categorias e subcategorias.
function geraCatCheck(pesquisa){

    var arrayCategorias = returnJason("?controller=Anuncio&action=returnFiltroCat&buscaCat="+pesquisa);

    if(arrayCategorias == null){
         return "";
    } else {
         // alert("retorno de checks: " + arrayCategorias.length);
    var html = "<fieldset>"+
        "<legend>Categorias relacionadas:</legend>";

    for(var cont = 0; cont < arrayCategorias.length; cont++){

        //somente cria o input se tiver algum anuncio cadastrado na categoria
        if(arrayCategorias[cont]['qtdAnun'] > 0){

            if(pesquisa == arrayCategorias[cont]['sub_categoria_descricao']){

                html +="<label>"+arrayCategorias[cont]['sub_categoria_descricao']+ 
                "<input type='radio' class='catCheck filter' name='categoria-radio' value='"+arrayCategorias[cont]['sub_categoria_descricao']+"' checked> ("+arrayCategorias[cont]['qtdAnun']+")"+
                "</label>";

            } else {

                html +="<label>"+arrayCategorias[cont]['sub_categoria_descricao']+ 
                    "<input type='radio' class='catCheck filter' name='categoria-radio' value='"+arrayCategorias[cont]['sub_categoria_descricao']+"'> ("+arrayCategorias[cont]['qtdAnun']+")"+
                "</label>";
            }

                 

        }

    }

    html += "</fieldset>";

    return html;
    }

  
}


function checkedVerify(arrayBai,bairros){

var tes = "";

for(var i = 0; i < arrayBai.length; i++){

            if(arrayBai[i] == bairros){

                 tes = "checked";
            } 

 }

return tes;
    

}

//Gera dinamicamente input checkBox dos bairros
function geraCheckBairros(search,arrayBai){

    var arrayBairros = returnJason("?controller=Anuncio&action=solicBairros&search="+search);


    var html = "<fieldset>"+
        "<legend>Bairros</legent>";

//alert(arrayBairros.length);

    if(arrayBai != ""){

        ///
    for(var cont = 0; cont < arrayBairros.length; cont++){

            //Caso o bairro não possua nenhum anuncio, ele não será renderizado.
            if(arrayBairros[cont]['qtdAnun'] > 0){


                html += "<label>"+arrayBairros[cont]['bairros_nome']+" ("+arrayBairros[cont]['qtdAnun']+")"+
                 "<input type='checkbox' class='bai filter' name='checkBairros[]' value='"+arrayBairros[cont]['bairros_nome']+"' "+checkedVerify(arrayBai,arrayBairros[cont]['bairros_nome'])+">"+
                "</label>";

        } 

    }

    ////
    } else {

        for(var cont = 0; cont < arrayBairros.length; cont++){


        //Caso o bairro não possua nenhum anuncio, ele não será renderizado.
        if(arrayBairros[cont]['qtdAnun'] > 0){
         html += "<label>"+arrayBairros[cont]['bairros_nome']+" ("+arrayBairros[cont]['qtdAnun']+")"+
             "<input type='checkbox' class='bai filter' name='checkBairros[]' value='"+arrayBairros[cont]['bairros_nome']+"'>"+
        "</label>";
        }

    }

    }
    

    html += "</fieldset>";

    return html;

}

  

function emailValidate(email){

var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
if (!er.test($.trim(email))){
    return false;
} else {
    return true;
}

}
//solicita cadastro e envia retorno dos emails cadastrados para receberem atualizações
$(document).ready(function() {
    $("#cadatroEm").click(function() {

        var controller = "Home";

        var action = "cadastroEmailPromocao";

        var email = $("#prom").val();

	  if(!emailValidate(email)){
		$("#returnCadEmail").html("* Email não é valido.");
		return false;
	 } 


        //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
        $.post("index.php", {
                controller: controller,
                action: action,
                email: email
            },

            function (result) {

                $("#returnCadEmail").html(result);

            });

    });

});

//realiza solicitação assíncrona para resposta de mensagem deizada para o anunciante.
 function respMen(idMens){

        var controller = "cliente";
        var action = "enviaMensagem";

        var emailDesti = $("#menEmail"+idMens).val();
        var mensagem = $("#res"+idMens).val();
        var assunto = $("#assunt"+idMens).val();
        var titulo = $("#anunName").val();
        //var nome = $("#menName"+idMens).val();


	

	if(assunto == ""){
		$("#respReturn"+idMens).html("* O assunto deve ser preenchido");
		return false;
	}

	if(mensagem == ""){
		$("#respReturn"+idMens).html("* O campo mensagem deve ser preenchido");
		return false;
	}

	

        $.post("index.php", {
                controller: controller,
                action: action,
                emailDesti: emailDesti,
                titulo: titulo,
                assunto: assunto,
                mensagem: mensagem,
                idMens: idMens
            },

            function (result) {

                //alert("retornou" + result);
               $("#respReturn"+idMens).html(result);
		setTimeout(function(){ location.reload(); }, 1000);


            });

    }

//solicita exclusão da mensagem na base de dados.
function setExcluMen(idMens){

   var controller = "cliente";
    var action = "excluMensa";

    $.post("index.php", {
            controller: controller,
            action: action,
            idMens: idMens
        },
        function (result) {
            
        $('h2.tituMens').before("<div class='mensBloc'>" +
            "<div>"+
                "<p>Mensagem excluída com sucesso !</p>" +
                "<button type='button' class='okBut' value='ok'>ok</button>"+
            "</div>"+
          "</div>");

          $('div.fundoEscuro').fadeIn();
        
           $('button.okBut,  div.fundoEscuro').click(function(){
                $('.fundoEscuro').hide();
                $('.mensBloc').remove();
            });
           // window.location.reload();
            // $("#respReturn"+idMens).html(result);
        });
}




    //envia solicitação de incremento da curtida para base de dados
    function incrementTop(idRevew){

        var controller = "Anuncio";
        var action = "incrementCurtida";



        //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
        $.post("index.php", {

                controller: controller,
                action: action,
                revewRef: idRevew

            },

            function (result) {

                    if(result == 0){

                        $('.returLik').fadeIn();
                        $('.fundoEscuro').fadeIn();

                        $('button#fechaB').click(function(){
                            $('div.returLik').hide();
                            $('.fundoEscuro').hide();
                        });

                        $('.fundoEscuro').click(function(){
                            $('div.returLik').hide();
                        });

                        } else {
                            $(".contLike"+idRevew).html(result);
                        }

            });


    }


  //responsável por solicitar a exclusão do cupon (problema de retirar onclick é que ainda não sei uma boa forma de garantir a unicidade do seletor.)
    function excluCupon(idCupon){

           $('div.escu').fadeIn();
           $('div.caixa').show();
           $('button.conC').click(function(){
              $('div.caixa').hide();
              $('div.escu').hide();
           });

        $.post("index.php", {

                controller: "Anuncio",
                action: "deletCupon",
                idCupon: idCupon

            },

            function (result) {

                    // alert(result);
                 

                    $( "article" ).remove("#"+idCupon);

            });
        }

    //responsável por gerar os cupons de anuncios cadastrados. 
    function desDinamic(offset,qtdResults){

      var arrayCuponsAnun = returnJason("?controller=Anuncio&action=cuponsForView&offset="+offset+"&qtdResults="+qtdResults);

	
     

      var html = "<h2> Veja os descontos e imprima seu cupon</h2>"+
                 "<p class='city'>Divinópolis-Mg</p>";

     for(var i = 0; i < arrayCuponsAnun.length; i++){

        html +=     "<!-- sera gerado varios div deste -->"+ 
                        "<div>"+
                          "<ul>"+
                            "<li>"+
                                "<a href='?controller=Anuncio&action=viewCuponPorId&tipoCupon=fisico&cupon="+arrayCuponsAnun[i]['cupon_desconto_id']+"' hreflang='pr-br'></a>"+//link que irá levar a página principal do anuncio. 
                            "</li>"+
                          "</ul>"+
                        //  "<!-- imagem da empresa -->"+
                            "<figure>"+
                               "<img src='"+ arrayCuponsAnun[i]['cupon_desconto_img'] +"' alt='Imagen do cupon'>"+
                            "</figure>"+

                           // "<!-- este eh a descricao do desconto -->"+
                            "<p>"+arrayCuponsAnun[i]['cupon_desconto_titulo']+"</p>";

                           // "<!-- valor do desconto -->"+
                             if(arrayCuponsAnun[i]['cupon_desconto_tipo'] == "porcentagem"){

                                    html += "<p>Desconto de "+arrayCuponsAnun[i]['cupon_desconto_percent']+"%</p>";

                                }else if(arrayCuponsAnun[i]['cupon_desconto_tipo'] == "dePara"){

                                 html += "<p class='deP'><strong>De <del>R$"+arrayCuponsAnun[i]['cupon_desconto_valor_de']+"</del></strong> por R$"+arrayCuponsAnun[i]['cupon_desconto_valor_para']+"</p>";


                             }else {
                                    html += "<p>Gratuito</p>";
                                }


                           // "<!-- nome da empresa -->"+
                         html += "<p>"+arrayCuponsAnun[i]['anuncio_titulo']+"</p>"+
                    "</div>";


    }

    return html;

}

//retorna links da paginação
function cuponPag(){

    qtdPages = returnJason("?controller=Anuncio&action=returnaginator");
    var offset = 8;
    var html = "<div id='anterior'></div><ul>";
    for(var i = 0; i < qtdPages; ++i){

        html += "<li>"+
        "<button type='button'  id='"+(i*offset)+"'  onclick='linkPaginator("+i*offset+",8)'> "+(i+1)+" </button>"+
        "</li>";
    }

    html += "</ul><div id='proximo'></div>";

    return html;

}


//gera html do cupon a ser exibido na página exclusiva do cupon
function renderCuponCompleto(idCupon) {
  
    var arrayCupon = returnJason("?controller=Anuncio&action=solCupoCompleto&cupon="+idCupon);

    var html = "<article>"+
                "<h3 class='sumir'>Aproveite os descontos oferecidos para você</h3>"+
                "<div class='paiBloc'>"+
                    "<div>"+
                         "<ul>"+
                            "<li>"+
                               "<a href='?controller=Anuncio&action=viewAnuncioIdAll&id="+arrayCupon[0]['anuncio_id']+"'>"+arrayCupon[0]['anuncio_titulo']+"</a>"+
                            "</li>"+
                         "</ul>"+
                         "<figure>"+
                            "<img src='"+ arrayCupon[0]['cupon_desconto_img'] +"' alt='Imagen do cupon'>"+
                         "</figure>"+
                         //titulo do anuncio
                         "<p>"+arrayCupon[0]['cupon_desconto_titulo']+"</p>"+                         
                         "<p>Categoria:<strong>"+arrayCupon[0]['sub_categoria_descricao']+"</strong></p>"+
                         "<p>Valido até <strong>"+arrayCupon[0]['cupon_desconto_termino']+"</strong></p>";
                        // alert("Po mano" + arrayCupon[0]['cupon_desconto_qtd_impress']);
                       

                        if(arrayCupon[0]['cupon_desconto_qtd_impress'] != null && arrayCupon[0]['cupon_desconto_qtd_impress'] != 0){
                           html += "<p>Restam <strong>"+arrayCupon[0]['cupon_desconto_restantes']+" cupons de "+arrayCupon[0]['cupon_desconto_qtd_impress']+"</strong></p>";
                        }

                        var infinit = "";

                        if(arrayCupon[0]['cupon_desconto_qtd_impress'] == null || arrayCupon[0]['cupon_desconto_qtd_impress'] == 0){

                           infinit = "on";

                        } else {

                           infinit = "off"; 
                        }
                        
                            if(returnJason("?controller=Anuncio&action=impressVerify&cli="+dadosUser['id']+"&cupon="+arrayCupon[0]['cupon_desconto_id']) == 0) {

                                //executa href e onclick ao mesmo tempo. Mandar apenas o link.. Ver esssa possibilidade
                                html += "<ul class='imp'>"+ 
                                            "<li>"+
                                              "<a onclick=cuponImpress("+dadosUser['id']+","+arrayCupon[0]['cupon_desconto_id']+","+arrayCupon[0]['cupon_desconto_qtd_impress']+",'"+infinit+"','?controller=Anuncio&action=cuponPdfImpress&idCupon="+arrayCupon[0]['cupon_desconto_id']+"&cliId="+dadosUser['id']+"&infinit="+infinit+"');> Imprimir Cupon</a>"+
                                            "</li>"+
                                        "</ul>";    
                            } else {

                                html += "<ul class='imp'>"+ 
                                            "<li>"+
                                                 "<a onclick=cuponImpress("+dadosUser['id']+","+arrayCupon[0]['cupon_desconto_id']+","+arrayCupon[0]['cupon_desconto_qtd_impress']+",'"+infinit+"','not');> Imprimir cupon </a>"+
                                            "</li>"+
                                        "</ul>"; 
                            }

                     html += "</div>"+

                     "<div>"+
                         "<p>Descrição do cupom:<strong>"+arrayCupon[0]['cupon_desconto_descricao']+"</strong></p>"+
                     "</div>"+

                     "<div>"+
                         "<p>Contato:<strong>"+arrayCupon[0]['anuncio_tel_cel']+" / "+arrayCupon[0]['anuncio_tel_fixo']+" / (Whatsapp) "+arrayCupon[0]['anuncio_whats']+"</strong></p>"+
                         "<p>Endereço:<strong>"+arrayCupon[0]['endereco_cep']+", "+arrayCupon[0]['endereco_rua']+", "+arrayCupon[0]['endereco_numero']+", "+arrayCupon[0]['endereco_bairro']+", Complemento:"+arrayCupon[0]['endereco_complemento']+", N complemento"+arrayCupon[0]['endereco_numero_complemento']+", "+arrayCupon[0]['endereco_cidade']+", "+arrayCupon[0]['endereco_estado']+"</strong> </p>"+
                    "</div>"+ 
                    "<div>"+
                         "<h3>Regras:</h3>"+
                         "<p>Este cupom não é acumulativo com outros descontos e promoções.</p>"+
                         "<p>Confira os termos para utilização do cupon: http://www.semprenegocio.com./&shy;regras-gerais/</p>"+
                         "<p>Este cupom tem caráter informativo e é de total responsabilidade do anunciante. A SempreNegócio não se responsabiliza pela eventual invalidade do mesmo.</p>"+
                         "<ul>"+
                            "<li>"+
                                "<a href='?controller=Home&action=viewDescontos'>Ver mais descontos</a>"+
                            "</li>"+
                        "</ul>"+
                    "</div>"+
                 "</div>"+
               "</article>";

               return html;

}

//gera html dinâmico da página que exibe as informações do cupon de desconto online.
function renderVirtualCompleto(idCupon){

    var arrayCupon = returnJason("?controller=Anuncio&action=viewDesVirId&idCupon="+idCupon);

    var html = "<article>"+
		"<h3 class='sumir'>Aproveite os descontos disponiveis para você</h3>"+
		"<div class='paiBloc'>"+
		"<div>"+
		"<ul>"+
		"<li>"+
		"<a type='button' href='"+arrayCupon[0]['desconto_virtual_url']+"' target='_blank'>Obtenha este desconto</a>"+
		"</li>"+
		"</ul>"+
		"<figure>"+
		"<img src='"+ arrayCupon[0]['desconto_virtual_img'] +"' alt='Imagen do cupon'>"+
		"</figure>"+
		//titulo do anuncio
		"<p>Aproveite nossos descontos</p>"+
		"<p>"+arrayCupon[0]['desconto_virtual_tipo']+"</p>"+
		"<p>Categoria:E-commerce</p>"+
		"<p>Valido até "+arrayCupon[0]['desconto_virtual_termino']+"</p>"+
		"</div>"+
		"<div>"+
		"<p>Descrição:<strong>"+arrayCupon[0]['desconto_virtual_descricao']+"</strong></p>"+
		"</div>"+
		"<div></div>"+
		"<div>"+
		"<h3>Regras:</h3>"+
		"<p>Este cupom não é acumulativo com outros descontos e promoções.</p>"+
		"<p>Confira os termos para utilização do cupon: http://www.semprenegocio.com./&shy;regras-gerais/</p>"+
		"<p>Este cupom tem caráter informativo e é de total responsabilidade do anunciante. A SempreNegócio não se responsabiliza pela eventual invalidade do mesmo.</p>"+
		"<ul>"+
		"<li>"+
		"<a href='?controller=Home&action=viewDescontos'>Ver mais descontos</a>"+
		"</li>"+
		"</ul>"
	    "</div>"+
	    "</div>"+
	    "</article>";

    return html;

}

//dispara todo processo ao imprimir o cupon de desconto
//fazer com que este método seja executado antes do imprimir, caso não tiver sido impresso gerar o href, caso contrário gerar o botão que chama a mensagem de já foi impresso.
function cuponImpress(idCli, idCupon,qtdImpress,infinit,redirect) {

    //1- veridicar se o cliente já imprimiu, caso verdadeiro retornar codigodata de vencimento, link para baixar novamente contendo o código de quando foi solicitado.
    if((returnJason("?controller=Anuncio&action=impressVerify&cli="+idCli+"&cupon="+idCupon) == 0) && (qtdImpress != 0)){

      //2 - caso for a primeira, persistir impressão na base de dados
      $.post("index.php", {

                controller: "Anuncio",
                action: "solCuponImpress",
                idCli: idCli,
                idCupon: idCupon

            },

            function (result) {

               // $("#cuponCompleto").html(renderCuponCompleto(idCupon));

		if(redirect != 'not') {
		window.open(redirect, '_blank');
		}

            });

	


    } else {

        //chamar função que irá retornar mensagem para impressão do cupon anterior. 
        //alert("Já foi impresso danado!");
        //json retornando os dados a serem imseridos na mensagem do já imprimiu!
        var urlDir = "?controller=Home&action=viewDescontos";

           $("section.sectCupon").before("<div class='jaFoi'>"+
            "<p>Este cupon já foi impresso !</p>"+
            "<p>Agradecemos a preferência.</p>"+
            "<ul>"+
               "<li>"+
                    "<a href='?controller=Anuncio&action=cuponPdfImpress&idCupon="+idCupon+"&cliId="+idCli+"&infinit="+infinit+"' target='_blank' onclick=redirectUser('"+urlDir+"');>Reimprimir cupon</a>"+
                "</li>"+
                "<li>"+
                     "<a href='?controller=Home&action=viewDescontos'>Ver mais descontos</a>"+
                "</li>"+
            "</ul>"+
         "</div>"
        );
        $('div.fundo').fadeIn();

    }

   
    //3 - após persistir, fazer o cálculo para atualizar a quantidade atual e quantos foram impressos. JÁ FAZER A PRÓPRIA DE PERSISTIR CHAMAR A QUE FAZ ATUALIZAÇÃO.
    
    //PS: ver como proceder para quando o usuário alterar os dados de cadastro, ver se rola zerar a contagem toda vez que ocorrer atualiação na base de dados.
    
}

    //direciona usuário para a página genérica de descontos.
    function redirectUser(url){

        window.location.href = url;

    }



    function allCat(){

     //var arrayCat = returnJason("?controller=Anuncio&action=returnCatAll");
     var arraySubcat = returnJason("?controller=Anuncio&action=returnSubCatAll");

     var html = "";
     var alfa = ['A','B','C','D','E','F','G','H','I','J','L','M','N','O','P','R','S','T','U','V'];  //'Q','W','X','Y','Z''K',

        for(var i = 0; i < alfa.length; i++){

                                    html += "<dl>"+
                                        "<dt>"+alfa[i]+"</dt>";

            for(var j = 0; j < arraySubcat.length; j++){

              // html += "<p>---------"+arraySubcat[j]['sub_categoria_descricao'].substring(0,1)+"</p>";

                         if (alfa[i] == arraySubcat[j]['sub_categoria_descricao'].substring(0,1)) {

                                      html += "<dd><a href='?controller=Anuncio&action=viewAnuncioPesquisa&busc="+arraySubcat[j]['sub_categoria_descricao']+"'>"+arraySubcat[j]['sub_categoria_descricao']+"</a><dd>";

                         }
            }

            html += "</dl>";

        }

        return html;

    }
