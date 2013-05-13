<script type="text/javascript">
	$(document).ready(function () {
	    /*
        $('.lof-order-by').click(function() {
            $('#lof-reviewList-contentbox').slideToggle('slow');
                return;
        }); 
        */  
        
		$('#review-black').smartpaginator({ 
			totalrecords: <?php echo sizeof($lofreviews); ?>, 
			recordsperpage: <?php echo $limititems; ?>, 
			datacontainer: 'review-divs', 
			dataelement: 'span', 
			length: 4,
			initval: 0, 
			next: 'Next', 
			prev: 'Prev', 
			first: 'First', 
			last: 'Last', 
			theme: 'black' 
		});
	});
</script>




<div class="lof-review-box"> 
    
    <div id="lof-reviewList-contentbox" class="content">    
        <h5><?php echo $l['Found'].sizeof($lofreviews).$l['reviews'];?></h5>
        
        
        <!--LIST REVIEW-->
		<div class="lof-list-review" id="review-divs">  
			<?php foreach($lofreviews as $lofreviewitem){ ?>
				<span class="lof-review-item">
					<div class="title">
						<a class="lof-title" href="<?php echo $site_url."modules/lofreviews/viewDetails.php?review_id=".$lofreviewitem["id_lofreview_review"]; ?>"><?php echo $lofreviewitem["review_title"];?></a>
						
						<?php echo $l["review by"]; ?>
						<b><?php echo $lofreviewitem["customer_name"];?></b>
						<?php if(!empty($lofreviewitem["id_customer"])): ?>
						
						<a href="<?php echo $site_url."modules/lofreviews/view.php?id_customer=".$lofreviewitem["id_customer"]; ?>"> <?php echo $l["All my review"];?></a>
						<?php endif; ?>
					</div>
					<div class="attribute">
						<table class="tbl-star">
							<?php
								if(!empty($lofreviewitem["review_attribute"])){
									foreach( $lofreviewitem["review_attribute"]  as $lofattribute){ ?>
							<tr>
								<td><?php echo $lofattribute["attribute_title"]; ?></td>
								<td>
									<div id="lofstar-<?php echo $lofattribute["id_lofreview_attribute"];?>-<?php echo $lofattribute["id_lofreview_review"]; ?>"  class="stars-off" style="width:80px;">
										<div id="lofstar-<?php echo $lofattribute["id_lofreview_attribute"];?>-<?php echo $lofattribute["id_lofreview_review"]; ?>"  class="stars-on" style="width:<?php echo $lofattribute["rating_sum"]*20; ?>%"></div>
									</div>
								</td>
							</tr>
							<?php } }  ?>
						</table>
						<div class="comment"><?php echo $lofreviewitem["comment"];?></div>
						<div class="pros">
							<b><?php if(!empty($lofreviewitem["pros"])) echo $l["Pros"]; ?></b>
							<?php $pros = '';
								foreach($lofreviewitem["pros"] as $value){
									$pros .= $value["title"].', ';
								}
								echo $pros;
							?>
						</div>
						<div class="cons">
							<b><?php if(!empty($lofreviewitem["cons"])) echo $l["Cons"]; ?></b>
							<?php $cons = '';
								foreach($lofreviewitem["cons"] as $value){
									$cons .= $value["title"].', ';
								}
								echo $cons;
							?>
						</div>
						
						
						<div class="date">(<?php echo $l["Posted on"].$lofreviewitem["date_add"];?>)</div>
						<table style="width: 100%;">
							<tr>
								<td style="width: 50%;vertical-align: top;">
									<?php if($socialSharing){ 
										$review_link = $site_url."lofreviews.php?task=view&review_id=".$lofreviewitem["id_lofreview_review"];
										$review_link = urlencode($review_link);
									?>
									
									<!-- lofreviews Socialshare block start -->
									<div style="display: block;">
										<div style="float:left; margin: 3px;">
											<a href="http://www.facebook.com/sharer.php?u=<?php echo $review_link; ?>&amp;t=<?php echo $lofreviewitem["review_title"]; ?>" target="_blank" style="text-decoration: none;">
												<img src="<?php echo $site_url;?>modules/lofreviews/tmpl/default/assets/img/link-facebook.gif" alt="Facebook" title="Add to Facebook" height="16" width="16"/>
											</a>
											<a href="http://twitter.com/share?url=<?php echo $review_link;?>&amp;text=<?php echo $lofreviewitem["review_title"]; ?>" target="_blank" style="text-decoration: none;">
												<img src="<?php echo $site_url;?>modules/lofreviews/tmpl/default/assets/img/link-twitter.gif" alt="Twitter" title="Add to Twitter" height="15" width="15"/>
											</a>
					 
											<?php 
												$images = Image::getImages($cookie->id_lang, $lofreviewitem['id_product']);
												$id_image = $lofreviewitem['id_product'].'-'.$images[0]['id_image'];
											?>    
											
											

										<div><?php echo $l["Share this review"];?></div>
									</div>
									<!-- lofreviews Socialshare block end -->        
									<?php } ?>
								</td>
								<td>
									<?php if($showHelpfullness){ ?>
										<?php if($guestratehelpful){ ?>
										<div id="like-this-<?php echo $lofattribute["id_lofreview_review"]?>" class="like-this">
											<?php echo $l["Do you find this review helpful"]; ?>
											<a id="<?php echo $lofattribute["id_lofreview_review"]?>" href="javascript:void(0)" class="helpful-link-yes" onclick="makeHelpfull(<?php echo $lofreviewitem["id_lofreview_review"]?>,1);"><?php echo $l["Yes"]; ?></a>
											<a id="<?php echo $lofattribute["id_lofreview_review"]?>" href="javascript:void(0)" class="helpful-link-no" onclick="makeHelpfull(<?php echo $lofreviewitem["id_lofreview_review"]?>, 0);"><?php echo $l["No"]; ?></a>
										</div>
										<?php } ?>
										<?php
											$total_like_count = (int)$lofreviewitem["unlike_count"] + (int)$lofreviewitem["like_count"];
										?>
										<div class="helpful"><?php echo '(' . $lofreviewitem["like_count"]. $l["of"] . $total_like_count . $l["people found this review helpful"]; ?></div>
									<?php } ?>
									
									<?php if($guestreport){ ?>
										<div id="report-it-<?php echo $lofattribute["id_lofreview_review"]?>" class="report-it">
											<?php echo $l["Inappropriate review"]; ?>
											<a id="<?php echo $lofattribute["id_lofreview_review"]?>" href="javascript:void(0)" class="report" onclick="reportIt(<?php echo $lofreviewitem["id_lofreview_review"]?>);"><?php echo $l["Report it"]; ?></a>
										</div>
									<?php } ?>
								</td>
							</tr>
						</table>
					</div>
				</span>
			<?php
				}
			?>
		</div>          
        <!--END LIST REVIEW -->
        <div style="clear: both;"></div>
        <?php if(sizeof($lofreviews) > 0){ ?>
        <div id="review-black" style="margin: auto;"></div>
        <?php }?>
    </div>
</div>



















<!--- script paging --->

<script type="text/javascript">
    function sort_review(id_customer){
        var orderby_value = $("#order_by option:selected").val();
        $.post(baseDir + 'modules/lofreviews/ajax.php', {
    		action:'resort',
            id_customer: id_customer,
            orderby_value:orderby_value
	    },
        function (data) {
    		if (data.status == 'success') {
        		$(".lof-review").html('');	
				$(".lof-review").prepend(data.params.content);
    		} else {
    			alert(data.message);
    		}
	    }, 'json');
    }
    function go_page_reviews(page, id_product,is_orderby, is_search, id_customer){   
        var orderby_value = $("#order_by option:selected").val();
        var data_pros_cons = $('input:checkbox[name="lof_seach_pros_cons[]"]:checked')
                       .map(function() { return $(this).val() })
                       .get().join(",");
        
        $.post(baseDir + 'modules/lofreviews/ajax.php', {
    		action:'pagenav',
    		page : page,
			id_product: id_product,
            is_orderby: is_orderby,
            is_search: is_search,
            data_pros_cons: data_pros_cons,
            orderby_value:orderby_value,
            id_customer: id_customer
	    },
        function (data) {
    		if (data.status == 'success') {
        		$(".lof-review").html('');	
				$(".lof-review").prepend(data.params.content);
    		} else {
    			alert(data.message);
    		}
	    }, 'json');
    }
    
    function makeHelpfull1(id_review, yes_no){
        $.post(baseDir + 'modules/lofreviews/ajax.php', {
    		action:'helpfull',
			id_review: id_review,
            yes_no: yes_no
	    },
        function (data) {
    		if (data.status == 'success') {
                setCookie("like-this-" + id_review,"like-this-" + id_review,1);
                $("#like-this-" + id_review).html('');    
    		} else {
    			alert(data.message);
    		}
	    }, 'json');
    }
    
    function reportIt(id_review){
        $.post(baseDir + 'modules/lofreviews/ajax.php', {
    		action:'reportit',
			id_review: id_review,
	    },
        function (data) {
    		if (data.status == 'success') {
    		    setCookie("report-it-" + id_review,"report-it-" + id_review,1);  
                $("#report-it-" + id_review).html('');    
    		} else {
    			alert(data.message);
    		}
	    }, 'json');
    }
    
    //get Cookie
    function getCookie(c_name){
		var i,x,y,ARRcookies=document.cookie.split(";");
		for (i=0;i<ARRcookies.length;i++)
		{
			x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
			y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
			x=x.replace(/^\s+|\s+$/g,"");
			if (x==c_name)
			{
				return unescape(y);
			}
		}
	}
    //set Cookie
    function setCookie(c_name,value,exdays)
	{
		var exdate=new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
		document.cookie=c_name + "=" + c_value;
	}
    
    $(document).ready(function () {
		$(".like-this").each(function (index) {
		     var id_like = $(this).attr("id");
             //alert(getCookie(id_like));
             if(getCookie(id_like) != null || getCookie(id_like) !== undefined  ){
                $("#"+id_like).html(''); 
             }
		});
        
        $(".report-it").each(function (index) {
		     var id_report = $(this).attr("id");
             if(getCookie(id_report) != null || getCookie(id_report) !== undefined  ){
                $("#"+id_report).html(''); 
             }
		});
    });
</script>
 
    

	