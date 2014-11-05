<?php 

defined('PJ') or die();
defined('DEBUG') or define('DEBUG', true);
defined('PJ_TEMPLATES') or define('PJ_TEMPLATES', PJ . '/templates');
defined('PJ_ASSETS') or define('ASSET_FOLDER', 'assets');
defined('SITE_NAME') or define('SITE_NAME', 'pjw');
defined('SITE_URL') or define('SITE_URL', $_SERVER['REQUEST_SCHEME'] . '://localhost/' . SITE_NAME);
defined('DB_NAME') or define('DB_NAME', 'pjw');

spl_autoload_register( function ( $class ) {
    $file = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists( $file )) {
        include_once( $file );
    }
} );

if ( !function_exists( 'G' ) ) {
    function G( $key, $value = null ) {
        if ( !is_null( $value ) ) {
            $GLOBALS[$key] = $value;
        } elseif ( isset( $GLOBALS[$key] ) ) {
            return $GLOBALS[$key];
        } else {
            $file = __DIR__ . '/includes/' . $key . '.php';
            if (file_exists( $file )) {
                include_once( $file );

                return G( $key );
            } else {
                return null;
            }
        }
    }
}

/** setup event */
if ( !function_exists( 'event_setup' ) ) {
    function event_setup() {
        if (defined('EVENT_SETUP')) {
            return;
        } else {
            define('EVENT_SETUP', true);
        }

        $event = new PJ_Event();
        $GLOBALS['obj.event'] = $event;
    }
}
event_setup();
