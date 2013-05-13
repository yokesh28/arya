<div id="idTabLofReview" class="lof_tabContent">
   
    <!-----------reviewsStatistics---------------->
    <div class="lof-review-box">
        <h3 id="lof-reviewsStatistics-box" class="title-box">{l s='Statistics' mod='lofreviews'}</h3>
        <div id="lof-reviewsStatistics-contentbox" class="content">
            
        	{if $showAdvanceReport eq '1'}
            <div class="lof-advance-reviews">
                {foreach from=$reportAttributes item=lofReportAttr}
                <table>
                    <tr>
                        <th colspan="3">{$lofReportAttr.attribute_name}</th>
                    </tr>
                    {if $lofReportAttr.1star.avg <> 0}
                    <tr>
                        <td class="star-name">{l s='1 star' mod='lofreviews'}: </td>
                        <td class="star-line">
                            <div class="star-bar-container">
                                <div class="star-bar" style="width:{$lofReportAttr.1star.avg}%">{$lofReportAttr.1star.avg}%</div>
                            </div>
                        </td>
                        <td class="star-count">({$lofReportAttr.1star.total_review})</td>
                    </tr>
                    {/if}
                    {if $lofReportAttr.2star.avg <> 0}
                    <tr>
                        <td class="star-name">{l s='2 star' mod='lofreviews'}: </td>
                        <td class="star-line">
                            <div class="star-bar-container">
                                <div class="star-bar" style="width:{$lofReportAttr.2star.avg}%">{$lofReportAttr.2star.avg}%</div>
                            </div>
                        </td>
                        <td class="star-count">({$lofReportAttr.2star.total_review})</td>
                    </tr>
                    {/if}
                    {if $lofReportAttr.3star.avg <> 0}
                    <tr>
                        <td class="star-name">{l s='3 star' mod='lofreviews'}: </td>
                        <td class="star-line">
                            <div class="star-bar-container">
                                <div class="star-bar" style="width:{$lofReportAttr.3star.avg}%">{$lofReportAttr.3star.avg}%</div>
                            </div>
                        </td>
                        <td class="star-count">({$lofReportAttr.3star.total_review})</td>
                    </tr>
                    {/if}
                    {if $lofReportAttr.4star.avg <> 0}
                    <tr>
                        <td class="star-name">{l s='4 star' mod='lofreviews'}: </td>
                        <td class="star-line">
                            <div class="star-bar-container">
                                <div class="star-bar" style="width:{$lofReportAttr.4star.avg}%">{$lofReportAttr.4star.avg}%</div>
                            </div>
                        </td>
                        <td class="star-count">({$lofReportAttr.4star.total_review})</td>
                    </tr>
                    {/if}
                    
                    {if $lofReportAttr.5star.avg <> 0}
                    <tr>
                        <td class="star-name">{l s='5 star' mod='lofreviews'}: </td>
                        <td class="star-line">
                            <div class="star-bar-container">
                                <div class="star-bar" style="width:{$lofReportAttr.5star.avg}%">{$lofReportAttr.5star.avg}%</div>
                            </div>
                        </td>
                        <td class="star-count">({$lofReportAttr.5star.total_review})</td>
                    </tr>     
                    {/if}
                </table>
               
                {/foreach}
                <div class="lof-spacer"></div>
                
                <div class="total-reviews"> {$total_reviews} {l s='Review(s)' mod='lofreviews'}</div>
            </div>
            {/if}
            <!-----------End Report------------>    
        </div>
    </div>
    
    <!-----------SEARCH REVIEW------------>
    <div class="lof-review-box">
        <h3 id="lof-reviewsearch-box" class="title-box">{l s='Search' mod='lofreviews'}</h3>
        <div id="lof-reviewsearch-contentbox" class="content">
            {if $showFilterForm eq '1'}
            <div class="lof-search-review">
                <form action="#" onsubmit="return false;" method="post">
                	<table class="pros-cons">
                        <thead>
                            <th>{l s='Pros' mod='lofreviews'}</th>
                            <th>{l s='Cons' mod='lofreviews'}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="vertical-align: top;">
                                    {foreach from=$pros item=item_p}
                                        <input onclick="go_page_reviews(0, {$id_product}, 0, 1, {$id_customer} );" name="lof_seach_pros_cons[]" type="checkbox" value="{$item_p.id_lofreview_criterion}" /> {$item_p.title} <br />
                                    {/foreach}
                                </td>
                                <td style="vertical-align: top;">
                                    {foreach from=$cons item=item_c}
                                        <input onclick="go_page_reviews(0, {$id_product}, 0, 0, {$id_customer} );" name="lof_seach_pros_cons[]" type="checkbox" value="{$item_c.id_lofreview_criterion}" /> {$item_c.title} <br />
                                    {/foreach}
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </form>
            </div>
        	{/if}
        </div> 
    </div>
    <!----ORDER BY------>
    {if $showOrdering eq '1'}
        <div class="lof-order-by" style="display: block;">
    {else}
        <div class="lof-order-by" style="display: none;">
    {/if}
        <form action="#" onsubmit="return false;" method="post">
            Sort-by: <select id="order_by" name="search_order_by" style="width:100px;" onchange="go_page_reviews(0, {$id_product},1,0, {$id_customer} );">
				{if $defaultOrdering eq 'date'}
                <option value="date_add">{l s='Date' mod='lofreviews'}</option> 
				<option value="customer_name">{l s='Name' mod='lofreviews'}</option>
                <option value="title">{l s='title' mod='lofreviews'}</option>
                <option value="like_count">{l s='Helpfullness' mod='lofreviews'}</option>
                {elseif $defaultOrdering eq 'name'}
                <option value="customer_name">{l s='Name' mod='lofreviews'}</option>
                <option value="date_add">{l s='Date' mod='lofreviews'}</option>
                <option value="title">{l s='title' mod='lofreviews'}</option>
                <option value="like_count">{l s='Helpfullness' mod='lofreviews'}</option>
                {elseif $defaultOrdering eq 'title'}
                <option value="title">{l s='title' mod='lofreviews'}</option>
                <option value="date_add">{l s='Date' mod='lofreviews'}</option> 
				<option value="customer_name">{l s='Name' mod='lofreviews'}</option>
                <option value="like_count">{l s='Helpfullness' mod='lofreviews'}</option>
                {elseif $defaultOrdering eq 'helpfullness'}
                <option value="like_count">{l s='Helpfullness' mod='lofreviews'}</option>
                <option value="date_add">{l s='Date' mod='lofreviews'}</option> 
				<option value="customer_name">{l s='Name' mod='lofreviews'}</option>
                <option value="title">{l s='title' mod='lofreviews'}</option>
                {else}
                <option value="date_add">{l s='Date' mod='lofreviews'}</option> 
				<option value="customer_name">{l s='Name' mod='lofreviews'}</option>
                <option value="title">{l s='title' mod='lofreviews'}</option>
                <option value="like_count">{l s='Helpfullness' mod='lofreviews'}</option>
                {/if}
			</select> 
            <!---RSS FEED--->
            <div class="lof-rss">
                {if ($rssOption)}
                    <a class="link-rss" href="{$feedUrl}" rel="nofollow">
                       <span class="img-rss"></span>
                    </a> 
                {/if}
            </div>
        </form>
    </div>
    <!------LIST REVIEW--------->
<div class="lof-review">   
    {$listreviews}
</div>
   

<!-----------ERROR--------------->
<div>
    <ul class="messages">
        {if isset($post_errors) && $post_errors}
        <li class="error-msg" style="display:block;">            
            <ul>
            {foreach from=$post_errors key=k item=error}
                <li>{$error}</li>
            {/foreach}
            </ul>
        </li>
        {/if}
        {if $postSuccess}
        <li class="success-msg" style="display:block;">
            <ul>
        	    <li>{$postSuccess}</li>
            </ul> 
        </li>
        {/if}
    </ul>
</div>
<div style="clear:both;"></div>
<!-----------END ERROR------------>


{if $onlycustomer eq '0'} 
   {include file="$include_form"} 
{else}
    {if $checkStateOrder eq '1'}
        {include file="$include_form"}    
    {/if}    
{/if}

</div>
