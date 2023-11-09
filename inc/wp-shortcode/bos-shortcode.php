<?php
/**
 * Add shortcode to render NEAR BOS component! 
 * But actually u better use the WP Block for that! there is a block called BOS-WP
 * example: [bos-wp src='mob.near/widget/ProfilePage' props='{"accountId" : "cuongdcdev.near"}' ]
 */
add_shortcode("bos-wp", function ($attrs, $tags) {
    ob_start();
    ?>
    <div class="bos-wp-placeholder" data-src="<?= htmlentities($attrs["src"]) ?>"
        data-props="<?= htmlentities(json_encode(json_decode($attrs["props"]))) ?>"></div>
    <?php
    return ob_get_clean();
});


add_shortcode("bos-wp-login", function ($attrs, $tags) {
    ob_start();
    ?>
    <div class="bos-wp-btn-login-logout btn btn-primary" id="bos-wp-btn-login" >
        <?= !$attrs["label"] ? "Login" : $attrs["label"] ?>
    </div>
    <?php
    return ob_get_clean();
});

add_shortcode("bos-wp-logout", function ($attrs, $tags) {
    ob_start();
    ?>
    <div class="bos-wp-btn-login-logout btn btn-danger" id="bos-wp-btn-logout">
        <?= $attrs["label"] ? $attrs["label"] : "Logout" ?>
    </div>
    <?php
    return ob_get_clean();
});

