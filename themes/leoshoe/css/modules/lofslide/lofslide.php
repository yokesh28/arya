<?php
/**
 * $ModDesc
 * 
 * @version		$Id: file.php $Revision
 * @package		modules
 * @subpackage	$Subpackage.
 * @copyright	Copyright (C) December 2010 LandOfCoder.com <@emai:landofcoder@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */
if (!defined('_CAN_LOAD_FILES_')){
	define('_CAN_LOAD_FILES_',1);
}    
/**
 * lofcordion Class
 */	
class lofslide extends Module
{
	/**
	 * @var LofParams $_params;
	 *
	 * @access private;
	 */
	private $_params = '';	
	/**
	 * @var array $_postErrors;
	 *
	 * @access private;
	 */
	private $_postErrors = array();		
	/**
	 * @var string $__tmpl is stored path of the layout-theme;
	 *
	 * @access private 
	 */	
   /**
    * Constructor 
    */
	function __construct()
	{
		$this->name = 'lofslide';
		parent::__construct();			
		$this->tab = 'LandOfCoder';				
		$this->version = '1.2';
		$this->displayName = $this->l('Lof SlideShow Pro Module');
		$this->description = $this->l('Lof SlideShow Pro Module');
		if( file_exists( _PS_ROOT_DIR_.'/modules/'.$this->name.'/libs/params.php' ) && !class_exists("LofParams", false) ){
			if( !defined("LOF_SLIDE_SHOW_LOAD_LIB_PARAMS") ){				
				require( _PS_ROOT_DIR_.'/modules/'.$this->name.'/libs/params.php' );
				define("LOF_SLIDE_SHOW_LOAD_LIB_PARAMS",true);
			}
		}		
		$this->_params = new LofParams( $this->name );		   
	}
   /**
    * process installing 
    */
	function install(){		
		if (!parent::install())
			return false;
		if(!$this->registerHook('top'))
			return false;
		if(!$this->registerHook('header'))
			return false;	
		$this->defaultValues();
		return true;
	}
	
    /*
    * Add Position for site
    */
    function hooklofPresDemo($params){
        return $this->processHook( $params,"lofPresDemo");
    }
	/*
	 * register hook right comlumn to display slide in right column
	 */
	function hookrightColumn($params)
	{		
		return $this->processHook( $params,"rightColumn");
	}
	/*
	 * register hook left comlumn to display slide in left column
	 */
	function hookleftColumn($params)
	{		
		return $this->processHook( $params,"leftColumn");

	}
	function hooktop($params)
	{		
		return '</div><div class="clearfix">'.$this->processHook( $params,"top");
	}
	function hookfooter($params)
	{		
		return $this->processHook( $params,"footer");
	}
	function hookcontenttop($params)
	{ 		
    	return $this->processHook( $params,"contenttop");
	}
	function hookHeader($params)
	{
		if(_PS_VERSION_ <="1.4"){							
			$header = '<link type="text/css" rel="stylesheet" href="'.($this->_path).'assets/style.css'.'" />
			 		   <link type="text/css" rel="stylesheet" href="'.($this->_path).'tmpl/'. $this->getParamValue('module_theme','basic').'/assets/style.css'.'" />
			           <script type="text/javascript" src="'.($this->_path).'assets/jlofScripts.js'.'"></script>';
			return $header;			
		}elseif(_PS_VERSION_ < "1.5"){
			Tools::addCSS( ($this->_path).'assets/style.css', 'all');	
			Tools::addCSS( ($this->_path).'tmpl/'. $this->getParamValue('module_theme','basic').'/assets/style.css', 'all');
			Tools::addJS( ($this->_path).'assets/jlofScripts.js', 'all');
			Tools::addJS( ($this->_path).'assets/jquery.tools.min.js', 'all');
		}else{
			$this->context->controller->addCSS( ($this->_path).'assets/style.css', 'all');	
			$this->context->controller->addCSS( ($this->_path).'tmpl/'. $this->getParamValue('module_theme','basic').'/assets/style.css', 'all');
			$this->context->controller->addJS( ($this->_path).'assets/jlofScripts.js', 'all');
			$this->context->controller->addJS( ($this->_path).'assets/jquery.tools.min.js', 'all');
		}
	}
	function hooklofTop($params){
		return $this->processHook( $params,"lofTop");
	}
	function hookHome($params)
	{
		return $this->processHook( $params,"home");
	}
    function hooklofslide1($params){
		return $this->processHook( $params,"lofslide1");
	}
    function hooklofslide2($params){
		return $this->processHook( $params,"lofslide2");
	}
    function hooklofslide3($params){
		return $this->processHook( $params,"lofslide3");
	}
    function hooklofslide4($params){
		return $this->processHook( $params,"lofslide4");
	}
    function getListCatId( $parent_id ){
        global $cookie, $link;
		$id_lang = intval($cookie->id_lang);			
		$query = 'SELECT c.`id_category`, c.`id_parent`, cl.`name`, cl.`description`, cl.`link_rewrite`' .
				' FROM `'._DB_PREFIX_.'category` c' .
                ' LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON cl.`id_category` = c.`id_category` '.
				' WHERE c.id_category IN ('.$parent_id.') GROUP BY id_category';
		$result = Db::getInstance()->ExecuteS($query);
		return $result;
   }
	/**
	 * get list of subcategories by id
	 */
    function getListCategories($params, $idds){        
            global $cookie, $link;
			$id_lang = intval($cookie->id_lang);
    		$ids = implode(",", $idds);        
            $cate = array();				
    		$query = 'SELECT c.`id_category`, c.`id_parent`, cl.`name`, cl.`description`, cl.`link_rewrite`' .
    				' FROM `'._DB_PREFIX_.'category` c' .
                    ' LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON cl.`id_category` = c.`id_category` '.
    				' WHERE c.id_category IN ('.$ids.') GROUP BY id_category';
    		$data = Db::getInstance()->ExecuteS($query);
            $ids = array();
    		return $data;
	   }
	/**
    * Proccess module by hook
    * $pparams: param of module
    * $pos: position call
    */
	function processHook( $params ){
		global $smarty,$cookie;                
		//load param
		$params = $this->_params;
		$site_url = Tools::htmlentitiesutf8('http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__);
		if(_PS_VERSION_ <="1.4"){
			// create thumbnail folder	 						
			$thumbPath = _PS_IMG_DIR_.$this->name;
			if( !file_exists($thumbPath) ) {
				mkdir( $thumbPath, 0777 );			
			};
			$thumbUrl = $site_url."img/".$this->name;
		}else{			
			// create thumbnail folder	 			
			$thumbPath = _PS_CACHEFS_DIRECTORY_.$this->name;
			if( !file_exists(_PS_CACHEFS_DIRECTORY_) ) {
				mkdir( _PS_CACHEFS_DIRECTORY_, 0777 );  			
			}; 
			if( !file_exists($thumbPath) ) {
				mkdir( $thumbPath, 0777 );
			};
			$thumbUrl = $site_url."cache/cachefs/".$this->name;			
		}
		if( file_exists( _PS_ROOT_DIR_.'/modules/'.$this->name.'/libs/group_base.php' ) && !class_exists("LofSlideShowDataSourceBase", false) ){
			if( !defined("LOF_SLIDE_SHOW_LOAD_LIB_GROUP") ) {
				require_once( _PS_ROOT_DIR_.'/modules/'.$this->name.'/libs/group_base.php' );
				define("LOF_SLIDE_SHOW_LOAD_LIB_GROUP",true);
			}
		}
		if( file_exists( _PS_ROOT_DIR_.'/modules/'.$this->name.'/libs/phpthumb/ThumbLib.inc.php' ) && !class_exists('PhpThumbFactory', false)){						
			if( !defined("LOF_SLIDE_SHOW_LOAD_LIB_PHPTHUMB") ) {
				require( _PS_ROOT_DIR_.'/modules/'.$this->name.'/libs/phpthumb/ThumbLib.inc.php' );	
				define("LOF_SLIDE_SHOW_LOAD_LIB_PHPTHUMB",true);
			}
		}
        /*
        * Config Param
        */
        $imgFolder = _PS_IMG_DIR_.$this->name;
        
        $moduleId = rand().time();
        $moduleHeight   =  $params->get("md_height",250);
        $moduleWidth   =  $params->get("md_width",550);
		$theme 			= $params->get("module_theme","basic");
		$target 	= $params->get( 'target', '_self' );
		$class 			= $params->get( 'navigator_pos', 0 ) ? '':'lof-snleft';
		$blockid        = $this->id;
        $limititem    = $params->get("limit_items",12);
        $showPrice    = $params->get("show_price",1);
        $showTipBox    = $params->get("show_box_tips",1);
		$preload		= $params->get("preload",1);
        $thumbmainWidth   = $params->get('main_width',550);
        $thumbmainHeight   = $params->get('main_height',250);
        $thumbnailWidth   = $params->get('thumb_width',90);
        $thumbnailHeight   = $params->get('thumb_height',60);
        $speed   = $params->get('speed',200);		      
        $params->set( 'auto_renderthumb',0);  
        $selectCat = $params->get("category","");
        $ids  = explode(",",$selectCat);
        $token 	= Tools::getToken(false);
		$source =  	  $params->get( 'module_group', 'product' );        
		$path = dirname(__FILE__).'/libs/groups/'.strtolower($source)."/".strtolower($source).'.php';
		if( !file_exists($path) ){
			return array();	
		}
        require_once $path;
        //require_once $path;
        $objectName = "LofSlideShow".ucfirst($source)."DataSource";
	 	$object = new $objectName();		
        $object->setThumbPathInfo($thumbPath,$thumbUrl)
               ->setImagesRendered( array( 'mainImage' => array( (int)$params->get( 'main_width', 550 ), (int)$params->get( 'main_height', 250 )) ) );
       $products = $object->getListByParameters( $params, $ids );
       
        $total = count($products); 
        
        if($theme == "basic"){
            $widthNav = ($total * 13) + ($total * 10);
            $widthPage = ($params->get("per_page",3) * 13)+($params->get("per_page",3) * 4);
        }else{
            $widthNav = ($total * ($thumbnailWidth+15));
            $widthPage = $params->get("per_page",3) * ($thumbnailWidth) + ($params->get("per_page",3)*15)-5;
        }
        $widthDesc = $moduleWidth-$thumbmainWidth-35;
        $posNav = $thumbmainWidth + ($widthDesc-$widthPage)/2 + 20;
        $widthMainDesc = $widthPage+10;
        /*
        * Add check status of products
        */
		$curLang = Language::getLanguage(intval($cookie->id_lang));
		$lofiso_code = $curLang["iso_code"];		
        if($source == "product"){
            $imgSize["height"] = $params->get("thumb_height",225);
            $imgSize["width"]  = $params->get("thumb_width",295); 
            $date = date("Y-m-d H:i:s");
            $today = strtotime($date);
            
            foreach ( $products as &$product ) {
                $dateSlide = date("d F Y", strtotime($product["date_add"]));
                $product['classicon'] ='';
                $itemDate = strtotime($product["date_add"]);
                $newnumdays = round(abs($today-$itemDate)/60/60/24);
                if($product["reduction"]){
                    $product['classicon'] = "lof-sale";
                }else{
                    //check new product
                    if( $newnumdays < $params->get("timenewslide",2) && ($params->get("timenewslide",2) != 0) ){
                        $product['classicon'] = "lof-new";
                    }
                    //check feature
                    else{
                        $homeFeature =  $this->getProFeature();
                        $checkID = array();
                        foreach($homeFeature as $home){
                            $checkID[] = $home['id_product'];        
                        }
                        if(in_array($product['id_product'],$checkID)){
                            $product['classicon'] = "lof-feature";    
                        }                  
                    }                
                }
				if($product['classicon'] !=""){
					$product['classicon']  = $product['classicon'] ." ".$product['classicon'] .$lofiso_code ;
				}				
            }
        }else{
            $dateSlide = '';
            if($params->get("auto_renderthumb",1)){
                $imgSize["height"] = $params->get("main_height",225);
                $imgSize["width"]  = $params->get("main_width",295);    
            }                
        }
		
        /*
        * End check status of products
        */
        $module_content = '';
        ob_start();
    		 require( dirname(__FILE__).'/tmpl/'.$this->getParamValue('module_theme','basic').'/_content.php' );		
    	    $module_content = ob_get_contents();
    	 ob_end_clean(); 
        $lofScript = '';
		ob_start();
		 require( dirname(__FILE__).'/initjs.php' );		
	    $lofScript = ob_get_contents();
	    ob_end_clean();
		// template asignment variables
		$smarty->assign( array(
                              'moduleId'            => $moduleId,
                              'total'               => $total,
                              'source'              => $source,
                              'module_content'      => $module_content,
                              'lofScript'           => $lofScript,
                              'viewDetail'          => $params->get('view_detail',1),
						      'object'              => $object,
						      'showAddCart'         => $params->get('add_cart',1),
						      'showDesc'            => $params->get("show_desc",1),
						      'showPrice'           => $showPrice,
						      'perPage'             => $params->get("per_page",4),
						      'speed'               => $speed,
							  'showCaption' 		=> $params->get('show_caption',1),	
							  'widthTooltip' 		=> $params->get('width_tooltip',160),	
							  'moduleHeight'        => $moduleHeight,
							  'moduleWidth'         => $moduleWidth,
							  'widthDesc'           => $widthDesc,
							  'widthMainDesc'           => $widthMainDesc,
							  'dateSlide'	        => $dateSlide,
							  'autoPlay'            => $params->get('auto_play',0),
							  'theme'	            => $theme,
							  'limititem'	        => $limititem,
							  'lofSpeed'	        => $params->get('lof_speed',2000),
                              'lofDuration'	        => $params->get('lof_duration',500),
							  'thumbmainWidth'      => $thumbmainWidth,
							  'thumbmainHeight'     => $thumbmainHeight,
                              'thumbnailWidth'      => $thumbnailWidth,
							  'thumbnailHeight'     => $thumbnailHeight,
							  'widthNav'            => $widthNav,
							  'widthPage'           => $widthPage,
							  'lofeffect'           => $params->get('lofeffect',""),
							  'showIconItem'        => $params->get('show_icon',1),
							  'posNav'		        => $posNav,							  	
							  'params'		        => $params,							  	
							  'products'		    => $products,
							  'site_url'		    => $site_url,
                              'token' 			    => $token,
                              'checkVersion'	    => _PS_VERSION_,
                              'target'		        => $target,                                							                               
                              'captionWidth'        => $params->get( 'caption_width', 250 ),
                              'postCaption'         => $params->get( 'pos_caption', 'lof-cap-bottom' ),
							  'showTooltip'         => $params->get("show_tooltip",1),
							  'showButton'		    => $params->get('show_button',1),
							  'showDate'		    => $params->get("show_date",1),
                              'publicFixIcon'       => $params->get("publicfixicon","lof-featured-icon")." ".$params->get("publicfixicon","lof-featured-icon").$lofiso_code,
							  'showTitle'           =>$params->get("show_title",1)
						));
		//$smarty->assign( array('homeSize' => Image::getSize('thickbox')));
		//$open_target = $params->get('target','_blank');
		//$smarty->assign( 'target','$target="'.$open_target.'"');
        return $this->display(__FILE__, $this->getLayoutPath($theme) ).$lofScript;				
	}
    public function getLayoutPath( $theme ){
        $layout = 'tmpl/'.$theme.'/default.tpl';
        if( !file_exists(__FILE__."/".$layout) ){
            return $layout;
        }
        return 'tmpl/default.tpl';
    }
    public function splitingCols ( $products ){
        return $output; 
    }   	   	   	
   public function defaultValues(){
		$defaultValues = array();
		$defaultValues[1] = array(
			"enable"    =>1,                                       
			"image"     =>"modules/lofslide/images/slideshow1.png",
			"type"      =>"none", 
			"link"      =>"#",                                                                                                                    
			"desc"      =>"Suspendisse aliquam ante ac risus pretium suscipit. Quisque accumsan, dolor non congue interdum, enim sapien faucibus libero, egestas feugiat dolor mi nec velit. ",
			"title"     =>"Aliquam urna magna",
			"price"     =>"200"                          
		   );
		$defaultValues[2] = array(
			"enable"    =>1,                                       
			"image"     =>"modules/lofslide/images/slideshow2.png",
			"type"      =>"none", 
			"link"      =>"#",                                                                                                                    
			"desc"      =>"Nulla purus lorem, facilisis id fermentum ac, consequat nec risus. Fusce elementum cursus magna aliquet interdum. Nulla ultricies massa ac nisl laoreet fringil",
			"title"     =>"Vestibulum ante ipsum",
			"price"     =>"300"                          
		   );
		$defaultValues[3] = array(
			"enable"    =>1,                                       
			"image"     =>"modules/lofslide/images/slideshow1.png",
			"type"      =>"none", 
			"link"      =>"#",                                                                                                                    
			"desc"      =>"Suspendisse aliquam ante ac risus pretium suscipit. Quisque accumsan, dolor non congue interdum, enim sapien faucibus libero, egestas feugiat dolor mi nec velit. ",
			"title"     =>"Aliquam urna magna",
			"price"     =>"400"                          
		   );
		$defaultValues[4] = array(
			"enable"    =>1,                                       
			"image"     =>"modules/lofslide/images/slideshow2.png",
			"type"      =>"none", 
			"link"      =>"#",                                                                                                                    
			"desc"      =>"Suspendisse aliquam ante ac risus pretium suscipit. Quisque accumsan, dolor non congue interdum, enim sapien faucibus libero, egestas feugiat dolor mi nec velit. ",
			"title"     =>"Aliquam urna magna",
			"price"     =>"300"                          
		   );
		   
		
		$languages = Language::getLanguages();
		foreach($languages as $lan){
			foreach( $defaultValues as $i=>$val){
				Configuration::updateValue($this->name.'_'.$lan["id_lang"]."-".$i."-image", $val['image'], true);
				Configuration::updateValue($this->name.'_'.$lan["id_lang"]."-".$i."-title", $val['title'], true);
				Configuration::updateValue($this->name.'_'.$lan["id_lang"]."-".$i."-type", $val['type'], true);
				Configuration::updateValue($this->name.'_'.$lan["id_lang"]."-".$i."-link", $val['link'], true);
				Configuration::updateValue($this->name.'_'.$lan["id_lang"]."-".$i."-desc", $val['desc'], true);
				Configuration::updateValue($this->name.'_'.$lan["id_lang"]."-".$i."-price", $val['price'], true);
			}
		}
		Configuration::updateValue($this->name.'_'.'module_theme', 'descimage', true);
		Configuration::updateValue($this->name.'_'.'module_group', 'custom', true);
		Configuration::updateValue($this->name.'_'.'auto_play', 1, true);
		Configuration::updateValue($this->name.'_'.'show_button', 1, true);
		Configuration::updateValue($this->name.'_'.'per_page', 0, true);
		Configuration::updateValue($this->name.'_'.'md_height', 425, true);
		Configuration::updateValue($this->name.'_'.'md_width', 946, true);
		Configuration::updateValue($this->name.'_'.'re_thumb', 1, true);
		Configuration::updateValue($this->name.'_'.'cre_main_size', 1, true);
		Configuration::updateValue($this->name.'_'.'main_height', 450, true);
		Configuration::updateValue($this->name.'_'.'main_width', 720, true);
		Configuration::updateValue($this->name.'_'.'thumb_height', 22, true);
		Configuration::updateValue($this->name.'_'.'thumb_width', 90, true);
		Configuration::updateValue($this->name.'_'.'des_max_chars', 100, true);
		Configuration::updateValue($this->name.'_'.'publicfixicon', 'None', true);
		Configuration::updateValue($this->name.'_'.'show_icon', 0, true);
		Configuration::updateValue($this->name.'_'.'show_desc', 1, true);
		Configuration::updateValue($this->name.'_'.'show_price', 1, true);
		Configuration::updateValue($this->name.'_'.'show_title', 1, true);
		Configuration::updateValue($this->name.'_'.'show_date', 0, true);
		Configuration::updateValue($this->name.'_'.'view_detail', 0, true);
		Configuration::updateValue($this->name.'_'.'add_cart', 0, true);
		Configuration::updateValue($this->name.'_'.'show_tooltip', 0, true);
		Configuration::updateValue($this->name.'_'.'show_caption', 1, true);
		Configuration::updateValue($this->name.'_'.'pos_caption', 'Bottom', true);
		Configuration::updateValue($this->name.'_'.'lofeffect', 'slide', true);
		Configuration::updateValue($this->name.'_'.'lof_speed', 6000, true);
		Configuration::updateValue($this->name.'_'.'lof_duration', 700, true);
		Configuration::updateValue($this->name.'_'.'custom-num', 4, true);
	}
   /**
    * Get list of sub folder's name 
    */
	public function getFolderList( $path ) {
		$items = array();
		$handle = opendir($path);
		if (! $handle) {
			return $items;
		}
		while (false !== ($file = readdir($handle))) {
			if (is_dir($path . $file))
				$items[$file] = $file;
		}
		unset($items['.'], $items['..'], $items['.svn']);
		return $items;
	}
   /**
    * Render processing form && process saving data.
    */	
	public function getContent()
	{
		$html = "";
		if (Tools::isSubmit('submit'))
		{
			$this->_postValidation();
			if (!sizeof($this->_postErrors))
			{													
		        $definedConfigs = array(
		          /* general config */
		          'module_theme'      => '',
                  //image group
                  'module_group'      => '',
                  'image_folder'      => '',
                  'image_category'    => '',
                  'image_ordering'    => '',                                    
                  //product group
		          'home_sorce'        => '',
                  'order_by'          => '',  
                  'des_max_chars'     => '',                  
                  'publicfixicon'     => '',                  
	              'productids'        => '',                  		          		          		                            		        
	              'show_caption'        => '',                  		          		          		                            		        
	              'show_icon'        => '',                  		          		          		                            		        
	              'limit_cols'        => '',                  		          		          		                            		        
		          'per_page'            => '',
		          'speed'       => '200',
		          'md_height'     => '',
		          'md_width'      => '',
				  'view_detail'	      => 'View',
				  'width_tooltip'	      => '',
				  'limit_items'       =>'',
		          /*Main CoinSlider Setting*/
                  'show_tooltip'           => '',
                  'show_button'           => '',
                  'show_image'            => '',
                  'show_desc'        => '',                                  		                            		          
		          'cre_main_size'     => '',
		          'main_img_size'     => '',
		          'main_height'       => '',
		          'main_width'        => '',
                  'thumb_height'       => '',
		          'thumb_width'        => '',
				  'auto_play' =>'',
				  'preload'	=>'',
		          /*Navigator Setting */
		          'show_price'     => '',
		          'show_title'     => '',
		          'show_date'=> '',
		          'timenewslide'=> '',
		          /*Effect Setting*/
		          'event'           => '',
		          'pause_hover'      => '',
		          'add_cart'          => '',
		          'lof_duration'          => '',
                  'lof_speed'          => '',
		          'lofeffect'            => '',
                  'slide_start'         => '',                  
		          'max_width_expanded'        => '',
		          'target'       =>'',
				  /*Customize Style*/
		          'enable_caption'    => '',
		          'caption_bg'        => '',
                  'caption_opacity'   => '',                  
                  'caption_fontcolor' => '',
                  'caption_linkcolor' => '',
                  'price_color'       => '',
                  'pos_caption'       => '',
                  'caption_width'       => '',
                  'show_price'        => ''   , 
                  're_thumb'                => '',
                  'custom-num'              => '',
				  'file_path' => ''
		        );
                $listarticle = Tools::getValue('custom-num');
                $languages = Language::getLanguages();
                foreach($languages as $lan){
                    for( $i=1;$i<=$listarticle;$i++){                       
                        //upload file
                        //echo ($_FILES[$lan["id_lang"]."-".$i."-image"]['name']);die;
                        if (isset($_FILES[$lan["id_lang"]."-".$i."-image"]['name']) && $_FILES[$lan["id_lang"]."-".$i."-image"]['name'] != NULL ){
                          
                            $result = $this->_lofUpload($lan["id_lang"]."-".$i."-image");                       
                            if($result){
                                $imgFolder = _PS_IMG_DIR_.$this->name;
                                $imgFolder = str_replace(_PS_ROOT_DIR_,"",$imgFolder);                                                         
                                $imageLink = __PS_BASE_URI__.$imgFolder."/".$result;
                                $imageLink = str_replace("//","/",$imageLink);
                                
                                $_POST[$lan["id_lang"]."-".$i."-image"] = $imageLink;
                                $definedConfigs[$lan["id_lang"]."-".$i."-image"]  = '';    
                            }else{
                                $html .= "<div>".$this->l("Can't upload file in article")." ".$i."</div>";    
                            }                            						
                        }
						$definedConfigs[$lan["id_lang"]."-".$i."-title"]  = "";
						$definedConfigs[$lan["id_lang"]."-".$i."-type"]  = "";
						$definedConfigs[$lan["id_lang"]."-".$i."-link"]  = "";
						$definedConfigs[$lan["id_lang"]."-".$i."-desc"]  = "";                                                                          
						$definedConfigs[$lan["id_lang"]."-".$i."-price"]  = "";                                                                          
                    }
                }
    			 for($i=1; $i<=10; $i++){
                    $definedConfigs[$i."-enable"]    = "";
                    if(Tools::getValue($i."-enable")){
                        $definedConfigs[$i."-filetype"]  = "";                                        
                        $definedConfigs[$i."-path"]      = "";
                        $definedConfigs[$i."-link"]      = "";                                                                            
                        $definedConfigs[$i."-timer"]     = "";
                        $definedConfigs[$i."-target"]    = "";
                        $definedConfigs[$i."-imagePos"]  = "";
                        $definedConfigs[$i."-pan"]       = "";
                        $definedConfigs[$i."-desc"]      = "";
                        $definedConfigs[$i."-title"]     = ""; 
                        $definedConfigs[$i."-preview"]   = "";
                        $definedConfigs[$i."-pan"]       = "";
                        $definedConfigs[$i."-imagePos"]  = "";
                        $definedConfigs[$i."-timer"]     = "";
                    }                                                          
                }
		        foreach( $definedConfigs as $config => $key ){
		      		Configuration::updateValue($this->name.'_'.$config, Tools::getValue($config), true);
		    	}
                if(Tools::getValue('category')){
    		        if(in_array("",Tools::getValue('category'))){
    		          $catList = "";
    		        }else{
    		          $catList = implode(",",Tools::getValue('category'));  
    		        }
                    Configuration::updateValue($this->name.'_category', $catList, true);
                }
                $linkArray = Tools::getValue('override_links');
                if($linkArray){
                    foreach ($linkArray as $key => $value) {
                        if (is_null($value) || $value == "") {
                            unset ($linkArray[$key]);
                        }
                    }
                    $override_links = implode(",",$linkArray);
                    Configuration::updateValue($this->name.'_override_links', $override_links, true);
                }
				$delText = '';	
		        if(Tools::getValue('delCaImg')){					
					if(_PS_VERSION_ <="1.4"){						
						$cacheFol = _PS_IMG_DIR_.$this->name;												
					}else{			
						$cacheFol = _PS_CACHEFS_DIRECTORY_.$this->name;							
					}					
					if( file_exists( _PS_ROOT_DIR_.'/modules/'.$this->name.'/libs/group_base.php' ) && !class_exists("LofSlideShowDataSourceBase", false) ){
						if( !defined("LOF_SLIDE_SHOW_LOAD_LIB_GROUP") ) {
							require_once( _PS_ROOT_DIR_.'/modules/'.$this->name.'/libs/group_base.php' );
							define("LOF_SLIDE_SHOW_LOAD_LIB_GROUP",true);
						}
					}
					if (LofDataSourceBase::removedir($cacheFol)){
						$delText =  $this->l('. Cache folder has been deleted');
					}else{
						$delText =  $this->l('. Cache folder can\'tdeleted');
					}  
				}
		        $html .= '<div class="conf confirm">'.$this->l('Settings updated').$delText.'</div>';
			}
			else
			{
				foreach ($this->_postErrors AS $err)
				{
					$html .= '<div class="alert error">'.$err.'</div>';
				}
			}
			// reset current values.
			$this->_params = new LofParams( $this->name );	
		}
		return $html.$this->_getFormConfig();
	}
    
    
    private function _lofUpload($name){
        if (isset($_FILES[$name]['name']) && $_FILES[$name]['name'] != NULL ){
                $ext = substr($_FILES[$name]['name'], strrpos($_FILES[$name]['name'], '.') + 1);
                $attachFileTypes = array("jpg","bmp","gif","png");
                if(in_array($ext, $attachFileTypes)){
                    $uploadFolder = _PS_IMG_DIR_.$this->name;                  
                    if(!is_dir($uploadFolder)){
                        mkdir($uploadFolder, 0777);
                    }                    
          			if(@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadFolder."/".$_FILES[$name]["name"])){
          			   return $_FILES[$name]["name"];   
       			    }else{
       			       return false;
       			    }
          		}else{
          		    return false;     
          		}				
        }
    }
    
    
	/**
	 * Render Configuration From for user making settings.
	 *
	 * @return context
	 */
	private function _getFormConfig(){		
		$html = '';
	    $formats = ImageType::getImagesTypes( 'products' );
	    $themes=$this->getFolderList( dirname(__FILE__)."/tmpl/" );
        $groups=$this->getFolderList( dirname(__FILE__)."/libs/groups/" );
	    ob_start();
	    include_once dirname(__FILE__).'/config/lofslide.php'; 
	    $html .= ob_get_contents();
	    ob_end_clean(); 
		return $html;
	}
    public function getProFeature(){
        $sql = 'SELECT DISTINCT p.id_product FROM `'._DB_PREFIX_.'category_product` cp '
             . 'LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = cp.`id_product` '
             . 'WHERE cp.`id_category` =1';    
       return Db::getInstance()->ExecuteS($sql);
    }
	/**
     * Process vadiation before saving data 
     */
	private function _postValidation()
	{
		
	}
   /**
    * Get value of parameter following to its name.
    * 
	* @return string is value of parameter.
	*/
	public function getParamValue($name, $default=''){
		return $this->_params->get( $name, $default );	
	}
} 