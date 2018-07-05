<?php
class Category extends ActiveRecord
{
  public $id, $name, $description;
  static $key_column = 'id';
  static $table = 'categories';
}
