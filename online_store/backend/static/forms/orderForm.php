<form class="order">
    <div class="order-container">
        <h1><?php echo $lang['checkout']; ?></h1>
        <label><?php echo $lang['name']; ?>:</label>
        <input type="text" id="user" name="user" class="orderInfo" value="" required/>
        <label><?php echo $lang['phone']; ?>:</label>
        <input type="text" id="phone" name="phoneClient" class="orderInfo" required/>
        <label><?php echo $lang['email']; ?>:</label>
        <input type="text" id="email" name="emailClient" class="orderInfo" value="" required/>
        <label><?php echo $lang['address']; ?>:</label>
        <input type="text" id="address" name="address" class="orderInfo" required/>
        <div class="orderInfo payment" id="payment">
            <label><?php echo $lang['cash']; ?></label><input type="checkbox" name="paymentMethod" id="paymentCash" value="cash" checked/>
            <label><?php echo $lang['creditCard']; ?></label><input type="checkbox" name="paymentMethod" id="paymentCreditCard"
                                                 value="creditCard" />
        </div>
        <button class="makeOrder" ><?php echo $lang['placeOrder']; ?></button>
    </div>
</form>