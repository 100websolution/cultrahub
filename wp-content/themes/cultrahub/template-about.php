<?php
/*
Template Name: About
*/
get_header('culture');
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="seller_banner help_banner">
				<img src="<?php echo get_template_directory_uri();?>/images/about_banner.jpg" alt="" />
			</div>
			<hr class="mt35 mb35">
            <div class="">
                <div class="heading_block">
                    <div class="heading2 center small"><img src="<?php echo get_template_directory_uri();?>/images/learn_sell_shop.png" alt=""></div>
                    <div class="color_dots">
                        <span class="yellow"></span>
                        <span class="red"></span>
                        <span class="blue"></span>
                        <span class="green"></span>
                    </div>
                </div>
                <div class="heading center">Connecting Millions Of Buyers And Sellers From <br>Around The World.</div>
                <div class="connectingBlock">
                    <div class="connectingRight">
                        
                    </div>
                    <div class="connectingLeft">
                        <p>Cultrahub was founded in 2015 and is the world’s first social ecommerce marketplace designed to facilitate in-culture and cross-cultural interactions through the exchange of products, services, and information.</p>
                        <p>We believe in diversity and the necessity for cross-cultural interaction. As such, we aim to be a global hub for cross-cultural networks and commerce, sparking interactions between varied cultures allowing them to shop, share, and learn from each other on a safe, tolerant, respectful platform.</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            
			<div class="innerContainer mt70">
				<div class="quote">The world’s first ecommerce marketplace designed to facilitate cross-cultural interactions through the exchange of products, services, and information.</div>
			</div>
			<hr class="mt50 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');