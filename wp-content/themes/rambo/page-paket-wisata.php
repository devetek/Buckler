<?php 
//Template Name:Paket-Wisata
get_template_part('banner','strip');
$image_uri= WEBRITI_TEMPLATE_DIR_URI. '/images' ;
?>
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
	 <?php get_sidebar();?>
		<!-- Blog Main -->
		<div class="blog_single_post">
			<div style="display:none;">
				<?php  the_post(); ?>
				<?php  the_content( __('Read More','rambo') ); ?>
			</div>
			<?php echo do_shortcode("[post_grid id='113']"); ?>
		</div>
	</div>
</div>
<?php get_footer();?>