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
                <h1 class="pb-3"><?php echo $category_name;?></h1>
                <table class="table table-striped">
                    <thead class="bg-primary text-white h4">
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <?php foreach($products as $product):?>
                        <tr>
                            <td class="h5"><?php echo $product['productCode'];?></td>
                            <td class="h5"><?php echo $product['productName'];?></td>
                            <td class="h5"><?php echo $product['listPrice'];?></td>
                            <td><form action="product_manager.php" method="post">
                                <input type="hidden" name="action" value="delete_product">
                                <input type="hidden" name="product_id" 
                                        value="<?php echo $product['productID'];?>">
                                <input type="hidden" name="category_id" 
                                        value="<?php echo $product['categoryID'];?>">
                                <input  id="submit" type="submit" value="Delete"
                                    class="btn btn-danger text-light">
                            </form></td>
                        </tr>
                    <?php endforeach;?>
                </table>
                <p>
                    <a href="?action=show_add_form" class="h5">Add Product</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';