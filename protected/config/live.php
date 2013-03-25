<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
		'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name'=>'Ones and Zeros Technologies Official Website',
		'defaultController' => 'front/site/index',
		// preloading 'log' component
		'preload'=>array('log'),
	
		// autoloading model and component classes
		'import'=>array(

				'application.models.*',
				'application.components.*',
				/*		'application.extensions.*',
				 'ext.widgets.*',*/
				'application.utils.*',
				'application.widgets.*',
				'application.constants.*',
				'application.modules.email.models.*',
				'application.modules.email.api.*',
				'application.modules.sms.models.*',
				'application.modules.sms.api.*',
				'application.modules.daemon.api.*',
				'application.modules.daemon.models.*',
				'application.modules.utils.*',
				'application.modules.front.api.*',
				'application.modules.front.models.*',
				'application.modules.front.widgets.*',
				'application.modules.config.models.*',
				'application.modules.config.api.*',
		),

		'modules'=>array(
				// uncomment the following to enable the Gii tool
				'gii'=>array(
						'class'=>'system.gii.GiiModule',
						'password'=>'pass',
						// If removed, Gii defaults to localhost only. Edit carefully to taste.
						'ipFilters'=>array('127.0.0.1','::1'),
				),
				'email'=>array(),
				'daemon'=>array(),
				'front'=>array(),
				'config'=>array(),
		),

		// application components
		'components'=>array(
				'user'=>array(
						'class'=>'WebUser',
						// enable cookie-based authentication
						'allowAutoLogin'=>true,
				),

				'clientScript'=>array(
						'packages'=>array(
								'jquery'=>array(
										'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jquery/1/',
										'js'=>array('jquery.min.js'),
								)
						),
				),

				// uncomment the following to enable URLs in path-format
				'urlManager'=>array(
						'urlFormat'=>'path',
						'showScriptName'=>false,
						'rules'=>array(
								// User REST patterns
								/* array('user/userResource/list', 'pattern'=>'user', 'verb'=>'GET'),
								 array('user/userResource/view', 'pattern'=>'user/<id:\d+>', 'verb'=>'GET'),
array('user/userResource/update', 'pattern'=>'user/<id:\d+>', 'verb'=>'PUT'),
array('user/userResource/delete', 'pattern'=>'user/<id:\d+>', 'verb'=>'DELETE'),
array('user/userResource/create', 'pattern'=>'user', 'verb'=>'POST'),*/
								//'<action:(search)>' => 'front/search/<action>',
								//'<action:(search)>/<AdvancedSearchForm:\w+>' => 'front/search/<action>',
								'home'=>'front/site/index',
								'about'=>'front/site/about',
								
								'carrier'=>'front/site/carrier',
								'product'=>'front/site/product',
								'service'=>'front/site/service',
								'contact'=>'front/site/contact',
								'error'=>'front/site/error',
								'<controller:\w+>/<id:\d+>'=>'<controller>/view',
								'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
									


						),
				),

				/*		'db'=>array(
				 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
				),*/
				// uncomment the following to use a MySQL database

				'db'=>array(
						'connectionString' => 'mysql:host=localhost;dbname=stellar',
						'emulatePrepare' => true,
						'username' => 'root',
						'password' => 'password',
						'charset' => 'utf8',
						'enableProfiling'=>'true',
						'enableParamLogging' => true,
				),
  				'errorHandler'=>array(
						// use 'site/error' action to display errors
						'errorAction'=>'front/site/error',
				),  
				'log'=>array(
						'class'=>'CLogRouter',
						'routes'=>array(								
								array(
									'class'=>'CFileLogRoute',
									'levels'=>'error, warning',
								),
								/*
								array(
										'class' => 'application.extensions.pqp.PQPLogRoute',
										'categories' => 'application.*, exception.*',
								),
								*/
								// uncomment the following to show log messages on web pages
								 array(
										'class'=>'CWebLogRoute',
								),
								array(
										'class'=>'CProfileLogRoute',
								),
						),
				),
				'cache'=>array(
						'class'=>'system.caching.CFileCache',
				),
					
		),

		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params'=>array(
				// this is used in contact page
				'rootDir'=>dirname(dirname(dirname(__FILE__))),
				'adminEmail'=>'caffeineoverdose@stellarteam.in',
				'adminName'=>'Wallfeet Administrator',
				'globalSalt'=>'romeos@work',
				'smtpUserName'=>'caffeineoverdose@stellarteam.in',
				'smtpPassword'=>'romeos@work24',
				'smtpHostName'=>'smtp.gmail.com:587',
				'defaultPageSize'=>50,
				'supportEmail'=>'caffeineoverdose@stellarteam.in',

		),
);
