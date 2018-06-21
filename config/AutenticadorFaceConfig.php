<?php



class AutenticadorFaceConfig {

//encontrar uma forma de chamar o face autenticador quando o usuário clica em logar com o face. porque depois em cada página pode apenas chamar o método que retorna os dados em session
//evitando processamento desnecessário para obter os dados e verificar se o mesmo já existe na base de dados.
//testar se a url de cliFoto vai dar certo

    public function faceAutenticador(){

        require_once 'libraries/facebook/src/facebook.php';

        $facebook = new Facebook(array(
            'appId'  => '632361740268524',
            'secret' => '8a3a18d677778eda146e59365a820f3d',
        ));

        $user = $facebook->getUser();

        if ($user) {

            try {

               $user_profile = $facebook->api('/me?fields=email,id');

                #chamar método que verifica se usuário do face já consta na base de dados, caso contrário persiste.
               $this->userFaceVerify($user_profile['id']);
                $this->setUserFaceSession($user_profile['email']);
                return true;

            } catch (FacebookApiException $e) {

               // error_log($e);
              return false;

            }



        }



    }


    #seta o usuário na sessão
    public function setUserFaceSession($user) {
        session_start();
        $_SESSION['faceUser'] = $user;
        session_write_close();
    }

    #retorna usuaário setado na session
    public function getUserFaceSession() {

        return $_SESSION['faceUser'];

    }


    #retorna dados do usuário logado com face
    public function faceUserData() {

        require_once 'libraries/facebook/src/facebook.php';

        $facebook = new Facebook(array(
            'appId'  => '632361740268524',
            'secret' => '8a3a18d677778eda146e59365a820f3d',
        ));


        $user = $facebook->getUser();


        if ($user) {

            try {

                $user_profile = $facebook->api('/me?fields=email,first_name,last_name,gender,name,id');

                return $user_profile;

            } catch (FacebookApiException $e) {

                error_log($e);
                return   $user = null;

            }



        }

    }

    #persiste novo usuário do face na base de dados
    public function userFaceVerify($userId){

        require_once "dao/AccessObject/ClienteDAO.php";
        $objCli = new ClienteDAO();
        $objCli->userFaceExists($userId);

    }
  

    #obtem url para login com facebook
    public function loginUrl(){
        require_once 'libraries/facebook/src/facebook.php';
        $facebook = new Facebook(array(
            'appId'  => '632361740268524',
            'secret' => '8a3a18d677778eda146e59365a820f3d',
        ));

        $url = $facebook->getLoginUrl(array(
            'scope' => 'email'
        ));

        return $url;

    }

    #desloga usuário que logou com o facebook
    public function faceLogout(){
        require_once 'libraries/facebook/src/facebook.php';
        $facebook = new Facebook(array(
            'appId'  => '632361740268524',
            'secret' => '8a3a18d677778eda146e59365a820f3d',
        ));

        $facebook->destroySession();

        header("Location: /login/");

    }


}
