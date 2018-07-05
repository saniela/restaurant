<section>
  <div class='wrapper'>
    <a href='admin/logout' class='btn'>LOGOUT</a>
    <a href='admin/dashboard' class='btn'>dashboard</a>
    <p>Order details: </p>
    <div class='admin_order_item'>
      <p>Mušterija: <?=$customer->name?>&nbsp;&nbsp; <?=$customer->address?>&nbsp;&nbsp; <?=$customer->phone?></p>
        <hr>
      <ul>
      <?php foreach($order_items as $order_item): ?>
        <li><?=$order_item->name?>, Kolicina: <?=$order_item->quantity?>, Iznos: <?=$order_item->amount?></li>
      <?php endforeach; ?>
    </ul>
      <p>Ukupan iznos: <?=$total_amount?></p>
   </div>
    <p>Select order:</p>
    <?php foreach($orders as $order):  ?>
        <p><a href='admin/orders/id/<?=$order->id?>'><?=$order->order_time?></a>&nbsp;&nbsp;<a href='admin/orders/remove/<?=$order->id?>' class='basket_item_del'>&#10007;</a></p>
    <?php endforeach; ?>
  </div>
</section>
