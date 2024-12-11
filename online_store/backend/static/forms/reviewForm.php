<form class="reviews" name="review">
    <div class="reviews__inner">
        <h3 class="reviews__title"><?php echo $lang['leaveReview']; ?></h3>
        <img class="reviews__user-image" src="image/png/user/noUser.png" id="photo-user"  style="
                                background-color: white;
                                border-radius: 50%;
                                padding: 10px;
                                display: block;
                                margin: 5px auto;" alt="photo-user"/>
        <div class="reviews__rating">
            <p class="reviews__rating-text"><?php echo $lang['rating']; ?>: </p>
            <div class="reviews__rating-rank">
                <span data-rating="5">★</span>
                <span data-rating="4">★</span>
                <span data-rating="3">★</span>
                <span data-rating="2">★</span>
                <span data-rating="1">★</span>
            </div>
        </div>
        <input type="text" class="reviews__user-name" placeholder="<?php echo $lang['name']; ?>" name="name">
        <textarea placeholder="<?php echo $lang['message']; ?>" class="reviews__user-text" name="message" rows="3"></textarea>
        <input class="reviews__send-btn" type="submit" name="submit" value="<?php echo $lang['send']; ?>">
    </div>
</form>