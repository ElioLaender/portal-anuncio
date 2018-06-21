/**
 * Created by laender on 14/02/16.
 */

//verifica se existe ou não currículo na base de dados. retornar também se está ativo ou inativo?

//PS: fazer outro método JS para tratar sobre o status de ativo e inativo do currriculo.

//será chamada quando o botão de divulgar currpiculo for chamada
function curExist(idUserLog){

var ativOption =
"<li>"+
    "<a class='col' onclick='viewCur();' id='viewCur'>Visualizar Currículo</a>"+
    "<figure>"+
        "<img src='view/assets/imagens/ver@2x.png' alt='lápis colorido'>"+
        "</figure>"+
    "</li>"+
"<li>"+
    "<a class='col' onclick='editCur();' id='alterCur'>Alterar informações</a>"+
    "<figure>"+
        "<img src='view/assets/imagens/edt@2x.png'  alt='lápis colorido'>"+
        "</figure>"+
    "</li>"+
"<li>"+
    "<a class='col' href='?controller=DashboardCurriculo&action=exibePDF' target='_blank'>Baixar currículo - PDF</a>"+
    "<figure>"+
        "<img src='view/assets/imagens/baix@2x.png' alt='seta azul indicando direção para baixo'>"+
        "</figure>"+
    "</li>"+
    "<li id='optCur'>"+

    "</li>"+
    "<li>"+
    "<a class='col' onclick='deletCur()'>Deletar currículo</a>"+
        "<figure>"+
            "<img src='view/assets/imagens/exc@2x.png' alt='lixeira roxa'>"+
        "</figure>"+
    "</li>"+
    "<li>"+
        "<a href='?controller=Dashboard&action=sair'>Sair</a>"+
        "<figure>"+
            "<img src='view/assets/imagens/sair@2x.png' alt='Porta aberta verde com  uma seta azul indicando a saída'>"+
        "</figure>"+
    "</li>"+
    "<li>"+
        "<a href='?controller=&action='>Página Inicial</a>"+
            "<figure>"+
                 "<img src='view/assets/imagens/homePage@1x.png' alt='coruja azul'>"+
             "</figure>"+
    "</li>";

    var inativOption = 

    "<li>"+
         "<a class='col' id='cadCur' onclick='insertCur();'>Cadastrar currículo</a>"+
            "<figure>"+
                  "<img src='view/assets/imagens/cadastre@1x.png' alt='folha colorida de laranja'>"+
             "</figure>"+
    "</li>"+
    "<li>"+
        "<a href='?controller=Dashboard&action=sair'>Sair</a>"+
        "<figure>"+
            "<img src='view/assets/imagens/sair@2x.png' alt='Porta aberta verde com  uma seta azul indicando a saída'>"+
        "</figure>"+
    "</li>"+
    "<li>"+
        "<a href='?controller=&action='>Página Inicial</a>"+
            "<figure>"+
                 "<img src='view/assets/imagens/homePage@1x.png' alt='coruja azul'>"+
             "</figure>"+
    "</li>";

    //Envio assíncrono do formulário de login.
    $(function(){

        //Enviando as variáveis com os valores para a página envia_formulario.php e criando uma nova função para pegar o retorno da página envia_formulario.php
        $.post("index.php", {
                controller: "DashboardCurriculo",
                action: "curVeri",
                cli: idUserLog
            },
            function (result) {
                    //fazer lógiva para adicionar classe que irá ocultar as opções ou exibilas de acordo com o resultado.
                if(result == 1){

                  $(".menuCur").html(ativOption);

                } else {
                    $(".menuCur").html(inativOption);
                }

            });
    });


}

//executa processo de renderização das opções quando o botão "divulgar curriculo" for clicado

var terg;
$("#inserCur").click(function(){

    if(terg != 1){
        curExist(dadosUser['id']);
        optionStatusCur();

        terg = 1;
    } else {

        //fazer lógica para ocultar novamente as opções caso o botão for clicado novamente.
        //alert("já foi clicado!");
    }

});


function deletCur(){

    $(function(){
        $.post("index.php", {
                controller: "DashboardCurriculo",
                action: "excluirCurriculo"
            },
            function (result) {
                alert(result);
                location.reload();
              //fazer lógica para destruir opções e chamar curExist(dadosUser['id']) para gerar as opções novamente.
            });
    });
}

function downloadCur(){
    window.location = "?controller=DashboardCurriculo&action=exibePDF";
    alert("Download efetuado");
}

function optionStatusCur(){

var retorno = "";

    $.post("index.php", {
            controller: "Dashboard",
            action: "curStat"
        },
        function (result) {

            if(result == 1){

                retorno += "<a class='col' id='eu' onclick='statusCur(0)'>Somente eu</a>"+
                        "<figure>"+
                            "<img  src='view/assets/imagens/ocult@2x.png' alt='caixa azul'>"+
                        "</figure>";
            } else {

                retorno += "<a class='col' id='todos' onclick='statusCur(1)'>Visivel para todos</a>"+
                        "<figure>"+
                            "<img src='view/assets/imagens/box@2x.png' alt='caixa azul'>"+
                        "</figure>";
            }
            //return  retorno;
            $("#optCur").html(retorno);

        });

}

function statusCur(status){

    $(function(){
        $.post("index.php", {
                controller: "DashboardCurriculo",
                action: "modificaStatusCurriculo",
                status: status
            },
            function (result) {

                optionStatusCur();
            });
    });

}
/*
#verifica o status, caso um é porque está ativado, caso 0 é porque está desativado.
 "<a href="<?php echo $URL_INI; ?><?php echo $link_status_curriculo; ?>" hreflang="pt-br"><?php echo $text_status_curriculo; ?></a>"+
"<a href="<?php echo $URL_INI; ?><?php echo $link_status_curriculo; ?>" hreflang="pt-br"><?php echo $text_status_curriculo; ?></a>"+

#verifica se o status do curriculo está como ativado ou desativado e fornece o link e texto de acordo com a situação.
    if($objCurriDAO->verificaStatusCurriculo($objCliDAO->returnIdUserSession($aut->pegar_usuario()))) {

#passa o texto da variável e link para ocultar sendo 0 equivalente a oculta e um equivalente a anunciar.
        $this->view->set('text_status_curriculo', 'Somente eu');
    $this->view->set('link_status_curriculo', '?controller=DashboardCurriculo&action=modificaStatusCurriculo&status=0');
    $this->view->set('curImg', 'view/assets/imagens/box@2x.png');

} else {

    $this->view->set('text_status_curriculo', 'Visivel para todos');
    $this->view->set('link_status_curriculo', '?controller=DashboardCurriculo&action=modificaStatusCurriculo&status=1');
    $this->view->set('curImg', 'view/assets/imagens/box@2x.png');
}
*/




