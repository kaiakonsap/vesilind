<?php

get_header(); ?>
<div class="container">
  <div class="content">
    <?php
		// Start the loop.
    while ( have_posts() ) : the_post();?>
    <div class="singlepost">
     <div class="close">
       <img src="<?php echo get_template_directory_uri()?>/images/close.png" alt="close" class="normal">
       <img src="<?php echo get_template_directory_uri()?>/images/close_black.png" alt="close" class="hover">
     </div>
     <div class="whitebg">

   <div class="smallcontent">
     <h2 class="blue smalltitle uppercase"><?php the_title()?></h2>
     <?php the_content();?>
   </div>
   <div class="imagesvideos">
	 <?php $images = get_field('images');
	 if( $images ): ?>
<?php $firstline=true ?>
      <?php while( have_rows('images') ): the_row() ; ?>
<?php if ($firstline): ?>
  <?php if (get_sub_field('img')): ?>
    <a href="<?php echo get_sub_field('img')['url']?>" data-featherlight="<?php echo get_sub_field('img')['url']?>" class="gallery first"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
<?php endif; ?>
<?php else: ?>
  <a  class="gallery other" href="<?php echo get_sub_field('img')['url']?>" rel="inline_content<?php echo get_the_ID();?>"></a>
<?php endif; ?>
<?php $firstline=false  ?>
<?php endwhile; ?>
<?php endif; ?>
<?php if (get_field('video_url')): ?>
<a target="_blank" title="trailer" href="<?php the_field('video_url') ?>"><i class="fa fa-file-movie-o" aria-hidden="true"></i></a>
<?php endif; ?>
   </div>
   </div>
 </div>
</div>

<?php
endwhile;
?>

</div>
</div>

<?php get_footer(); ?>
