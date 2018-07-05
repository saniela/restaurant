<?php
class Layout
{
  public static function render($folder,$view,$var=array()){

      if(count($var) > 0){
        foreach($var as $k=>$v){
          if(strlen($k) > 0){
             ${$k} = $v; //variable
           }
         }
       }

    $inc_path = ($folder == 'master') ? MASTER_INC_PATH : ADMIN_INC_PATH;
    $view_path = ($folder == 'master') ? VIEW_MASTER_PATH : VIEW_ADMIN_PATH;

    require_once $inc_path . "header.php"; //require header
    if(file_exists($view_path . $view . ".php")){
      require_once $view_path . $view . ".php";
    }else{
       throw new Exception;
   }
    require_once $inc_path . "footer.php"; //require footer



    /*if($folder === 'master'){
      require_once MASTER_INC_PATH . "header.php"; //require header

      if(file_exists(VIEW_MASTER_PATH . $view . ".php")){
        require_once VIEW_MASTER_PATH . $view . ".php";
      }else{
        throw new Exception;
      }

      require_once MASTER_INC_PATH . "footer.php"; //require footer

    }else if($folder === 'admin'){
      require_once ADMIN_INC_PATH . "header.php"; //require header

      if(file_exists(VIEW_ADMIN_PATH . $view . ".php")){
        require_once VIEW_ADMIN_PATH . $view . ".php";
      }else{
        throw new Exception;
      }

      require_once ADMIN_INC_PATH . "footer.php"; //require footer
    }*/



  }
}
