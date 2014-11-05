<?php defined('PJ') or die();

function setup_db() {
    if (defined('DB_SETUP')) {
        return;
    } else {
        define('DB_SETUP', true);
    }
    $db = new PJ_Db();
    $db->connect("localhost", "root", "root");
    $GLOBALS['obj.db'] = $db;
}
setup_db();
