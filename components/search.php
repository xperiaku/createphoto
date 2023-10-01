<?php

if (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
    $search_box = $_POST['search_box'];

    $category = '';
    if (
        strpos(strtolower($search_box), 'video') !== false ||
        strpos(strtolower($search_box), 'video landscape') !== false ||
        strpos(strtolower($search_box), 'video horizontal') !== false ||
        strpos(strtolower($search_box), 'video 16:9') !== false ||
        strpos(strtolower($search_box), 'landscape') !== false ||
        strpos(strtolower($search_box), 'horizontal') !== false ||
        strpos(strtolower($search_box), '16:9') !== false
    ) {
        $category = '1,2'; // set category value to include both category 1 and 2
    } else if (
        strpos(strtolower($search_box), 'video potrait') !== false ||
        strpos(strtolower($search_box), 'video 9:16') !== false ||
        strpos(strtolower($search_box), 'video vertical') !== false ||
        strpos(strtolower($search_box), 'vertical') !== false ||
        strpos(strtolower($search_box), 'potrait') !== false ||
        strpos(strtolower($search_box), '9:16') !== false
    ) {
        $category = '2,3';
    } else if (
        strpos(strtolower($search_box), 'foto') !== false ||
        strpos(strtolower($search_box), 'foto potrait') !== false ||
        strpos(strtolower($search_box), 'foto vertical') !== false ||
        strpos(strtolower($search_box), 'foto 9:16') !== false ||
        strpos(strtolower($search_box), 'potrait') !== false ||
        strpos(strtolower($search_box), 'vertical') !== false ||
        strpos(strtolower($search_box), '9:16') !== false
    ) {
        $category = '3';
    }

    $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$search_box}%'");

    if ($category != '') {
        $category_array = explode(',', $category);
        $category_string = implode(',', array_map('intval', $category_array));
        $select_products = $conn->prepare("SELECT * FROM `products` WHERE category IN ({$category_string})");
    }

    $select_products->execute();

    if ($select_products->rowCount() > 0) {
        while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
?>
            <form action="" method="post" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
                <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
                <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
                <div class="name"><?= $fetch_product['name']; ?></div>
                <?php
                if ($fetch_product['category'] == 1) {
                    echo "Video Landscape";
                } else if ($fetch_product['category'] == 2) {
                    echo "Video Potrait";
                } else if ($fetch_product['category'] == 3) {
                    echo "Foto Potrait";
                } else {
                    echo "Kategori tidak ditemukan";
                }
                ?>
                <div class="flex">
                    <div class="price"><span>Rp</span><?= number_format(($fetch_product['price']), 0, ',', '.'); ?><span>,-</span></div>
                    <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                </div>
                <div class="flex-btn">
                    <input type="button" value="Preview" class="btn option-btn" onclick="window.open('<?= $fetch_product['link']; ?>', '_blank')">
                    <input type="submit" value="Keranjang" class="btn" name="add_to_cart">
                </div>
            </form>
<?php
        }
    } else {
        echo '<p class="empty">tidak ada produk ditemukan!</p>';
    }
} ?>