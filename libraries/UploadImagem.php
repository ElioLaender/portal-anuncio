<?php

#chamada a classe ClienteDAO para que possa ser buscado o id e código de cadastro para renomear a imagem. returnIdUserSession($session)
include_once "dao/AccessObject/ClienteDAO.php";
#chamada a classe CurriculumDAO para que seja setado na base de dados o diretório de acesso da imagem.
include_once "dao/AccessObject/CurriculumDAO.php"; //no caso curriculoDAO quem vai chamar o método upload que vai retornar o nome da imagem no final
//A finalidade é construir um método na classe UploadImagem para renomear o aquivo do upload e na verdade CurriculoDAO que vai fazer a chamada.


class UploadImagem{

    public $width; // Definida no arquivo index.php, será a largura máxima da nossa imagem
    public $height; // Definida no arquivo index.php, será a altura máxima da nossa imagem
    protected $tipos = array("jpeg", "png", "gif"); // Nossos tipos de imagem disponíveis para este exemplo

    // Função que irá redimensionar nossa imagem
    protected function redimensionar($caminho, $nomearquivo){
    // Determina as novas dimensões
        $width = $this->width;
        $height = $this->height;

         // Pegamos a largura e altura originais, além do tipo de imagem
        list($width_orig, $height_orig, $tipo) = getimagesize($caminho.$nomearquivo);

        // Se largura é maior que altura, dividimos a largura determinada pela original e multiplicamos a altura pelo resultado, para manter a proporção da imagem
        if($width_orig > $height_orig){
            $height = ($width/$width_orig)*$height_orig;
        // Se altura é maior que largura, dividimos a altura determinada pela original e multiplicamos a largura pelo resultado, para manter a proporção da imagem
        } elseif($width_orig < $height_orig) {
            $width = ($height/$height_orig)*$width_orig;
        } // -> fim if
        // Criando a imagem com o novo tamanho
        $novaimagem = imagecreatetruecolor($width, $height);
        switch($tipo){
        // Se o tipo da imagem for gif
            case 1:
                // Obtém a imagem gif original
                $origem = imagecreatefromgif($caminho.$nomearquivo);
                // Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                // Envia a nova imagem gif para o lugar da antiga
                imagegif($novaimagem, $caminho.$nomearquivo);
                break;

             // Se o tipo da imagem for jpg
            case 2:
                // Obtém a imagem jpg original
                $origem = imagecreatefromjpeg($caminho.$nomearquivo);
                // Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                // Envia a nova imagem jpg para o lugar da antiga
                imagejpeg($novaimagem, $caminho.$nomearquivo);
                break;

            // Se o tipo da imagem for png
            case 3:
                // Obtém a imagem png original
                $origem = imagecreatefrompng($caminho.$nomearquivo);
                // Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                // Envia a nova imagem png para o lugar da antiga
                imagepng($novaimagem, $caminho.$nomearquivo);
                break;
        } // -> fim switch

        // Destrói a imagem nova criada e já salva no lugar da original
        imagedestroy($novaimagem);
        // Destrói a cópia de nossa imagem original
        imagedestroy($origem);
    } // -> fim function redimensionar()

    protected function tirarAcento($texto){
        // array com letras acentuadas
        $com_acento = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ',);
        // array com letras correspondentes ao array anterior, porém sem acento
        $sem_acento = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y',);
        // procuramos no nosso texto qualquer caractere do primeiro array e substituímos pelo seu correspondente presente no 2º array
        $final = str_replace($com_acento, $sem_acento, $texto);
        // array com pontuação e acentos
        $com_pontuacao = array('´','`','¨','^','~',' ','-');
        // array com substitutos para o array anterior
        $sem_pontuacao = array('','','','','','_','_');
        // procuramos no nosso texto qualquer caractere do primeiro array e substituímos pelo seu correspondente presente no 2º array
        $final = str_replace($com_pontuacao, $sem_pontuacao, $final);
        // retornamos a variável com nosso texto sem pontuações, acentos e letras acentuadas
        return $final;
    } // -> fim function tirarAcento()

    #método responsável por renomear o arquivo, utilizando o id do usuário criptografado como nome. (em multiplas fotos, será concatenado o id da foto com o id do cliente e encriptografado.)
    #Observação: Caso a imagem tiver o mesmo nome, a que estiver armazenada será sobrescrita. Como no caso desta é apenas uma imagem, não reailizei nenhum método para evitar imagem com mesmo nome.function
    #quando for muitas imagens de um mesmo usuário/cadastro, será concatenado e criptografado para gerar o nome da imagem.
    public function renameUpLoad($session){

        $objCliDAO = new ClienteDAO();

        #criptografa o id antes de renomear.
       $file = md5($objCliDAO->returnIdUserSession($session));

        return $file;

    }

    // Função que irá fazer o upload da imagem
    public function salvarMultiplas($caminho, $file){


        $quantidadeImagem =  count($file['name']);



        for($i = 0; $i < $quantidadeImagem; $i++){



            // Retiramos acentos, espaços e hífens do nome da imagem
            $file['name'][$i] = $this->tirarAcento(($file['name'][$i]));
            // Atribuímos caminho e nome da imagem a uma variável apenas
            $uploadfile = $caminho.$file['name'][$i];


            $tipoFile = $file['type'][$i];

            #Processo para armazenamento do tipo da imagem.
            $passoUm = explode('/',$tipoFile);
            $passoDois = end($passoUm);
            $tipo = strtolower($passoDois);

            // Guardamos na variável tipo o formato do arquivo enviado
          //  $tipo = strtolower(end(explode('/', $file['type'][$i])));


            // Verifica se a imagem enviada é do tipo jpeg, png ou gif
            if (array_search($tipo, $this->tipos) === false) {
                $mensagem = "<p color='#F00'>Envie apenas imagens no formato jpeg, png ou gif!</p>";
               // return $mensagem;
            }




            // Se a imagem temporária não for movida para onde a variável com caminho e nome indica, exibiremos uma mensagem de erro
            else if (!move_uploaded_file($file['tmp_name'][$i], $uploadfile)) {
                switch($file['error'][$i]){
                    case 1:
                        $mensagem = "<p color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</p>";
                        break;
                    case 2:
                        $mensagem = "<p color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</p>";
                        break;
                    case 3:
                        $mensagem = "<p color='#F00'>O upload do arquivo foi feito parcialmente.</p>";
                    case 4:
                        $mensagem = "<p color='#F00'>Não foi feito o upload de arquivo.</p>";
                        break;
                } // -> fim switch

                // Se a imagem temporária for movida
            } /* -> fim if */ else{

                // Pegamos sua largura e altura originais
                list($width_orig, $height_orig) = getimagesize($uploadfile);

                //Comparamos sua largura e altura originais com as desejadas
                if($width_orig > $this->width || $height_orig > $this->height){

                    // Chamamos a função que redimensiona a imagem
                    $this->redimensionar($caminho, $file['name'][$i]); //tentar assim $file['img']['name'][$i]
                } // -> fim if

                // Exibiremos uma mensagem de sucesso
                $mensagem = "<a href='".$uploadfile."'><font color='#070'>Upload realizado com sucesso!</font><a>";
            } // -> fim else

            // Retornamos a mensagem com o erro ou sucesso
            //return $mensagem;

        } // -> fim function salvar()


        }



    // Função para realizar upload de apenas uma imagem
    public function salvar($caminho, $file){


        // Retiramos acentos, espaços e hífens do nome da imagem
        $file['name'] = $this->tirarAcento(($file['name']));
        // Atribuímos caminho e nome da imagem a uma variável apenas
        $uploadfile = $caminho.$file['name'];

        $tipoFile = $file['type'];



        #Processo para armazenamento do tipo da imagem.
        $passoUm = explode('/',$tipoFile);
        $passoDois = end($passoUm);
        $tipo = strtolower($passoDois);

        // Verifica se a imagem enviada é do tipo jpeg, png ou gif
        if (array_search($tipo, $this->tipos) === false) {

            $mensagem = "<font color='#F00'>Envie apenas imagens no formato jpeg, png ou gif!</font>";
            return $mensagem;
        }

        // Se a imagem temporária não for movida para onde a variável com caminho e nome indica, exibiremos uma mensagem de erro
        else if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
            switch($file['error']){
                case 1:
                    $mensagem = "<p color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</p>";
                    break;
                case 2:
                    $mensagem = "<p color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</p>";
                    break;
                case 3:
                    $mensagem = "<p color='#F00'>O upload do arquivo foi feito parcialmente.</p>";
                case 4:
                    $mensagem = "<p color='#F00'>Não foi feito o upload de arquivo.</p>";
                    break;
            } // -> fim switch

            // Se a imagem temporária for movida
        } /* -> fim if */ else{

            // Pegamos sua largura e altura originais
            list($width_orig, $height_orig) = getimagesize($uploadfile);

            //Comparamos sua largura e altura originais com as desejadas
            if($width_orig > $this->width || $height_orig > $this->height){

                // Chamamos a função que redimensiona a imagem
                $this->redimensionar($caminho, $file['name']);
            } // -> fim if

            // Exibiremos uma mensagem de sucesso
            $mensagem = "<a href='".$uploadfile."'><font color='#070'>Upload realizado com sucesso!</font><a>";
        } // -> fim else

        // Retornamos a mensagem com o erro ou sucesso
        //return $mensagem;

    } // -> fim function salvar()

} // -> fim classe