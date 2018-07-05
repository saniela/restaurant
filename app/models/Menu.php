<?php
class Menu extends ActiveRecord
{
  public $id, $name, $ingredients, $price, $image, $category_id, $active;
  static $key_column = 'id';
  static $table = 'menu';
}
