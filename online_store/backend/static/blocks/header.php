<!DOCTYPE html>
<html lang="<?php echo $lang_code; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang['home']; ?></title>

    <link href="css/footer.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/basket/basket.css" rel="stylesheet">
    <link href="css/basket/popUpBasket.css" rel="stylesheet">
    <link href="css/catalog/product.css" rel="stylesheet">
    <link href="css/catalog/catalog.css" rel="stylesheet">
    <link href="css/contacts/contacts.css" rel="stylesheet">
    <link href="css/news/news_list.css" rel="stylesheet">
    <link href="css/news/article.css" rel="stylesheet">
    <link href="css/aboutCompany/aboutCompany.css" rel="stylesheet">
    <link href="css/order/order.css" rel="stylesheet">
    <link href="css/reviews/reviews.css" rel="stylesheet">
    <link href="css/reviews/rating.css" rel="stylesheet">
    <link href="css/table/table.css" rel="stylesheet">
    <link href="css/table/tbCharacteristics.css" rel="stylesheet">
    <link href="css/user/user.css" rel="stylesheet">
    <link href="css/user/popUpUser.css" rel="stylesheet">
    <link href="css/user/forgotPass.css" rel="stylesheet">

    <script src="js/events/block/popUp/popUpBasket.js" type="module" defer></script>
    <script src="js/events/block/popUp/popUpUser.js" type="module" defer></script>
    <script src="js/events/basket.js" type="module" defer></script>
    <script src="js/events/order.js" type="module" defer></script>
    <script src="js/events/orderSuccess.js" type="module" defer></script>
    <script src="js/events/review.js" type="module" defer></script>
    <script src="js/events/user.js" type="module" defer></script>

</head>
<header>
    <a class="logo">Mobile store</a>
    <ul class="links">
        <li><a href="store.php"><?php echo $lang['home']; ?></a></li>
        <li><a href="catalog.php"><?php echo $lang['catalog']; ?></a></li>
        <li><a href="news.php"><?php echo $lang['news']; ?></a></li>
        <li><a href="company.php"><?php echo $lang['aboutCompany']; ?></a></li>
        <li><a href="contacts.php"><?php echo $lang['contacts']; ?></a></li>
    </ul>
    <div class="header-phone">
        <div>
            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 10.375c0 0.938 0.344 1.969 0.781 3.063s1 2.125 1.438 2.906c1.188 2.063 2.719 4.094 4.469
                5.781s3.813 3.094 6.125 3.938c1.344 0.531 2.688 1.125 4.188 1.125 0.75 0 1.813-0.281 2.781-0.688 0.938-0.406
                1.781-1.031 2.094-1.781 0.125-0.281 0.281-0.656 0.375-1.094 0.094-0.406 0.156-0.813 0.156-1.094 0-0.156
                0-0.313-0.031-0.344-0.094-0.188-0.313-0.344-0.563-0.5-0.563-0.281-0.656-0.375-1.5-0.875-0.875-0.5-1.781-1.063-2.563-1.469-0.375-0.219-0.625-0.313-0.719-0.313-0.5 0-1.125
                0.688-1.656 1.438-0.563 0.75-1.188 1.438-1.625 1.438-0.219
                0-0.438-0.094-0.688-0.25s-0.5-0.281-0.656-0.375c-2.75-1.563-4.594-3.406-6.156-6.125-0.188-0.313-0.625-0.969-0.625-1.313 0-0.406
                0.563-0.875 1.125-1.375 0.531-0.469 1.094-1.031 1.094-1.719
                0-0.094-0.063-0.375-0.188-0.781-0.281-0.813-0.656-1.75-0.969-2.656-0.156-0.438-0.281-0.75-0.313-0.906-0.063-0.094-0.094-0.219-0.125-0.375s-0.094-0.281-0.125-0.406c-0.094-0.281-0.25-0.5-0.406-0.625-0.156-0.063-0.531-0.156-0.906-0.188-0.375
                0-0.813-0.031-1-0.031-0.094 0-0.219 0-0.344 0.031h-0.406c-1 0.438-1.719 1.313-2.25 2.344-0.5 1.031-0.813 2.188-0.813 3.219z"></path>
            </svg>
        </div>
        <div>
            <span>+375 (29) 333-33-33 </span>
        </div>
    </div>

    <div class="dropdown header-location">
        <div>
            <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 width="25px" height="25px" viewBox="0 0 336.643 336.643"
                 xml:space="preserve">
            <g>
                <path d="M157.618,327.478c5.908,12.226,15.501,12.22,21.397-0.012c25.299-52.481,86.896-180.42,88.812-185.743l0.324-0.886
                    c3.837-10.959,6.028-22.689,6.028-34.969C274.18,47.411,226.79,0,168.331,0C109.859,0,62.463,47.402,62.463,105.868
                    c0,8.656,1.156,17.021,3.113,25.076l0.108,0.447C68.393,142.269,131.86,274.167,157.618,327.478z M168.336,46.162
                    c32.969,0,59.691,26.751,59.691,59.712c0,32.981-26.728,59.705-59.691,59.705c-32.984,0-59.711-26.73-59.711-59.705
                    C108.631,72.913,135.352,46.162,168.336,46.162z"/>
            </g>
            </svg>
        </div>
        <div class="dropdown-menu">
            <input type="text" class="textBox" placeholder="<?php echo $lang['selectCity']; ?>" readonly>
            <div class="option">
                <div onclick="showMenu('<?php echo $lang['Minsk']; ?>')"> <?php echo $lang['Minsk']; ?></div>
                <div onclick="showMenu('<?php echo $lang['Brest']; ?>')"> <?php echo $lang['Brest']; ?></div>
                <div onclick="showMenu('<?php echo $lang['Mogilev']; ?>')"><?php echo $lang['Mogilev']; ?></div>
                <div onclick="showMenu('<?php echo $lang['Gomel']; ?>')"><?php echo $lang['Gomel']; ?></div>
                <div onclick="showMenu('<?php echo $lang['Vitebsk']; ?>')"><?php echo $lang['Vitebsk']; ?></div>
                <div onclick="showMenu('<?php echo $lang['Soligorsk']; ?>')"><?php echo $lang['Soligorsk']; ?></div>
                <div onclick="showMenu('<?php echo $lang['Mozyr']; ?>')"><?php echo $lang['Mozyr']; ?></div>
                <div onclick="showMenu('<?php echo $lang['Borisov']; ?>')"><?php echo $lang['Borisov']; ?></div>
            </div>
        </div>
    </div>

    <div class="language-switcher">
        <a href="?lang=ru">ru</a> <span>|</span> <a href="?lang=en">en</a>
    </div>

    <div style="display: flex;">
        <div class="btn_search">
            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <title>Поиск</title>
                <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91
                2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48
                0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
            </svg>
        </div>
        <div class="btn_popup">
            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <title>Личный кабинет</title>
                <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685
                6.34315 7 8 7ZM14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"/>
            </svg>
        </div>
        <div class="btn_basket">
            <svg fill="#000000" height="25px" width="25px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink"
                 viewBox="0 0 512 512"  xml:space="preserve">
                 <title>Корзина</title>
                <g>
                    <path class="st0" d="M486.998,140.232c-8.924-12.176-22.722-19.878-37.785-21.078l-311.616-24.68l-5.665-32.094
		            c-5.179-29.305-28.497-51.998-57.932-56.352l-5.662-0.845L34.65,0.185c-9.385-1.378-18.118,5.09-19.51,14.475
		            c-1.395,9.393,5.086,18.127,14.471,19.514v-0.008l39.357,5.834l0.009,0.026c14.788,2.164,26.526,13.586,29.131,28.324
		            l53.338,302.302c5.005,28.375,29.647,49.047,58.461,49.056h219.192c9.49,0,17.176-7.694,17.176-17.172
		            c0-9.486-7.686-17.18-17.176-17.18H209.906c-12.133,0.009-22.536-8.725-24.642-20.672l-7.461-42.299h244.342
		            c24.189,0,45.174-16.691,50.606-40.262l22.967-99.523C499.118,167.887,495.93,152.424,486.998,140.232z"/>
                    <path class="st0" d="M223.012,438.122c-20.402,0-36.935,16.554-36.935,36.948c0,20.394,16.533,36.931,36.935,36.931
		            c20.401,0,36.944-16.537,36.944-36.931C259.955,454.676,243.413,438.122,223.012,438.122z"/>
                    <path class="st0" d="M387.124,438.122c-20.406,0-36.935,16.554-36.935,36.948c0,20.394,16.529,36.931,36.935,36.931
		            c20.402,0,36.944-16.537,36.944-36.931C424.068,454.676,407.526,438.122,387.124,438.122z"/>
                </g>
            </svg>
        </div>
    </div>
    <?php require ROOT . '/backend/static/blocks/SMIcons/leftside_fixed.php' ?>
</header>
<script src="js/header.js"></script>
<script src="js/footer.js"></script>
<body>
<div class="main">
<?php require ROOT . '/backend/static/blocks/popUps/popUpUser.php' ?>
<?php require ROOT . '/backend/static/blocks/popUps/popUpBasket.php' ?>