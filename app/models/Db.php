<?php
class Db
{
  public static $conn;
  public static function getConnection(){
    if(!self::$conn){
      self::$conn = new PDO(DSN,USER,PASS);
    }
    return self::$conn;
  }
}
