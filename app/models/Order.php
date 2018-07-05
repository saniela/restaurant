<?php
class Order extends ActiveRecord
{
  public $id, $customer_id, $active, $total_amount;

  static $key_column = 'id';
  static $table = 'orders';
}
