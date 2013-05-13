<div class="lof_product_reviews">
    <div class="lor_rating">
        <div id="stars-off-<?php echo $module_name; ?>" class="stars-off" style="width:80px;">
            <div id="stars-on-<?php echo $module_name; ?>" class="stars-on" style="width:<?php if($productReview['avg_rating'] > 0 || $productReview['avg_rating'] < 100) {echo $productReview['avg_rating'].'%';} else {echo '0%';}?>"></div>
        </div>
    </div>
    <div class="lof_reviews">
        <?php echo $productReview['total_review'].' '.$l["Reviews"]; ?>
    </div>
</div>