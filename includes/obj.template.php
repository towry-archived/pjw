<?php defined('PJ') or die();

function setup_template() {
    if (defined('TEMPLATE_SETUP')) {
        return;
    } else {
        define('TEMPLATE_SETUP', true);
    }

    $tpl = new PJ_Template();
    $tpl->setPath( PJ_TEMPLATES );

    $GLOBALS['obj.template'] = $tpl;
}
setup_template();
