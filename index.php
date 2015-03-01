<?php
get_header(); ?>
<div id="container">
      <?php while (have_posts()) : the_post(); ?>
        <div class="block">
            <h1><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="text">
		  <?php if ( has_post_thumbnail() ) { ?>
		  <div class="showimg"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php post_thumbnail_src() ?>"/></a></div>
		  <?php }?>
            <p>
            <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 700,"..."); ?>
            </p>
          </div>
			<span class="post-time"> <?php the_time('Y.n.j'); ?> | <?php post_views('', ''); ?>阅读 |  <?php comments_popup_link('暂无评论', '1 条评论', '% 条评论'); ?></span>
		    <span class="post-more"><a target="_blank" href="<?php the_permalink(); ?>">阅读全文</a></span>
        </div>
      <?php endwhile; ?> 
    <div class="page"><?php par_pagenavi(5);?></div>
</div>

<?php get_footer(); ?>