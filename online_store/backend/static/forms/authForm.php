<form class="form form_signin" method="post" enctype="multipart/form-data">
    <h3 class="form_title"><?php echo $lang['authorization']; ?></h3>
    <input type="text" class="form_input" placeholder="<?php echo $lang['login']; ?>" name="loginAuth"
           id="loginAuth">
    <input type="password" class="form_input" placeholder="<?php echo $lang['password']; ?>" name="passAuth"
           id="passAuth">
    <div class="remember">
        <label for="remember"> <input id="remember" name="remember"
                                      type="checkbox"><?php echo $lang['rememberMe']; ?></label>
        <a class="forgot-pass"><?php echo $lang['forgotPassword']; ?></a>
    </div>
    <p><input class="form_btn form_btn_signin" type="submit" value="<?php echo $lang['signIn']; ?>"></p>
</form>