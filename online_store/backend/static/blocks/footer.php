    <div class="btn-up" onclick="scrollTopTop()">
        <svg width="50px" height="50px" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 22.4199C17.5228 22.4199 22 17.9428 22 12.4199C22 6.89707 17.5228 2.41992 12 2.41992C6.47715 2.41992 2
            6.89707 2 12.4199C2 17.9428 6.47715 22.4199 12 22.4199Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M8 13.8599L10.87 10.8C11.0125 10.6416 11.1868 10.5149 11.3815 10.4282C11.5761 10.3415 11.7869 10.2966 12
            10.2966C12.2131 10.2966 12.4239 10.3415 12.6185 10.4282C12.8132 10.5149 12.9875 10.6416 13.13 10.8L16 13.8599"
                  stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
</div>
<footer>
    <div class="footer">
        <div class="footer__menu">
            <ul class="footer__menu-list">
                <li class="footer__menu-link"><a href="store.php"><?php echo $lang['home']; ?></a></li>
                <li class="footer__menu-link"><a href="catalog.php"><?php echo $lang['catalog']; ?></a></li>
                <li class="footer__menu-link"><a href="news.php"><?php echo $lang['news']; ?></a></li>
            </ul>
            <ul class="footer__menu-list">
                <li class="footer__menu-link"><a href="company.php"><?php echo $lang['aboutCompany']; ?></a></li>
                <li class="footer__menu-link"><a href="contacts.php"><?php echo $lang['contacts']; ?></a></li>
            </ul>
        </div>
        <div class="footer__contacts">
            <div class="footer-contacts-links">
                <span><?php echo $lang['contacts']; ?>:</span>
                <a>+375 (29) 333-33-33</a>
                <a>mobilestore@gmail.com</a>
            </div>
            <div class="footer-contacts-address">
                <span><?php echo $lang['office']; ?>:</span>
                <span>
                    <?php echo $lang['officeAddress']; ?>
                </span>
            </div>
        </div>
        <?php require ROOT . '/backend/static/blocks/SMIcons/footer.php' ?>
    </div>

    <div class="footer__info">
        <a class="footer__info-privacy_policy" href=""><?php echo $lang['privacyPolicy']; ?></a>
        <span style="color: #fff;"><?php echo $lang['siteDevelop']; ?>: с любовью :)</span>
    </div>

</footer>
</body>
</html>