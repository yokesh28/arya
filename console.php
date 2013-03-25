<?php

// Set Pear in include path
$pear=dirname(__FILE__).'/library/pear';
ini_set('include_path', $pear);

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

// change the following paths if necessary
$yii=dirname(__FILE__).'/library/yii/framework/yii.php';

if(YII_DEBUG)
	$config=dirname(__FILE__).'/protected/config/console.php';
else
	$config=dirname(__FILE__).'/protected/config/consoleLive.php';

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

define('ROOT_DIR',dirname(__FILE__));

require_once($yii);
Yii::createConsoleApplication($config)->run();