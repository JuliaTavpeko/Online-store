<form class="order">
    <div class="order-container">
        <h1>Оформление заказа</h1>
        <label>Имя:</label>
        <input type="text" id="user" name="user" class="orderInfo" value="" required/>
        <label>Телефон:</label>
        <input type="text" id="phone" name="phoneClient" class="orderInfo" required/>
        <label>Email:</label>
        <input type="text" id="email" name="emailClient" class="orderInfo" value="" required/>
        <label>Адрес:</label>
        <input type="text" id="address" name="address" class="orderInfo" required/>
        <div class="orderInfo payment" id="payment">
            <label>Наличные</label><input type="checkbox" name="paymentMethod" id="paymentCash" value="cash" checked/>
            <label>Кредитная карта</label><input type="checkbox" name="paymentMethod" id="paymentCreditCard"
                                                 value="creditCard" />
        </div>
        <button class="makeOrder" >Оформить заказ</button>
    </div>
</form>