<?php defined('PJ') or die();

require_once "globals.php";

G('obj.event')->listen('before.output', function () {
    request_setup_header();
});

function request_setup_header( $type = null ) {
    $type = $type == null ? 'text/html' : $type;
    header( "Content-type: {$type}; charset=utf-8");
}
