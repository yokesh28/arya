

<body cz-shortcut-listen="true">

	<div id="innerpage">
		
		<?php include 'header.php'; ?>


		<div class="container">


			<h2>Our Service</h2>
			<p>Arya Offset Pvt. LTd., Coimbatore, with affluent experience of
				excellence, offers a complete printing package that fits the
				clients`s requirements. An organization that provides printing
				solutions for Annual Reports, Brochures, Sales Kits, Catalogues,
				Pacaging &more, we guarantee complete customer satisfaction.
				Understanding their needs and establishing a long-term committed
				relationship with our customers is what motvates us to be the best
				inthis field. Our team of creative professionals strives to think
				out of the `box' while assisting clients. Starting out small and
				family-held, ARYA has grown into a print production house that is at
				ease with the corporate culture, a fact that our illustrious clients
				clearly proves. We ensure that your experience exceeds your
				expectations.</p>

			<div>
				<img alt=""
					src=" <?php echo Yii::app()->theme->baseUrl;?>/images/service_03.gif">


			</div>


		<div class="row-fluid color">
				<ul class="inline">

		
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/a.jpg">
					<h6>Annual Reports</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/b.jpg">
					<h6>Art Books</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
				
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/c.jpg">
					<h6>Brochures</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/d.jpg">
					<h6>Calendars</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/e.jpg">
					<h6>Carry Bags</h6>
					<br>
					</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/f.jpg">
					<h6>Catalogues</h6>
					<br>

				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
				<li>

					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/g.jpg">
					<h6>Coffee Table Books</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/h.jpg">
					<h6>Corporate Stationary</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/i.jpg">
					<h6>Hardcase Books</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/j.jpg">
					<h6>Journals</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/k.jpg">
					<h6>Labels</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/l.jpg">
					<h6>Leaflets</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
         <li>

					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/m.jpg">
					<h6>Magazines</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/n.jpg">
					<h6>Packaging Cartons</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/o.jpg">
					<h6>Posters</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/p.jpg">
					<h6>Presentation Folders</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/q.jpg">
					<h6>Visual Aids</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<li>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/pictures/r.jpg">
					<h6>Invitation Cards</h6>
					<br>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				</ul>
		



		</div>

</div>
		<script type="text/javascript">
	
	// On window load. This waits until images have loaded which is essential
	$(window).load(function(){
		
		// Fade in images so there isn't a color "pop" document load and then on window load
		$(".color img").fadeIn(500);
		
		// clone image
		$('.color img').each(function(){
			var el = $(this);
			el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"998","opacity":"0"}).insertBefore(el).queue(function(){
				var el = $(this);
				el.parent().css({"width":this.width,"height":this.height});
				el.dequeue();
			});
			this.src = grayscale(this.src);
		});
		
		// Fade image 
		$('.color img').mouseover(function(){
			$(this).parent().find('img:first').stop().animate({opacity:1}, 1000);
		})
		$('.img_grayscale').mouseout(function(){
			$(this).stop().animate({opacity:0}, 1000);
		});		
	});
	
	// Grayscale w canvas method
	function grayscale(src){
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');
		var imgObj = new Image();
		imgObj.src = src;
		canvas.width = imgObj.width;
		canvas.height = imgObj.height; 
		ctx.drawImage(imgObj, 0, 0); 
		var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
		for(var y = 0; y < imgPixels.height; y++){
			for(var x = 0; x < imgPixels.width; x++){
				var i = (y * 4) * imgPixels.width + x * 4;
				var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
				imgPixels.data[i] = avg; 
				imgPixels.data[i + 1] = avg; 
				imgPixels.data[i + 2] = avg;
			}
		}
		ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
		return canvas.toDataURL();
    }
	    
</script>




	
</body>
