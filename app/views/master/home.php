<section id='image_section'>
  <div class='wrapper cf'>
    <div id='image_box'>
      <p>Uz svaku porudzbinu</p>
      <p>besplatna dostava !!!</p>
      <p>007/784-55</p>
      <p>008/85-98</p>
    </div>
  </div>
</section>
<section id='menu'>
  <div class='wrapper cf'>
      <h2>Najbolje u ponudi !!!</h2>
      <?php foreach($categories as $category): ?>
          <div class='menu_item'>
            <a href='restaurant/menu/category/<?=$category->name?>'><img src='resources/img/<?=$category->image?>' alt='<?=$category->name?>'></a>
            <h3><a href=''><?=$category->name?></a></h3>
            <div><?=$category->description?></div>
          </div>
      <?php endforeach; ?>
    </div>
</section>
<section id='contact'>
  <div class='wrapper'>
    <h2>Kontaktirajte nas</h2>
    <p>Nedodjija</p>
    <p>Palih Intelektualaca bb</p>
    <p>007/784-55</p>
    <p>008/85-98</p>
 </div>
</section>
