<?php
class orderItem extends ActiveRecord
{
  	public $id,	$menu_id,	$order_id, $quantity,	$amount;

    static $key_column = 'id';
    static $table = 'order_items';
}
