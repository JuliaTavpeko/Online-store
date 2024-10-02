<form class="decor" name="review">
    <div class="form-inner">
        <h3><?php echo $lang['leaveReview']; ?></h3>
        <img src="image/png/user/noUser.png" id="photo-user" class="photoUser" style="
                                background-color: white;
                                border-radius: 50%;
                                padding: 10px;
                                display: block;
                                margin: 5px auto;" alt="photo-user"/>
        <div class="ratings-wrapper ozenka">
            <p><?php echo $lang['rating']; ?>: </p>
            <div class="ratings">
                <span data-rating="5">★</span>
                <span data-rating="4">★</span>
                <span data-rating="3">★</span>
                <span data-rating="2">★</span>
                <span data-rating="1">★</span>
            </div>
        </div>
        <input type="text" class="reviewerName" placeholder="<?php echo $lang['name']; ?>" name="name">
        <textarea placeholder="<?php echo $lang['message']; ?>" class="reviewerMsg" name="message" rows="3"></textarea>
        <input type="submit" name="submit" value="<?php echo $lang['send']; ?>">
    </div>
</form>