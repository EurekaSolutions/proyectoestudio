<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'UniveOnline',
	'language' => 'es',
	'sourceLanguage' => 'es',
	'theme'=>'bootstrap',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
	),

	'modules'=>array(
		'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),

        ),  

		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'univeonline',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		'usr' => array(
			'userIdentityClass' => 'UserIdentity',
			'class'=>'application.modules.vendor.nineinchnick.yii-usr.UsrModule',
	        'layout' => '//layouts/column1',
	        'formClass'=>'bootstrap.widgets.TbActiveForm',
	        'detailViewClass'=>'bootstrap.widgets.TbDetailView',
	        'formCssClass'=>'form well',
	        'alertCssClassPrefix'=>'alert alert-',
	        'submitButtonCssClass'=>'btn btn-primary',
	        'htmlCss' => array(
	            'errorSummaryCss' => 'alert alert-error',
	            'errorMessageCss' => 'text-error',
	            ),
	        'hybridauthProviders' => array(
	            'OpenID' => array('enabled'=>true),
	            'Facebook' => array('enabled'=>true, 'keys'=>array('id'=>'', 'secret'=>''), 'scope'=>'email'),
	           	"Google" => array ( 
					"enabled" => true,
					"keys"    => array ( "id" => "914657215142-8lfnkmeqb4q8hi021i4mknmj3s23shml.apps.googleusercontent.com", "secret" => "uqC3OoFg02RkBsDSuft-G5J9" ),
					'scope'=>'email',
				),
	           "Twitter" => array ( 
					"enabled" => true,
					"keys"    => array ( "key" => "CHBzbyaIJGAQbIJ4BIUiGXrL1", "secret" => "cVE1tUrRjFJLHDkiGntGi2g0rX2BcBrDwmZ0jz1qqupQfPfvGh" )
				),
				"LinkedIn" => array ( 
					"enabled" => true,
					"keys"    => array ( "key" => "", "secret" => "" ) 
				),

	        ),
	        // mail
	        //...mail config...
			'mailerConfig' => array(
				'SetLanguage' => array('es'),
				'SetFrom' => array('from@example.com', 'Administrator'),
				'AddReplyTo' => array('replyto@example.com','Administrator'),
				'IsMail' => array(),
				// SMTP options
				//'IsSMTP' => array(),
				//'Host' => 'localhost',
				//'Port' => 25,
				//'Username' => 'login',
				//'Password' => 'password',
				// extension properties
				'setPathViews' => array('usr.views.emails'),
				'setPathLayouts' => array('usr.views.layouts'),
			),
	    ),

		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		/*'assetManager' => array (
			'linkAssets' => true,
		),*/
		 'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
        ),
 		'widgetFactory'=>array(
            'widgets'=>array(
                
                'SAImageDisplayer'=>array(
                    'baseDir' => 'images',
                    'originalFolderName'=> 'originals',
                    'sizes' =>array(
                        'tiny' => array('width' => 40, 'height' => 30),
                        'big' => array('width' => 640, 'height' => 480),
                        'thumb' => array('width' => 400, 'height' => 300),
						'banner' => array('width' => 1170, 'height' => 500),
                    ),
                    'groups' => array(
                        'news' => array(
                            'tiny' => array('width' => 40, 'height' => 30),
                            'big' => array('width' => 640, 'height' => 480),
							'banner' => array('width' => 1000, 'height' => 350),
                          ),
                        'reviews' => array(
                            'thumb' => array('width' => 400, 'height' => 300),
                         ), 
                    ),
                ),
            ),
        ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;dbname=univeonl_univeonl',
			'emulatePrepare' => true,
			'username' => 'univeonl_univeonl',
			'password' => 'univeonl_univeonl',
			'charset' => 'utf8',
		),
		/**/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
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
				/**/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'infouniveonline@gmail.com',
		'languages'=>array('en_us'=>'English', 'es'=>'Spanish', 'fa_ir'=>'فارسی'), // Yii::app()->language = Yii::app()->params->languages['fa_ir']; Para cambiar el lenguaje en runtime
	),
);

// Define a path alias for the Bootstrap extension as it's used internally.
// In this example we assume that you unzipped the extension under protected/extensions.
/*Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
 
return array(
    'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
    'modules'=>array(
        'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),
    ),
    'components'=>array(
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
    ),
);*/