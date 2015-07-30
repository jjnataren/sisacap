<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 8/2/14
 * Time: 11:40 AM
 */

namespace common\assets;


use yii\web\AssetBundle;

class AdminLTE extends AssetBundle{
    public $sourcePath = '@bower/admin-lte';
    public $js = [
        'js/AdminLTE/app.js',
        'js/plugins/morris/morris.min.js'		
    ];
    public $css = [
        'css/AdminLTE.css',
        'css/morris/morris.css'
    ];
    public $depends = [
        '\yii\web\JqueryAsset',
        '\yii\jui\JuiAsset',
        '\yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesome'
    ];
}