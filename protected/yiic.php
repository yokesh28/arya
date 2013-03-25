<?php

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

// change the following paths if necessary
$yiic=dirname(__FILE__).'/../library/yii/framework/yiic.php';


if(YII_DEBUG)
	$config=dirname(__FILE__).'/config/console.php';
else
	$config=dirname(__FILE__).'/config/consoleLive.php';

date_default_timezone_set('Asia/Calcutta');

require_once($yiic);
