{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 6594 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$lang_iso}">
	<head>
		<title>{$meta_title|escape:'htmlall':'UTF-8'}</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
{/if}
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<meta http-equiv="content-language" content="{$meta_language}" />
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />	
		<script type="text/javascript">
			var baseDir = '{$content_dir}';
			var baseUri = '{$base_uri}';
			var static_token = '{$static_token}';
			var token = '{$token}';
			var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
			var priceDisplayMethod = {$priceDisplay};
			var roundMode = {$roundMode};
		</script>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700,900,200italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Finger+Paint' rel='stylesheet' type='text/css'>
{if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
	     <link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
	{/foreach}
{/if}

    {if $LEO_SKIN_DEFAULT &&  $LEO_SKIN_DEFAULT !="default"}
	<link rel="stylesheet" type="text/css" href="{$content_dir}themes/leoshoe/skins/{$LEO_SKIN_DEFAULT}/css/skin.css" media="{$media}" />
	{/if}
	{if $LEO_PANELTOOL}
	<link rel="stylesheet" type="text/css" href="{$content_dir}themes/leoshoe/css/paneltool.css" media="{$media}" />
	{/if}

{if isset($js_files)}
	{foreach from=$js_files item=js_uri}
	<script type="text/javascript" src="{$js_uri}"></script>
	{/foreach}
{/if}
		{$HOOK_HEADER}
	</head>
	
	<body {if isset($page_name)}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if} class="{if $hide_left_column}hide-left-column{/if} {if $hide_right_column}hide-right-column{/if}">
	{if !$content_only}
		{if isset($restricted_country_mode) && $restricted_country_mode}
		<div id="restricted-country">
			<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
		</div>
		{/if}
		<div id="leo-page" class="container_9 {$LEO_BGPATTERN} {if $lang_iso=='fr'}frcss{/if} clearfix">
			
			<!-- Header -->
			<div id="logo">
			<a href="{$base_dir}"><img src="{$base_dir}/themes/leoshoe/img/logo1.png"></a>
			</div>
			<div id="leo-header" class="grid_9 alpha omega">
				<div class="leo-inner">						
						<div class="leo-wrapper">
									<a id="header_logo" href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}">
										<img class="logo" src="{$logo_url}" alt="{$shop_name|escape:'htmlall':'UTF-8'}" {if $logo_image_width}width="{$logo_image_width}"{/if} {if $logo_image_height} height="{$logo_image_height}" {/if} />
									</a>
									<div id="header_right" class="grid_6 omega">
										{$HOOK_TOP}
									</div>	
									{include file="$tpl_dir./breadcrumb.tpl"}	
						</div>
				</div>
			</div><!-- end-header -->
			
			
			
			<div id="leo-maincontainer" class="wrap">
				<div class="leo-inner">					
						<div class="leo-wrapper">
							<div id="leo-columns" class="grid_9 alpha omega clearfix">	
								{if $page_name != "index"}
								<div id="leo-leftcol" class="column grid_2 alpha">
										{$HOOK_LEFT_COLUMN}
								</div><!--leftcol-->
							
							   {/if}							
								<!-- Center -->
								<div id="leo-centercol">
									<div id="center_column" class=" grid_5">
	{/if}
