<?php defined('PJ') or die(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php _e($title); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php G('obj.asset')->css('css/main.css'); ?>" />
</head>
<body>
<div id="container">
    <div id="header">
        <div class="row">
            <h1 id="logo"><a href="<?php echo SITE_URL; ?>" title="Home"><?php echo SITE_NAME; ?></a></h1>
            <div id="nav-top">
                <a href="<?php echo SITE_URL . '/browser.php'; ?>">Browser</a>
            </div>
        </div>
    </div>
    <div id="main">
