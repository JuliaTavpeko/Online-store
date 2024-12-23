<?php require ROOT . '/backend/static/blocks/header.php' ?>

<div class="contacts">
    <div class="contacts__inner">
        <div class="contacts__info">
            <span class="contacts__info-title"><?php echo $lang['contacts']; ?>:</span>
            <div class="contacts__info-data">
                <a>+375 (29) 333-33-33</a>
                <a>mobilestore@gmail.com</a>
                <span><?php echo $lang['officeAddress']; ?></span>
            </div>
        </div>
        <div class="contacts__social-media"></div>
        <?php require ROOT . '/backend/static/blocks/SMIcons/contacts.php' ?>

        <div class="contacts__location">
            <span class="contacts__location-title">Местоположение:</span>
            <div class="contacts__location-map myframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2350.8750369444783!2d27.5434329!3d53.898425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfef5296ecab%3A0x7efd3d6c60d18284!2zU0FJTlQgTEFVUkVOVCDjgrXjg7Pjg63jg7zjg6njg7Mg44OQ44Kk44Ok44O8IOODrOOCtuODvCDnm7Tosqkg6ZW36LKh5biDIOiyoeW4gw!5e0!3m2!1sru!2sde!4v1714467153102!5m2!1sru!2sde"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<?php require ROOT . '/backend/static/blocks/footer.php' ?>