<div class="lof-recent-review">
    <div class="title">
        <span>{$recent_title}</span>
    </div>
    <div class="content">
        <ol class="products-list">
            {if $recentReview|count > 0}
            {foreach from=$recentReview item=recentItem name=lofrecent}
				
                <li class="item">
                    <a href="{$link->getProductLink($recentItem.id_product)}" title="{$recentItem.name|escape:html:'UTF-8'}">						
				        <img class="product-image" src="{$link->getImageLink($recentItem.link_rewrite, $recentItem.id_image, 'medium')}" alt="{$recentItem.name|escape:html:'UTF-8'}" />
				    </a>
                    <div class="product-details">
                        <a href="{$link->getProductLink($recentItem.id_product)}">{$recentItem.name|escape:html:'UTF-8'}</a>
                        <div id="stars-off-{$recentItem.id_product}" class="stars-off" style="width:80px;">
                    		<div id="stars-on-{$recentItem.id_product}" class="stars-on" style="width:{if $recentItem.avg_rating > 0 || $recentItem.avg_rating <= 100}{$recentItem.avg_rating}{else}0{/if}%"></div>
                    	</div>   
						{$recentItem.total_review}{l s=' review(s)' mod='lofreviews'}
                    </div>
                    <div style="clear:both;"></div>
                    <strong>
                        <a href="{$site_url}modules/lofreviews/viewDetails.php?review_id={$recentItem.review.id_lofreview_review}">
                            {$recentItem.review.title}
                        </a>
                    </strong>
                    <br />
                    <span>{$recentItem.review.comment}</span>
                    
                    <em>({l s='Review by ' mod='lofreviews'}{$recentItem.review.customer_name})</em>
                </li>
				
            {/foreach}
            {else}
                <li>{l s='No reviews at this time' mod='lofreviews'}</li>
            {/if}
        </ol>
    </div>
</div>