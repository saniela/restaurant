<section id='basket'>
  <div class='wrapper'>
    <h2>Vaša korpa</h2>
<?php foreach($basket as $basket_item): ?>
     <div class='basket_item'>
       <h4><?=$basket_item->name?> &nbsp;&nbsp;<a href="restaurant/basket/remove/<?=$basket_item->id?>" class='basket_item_del'>&#10007;</a></h4>
       <p>cena: <?=$basket_item->price?> RSD</p>
       <p>komada: <?=$basket_item->quantity?> </p>
       <p>ukupno: <?=$basket_item->amount?>  RSD</p>
     </div>
<?php endforeach; ?>
   <p id='total'>Ukupno za naplatu: <?=$total?> RSD</p>
   <a href='restaurant/order' class='btn'>Potvrdi kupovinu</a>
 </div>
</section>
