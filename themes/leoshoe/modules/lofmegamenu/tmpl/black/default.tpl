{if $pos == 'top'}</div>{/if}
<div style="clear:both"></div>
<div class="menunongroup {if $pos !='top'}block{/if}">
	{if $pos != 'top' && $show_title}<h4>{$title}</h4>{/if}
	<div class="lofmegamenublack-{$pos}{if $moduleClass} {$moduleClass}{/if}">
		<div id="lofmegamenu{$blockid}{$pos}">
			{$results}
			<div style="clear:both;"></div>
		</div>
	</div>
{if $pos != 'top'}</div>{/if}
{$content}