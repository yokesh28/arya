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

<!-- MODULE Block specials -->
<div id="special_block_right" class="block products_block exclusive blockspecials">
	<h4><a href="{$link->getPageLink('prices-drop')}" title="{l s='Specials' mod='blockspecials'}">{l s='Specials' mod='blockspecials'}</a></h4>
	<div class="block_content">
       <div class="container_special">
         <div class="product_special_desc">
{if $special}  
         <a class="special_link" href="{$special.link}"><img src="{$link->getImageLink($special.link_rewrite, $special.id_image, 'home')}" alt="{$special.legend|escape:html:'UTF-8'}" title="{$special.name|escape:html:'UTF-8'}" /></a>
		 <h5><a href="{$special.link}" title="{$special.name|escape:html:'UTF-8'}">{$special.name|escape:html:'UTF-8'}</a></h5>
				 <p class="description_special">{$special.description_short|strip_tags|truncate:50:'...'}</p>	
				{if !$PS_CATALOG_MODE}
					<p class="price">{if !$priceDisplay}{displayWtPrice p=$special.price}{else}{displayWtPrice p=$special.price_tax_exc}{/if}</p>
				{/if}
			   <p class="all_special"> <a href="{$link->getPageLink('prices-drop')}" title="{l s='All specials' mod='blockspecials'}">&raquo; {l s='All specials' mod='blockspecials'}</a></p>

				{else}
						<p>{l s='No specials at this time' mod='blockspecials'}</p>
				{/if}	
			</div>
		</div>
	</div>
</div>
<!-- /MODULE Block specials -->