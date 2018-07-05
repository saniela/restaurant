<?php
class adminController extends adminBaseController
{
  public function home(){
    $var = null;
    $token = md5(microtime() . time() . uniqid());
    Session::setKey('token',$token);
    $var = array('token'=>$token);
    try{
      $this->getView('home',$var);
    }catch(Exception $e){
      $this->error();
    }

  }

  public function login(){
    $var =null;
    if(isset($_POST['token']) && Session::getKey('token') != null && Session::getKey('token') == $_POST['token']){
      if(isset($_POST['btn_submit'])){
        if(!empty($_POST['uname']) && !empty($_POST['pass'])){

          $user = User::login($_POST['uname'],$_POST['pass']);
          if($user){
            if($user->user_status_id == 2){
              try{
                $this->dashboard();
              }catch(Exception $e){
                $this->error();
              }
            }
          }else $this->home();

        }else $this->home();

      }else $this->home();

  }else $this->home();

}

  public function dashboard(){
    $var = null;
    if(Session::getKey('status') == 2){
      try{
        $this->getView('dashboard',$var);
      }catch(Exception $e){
        $this->error();
       }

    }else $this->home();
  }

  public function logout(){
    User::logout();
    $this->home();
  }

  public function categories(){
    $var = null;
    $category = new Category;

      //get selected category
    if(isset($_GET['cat']) && is_numeric($_GET['cat'])){
      $c = $_GET['cat'];
      $category = (Category::getById($c) !== null) ? Category::getById($c) : new Category;
    }
     //insert or update category
    if(isset($_POST['btn_insert']) || isset($_POST['btn_update'])){
      if(!empty($_POST['category']) && !empty($_POST['description'])){
        $c = $_POST['category'];
        $d = $_POST['description'];
        $cat = new Category();
        if(isset($_FILES['image'])){
          move_uploaded_file($_FILES['image']['tmp_name'],'resources/img/'.$_FILES['image']['name']);
          $cat->image = $_FILES['image']['name'];
        }
        if(empty($_FILES['image']['tmp_name'])){
          $cat->image = $_POST['img'];
        }

        $cat->name = $c;
        $cat->description = $d;
        if(isset($_POST['btn_insert'])){
          $cat->insert();
        }else {
          $cat_id = $_POST['cat_id'];
          $cat->update($cat_id);
        }

      }
    }
     //delete category
    if(isset($_POST['btn_delete'])){
      $cat_id = $_POST['cat_id'];
      Category::delete($cat_id);
    }
     //get all categories
    $all_categories = Category::get();

    $var = array('all_categories'=>$all_categories,'category'=>$category);
    if(Session::getKey('status') == 2){
      try{
        $this->getView('categories',$var);
      }catch(Exception $e){
        $this->home();
      }
   }
  }

  public function menu(){
    $var = null;
    $menu = null;
    $menu_item = new Menu();
      //get menu from selceted category
    if(isset($_GET['cat']) && is_numeric($_GET['cat'])){
      $cat = $_GET['cat'];
      $menu = Menu::get("where category_id = '{$cat}'");
    }

     //get selected $menu_item
    if(isset($_GET['item']) && is_numeric($_GET['item'])){
      $m = $_GET['item'];
      $menu_item = (Menu::getById($m) !=null ) ? Menu::getById($m) : new Menu();
    }
     //insert or update menu_item
    if(isset($_POST['btn_insert']) || isset($_POST['btn_update'])){
      if(!empty($_POST['item_name']) && !empty($_POST['item_ingredients']) && !empty($_POST['item_price'])){
        $m = new Menu();
        $m->name = $_POST['item_name'];
        $m->ingredients = $_POST['item_ingredients'];
        $m->price = $_POST['item_price'];
        $m->category_id = $_POST['item_cat'];
        $m->active = $_POST['item_active'];
        if(isset($_FILES['item_img'])){
          move_uploaded_file($_FILES['item_img']['tmp_name'],'resources/img/'.$_FILES['item_img']['name']);
          $m->image = $_FILES['item_img']['name'];
          if(empty($_FILES['item_img']['tmp_name'])){
            $m->image = $_POST['item_image'];
          }
        }
        if(isset($_POST['btn_insert'])){
          $m->insert();
        }else{
          $id = $_POST['item_id'];
          $m->update($id);
        }
      }
    }
       //delete menu_item
    if(isset($_POST['btn_delete'])){
      $id = $_POST['item_id'];
      Menu::delete($id);
    }

      //get all categories
    $all_categories = Category::get();
    $var = array('all_categories'=>$all_categories,'menu'=>$menu,'menu_item'=>$menu_item);
    if(Session::getKey('status') == 2){
      try{
        $this->getView('menu',$var);
      }catch(Exception $e){
        $this->home();
      }
    }
  }

  public function orders(){
    $var = null;
    $order_items = [];
    $customer = new Customer;
    $total_amount = 0;
    $orders= null;
      //get all order_items and customer
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
      $order_id = $_GET['id'];
      $order = Order::getById($order_id);
      $total_amount = $order->total_amount;
      $custumer_id = $order->customer_id;
      $customer = Customer::getById($custumer_id);
      $order_items = orderView::get("where order_id = {$order_id}");

    }
     //inactivate order
    if(isset($_GET['remove'])){
      $remove_id = $_GET['remove'];
      $o = Order::getById($remove_id);/*activerecord je podesen tako da update 'zahteva' sva polja objekta*/
      $o->active = 0;
      $o->update($remove_id);
    }
     //get all active orders
    $orders = Order::get("where active = 1 order by order_time desc");
    $var = array('orders'=>$orders,'order_items'=>$order_items,'customer'=>$customer,'total_amount'=>$total_amount);
    if(Session::getKey('status') == 2){
      try{
        $this->getView('orders',$var);
      }catch(Exception $e){
        $this->home();
      }
    }
  }
}
