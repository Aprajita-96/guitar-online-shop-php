<?php
include "header.php";
?>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<section class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-warning">Categories</h1>
                <ul>
                    <?php foreach($categories as $category):?>
                        <li>
                            <a class="h5" href="?category_id=
                                <?php echo $category['categoryID'];?>">
                                <?php echo $category['categoryName'];?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h1 class="text-warning"><?php echo $category_name?></h1>
                <ul>
                    <?php foreach($products as $product):?>
                        <li>
                            <a href="?action=view_product&amp;product_id=<?php echo $product['productID'];?>">
                                <?php echo $product['productName'];?>
                            </a>
                        </li>
                    <?php endforeach?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>