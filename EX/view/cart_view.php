<?php
include "header.php";
?>
<main>
    <h1>Your Cart</h1>
    <?php
        if(empty($_SESSION[$my_session]) || count($_SESSION[$my_session])===0) :
    ?>
    <p>There are no items in cart</p>
    <?php else: ?>
        <table>
            <tr id="cart_header">
                <th class="left">Item</th>
                <th class="right">Cost</th>
                <th class="right">Quantity</th>
                <th class="right">SubTotal</th>
            </tr>
            <?php
            $total=0;
            foreach($_SESSION[$my_session] as $key=>$item):
                $cost=number_format($item['cost'],2);
                $qty= $item['qty'];
                $subtotal= $cost * $qty;
                $total=$total + $subtotal;
            ?>
            <tr>
                <td>
                    <?php echo $item['name']; ?>
                </td>
                <td class="right"><?php echo $cost;?></td>
                <td class="right"><?php echo $qty;?></td>
                <td class="right"><?php echo $subtotal;?></td>
            </tr>
            <?php endforeach; ?>
            <tr id="cart_footer">
                <td colspan="3"><b>Total:</b></td>
                <td>$<?php echo $total?></td>
            </tr>
        </table>

        <br><br>
        <div class="button-container p-5">
            <form action="?actions=empty_cart" method="post">
                <input type="submit" class="btn bg-danger btn-lg text-light" value="empty-cart">
            </form>
            &nbsp;&nbsp;&nbsp;
            <form action="../construction" method="post">
                <input type="submit" class="btn bg-success btn-lg text-light" value="checkout">
            </form>
        </div>
        <?php endif; ?>
</main>
<?php
include "footer.php";
?>