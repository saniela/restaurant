<section>
  <div class='wrapper'>
    <a href='admin/logout' class='btn'>LOGOUT</a>
    <a href='admin/dashboard' class='btn'>dashboard</a>
    <p>Select category: </p>
    <select name='category' onchange="window.location.href = 'admin/menu/cat/' + this.value">
      <option selected>Select category</option>
      <?php foreach($all_categories as $cat): ?>
        <option value='<?=$cat->id?>'><?=$cat->name?></option>
      <?php endforeach; ?>
    </select>
    <p>Select menu item</p>
    <select  name='menu' onchange="window.location.href = 'admin/menu/item/' + this.value">
      <option selected>Select item</option>
      <?php foreach($menu as $m): ?>
        <option value='<?=$m->id?>'><?=$m->name?></option>
      <?php endforeach; ?>
    </select>

    <form action='admin/menu' method='post' enctype='multipart/form-data'>
    <p>Name: </p>
    <input type='text' name='item_name' value='<?=$menu_item->name?>'>
    <p>Ingredients: (sastojke odvajati zarezom) </p>
    <input type='text' name='item_ingredients' value='<?=$menu_item->ingredients?>'>
    <p>Price: (koristiti tačku i dve decimale) </p>
    <input type='text' name='item_price' value='<?=$menu_item->price?>'>
    <p>Image: </p>
    <img src='resources/img/<?=$menu_item->image?>' alt='<?=$menu_item->image?>' class='admin_img'><br><br>
    <input type='file' name='item_img'>
    <p>Category: </p>
    <select name='item_cat'>
      <?php foreach ($all_categories as $cat):
           $selected = ($cat->id === $menu_item->category_id) ? 'selected' : '';
      ?>
            <option value='<?=$cat->id?>' <?=$selected?>><?=$cat->name?></option>
      <?php endforeach; ?>
    </select>
    <p>Active: </p>
    <select name='item_active'>
      <option <?=($menu_item->active == 0)?'selected':''?>>0</option>
      <option <?=($menu_item->active == 1)?'selected':''?>>1</option>
    </select><br><br>
    <input type='hidden' name='item_image' value='<?=$menu_item->image?>'>
    <input type='hidden' name='item_id' value='<?=$menu_item->id?>'>
    <input type='submit' name='btn_insert' value='insert'>
    <input type='submit' name='btn_update' value='update'>
    <input type='submit' name='btn_delete' value='delete'>
    </form>

  </div>
</section>
