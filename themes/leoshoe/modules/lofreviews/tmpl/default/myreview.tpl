<h1> {l s='Reviews written by' mod='lofreviews'} 
    {if $id_customer eq 0}
        {l s='Guest' mod='lofreviews'}
    {else}
        {$customer_name}
    {/if}

</h1>
<!----ORDER BY------>

    {if $showOrdering eq '1'}
        <div class="lof-order-by" style="display: block;">
    {else}
        <div class="lof-order-by" style="display: none;">
    {/if}
        <form action="#" onsubmit="return false;" method="post">
            {l s='Sort by' mod='lofreviews'}: <select id="order_by" name="search_order_by" style="width:100px;" onchange="sort_review({$id_customer});">
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
        </form>
    </div>
<!---END ORDER BY--->
<div class="lof-review">
    {$listreviews}

</div>