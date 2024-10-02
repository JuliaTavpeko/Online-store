<div class="popup" id="popup">
        <div class="popup-container">
            <div class="popup-body" id="body_popup">
                <div class="wrapper">
                    <div class="body-container">
                        <article class="container-form">
                            <div class="block">
                                <section class="block_item block-item">
                                    <h2 class="block-item_title"><?php echo $lang['authorization']; ?></h2>
                                    <button class="block-item_btn signin-btn"><?php echo $lang['signIn']; ?></button>
                                </section>
                                <section class="block_item block-item">
                                    <h2 class="block-item_title"><?php echo $lang['noAccount']; ?></h2>
                                    <button class="block-item_btn signup-btn"><?php echo $lang['register']; ?></button>
                                </section>
                            </div>
                            <div class="form-box" id="form-box">
                                <?php require ROOT . '/backend/static/forms/authForm.php' ?>
                                <?php require ROOT . '/backend/static/forms/regForm.php' ?>
                            </div>
                        </article>
                    </div>
                </div>
            <div class="popup-close" id="close_popup">&#10006</div>
        </div>
    </div>
</div>