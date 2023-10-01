<footer class="footer">

   <section class="grid">

      <div class="box">
         <h3>Tautan Cepat</h3>
         <a href="index.php"> <i class="fas fa-angle-right"></i> Home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> About</a>
         <a href="shop.php"> <i class="fas fa-angle-right"></i> Katalog</a>
         <a href="contact.php"> <i class="fas fa-angle-right"></i> Kontak</a>
      </div>

      <div class="box">
         <h3>tambahan</h3>
         <a href="user_login.php"> <i class="fas fa-angle-right"></i> Masuk</a>
         <a href="user_register.php"> <i class="fas fa-angle-right"></i> Daftar</a>
         <a href="cart.php"> <i class="fas fa-angle-right"></i> Keranjang</a>
         <a href="orders.php"> <i class="fas fa-angle-right"></i> Pesanan</a>
      </div>

      <div class="box">
         <h3>Hubungi kami</h3>
         <a href="tel:087876538908"><i class="fas fa-phone"></i> +62 878-7653-8908</a>
         <a href="mailto:createphoto@gmail.com"><i class="fas fa-envelope"></i> Createphoto</a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="https://www.instagram.com/createphoto.id/"><i class="fab fa-instagram"></i>instagram</a>
         <a href="https://bit.ly/3FJEGJK"><i class="fab fa-whatsapp"></i>whatsapp</a>
      </div>

   </section>

   <div class="credit">&copy; copyright <?= date('Y'); ?> by <span><a href="index.php">Createphoto</a></span></div>

</footer>


<style>
   .footer {
      background-color: var(--white);
      /* padding-bottom: 7rem; */
   }

   .footer .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
      gap: 1.5rem;
      align-items: flex-start;
   }

   .footer .grid .box h3 {
      font-size: 2rem;
      color: var(--black);
      margin-bottom: 2rem;
      text-transform: capitalize;
   }

   .footer .grid .box a {
      display: block;
      margin: 1.5rem 0;
      font-size: 1.7rem;
      color: var(--light-color);
   }

   .footer .grid .box a i {
      padding-right: 1rem;
      color: var(--main-color);
      transition: .2s linear;
   }

   .footer .grid .box a:hover {
      color: var(--main-color);
   }

   .footer .grid .box a:hover i {
      padding-right: 2rem;
   }

   .footer .credit {
      text-align: center;
      padding: 1rem 2rem;
      border-top: var(--border);
      font-size: 1.5rem;
      color: var(--black);
   }

   .footer .credit span {
      color: var(--main-color);
   }
</style>