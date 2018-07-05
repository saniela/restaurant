<?php
abstract class adminBaseController
{
  public abstract function home();

  public function getView($view,$var = null){
    Layout::render('admin',$view,$var);
   }
   
   public function error(){
     $var = null;
     $this->getView('error',$var);
     /*$error = new errorController();
     $error->index();*/
   }

}
