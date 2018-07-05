<?php
class User extends ActiveRecord
{
  public $id, $name, $pass, $email, $user_status_id, $active;

  static $key_column = 'id';
  static $table = 'users';

  public static function login($n,$p){
    $name = htmlspecialchars(trim($n),ENT_QUOTES);
    $pass = md5(htmlspecialchars(trim($p),ENT_QUOTES));
    $user = self::get("where name = '{$name}' AND pass = '{$pass}' LIMIT 1");
    if(count($user) == 1){
      $user[0]->setSession();
      return $user[0];
    }else{
      return null;
    }
  }
  public static function logout(){
    Session::destroy('status');
  }
  public function setSession(){
    Session::setkey('status',$this->user_status_id);
  }


}
