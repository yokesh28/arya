<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
		'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name'=>'Stellar Engine 2.0',
		'theme'=>'wf',
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
				'application.modules.auditTrail.models.*',
				'application.modules.srbac.controllers.SBaseController',
				'application.modules.srbac.components.*',
				'application.modules.user.models.*',
				'application.modules.user.api.*',
				'application.modules.property.models.*',
				'application.modules.property.api.*',
				'application.modules.property.widgets.*',
				'application.modules.project.models.*',
				'application.modules.project.api.*',
				'application.modules.packages.models.*',
				'application.modules.configuration.models.*',
				'application.modules.configuration.api.*',
				'application.modeles.packages.models.*',
				'application.modules.email.models.*',
				'application.modules.email.api.*',
				'application.modules.sms.models.*',
				'application.modules.sms.api.*',
				'application.modules.utils.*',
		),

		'modules'=>array(
				// uncomment the following to enable the Gii tool
				'gii'=>array(
						'class'=>'system.gii.GiiModule',
						'password'=>'pass',
						// If removed, Gii defaults to localhost only. Edit carefully to taste.
						'ipFilters'=>array('127.0.0.1','::1'),
				),
				'auditTrail'=>array(),
				'srbac' => array(
						'userclass'=>'Users', //default: User
						'userid'=>'id', //default: userid
						'username'=>'email_id', //default:username
						'delimeter'=>'-', //default:-
						'debug'=>true, //default :false
						'pageSize'=>20, // default : 15
						'superUser' =>'Superman', //default: Authorizer
						'css'=>'srbac.css', //default: srbac.css
						'layout'=>'application.views.layouts.main', //default: application.views.layouts.main, //must be an existing alias
						'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default: //srbac.views.authitem.unauthorized, must be an existing alias
						'alwaysAllowed' => array('front-SearchPropertiesAutoComplete','front-SiteIndex','front-SiteSearch','admin-SiteLogin','front-GeoLocalityAutoComplete'),
						'userActions'=>array(), //default: array()
						'listBoxNumberOfLines' => 15, //default : 10
						'imagesPath' => 'srbac.images', // default: srbac.images
						'imagesPack'=>'noia', //default: noia
						'iconText'=>true, // default : false
						'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
						// must be an existing alias
						'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer,
						// must be an existing alias
						'showHeader'=>true, // default: false
						'showFooter'=>false, // default: false
						'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
						// must be an existing alias
				),
				'user'=>array(),
				'front'=>array(),
				'email'=>array(),
				'daemon'=>array(),
				'admin'=>array(),
				'property'=>array(),
				'project'=>array(),
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
								'<action:(search|result)>' => 'front/search/<action>',
								'<action:(pager)>/<page:\d+>/*' => 'front/search/<action>',
								
								//agent url
								'<controller:(agent)>/<action>/<id>'=>'front/userAgent/<action>/id/<id>',
								
								//builder Url
								'<controller:(builder)>/<action>/<id>'=>'front/userBuilder/<action>/id/<id>',
								
								//home page
								'<action:(home)>/<city>/'=>'front/site/index/',
								'<action:(type)>/<type>/'=>'front/site/index/',
								
								
								'<action:(home)>'=>'front/site/index/',
								'<controller:(property)>/<action>/<id>'=>'front/property/view/id/<id>',
								'<action:(comingsoon)>'=>'front/site/<action>',
								'<controller:\w+>/<id:\d+>'=>'<controller>/view',
								'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>'=>'<controller>/<action>', 
// 								'<city>'=>'front/site/index/city/<city>',

								
								
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
						'connectionString' => 'mysql:host=108.175.151.2;dbname=wallfeet_dev',
						'emulatePrepare' => true,
						'username' => 'stellar',
						'password' => 'romeos@work24',
						'charset' => 'utf8',
						'enableProfiling'=>'true',
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
								// uncomment the following to show log messages on web pages
								array(
										'class'=>'CWebLogRoute',
								),
								array(
										'class'=>'CProfileLogRoute',
								),
						),
				), 
				/*		's3'=>array(
				 'class'=>'application.extensions.s3.ES3',
						'aKey'=>'AKIAJBZFGYPXPYEALXGA',
						'sKey'=>'ffxTKlgPQfAEj+2uFCSPnm38oYhrTB2qWANmvBJd',
				),*/
				'file'=>array(
						'class'=>'application.extensions.file.CFile',
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
				'adminEmail'=>'admin@wallfeet.com',
				'adminName'=>'Wallfeet Administrator',
				'globalSalt'=>'romeos@work',
				's3Url'=>'https://s3.amazonaws.com/dev.wallfeet.com/',
				's3BucketName'=>'dev.wallfeet.com',
				'smtpHostName'=>'smtp.gmail.com',
				'smtpUserName'=>'alkarthick@gmail.com',
				'smtpPassword'=>'Divya143',
				'defaultPageSize'=>2,
		),
);
