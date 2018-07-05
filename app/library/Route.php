<?php
class Route
{
  private static $controller;
  private static $method;

  public static function get(){
    self::$controller = (isset($_GET['c'])) ? strtolower(htmlspecialchars(trim($_GET['c']),ENT_QUOTES)) . "Controller" : "restaurantController";
    self::$method =  (isset($_GET['m'])) ? strtolower(htmlspecialchars(trim($_GET['m']),ENT_QUOTES)) : "home";
    //check if controller and method exist
   self::checkIfExist();

    //route to a controller/method
    $ctr = new self::$controller;
    $method = self::$method;
    $ctr->$method();

}

  public static function checkIfExist(){
    if(!file_exists(CONTROLLER_MASTER_PATH . self::$controller . ".php") && !file_exists(CONTROLLER_ADMIN_PATH . self::$controller . ".php")){
      self::$controller = "restaurantController";
    }
    if(!method_exists(self::$controller,self::$method)){
      self::$method = "home";
    }
  }

}
