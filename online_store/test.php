<?php require ROOT . '/backend/static/blocks/header.php' ?>

<!--
    <div class="scroll-container">
        <div class="horizontal-scroll">
            <button class="btn-scroll" id="btn-scroll-left"
                    onclick="scrollHorizontally(1)"><img src="image/svg/icon/left-circle.svg"></button>
            <button class="btn-scroll" id="btn-scroll-right"
                    onclick="scrollHorizontally(-1)"><img src="image/svg/icon/right-circle.svg" ></button>
            <div class="gallery">
                <div class="card"><img src="image/png/user/user1.png" ></div>
                <div class="card"><img src="image/png/user/user2.png" ></div>
                <div class="card"><img src="image/png/user/user3.png" ></div>
                <div class="card"><img src="image/png/user/user4.png" ></div>
                <div class="card"><img src="image/png/user/user5.png" ></div>
                <div class="card"><img src="image/png/user/user6.png" ></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        let currentScrollPosition = 0;
        let scrollAmount = 320;

        const sCont = document.querySelector('.gallery');
        const hScroll = document.querySelector('.horizontal-scroll');
        const btnScrollLeft = document.querySelector('#btn-scroll-left');
        const btnScrollRight = document.querySelector('#btn-scroll-right');

        btnScrollLeft.style.opacity = "0";

        let maxScroll = -sCont.offsetWidth + hScroll.offsetWidth;

        function scrollHorizontally(val){
            currentScrollPosition += (val * scrollAmount);

            if(currentScrollPosition >= 0){
                currentScrollPosition = 0;
                btnScrollLeft.style.opacity = "0";
            } else {
                btnScrollLeft.style.opacity = "1";
            }

            if(currentScrollPosition <= maxScroll){
                currentScrollPosition = maxScroll;
                btnScrollRight.style.opacity = "0";
            } else {
                btnScrollRight.style.opacity = "1";
            }

            sCont.style.left = currentScrollPosition + "px";
        }

    </script>

-->



<?php require ROOT . '/backend/static/blocks/footer.php' ?>