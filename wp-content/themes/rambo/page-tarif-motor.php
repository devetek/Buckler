<?php 
//Template Name:Tarif-Motor
get_template_part('banner','strip');
$image_uri= WEBRITI_TEMPLATE_DIR_URI. '/images' ;
?>
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
	 <?php get_sidebar();?>
		<!-- Blog Main -->
		<div class="blog_single_post">
			<h4>Tarif Sewa Motor</h4>
			<?php tablepress_print_table( array( 'id' => '4', 'use_datatables' => true, 'print_name' => false ) ); ?>
			<div class="row-fluid"></div>
			<b>Harga sewa motor tidak termasuk Bahan Bakar (BBM)</b>
		</div>
	</div>
</div>
<?php get_footer();?>