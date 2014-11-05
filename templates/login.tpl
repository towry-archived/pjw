<?php _partial('header.tpl'); ?>
<div class"main-content login">
    <div class="login-form">
        <form action="<?php echo SITE_URL . '/login'; ?>" method="post">
            <div><label>Name:</label><input type="text" name="name" placeholder="Your name" />
            </div>
            <div><label>Password:</label><input type="password" name="password" placeholder="Your password" />
            </div>
            <div><label>&nbsp;</label><input type="submit" value="Login" /></div>
        </form>
    </div>
</div>
<?php _partial('footer.tpl'); ?>
