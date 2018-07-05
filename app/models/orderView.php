<?php
class orderView extends ActiveRecord
{
  public $name, $order_id, $quantity, $amount;
  static $table = 'order_view';
  static $key_column = 'id';
}
