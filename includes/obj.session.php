<?php defined('PJ') or die();

function setup_session() {
    if (defined('SESSION_SETUP')) {
        return;
    } else {
        define('SESSION_SETUP', true);
    }
    $session = new PJ_Session();
    $GLOBALS['obj.session'] = $session;
}
setup_session();
