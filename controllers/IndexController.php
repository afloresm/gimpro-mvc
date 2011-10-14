<?php
class IndexController extends ControllerBase
{
    //Accion index
    public function index()
    {
        echo "Controlador Index";
    }
    
    public function testView()
    {
        $vars['nombre'] = "Federico";
        $vars['lugar'] = $this->getLugar();
        $this->view->show("test.php", $vars);
    }
    
    private function getLugar()
    {
        return "Buenos Aires, Argentina";
    }
}
?>