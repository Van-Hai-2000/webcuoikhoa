<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'images/favicon.ico',
        'images/apple-touch-icon.png',
        'css/bootstrap.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/custom.css',
    ];
    public $js = [
        'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js',
        'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js',
        'js/jquery-3.2.1.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery.superslides.min.js',
        'js/bootstrap-select.js',
        'js/inewsticker.js',
        'js/bootsnav.js.',
        'js/images-loded.min.js',
        'js/isotope.min.js',
        'js/owl.carousel.min.js',
        'js/baguetteBox.min.js',
        'js/form-validator.min.js',
        'js/contact-form-script.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
