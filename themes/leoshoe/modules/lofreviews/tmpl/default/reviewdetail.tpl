<script type="text/javascript">
    function makeHelpfull1(id_review, yes_no){ldelim}
        $.post(baseDir + 'modules/lofreviews/ajax.php', {ldelim}
    		action:'helpfull',
			id_review: id_review,
            yes_no: yes_no
	    {rdelim},
        function (data) {ldelim}
    		if (data.status == 'success') {ldelim}
                setCookie("like-this-" + id_review,"like-this-" + id_review,1);
                $("#like-this-" + id_review).html('');    
    		{rdelim} else {ldelim}
    			alert(data.message);
    		{rdelim}
	    {rdelim}, 'json');
     {rdelim}
        
     function reportIt(id_review){ldelim}
        $.post(baseDir + 'modules/lofreviews/ajax.php', {ldelim}
    		action:'reportit',
			id_review: id_review,
	    {rdelim},
        function (data) {ldelim}
    		if (data.status == 'success') {ldelim}
    		    setCookie("report-it-" + id_review,"report-it-" + id_review,1);  
                $("#report-it-" + id_review).html('');    
    		{rdelim} else {ldelim}
    			alert(data.message);
    		{rdelim}
	    {rdelim}, 'json');
    {rdelim}
    
    //get Cookie
    function getCookie(c_name){ldelim}
		var i,x,y,ARRcookies=document.cookie.split(";");
		for (i=0;i<ARRcookies.length;i++)
		{ldelim}
			x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
			y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
			x=x.replace(/^\s+|\s+$/g,"");
			if (x==c_name)
			{ldelim}
				return unescape(y);
			{rdelim}
		{rdelim}
	{rdelim}
    //set Cookie
    function setCookie(c_name,value,exdays)
	{ldelim}
		var exdate=new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
		document.cookie=c_name + "=" + c_value;
	{rdelim}
    
    $(document).ready(function () {ldelim}
		$(".like-this").each(function (index) {ldelim}
		     var id_like = $(this).attr("id");
             //alert(getCookie(id_like));
             if(getCookie(id_like) != null || getCookie(id_like) !== undefined  ){ldelim}
                $("#"+id_like).html(''); 
             {rdelim}
		{rdelim});
        
        $(".report-it").each(function (index) {ldelim}
		     var id_report = $(this).attr("id");
             if(getCookie(id_report) != null || getCookie(id_report) !== undefined){ldelim}
                $("#"+id_report).html(''); 
             {rdelim}
		{rdelim});
    {rdelim});
</script>

<h2>{l s='Review details' mod='lofreviews'}</h2>

<div class="lof-review-details">
    <div class="product-img-box">
        <a class="product-image" href="{$link->getProductLink($reviewDetails.id_product)}" title="{$reviewDetails.name|escape:html:'UTF-8'}" title="{$reviewDetails.name}" >
            <img  src="{$link->getImageLink($reviewDetails.link_rewrite, $reviewDetails.id_image, 'medium')}" alt="{$reviewDetails.name|escape:html:'UTF-8'}" height="125" width="125"/>
        </a>
        <p class="label">{l s='Average Customer Rating' mod='lofreviews'}:</p>
        <div class="ratings">
			<div class="rating-box">
			     <div id="stars-off-{$reviewDetails.id_product}" class="stars-off" style="width:80px;">
      		        <div id="stars-on-{$reviewDetails.id_product}" class="stars-on" style="width:{if $reviewDetails.avg_rating > 0 || $reviewDetails.avg_rating < 100}{$reviewDetails.avg_rating}{else}0{/if}%"></div>
                 </div>  
            </div>
			<p class="rating-links">
			<a href="{$link->getProductLink($reviewDetails.id_product)}">{$sumReview} {l s=' Review(s)' mod='lofreviews'}</a>
			<span class="separator">|</span>
			<a href="{$link->getProductLink($reviewDetails.id_product)}">Add Your Review</a>
			</p>
		</div>
    </div>
    
    <div class="product-details">
        <h2 class="product-name">{$reviewDetails.name}</h2>
        <h3>{l s='Product Rating:' mod='lofreviews'}</h3>
        <table class="ratings-table">
            <tbody>
                {foreach from=$reviewDetails.review_attribute item=lofatt}
                <tr>
                    <th>{$lofatt.attribute_title}:</th>
                    <td>
                        <div class="rating-box">
            			     <div id="stars-off-{$reviewDetails.id_product}-{$lofatt.id_lofreview_attribute}" class="stars-off" style="width:80px;">
                  		        <div id="stars-on-{$reviewDetails.id_product}-{$lofatt.id_lofreview_attribute}" class="stars-on" style="width:{if $lofatt.rating_sum > 0 || $lofatt.rating_sum < 100}{$lofatt.rating_sum*20}{else}0{/if}%"></div>
                             </div>  
                        </div>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
                <dl>
					<dt>
						{$reviewDetails.title} ({l s='submitted on' mod='lofreviews'} {$reviewDetails.date_add|date_format}):                
					</dt>
					<dd>
						{$reviewDetails.comment}  
                        <br />
                        <em>{l s='(Review by' mod='lofreviews'} {$reviewDetails.customer_name})</em>            
					</dd>
				</dl>
            	<br />
				{if $reviewDetails.pros|@count > 0} <b>{l s='Pros: ' mod='lofreviews'}</b>
							 {foreach from=$reviewDetails.pros item=lofReportAttr}
								{$lofReportAttr.title},&nbsp;
							{/foreach}	
					{/if}
				<br />
				{if $reviewDetails.cons|@count > 0} <b>{l s='Cons: ' mod='lofreviews'}</b>
							 {foreach from=$reviewDetails.cons item=lofReportAttr}
								{$lofReportAttr.title},&nbsp;
							{/foreach}	
					{/if}  
				<br /><br />
<div style="display:block;">
    <table style="width:100%;">
        <tbody>
		<tr>
            <td style="width:30%;">
                <!-- lofreviews Socialshare block start -->
				<div style="display: block;">
					<div style="float:left; margin: 3px;">
						<a href="http://www.facebook.com/sharer.php?u={$review_link}&amp;t={$reviewDetails.title}" target="_blank" style="text-decoration: none;">
							<img src="{$site_url}modules/lofreviews/tmpl/default/assets/img/link-facebook.gif" alt="{l s='Facebook' mod='lofreviews'}" title="{l s='Add to Facebook' mod='lofreviews'}" height="16" width="16"/>
						</a>
						<a href="http://twitter.com/share?url={$review_link}&amp;text={$reviewDetails.title}" target="_blank" style="text-decoration: none;">
							<img src="{$site_url}modules/lofreviews/tmpl/default/assets/img/link-twitter.gif" alt="{l s='Twitter' mod='lofreviews'}" title="{l s='Add to Twitter' mod='lofreviews'}" height="15" width="15"/>
						</a>
                        <a href="http://pinterest.com/pin/create/button/?url={$review_link}&media={$link->getImageLink($reviewDetails.link_rewrite, $reviewDetails.id_image, 'medium')}&description={$reviewDetails.title}"
                            class="pin-it-button" count-layout="horizontal">
                            <img border="0" src="//assets.pinterest.com/images/PinExt.png" title="{l s='Pin It' mod='lofreviews'}" />
                        </a>
                        <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
					</div>
					<div>{l s='Share this review' mod='lofreviews'}</div>
				</div>
				<!-- lofreviews Socialshare block end -->          
				</td>
            <td style="width:50%;">
				<div style="display:block; float:right; text-align:left; margin-bottom:4px;">
					{if $showHelpfullness eq '1'}
								{if $guestratehelpful eq '1'}
								<div id="like-this-{$reviewDetails.id_lofreview_review}" class="like-this">
                                    {l s='(Do you find this review helpful?)' mod='lofreviews'}
									<a id="{$reviewDetails.id_lofreview_review}" href="javascript:void(0)" class="helpful-link-yes" onclick="makeHelpfull({$reviewDetails.id_lofreview_review},1);">{l s='Yes' mod='lofreviews'}</a>
									<a id="{$reviewDetails.id_lofreview_review}" href="javascript:void(0)" class="helpful-link-no" onclick="makeHelpfull({$reviewDetails.id_lofreview_review}, 0);">{l s='No' mod='lofreviews'}</a>
								</div>
								{/if}
								
							{/if}
                            
                            {if $guestreport eq '1'}
                                <div id="report-it-{$reviewDetails.id_lofreview_review}" class="report-it">
                                    {l s='Inappropriate review ' mod='lofreviews'}
                                    <a id="{$reviewDetails.id_lofreview_review}" href="javascript:void(0)" class="report" onclick="reportIt({$reviewDetails.id_lofreview_review});">{l s='Report it' mod='lofreviews'}</a>
                                </div>
                   {/if}
					<div style="text-align: right;">
					(<strong>{$reviewDetails.like_count}</strong> of <strong>{$reviewDetails.totalLike}</strong> {l s='people found this review helpful' mod='lofreviews'})
					</div>
				</div>           
			</td>
        </tr>
        </tbody>
	</table>
</div>  
</div>
<div class="buttons-set">
        <p class="back-link">
            <a href="{$link->getProductLink($reviewDetails.id_product)}">
                <small>&laquo;</small>
                {l s='Back to Product Reviews' mod='lofreviews'}
            </a>
        </p>
    </div>
</div>