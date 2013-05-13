<div id="mycarouselHolder" align="center">
{if $show_title}
	<h2>{$module_title}</h2>
{/if}
<div id="wrap">
  <ul id="lofjcarousel" class="jcarousel-skin-tango">
	{foreach from=$lofmanufacturers item=manufacturer name=manufacturers}
		<li class="lof-item">
			<a href="{$manufacturer.link}">
				<img src="{$manufacturer.linkIMG}" alt="{$manufacturer.name}" vspace="0" border="0" />
				<span>{$manufacturer.name}</span>
			</a>
		</li>
	{/foreach}
  </ul>
</div>
</div>