<?php
abstract class baseController
{
  public abstract function home();

  public function getView($view,$var = null){
    Layout::render('master',$view,$var);
   }
   
   public function error(){
     $var = null;
     $this->getView('error',$var);
     /*$error = new errorController();
     $error->index();*/
   }

}
