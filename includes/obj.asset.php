<?php defined('PJ') or die();

function setup_asset() {
    if (defined('ASSET_SETUP')) {
        return;
    } else {
        define('ASSET_SETUP', true);
    }
    $ass = new PJ_Asset(ASSET_FOLDER, SITE_URL);
    $GLOBALS['obj.asset'] = $ass;
}
setup_asset();
