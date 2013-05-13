
<div class="clearfix clear clr"></div>
<div class="lof-newproduct {$theme}" style="width:{$moduleWidth};height:{$moduleHeight}">
	<section class="newproduct-widget">
		<header>
			<h3 class="newproduct-title">
			     {$lof_title = {l s='News Product'}}
                <span class="lof_title">{$lof_title|mb_substr:0:4:utf8}</span>{$lof_title|mb_substr:4:1000:utf8}
		    </h3>
		</header>
		<div class="list-newproduct responsive">
			<ul id="lofnewproduct-{$moduleId}" class="newproduct-news clearfix">
				{foreach from=$listNews item=item}    
				<li>
					<article>
					   <div class="container-newproduct">
						<div class="newproduct-item box-hover clearfix">
							<div class="video-thumb">
								<a href="{$item.link}" title="$item.name" class="product_image">
									<img class="responsive-img" src="{$item.mainImge}" alt="{$item.name}"/>
								</a>
							</div>
							<div class="entry-content">
								{if $show_date eq '1'}<div class="entry-date">{$item.dateAdd}</div>{/if}
								{if $show_title eq '1'}
								<h4 class="entry-title">
									<a href="{$item.link}" target="{$target}">{$item.name}</a>
								</h4>
								{/if}
								{if $show_price eq '1'}<div class="entry-price">{$item.price}</div>{/if}
								{if (($item.reduction) != ($item.price)) AND ($priceSpecial  eq '1')}
								<div class="entry-price-discount">{displayWtPrice p=$item.price_without_reduction}</div>
								{/if}	
							</div>
							    <div class="detail_add">
									{if $show_desc eq '1'}<p>{$item.description}</p>{/if}
									<a class="lof-detail" href="{$item.link}">{$item.description}</a>
									{if (($item.quantity > 0 OR $item.allow_oosp))}
									<a class="lof-add-cart ajax_add_to_cart_button" rel="ajax_id_product_{$item.id_product}" href="{$site_url}cart.php?add&amp;id_product={$item.id_product}&amp;token={$token}"><span>{l s='Shop now' mod='lofnewproduct'}</span></a>
									{else}
										<span class="lof-add-cart">{l s='Shop now' mod='lofnewproduct'}</span></a>
									{/if}
								</div>
						</div>
					  </div>
					</article>				
				</li>
				{/foreach}
			</ul>		
			<div class="clear"></div>
			{if $show_button eq '1'}
			<div class="newproduct-nav">
				<a id="lofprev" class="prev" >&nbsp;</a>
				<a id="lofnext" class="next" >&nbsp;</a>
			</div>
			{/if}
			{if $show_pager eq '1'}<div id="lofpager-{$moduleId}" class="lof-pager"></div>{/if}
		</div>
	</section>
</div>
<script type="text/javascript">
  	{literal}
	jQuery(document).ready(function(){
		a = $('.newproduct-item').width();
		b = $('.newproduct-item').height();
		$('.container-newproduct').hover(function(){
			$(this).find('.detail_add').fadeIn(200).css('top','0').css('width',a-40).css('height',b-38);
		},function(){
			$(this).find('.detail_add').fadeOut();
		});	
	});
	$('.list-newproduct ul').find('li:last').addClass("last");
	$('.newproduct-news').carouFredSel({
				width : {/literal}{$moduleWidth}{literal},
				items : {/literal}{$limit_cols}{literal},
				scroll: {
					items: 1,
					pauseOnHover: true
						},
				prev : {
						button : "#lofprev",
						key : "left",
						items : 2,
						easing : "easeInOutCubic",
						duration : 750
						},
				next : {
						button : "#lofnext",
						key : "right",
						items : 4,
						easing : "easeInQuart",
						duration : 750
						},
			    auto : {/literal}{$auto_play}{literal}
		});	
	{/literal}
</script>