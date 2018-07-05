<div id='top'>
  <!--scroll to top-->
  <a href='as' class='btn scroll' id='top_a'>top</a>
</div>
</main><!--end of main-->
<footer id='footer'><!--footer-->
  <div class='wrapper'>
    <div class='category'>
      <?php foreach($categories as $category): ?>
        <ul>
          <li><a href='restaurant/menu/category/<?=$category->name?>'><?=$category->name?></a></li>
        </ul>
      <?php endforeach; ?>
    </div>
     <div id='cr'>Copyright &copy; <?=date("Y")?> alternarija</div>
  </div>
</footer><!--end of footer-->
</body>
</html>
