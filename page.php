<?php get_header(); ?>
<div id="container">
    <div class="article">
      <?php while ( have_posts() ) : the_post(); update_post_caches($posts); ?>
	  <div class="titles">
      <h1><?php the_title();?></h1>
      <div class="info">
        <span><?php the_time('Y.n.j'); ?> | <?php post_views('', ''); ?>阅读 | <?php comments_popup_link ('0条','1条','%条'); ?>评论 | <?php the_category(' , ') ?></span> 
		</div>
		</div>
        <?php the_content(); ?>
      <?php endwhile; wp_reset_query(); ?>
    </div>
	  <div class="comments">
<?php comments_template(); ?>
</div>
</div>

<?php get_footer(); ?>
