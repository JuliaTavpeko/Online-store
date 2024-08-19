<header>
    <div class="container">

        <img src="image/png/logo.png" width="80" height="80" alt="imglogo">
        <a style="font-size:20px ">Mobile store</a>

        <ul class="links">
            <li><a class="link-box" href="store.php">Главная</a></li>
            <li><a class="link-box" href="catalog.php">Каталог</a></li>
            <li><a class="link-box" href="news.php">Новости</a></li>
            <li><a class="link-box" href="company.php">О компании</a></li>
            <li><a class="link-box" href="contacts.php">Контакты</a></li>
        </ul>

        <div class="child-container">
            <form>
                <label for="city"><small>Выбрать город:</small>
                    <select size="1">
                        <option value="Минск">Минск</option>
                        <option value="Брест">Брест</option>
                        <option value="Могилёв">Могилёв</option>
                        <option value="Гомель">Гомель</option>
                        <option value="Витебск">Витебск</option>
                        <option value="Солигорск">Солигорск</option>
                        <option value="Мозырь">Мозырь</option>
                        <option value="Борисов">Борисов</option>
                    </select>
                </label>
            </form>
            <div>
                <small>Телефон:</small> <span>+375 (29) 333-33-33 </span>
            </div>

            <form>
                <input type="text" id="text-to-search" >
                <button type="button" onclick="search_item()">Search</button>
            </form>
        </div>

        <div class="btn_popup">
            <a href="#" id="user_popup"><img src="image/png/icon/icons8-пользователь-96.png" alt="user_icon" width="65%" height="65%"></a>
            <p class="user-cab">Личный кабинет</p>
        </div>
        <div class="btn_basket">
            <a href="#" id="basket_popup"><img src="image/png/icon/icons8-корзина-2-64.png" alt="basket_popup" width="65%" height="65%"></a>
            <p>Корзина</p>
        </div>

    </div>
</header>