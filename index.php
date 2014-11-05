<?php define('PJ', dirname(__FILE__));

require_once "load.php";

G('obj.session')->start();

$user = G('obj.db')->table('users')->one(0);
if ( $user ) {
    G('obj.template')->set('title', 'PJW');
    G('obj.template')->set('user', $user);
    G('obj.template')->display( 'index.tpl' );
} else {
    G('obj.template')->
        set('title', 'Login')->
        display( 'login.tpl' );
}
