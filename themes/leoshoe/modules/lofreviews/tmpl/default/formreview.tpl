  <!---Form onsubmit="return lofValidForm()"
  $request_uri <br />
  $site_url product.php?id_product=$id_product
  --->
<div class="lof-review-box"> 
    <h3 id="lof-reviewsubmit-box" class="title-box">{l s='Add Review' mod='lofreviews'}</h3>
    <div class="lof-reviewsubmit-box content" id="lof-reviewsubmit-contentbox">
        <form id="lof-send-review" class="1uniForm" onsubmit="return lofValidForm()" method="post" action="">
            <h4>{l s='Write your own review for' mod='lofreviews'}: {$productname}</h4>
            <h4>{l s='How do you rate this product' mod='lofreviews'}? *</h4>
            <span id="lof-message-box"></span>
            
            {if $showProsCons eq '1' && $customproscons eq '1'} 
            <table class="lof_proscons">
    			<thead>
                    <th>{l s='Pros' mod='lofreviews'}</th>
                    <th>{l s='Cons' mod='lofreviews'}</th>
                </thead>
                <tbody>
    				{if $showProsCons eq '1'} 
                    <tr>
                        <td>
                            {foreach from=$pros item=lofpros}
                                <input name="lof_pros[{$lofpros.id_lofreview_criterion}]" type="checkbox" value="{$lofpros.title}" /> {$lofpros.title} <br />
                            {/foreach}
                        </td>
                        <td>
                            {foreach from=$cons item=lofcons}
                                <input name="lof_cons[{$lofcons.id_lofreview_criterion}]" type="checkbox" value="{$lofpros.title}" /> {$lofcons.title} <br />
                            {/foreach}
                        </td>
                    </tr>
    				{/if}
    				{if $customproscons eq '1'} 
                    <tr>
                        <td>
                            {l s='Enter your Pros, separated by comma' mod='lofreviews'} <br />
                            <input id="lofcustom_pros" name="lofcustom_pros" type="text" value="" />
                        </td>
                        <td>
                            {l s='Enter your Cons, separated by comma' mod='lofreviews'} <br />
                            <input id="lofcustom_cons" name="lofcustom_cons" type="text" value="" />
                        </td>
                    </tr>
    				{/if}
                </tbody>
            </table>
           {/if}
            <table>
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$attributes item=lofattribute}
                    <tr>
                        <td>{$lofattribute.title}: </td>
                        <td>
                            <div class="lofrating-fields-{$lofattribute.title}" id="lofrating-fields-{$lofattribute.title}">
        						<select id="_lofselect_stars" name="lofselect_stars[{$lofattribute.id_lofreview_attribute}]">
        							<option value="1">{l s='Bad' mod='lofreviews'}</option>
        							<option value="2">{l s='Poor' mod='lofreviews'}</option>
        							<option value="3">{l s='Average' mod='lofreviews'}</option>
        							<option value="4">{l s='Good' mod='lofreviews'}</option>
        							<option value="5">{l s='Excellent' mod='lofreviews'}</option>
        						</select>
        				    </div>    
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
            <span id="lof_star_info"></span>
            
            <!-- textInput -->
            <br />
            <div class="field">
                <h4>{l s='Name' mod='lofreviews'}</h4>
                {if $id_customer eq '0'}
                    <input id="lof_nickname" name="lof_nickname" type="text" size="50" value="" />
                {else}
                    <input id="lof_nickname" name="lof_nickname" type="text" size="50" value="{$customer_name}" readonly="readonly"/>
                {/if}
                <br />
                <span id="lof_nickname_info"></span>
            </div>
            <div class="field">
                <h4>{l s='Title' mod='lofreviews'}</h4>
                <input id="lof_title" name="lof_title" type="text" value="" size="50"/>
                <br />
                <span id="lof_title_info"></span>
            </div>
            <div class="field">
                <h4>{l s='Content' mod='lofreviews'}</h4>
                <textarea cols="75" rows="5" name="lof_content" id="lof_content"></textarea><br/>
                <span id="lof_content_info"></span>
            </div>
           
            {if $antispam eq '1'}
            <div class="field">
                <h4>{l s='Captcha' mod='lofreviews'}</h4>
                <table>
                    <tr>
                        <td><input type="text" name="lofreview_captcha" value="" id="lofreview_captchainput"/></td>
                        <td>
                            <img src="{$site_url}modules/{$module_name}/captcha.php?rand={$rand}" id="lofreview_captcha"/>
                            <div id="lofreview_refresh" href="javascript:void(0)" title="{l s='refresh' mod='lofreviews'}">&nbsp;</div>
                        </td>
                    </tr>
                </table>
                <span id="lofreview_captchainput_info"></span>
            </div>
            {/if}
			<div class="box_btn">
				<input class="lof_button" name="lofreviews_submitMessage" value="{l s='Send' mod='lofreviews'}" type="submit" />
			</div>
                 
    	</form>
    </div>
</div>