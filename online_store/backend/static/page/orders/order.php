<?php require ROOT . '/backend/static/blocks/header.php' ?>

    <h1>Корзина</h1>
    <div class="basketCont">
        <div class="totalOrder"></div>
        <div class="orderProduct">
            <table>
                <tbody id="basket-items">
                <tr class="basket_item">
                </tr>
                </tbody>
            </table>
            <div>Итого: <span class="total-price"></span> руб.</div>
            <div class="orderFormBtn"><button id="openFormButton" class="btnOrder">Заказать</button></div>
        </div>
    </div>
    <form class="order">
        <div class="order-container">
            <h1>Оформление заказа</h1>
            <label>Имя:</label>
            <input type="text" id="user" name="user" class="orderInfo" value="" required/>
            <label>Телефон:</label>
            <input type="text" id="phoneClient" name="phoneClient" class="orderInfo" required/>
            <label>Email:</label>
            <input type="text" id="emailClient" name="emailClient" class="orderInfo" value="" required/>
            <label>Адрес:</label>
            <input type="text" id="address" name="address" class="orderInfo" required/>
            <div class="orderInfo payment" id="payment">
                <label>Наличные</label><input type="checkbox" name="paymentMethod" id="paymentCash" value="cash" checked/>
                <label>Кредитная карта</label><input type="checkbox" name="paymentMethod" id="paymentCreditCard" value="creditCard" />
            </div>
            <button class="makeOrder" >Оформить заказ</button>
        </div>
    </form>
    <script src="https://unpkg.com/imask"></script>

<?php require ROOT . '/backend/static/blocks/footer.php' ?>