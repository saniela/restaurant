<section id='menu_category'>
  <div class='wrapper cf'>
    <?php foreach($menu as $m): ?>
        <div class='category_item cf'>
          <div class='category_item_main'>
            <h3><?=$m->name?></h3>
            <p>Sastojci: <?=$m->ingredients?></p>
            <p><?=$m->price?> RSD</p>
            <form method='post' action='restaurant/basket'>
                Količina:
                <input type='number' name='quantity' placeholder='0'>
                <input type='hidden' name='menu_id' value='<?=$m->id?>'>
                <input type='submit' name='btn_submit' value='poruči' class='btn'>
            </form>
          </div>
          <div class='category_item_img'><img src='resources/img/<?=$m->image?>' alt='<?=$m->name?>'></div>
        </div>
      <?php endforeach; ?>
    </div>
</section>
