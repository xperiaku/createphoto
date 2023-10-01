<?php

session_start();


include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
};

if (isset($_POST['add_product'])) {

   $link = $_POST['link'];
   $link = filter_var($link, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/' . $image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = '../uploaded_img/' . $image_02;

   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = '../uploaded_img/' . $image_03;

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if ($select_products->rowCount() > 0) {
      $message[] = 'nama produk sudah ada!';
   } else {

      $insert_products = $conn->prepare("INSERT INTO `products`(link, name, category, details, price, image_01, image_02, image_03) VALUES(?,?,?,?,?,?,?,?)");
      $insert_products->execute([$link, $name, $category, $details, $price, $image_01, $image_02, $image_03]);

      if ($insert_products) {
         if ($image_size_01 > 2000000 or $image_size_02 > 2000000 or $image_size_03 > 2000000) {
            $message[] = 'Gambar Terlalu Besar!';
         } else {
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            move_uploaded_file($image_tmp_name_03, $image_folder_03);
            $message[] = 'Produk baru ditambahkan!';
         }
      }
   }
};

if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/' . $fetch_delete_image['image_01']);
   unlink('../uploaded_img/' . $fetch_delete_image['image_02']);
   unlink('../uploaded_img/' . $fetch_delete_image['image_03']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:products.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Produk</title>

   <!-- Icon -->
   <link href="../images/fav.png" rel="icon">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>

   <section class="add-products">

      <h1 class="heading">tambahkan produk</h1>

      <form action="" method="post" enctype="multipart/form-data">
         <div class="flex">
            <div class="inputBox">
               <span>nama produk *</span>
               <input type="text" class="box" required maxlength="100" placeholder="masukkan nama produk" name="name">
            </div>
            <div class="inputBox">
               <span>kategori *</span>
               <select type="category" name="category" class="box" required>
                  <option value="">Pilih Kategori</option>
                  <option value="1">Video Landscape</option>
                  <option value="2">Video Potrait</option>
                  <option value="3">Foto Potrait</option>
               </select>
            </div>

            <div class="inputBox">
               <span>harga *</span>
               <input type="number" min="0" class="box" required max="9999999999" placeholder="masukkan harga" onkeypress="if(this.value.length == 10) return false;" name="price">
            </div>
            <div class="inputBox">
               <span>gambar 01 *</span>
               <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>
            <div class="inputBox">
               <span>gambar 02 *</span>
               <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>
            <div class="inputBox">
               <span>gambar 03 *</span>
               <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>
            <div class="inputBox">
               <span>link Undangan</span>
               <input type="text" class="box" required maxlength="100" placeholder="masukkan link video" name="link">
            </div>
            <div>
               <span>detail undangan *</span>
               <textarea name="details" placeholder="masukkan detail produk" class="box" required maxlength="5000" cols="55" style="height: 150px;"></textarea>
            </div>
         </div>
         <div class="flex-btn">
            <a href="index.php" class="option-btn">Kembali</a>
            <input type="submit" value="Tambahkan" class="btn" name="add_product">
         </div>
      </form>

   </section>

   <section class="show-products">

      <h1 class="heading">Produk</h1>

      <div class="box-container">

         <?php
         $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY `id` DESC");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <div class="box">
                  <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
                  <div class="name"><?= $fetch_products['name']; ?></div>
                  <div class="category">
                     <span>
                        <?php
                        if ($fetch_products['category'] == "1") {
                           echo "Video Landscape";
                        } elseif ($fetch_products['category'] == "2") {
                           echo "Video Potrait";
                        } elseif ($fetch_products['category'] == "3") {
                           echo "Foto Potrait";
                        } else {
                           echo "Kategori tidak ditemukan";
                        }
                        ?>
                     </span>
                  </div>
                  <div class="price">Rp<span><?= number_format(($fetch_products['price']), 0, ',', '.'); ?></span>,-</div>
                  <div class="details"><span><?= substr($fetch_products['details'], 0, 80) . '   . . . . . .'; ?></span></div>
                  <div class="flex-btn">
                     <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Hapus produk ini?');">Hapus</a>
                     <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="btn">Edit</a>
                  </div>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">Tidak ada produk!</p>';
         }
         ?>

      </div>

   </section>




   <script src="../js/admin_script.js"></script>

</body>

</html>