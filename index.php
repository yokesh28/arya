<?php

// Set Pear in include path
$pear=dirname(__FILE__).'/library/pear';
ini_set('include_path', $pear);

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

// change the following paths if necessary
$yii=dirname(__FILE__).'/library/yii/framework/yii.php';

if(YII_DEBUG)
	$config=dirname(__FILE__).'/protected/config/local.php';
else
	$config=dirname(__FILE__).'/protected/config/live.php';	

require_once($yii);

date_default_timezone_set('Asia/Calcutta');
setlocale(LC_ALL,'en_IN');

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

define('ROOT_DIR',dirname(__FILE__));

Yii::createWebApplication($config)->run();