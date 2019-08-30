<?php
/**
 * Email Course
 */
?>
<div id="trustworthy_website" class="rambo-tab-pane">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="rambo-info-title text-center"><?php echo __('Trustworthy Websites Details','rambo'); ?><?php if( !empty($rambo['Version']) ): ?> <sup id="rambo-theme-version"><?php echo esc_attr( $rambo['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="rambo-tab-pane-half rambo-tab-pane-first-half">
					<p>
						<?php esc_html_e( 'A website exists for one and ONLY one reason:','rambo');?>
						<b><?php esc_html_e('To bring you more business.','rambo'); ?></b>
					</p>
					<p>
		   				<?php esc_html_e('Think of your website as a hardworking salesman who works 24/7 and never asks for a raise!','rambo');?>
		   			</p>
					<p>
					<?php esc_html_e( 'In this email course I deliver 4 highly actionable tips on how you can build a website which is trustworthy and which, in turn, brings more business to you.', 'rambo' ); ?>
					</p>
				</div>
			</div>	
			<div class="offer-content clearfix">
			<div class="media pricing-content text-center padding10">
				<div class="media-body">
					<a href="<?php echo 'http://webriti.com/website-email-course/';?>" target="_blank" class="btn btn-info btn-lg" id="email_course"><?php esc_html_e('JOIN COURSE','rambo' ); ?></a>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>