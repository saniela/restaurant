<section id='order'>
  <div class='wrapper'>
      <h3>Poruči: <big>&#9786;</big></h3>

      <form id='order_form' method='post' action='restaurant/processing'>
        <p id='validation_p'>Unesite svoje podatke</p>
        <p>Ime: </p>
        <input type='text' name='name'>
        <p>Adresa: </p>
        <input type='text' name='address'>
        <p>Telefon: </p>
        <input type='text' name='phone'>
        <p>E-mail: </p>
        <input type='text' name='email'>
        <p>(E-mail opciono)</p>
        <input type='submit' name='btn_submit' value='potvrdi' class='btn'>
      </form>
  </div>
</section>
