<?php
class Customer extends ActiveRecord
{
  public $id, $name, $address, $phone,	$email;
  static $key_column = 'id';
  static $table = 'customers';



}
