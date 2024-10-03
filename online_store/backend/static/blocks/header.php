<!DOCTYPE html>
<html lang="<?php echo $lang_code; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang['home']; ?></title>

    <link href="css/footer.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/basket/basket.css" rel="stylesheet">
    <link href="css/basket/popUpBasket.css" rel="stylesheet">
    <link href="css/catalog/product.css" rel="stylesheet">
    <link href="css/catalog/catalog.css" rel="stylesheet">
    <link href="css/news/news_list.css" rel="stylesheet">
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
                <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91
                2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48
                0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
            </svg>
        </div>
        <div class="btn_popup">
            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685
                6.34315 7 8 7ZM14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"/>
            </svg>
        </div>
        <div class="btn_basket">
            <svg fill="#000000" height="25px" width="25px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink"
                 viewBox="0 0 512 512"  xml:space="preserve">
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
    <div class="rightside-sm-icons">
        <a>
            <svg fill="#000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve">
                <g>
                    <polygon points="78.9,450.3 162.7,401.1 78.9,351.9 	"/>
                    <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M241,446.8L241,446.8
                        c0,44.1-44.1,44.1-44.1,44.1H29.1c-44.1,0-44.1-44.1-44.1-44.1v-91.5c0-44.1,44.1-44.1,44.1-44.1h167.8c44.1,0,44.1,44.1,44.1,44.1
                        V446.8z"/>
                </g>
            </svg>
        </a>
        <a>
            <svg fill="#000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve">
                <g>
                    <path d="M113,446c24.8,0,45.1-20.2,45.1-45.1c0-9.8-3.2-18.9-8.5-26.3c-8.2-11.3-21.5-18.8-36.5-18.8s-28.3,7.4-36.5,18.8
                        c-5.3,7.4-8.5,16.5-8.5,26.3C68,425.8,88.2,446,113,446z"/>
                    <polygon points="211.4,345.9 211.4,308.1 211.4,302.5 205.8,302.5 168,302.6 168.2,346 	"/>
                    <path d="M183,401c0,38.6-31.4,70-70,70c-38.6,0-70-31.4-70-70c0-9.3,1.9-18.2,5.2-26.3H10v104.8C10,493,21,504,34.5,504h157
                        c13.5,0,24.5-11,24.5-24.5V374.7h-38.2C181.2,382.8,183,391.7,183,401z"/>
                    <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M241,374.7v104.8
                        c0,27.3-22.2,49.5-49.5,49.5h-157C7.2,529-15,506.8-15,479.5V374.7v-52.3c0-27.3,22.2-49.5,49.5-49.5h157
                        c27.3,0,49.5,22.2,49.5,49.5V374.7z"/>
                </g>
            </svg>
        </a>
        <a>
            <svg fill="#000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve">
                <path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M169.5,357.6l-2.9,38.3h-39.3
                v133H77.7v-133H51.2v-38.3h26.5v-25.7c0-11.3,0.3-28.8,8.5-39.7c8.7-11.5,20.6-19.3,41.1-19.3c33.4,0,47.4,4.8,47.4,4.8l-6.6,39.2
                c0,0-11-3.2-21.3-3.2c-10.3,0-19.5,3.7-19.5,14v29.9H169.5z"/>
            </svg>
        </a>
        <a>
            <svg fill="#000" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12c0-6.627-5.373-12-12-12zm5.894 8.221-1.97
                9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054
                5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196
                1.006.128.832.941z"/>
            </svg>
        </a>
        <a>
            <svg fill="#000" width="800px" height="800px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 .4C4.698.4.4 4.698.4 10s4.298 9.6 9.6 9.6 9.6-4.298 9.6-9.6S15.302.4 10 .4zm3.692 10.831s.849.838
                1.058 1.227c.006.008.009.016.011.02.085.143.105.254.063.337-.07.138-.31.206-.392.212h-1.5c-.104
                0-.322-.027-.586-.209-.203-.142-.403-.375-.598-.602-.291-.338-.543-.63-.797-.63a.305.305 0 0
                0-.095.015c-.192.062-.438.336-.438 1.066 0 .228-.18.359-.307.359h-.687c-.234
                0-1.453-.082-2.533-1.221-1.322-1.395-2.512-4.193-2.522-4.219-.075-.181.08-.278.249-.278h1.515c.202
                0 .268.123.314.232.054.127.252.632.577 1.2.527.926.85 1.302 1.109 1.302a.3.3 0 0
                0 .139-.036c.338-.188.275-1.393.26-1.643 0-.047-.001-.539-.174-.775-.124-.171-.335-.236-.463-.26a.55.55 0
                0 1 .199-.169c.232-.116.65-.133 1.065-.133h.231c.45.006.566.035.729.076.33.079.337.292.308 1.021-.009.207-.018.441-.018.717
                0 .06-.003.124-.003.192-.01.371-.022.792.24.965a.216.216 0 0 0 .114.033c.091 0 .365 0 1.107-1.273a9.718 9.718
                0 0 0 .595-1.274c.015-.026.059-.106.111-.137a.266.266 0 0 1 .124-.029h1.781c.194
                0 .327.029.352.104.044.119-.008.482-.821 1.583l-.363.479c-.737.966-.737 1.015.046 1.748z"/>
            </svg>
        </a>
    </div>
</header>
<script src="js/header.js"></script>
<script src="js/footer.js"></script>
<body>
<div class="main">
<?php require ROOT . '/backend/static/blocks/popUps/popUpUser.php' ?>
<?php require ROOT . '/backend/static/blocks/popUps/popUpBasket.php' ?>