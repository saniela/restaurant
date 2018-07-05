<?php
class Session
{
  public static function start(){
    if(!isset($_SESSION)){
    session_start();
   }
  }
  public static function setKey($k,$v){
    self::start();
    $_SESSION[$k] = $v;

  }
  public static function getKey($k,$default=null){
      self::start();
      if(!isset($_SESSION[$k])){
        return $default;
      }else {
         return $_SESSION[$k];
     }
  }
  /*public static function getKey($k, $k1 = null){
    self::start();
    if(!isset($_SESSION[$k])){
      return null;
    }else{
      if($k !== null){
        if(isset($_SESSION[$k][$k1])){
          return $_SESSION[$k][$k1];
        }else{
          return null;
        }
      }else{
        return $_SESSION[$k];
      }
   }
  }
  public static function setKey($k, $k1 = null, $v){
    self::start();
    if($k1 === null){
      $_SESSION[$k] = $v;
     }else $_SESSION[$k][$k1] = $v ;
  }*/

  public static function destroy($k){
    self::start();
    if(isset($_SESSION[$k])){
      unset($_SESSION[$k]);
    }
    session_destroy();
  }

}
