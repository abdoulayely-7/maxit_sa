<?php 
namespace app\core\abstract;
abstract class AbstractController{
  protected string $layout = 'base.layout.html.php';
  abstract public  function index();
  abstract public  function create();
  abstract public  function destroy();
  abstract public  function edit();



  public function render(string $view,array $data=[]){
    extract($data);
    ob_start();
    if (!file_exists("../templates/$view.html.php")) {
    throw new \Exception("Vue $view introuvable !");
  }
    require_once  '../templates/'.$view.'.html.php';
    $containForLayout = ob_get_clean();
    if (!file_exists("../templates/layout/" . $this->layout)) {
    throw new \Exception("Layout {$this->layout} introuvable !");
  }
    require_once '../templates/layout/' . $this->layout;
    
  }
}