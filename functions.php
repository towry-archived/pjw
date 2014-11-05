<?php defined('PJ') or die();

function _e( $v ) {
    echo $v;
}

function _partial( $part ) {
    $tpl = $GLOBALS['obj.template'];
    return $tpl->partial( $part );
}
