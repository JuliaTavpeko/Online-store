<?php require ROOT . '/backend/static/blocks/header.php' ?>

    <div class="basketCont">
        <h1>Корзина</h1>
        <div class="totalOrder block-with-shadow"></div>
        <div class="orderProduct block-with-shadow">
            <table>
                <tbody class="basket-items" id="basket-items">
                <tr class="basket_item"></tr>
                </tbody>
            </table>
            <div>Итого: <span class="total-price"></span> руб.</div>
            <div class="orderFormBtn"><button id="openFormButton" class="btnOrder">Заказать</button></div>
        </div>
    </div>
    <?php require ROOT . '/backend/static/forms/orderForm.php' ?>
    <script src="https://unpkg.com/imask"></script>

<?php require ROOT . '/backend/static/blocks/footer.php' ?>