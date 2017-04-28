<?php
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

				<header class="header">
					<div id="owl" class="owl-carousel owl-theme">
	 <?php while( have_rows('slider') ): the_row() ; ?>
		 <?php if( get_sub_field('img') ): ?>
			 <div class="slide-content bgimg" style="background-image: url(<?php the_sub_field('img')?>);">
				 <div class="container">
				 <h1 class="slidertext uppercase"><?php the_sub_field('text')?></h1>
				 </div>
			 </div>
		 <?php endif; ?>
	 <?php endwhile; ?>
 </div>
				</header>


<section id="about-us">
	<div class="container">
	<h1 class="section-title uppercase blue">About us</h1>
<div class="row">
	<div class="column column1 half floatleft">
		<?php the_field('about1')?>
	</div>
	<div class="column column2 half floatleft">
		<?php the_field('about2')?>
	</div>
	<div class="clear"></div>
</div>
</div>
</section>
<section id="portfolio" class="portfolio">
	<div class="container">
	<h1 class="section-title uppercase blue">Portfolio</h1>
	<?php $terms = get_terms(
	 array(
		 'taxonomy'                 => 'portfolio_cat',
		 'hide_empty'  => false
		 )
	 );
	$firstterm=true;
if ($terms) {?>
<div class="category uppercase">
 <?php foreach( $terms as $term ): ?>
	 <?php if ($firstterm == true):
		 $class="active";
		else:
				 $class="";
		endif; ?>
	 <a class="<?php echo $class ?>" href="#<?php echo $term->slug ?>-cat"><?php echo $term->name ?></a>

 <?php
	$firstterm=false;
 endforeach;
 ?>
</div>
<?php }
$first=true;
?>
 <?php foreach( $terms as $term ): ?>
<?php
$args = array(
	'post_type' => 'portfolio',
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'portfolio_cat',
			'field'    => 'slug',
			'terms'    => $term->slug,
		),
	),
);
?>
	<?php $recent_posts = new WP_Query($args); ?>
	<?php if ( $recent_posts->have_posts() ) : ?>
		<?php if ($first == true):
			$class="active";
		 else:
					$class="";
		 endif; ?>
	<div id="<?php echo $term->slug?>-cat" class="workcat <?php echo $class ?>">
	<div id="<?php echo $term->slug?>" class="worksowl owl-carousel owl-theme <?php echo $class ?>">
		  <?php       while ( $recent_posts->have_posts() ) : $recent_posts->the_post();?>

				<?php $thumburl = get_the_post_thumbnail_url($recent["ID"],'thumbnail') ? get_the_post_thumbnail_url(get_the_ID(),'thumbnail'): get_template_directory_uri().'/images/placeholder_thumb.jpg' ?>
			<div class="slide-portfolio bgimg" style="background-image: url(<?php echo $thumburl ?>);">
		<a class="openpost <?php echo $term->slug ?>" href="<?php  the_permalink($recent["ID"])?>">
	<h3 class="title uppercase"> <?php the_title();?></h3>
</a>
	</div>
	<?php endwhile;
	wp_reset_query();
 endif; ?>
	</div>
	</div>
	<div class="<?php echo $term->slug ?>-content swapcontent"></div>
	<?php  $first=false;?>
<?php endforeach;?>
</div>
</section>
<section id="work-in-progress" class="work-in-progress">
	<div class="container">
	<h1 class="section-title uppercase blue">Work in progress</h1>
</div>
  	<div id="futureowl" class="owl-carousel owl-theme futureowl">
			<?php while( have_rows('filmslider') ): the_row() ; ?>
				<?php if( get_sub_field('background') ): ?>
					<div class="slide-content bgimg" style="background-image: url(<?php the_sub_field('background')?>);">
						<div class="absolutecontainer">
							<div class="row">
								<div class="cell">
									<div class="cellcontent">
						<h2 class="slidertitle uppercase"><?php the_sub_field('title')?></h2>
						<p class="slidertext"><?php the_sub_field('description')?></p>
						<div class="imagesvideos">
							<?php if (get_sub_field('trailer')): ?>
								<a href="<?php the_sub_field('trailer')?>"><i class="fa fa-file-movie-o" aria-hidden="true"></i></a>
							<?php endif; ?>
						</div>
						</div>
						</div>
						</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			</div>

</section>
<section id="contact" class="contact">
	<div class="container">
	<h1 class="section-title uppercase blue">Contact</h1>
<div class="row">
	<?php while( have_rows('contacts') ): the_row() ; ?>
		<?php if( get_sub_field('row') ): ?>
	<div class="column fourcolumn floatleft uppercase">
		<?php the_sub_field('row')?>
	</div>
<?php endif; ?>
			<?php endwhile; ?>
	<div class="clear"></div>
</div>
</div>
</section>
		<?php
		endif;
		?>

		</main>
	</div>

<?php get_footer(); ?>
