<div class="lof-avg">
    <table>
        {foreach from=$avgReviewByAttribute item=lof_avg}
        <tr>
            <td>{$lof_avg.title}</td>
            <td>                
                <div id="stars-off-{$lof_avg.id_product}-{$lof_avg.id_lofreview_attribute}" class="stars-off" style="width:80px;">
              		<div id="stars-on-{$lof_avg.id_product}-{$lof_avg.id_lofreview_attribute}" class="stars-on" style="width:{if $lof_avg.avg > 0 || $lof_avg.avg <= 100}{$lof_avg.avg*20}{else}0{/if}%"></div>
               	</div>
            </td>
        </tr>
        {/foreach}
    </table>
    <div class="lof-sum-review">{$sumReview} {l s=' Review(s)' mod='lofreviews'}</div>
</div>