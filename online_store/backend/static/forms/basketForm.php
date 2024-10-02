<form class="formBasket">
    <h3 class="title-basket"><?php echo $lang['cart']; ?></h3>
    <div class="table-container">
        <table class="basket">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th><?php echo $lang['title']; ?></th>
                <th><?php echo $lang['cost']; ?></th>
                <th><?php echo $lang['quantity']; ?></th>
                <th><?php echo $lang['total']; ?></th>
            </tr>
            </thead>
            <tbody class="basket-items" id="basket-items">
            <tr class="basket_item"></tr>
            </tbody>
        </table>
    </div>
    <div><?php echo $lang['totalAmount']; ?>: <span class="total-price"></span> руб.</div>
    <input class="btnOrder" type="submit" value="<?php echo $lang['order']; ?>">
</form>