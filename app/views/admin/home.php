<section>
  <div class='wrapper'>
    <form id='login_form' method='post' action='admin/login'>
      <p>Username: </p>
      <input type='text' name='uname'>
      <p>Password: </p>
      <input type='text' name='pass'><br><br>
      <input type='submit' name='btn_submit' value='login'>
      <input type='hidden' name='token' value='<?=$token?>'>
    </form>
  </div>
</section>
