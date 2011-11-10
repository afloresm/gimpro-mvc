<?php
class IndexController extends ControllerBase
{

    //Accion index
    public function index()
    {
        if (isset($_SESSION['logeado']))

            $this->view->show("welcome.php");
        else
            $this->login();
    }

    public function login()
    {   
        $this->view->show("login.php");
    }

    public function perfil()
    {
        require 'controllers/PerfilController.php';

        $perfil= new PerfilController();
        $perfil->show();
    }
    

    public function registrar()
    {
        $this->view->show("registrar.php");

    }

    public function validate()
    {
        require 'models/AuthModel.php';

        $auth = new AuthModel();
     
        if (!isset($_SESSION['logeado'])){
            $validado = $auth->Validar($_POST['username'], $_POST['password'],$_POST['perfil']);
            if ($validado) {
                    $id = $auth->getID($_POST['username'], $_POST['password'],$_POST['perfil']);
                    if($id=!false){
                     session_start();
                     $_SESSION['logeado'] = 1;
                     $_SESSION['perfil'] = $_POST['perfil'];
                     $_SESSION['id'] = $id;
                     echo "logeado";
                     $this->perfil();
                    } else echo "error";
            }
            else
                $this->index();
        }
    }

   


}

?>