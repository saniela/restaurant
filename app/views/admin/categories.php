<section>
  <div class="wrapper">
    <a href='admin/logout' class='btn'>LOGOUT</a>
    <a href='admin/dashboard' class='btn'>dashboard</a>
    <p>Select category: </p>
    <select name="select_category" onchange="window.location.href='admin/categories/cat/'+this.value">
      <option selected>Select category</option>
    <?php foreach($all_categories as $cat): ?>
      <option value='<?=$cat->id?>'><?=$cat->name?></option>
    <?php endforeach; ?>
    </select>
    <form method='post' action='admin/categories' enctype="multipart/form-data">
      <p>Category: </p>
      <input type='text' name='category' value='<?=$category->name?>'>
      <p>Description</p>
      <textarea name="description"><?=$category->description?></textarea>
      <p>Image</p>
      <img src='resources/img/<?=$category->image?>' class='admin_img'>
      <input type='file' name='image'><br><br>
      <input type='hidden' name='img' value='<?=$category->image?>'>
      <input type='hidden' name='cat_id' value='<?=$category->id?>'>
      <input type='submit' name='btn_insert' value='insert'>
      <input type='submit' name='btn_update' value='update'>
      <input type='submit' name='btn_delete' value='delete'>
    </form>
  </div>
</section>
<script>
			CKEDITOR.replace( 'description' );
</script>
