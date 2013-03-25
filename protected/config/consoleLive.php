<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
		'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name'=>'',
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
				'email'=>array(),
				'daemon'=>array(),
				'admin'=>array(),
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
								'<controller:\w+>/<id:\d+>'=>'<controller>/view',
								'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
									


						),
				),
				'authManager'=>array(
						// Path to SDbAuthManager in srbac module if you want to use case insensitive
						// access checking (or CDbAuthManager for case sensitive access checking)
						'class'=>'application.modules.srbac.components.SDbAuthManager',
						//	'class'=>'CDbAuthManager',
						// The database component used
						'connectionID'=>'db',
						// The itemTable name (default:authitem)
						'itemTable'=>'auth_items',
						// The assignmentTable name (default:authassignment)
						'assignmentTable'=>'auth_assignments',
						// The itemChildTable name (default:authitemchild)
						'itemChildTable'=>'auth_itemchildren',
				),

				/*		'db'=>array(
				 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
				),*/
				// uncomment the following to use a MySQL database

				'db'=>array(
						'connectionString' => 'mysql:host=localhost;dbname=onz',
						'emulatePrepare' => true,
						'username' => 'root',
						'password' => '',
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
				)
				,
				'cache'=>array(
						'class'=>'system.caching.CFileCache',
				),
					
		),

		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params'=>array(
				// this is used in contact page
				'rootDir'=>dirname(dirname(dirname(__FILE__))),
				'adminEmail'=>'',
				'adminName'=>'',
				'globalSalt'=>'',
				'smtpUserName'=>'',
				'smtpPassword'=>'',
				'smtpHostName'=>'smtp.gmail.com:587',
				'defaultPageSize'=>50,
				'supportEmail'=>'',

		),
);
