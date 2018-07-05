<?php
class restaurantController extends baseController
{
  public function home(){
    $var = null;
    $categories = Category::get();
    $var = array('categories' => $categories); //variable for view
    try{
      $this->getView('home',$var);

    }catch(Exception $e){
      $this->error();

    }
  }

  public function menu(){
    $var = null;
    $cat = (isset($_GET['category'])) ? htmlspecialchars(trim($_GET['category']),ENT_QUOTES) : 'pizza';
    $cat = Category::get("where name = '" . $cat. "'");

    $menu = Menu::get("where category_id = {$cat[0]->id}");

    //$cat = (isset($_GET['category']) && is_numeric($_GET['category'])) ? $_GET['category'] : 1;
    //$menu = Menu::get("where category_id = {$cat}");
    $categories = Category::get();
    $var = array('menu'=>$menu,'categories'=>$categories);
    try{
      $this->getView('menu',$var);
    }catch(Exception $e){
      $this->home();

    }
  }

  public function basket(){
    $var = null;
    $total = 0;
    $basket = array();

      //insert into basket
    if(isset($_POST['btn_submit'])){
      if(isset($_POST['menu_id']) && is_numeric($_POST['menu_id']) && isset($_POST['quantity']) && is_numeric($_POST['quantity'])){

        $menu_id = $_POST['menu_id'];
        $quantity = $_POST['quantity'];
        if(Session::getKey('basket') != null){
          if(isset($_SESSION['basket'][$menu_id])){
            $_SESSION['basket'][$menu_id] += $quantity;
          }else {
            $_SESSION['basket'][$menu_id] = $quantity;
        }
      }else{
         Session::setKey('basket',array($menu_id=>$quantity));
       }
     }
   }

        //remove  from basket
    if(isset($_GET['remove']) && is_numeric($_GET['remove'])) {
      $id = $_GET['remove'];
      Session::start();
       unset($_SESSION['basket'][$id]);
    }

       //select all from basket
    if(Session::getKey('basket') != null){
      foreach(Session::getKey('basket') as $item=>$quantity){
        if($quantity > 0){
         $basket_item= Menu::getById($item);
         //add quantity property to object
         $basket_item->quantity = $quantity;
         //amount per item
         $item_amount = $basket_item->price * $quantity;
         $item_amount_format = number_format($item_amount,2,"."," ");
         //add amount property to object
         $basket_item->amount = $item_amount_format;
         //total amount
         $total += $item_amount;
         $basket[] = $basket_item;
      }
    }
}

    $total = number_format($total,2,"."," ");

    $categories = Category::get();

    $var = array('basket'=>$basket,'total'=>$total,'categories'=>$categories);
    try{
      $this->getView('basket',$var);
    }catch(Exception $e){
      $this->home();
    }
}

  public function order(){
    $var=null;
    $categories = Category::get();
    $var = array('categories'=>$categories);
    try{
      $this->getView('order',$var);
    }catch(Exception $e){
      $this->home();
       }

   }

   public function processing(){
     $var = null;
     $mail = false;
     if(isset($_POST['btn_submit'])){
          //insert customer
        if(!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['phone']) && Session::getKey('basket') != null){
          $name = htmlspecialchars(trim($_POST['name']),ENT_QUOTES);
          $address = htmlspecialchars(trim($_POST['address']),ENT_QUOTES);
          $phone = htmlspecialchars(trim($_POST['phone']),ENT_QUOTES);
          $email = htmlspecialchars(trim($_POST['email']),ENT_QUOTES);

            //insert customer
          $customer = new Customer;
          $customer->name = $name;
          $customer->address = $address;
          $customer->phone = $phone;
          $customer->email = $email;
          $customer->insert();
          // customer lastInsertId
          $customer_id = $customer->id;

          // insert order
          $order = new Order;
          $order->customer_id = $customer_id;
          $order->active = 1;
          $order->total_amount = 0;
          $order->insert();
            // order lastInsertId
          $order_id = $order->id;
          $total_amount = 0;
             //insert order_item
          foreach(Session::getKey('basket') as $item=>$quantity){
              $menu_item = Menu::getById($item);
              $order_item = new orderItem;
              $order_item->menu_id = $menu_item->id;
              $order_item->order_id = $order_id;
              $order_item->quantity = $quantity;
              $order_item->amount = $menu_item->price * $quantity;
              $order_item->insert();
              $total_amount += $order_item->amount;
         }
            //update order with total_amount
          $o = Order::getById($order_id);
          $o->total_amount = $total_amount;
          $o->update($order_id);
       }
            //send mail about order
         //$mail = Mail::send("alternarija@hotmail.com","porudzbina","imate novu porudzbinu");

            //empty basket
         Session::destroy('basket');

         $categories = Category::get();

         $var = array('mail'=>$mail,'categories'=>$categories);


       try{
            $this->getView('confirmation',$var);
          }catch(Exception $e){
            $this->home();
          }
      }
   }


}
