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

    public function validate()
    {
        require 'models/AuthModel.php';
        $auth = new AuthModel();

        

        if (!isset($_SESSION['logeado'])) {
            $validado = $auth->Validar($_POST['username'], $_POST['password']);
            if ($validado) {
                session_start();
                $_SESSION['logeado'] = 1;
                $_SESSION['nombre'] = $_POST['username'];
                echo "logeado";
            }
            else
                $this->index();
        }
    }

   


}

?>