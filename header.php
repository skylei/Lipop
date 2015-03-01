<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?php $options = (ClassicOptions::getOptions()); ?>
<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
	<?php if (is_home())
	{
	$description = $options['zkeywords'];
	$keywords = $options['zkeywords'];
	}
	elseif (is_category())
	{
	$description = category_description();
	$keywords = single_cat_title('', false);
	}
	elseif (is_tag())
	{
	$description = tag_description();
    $keywords = single_tag_title('', false);
	}
	elseif (is_single())
	{
     if ($post->post_excerpt) {$description = $post->post_excerpt;} 
	 else {$description = substr(strip_tags($post->post_content),0,240)."...";}
    $keywords = "";
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ", ";}
	}
	?>
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="description" content="<?php echo $description?>" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lipop.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ajax.js"></script>
<?php wp_head(); ?>
</head>
<body>
<div class="wrap">
<div class="header">
<div class="hidelist">
<i class="fa fa-bars fa-2x"></i>
</div>
<div class="search">
<form method="get" class="searchform themeform" onsubmit="location.href='<?php echo home_url('?s='); ?>' + encodeURIComponent(this.s.value).replace(/%20/g, '+'); return false;" action="/">
<input type="text" name="s" onblur="if(this.value=='')this.value='按回车键搜索...';" onfocus="if(this.value=='按回车键搜索...')this.value='';" value="按回车键搜索..." placeholder="按回车键搜索">
</form>
</div>
<?php wp_nav_menu(array('container_class' => 'topmenu','menu_class' =>'zwrap')); ?>
</div>
<div class="author">
<img class="avatar" src="<?php bloginfo('template_url'); ?>/images/avatar.jpg">
<div class="titleright">
<p class="title"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></p>
<p class="description"><?php bloginfo('description'); ?></p>
<span class="call">
<a href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-2x fa-rss"></i></a>
<a href="#"><i class="fa fa-2x fa-qq"></i></a>
<a href="#"><i class="fa fa-2x fa-weibo"></i></a>
<a href="javascript:"><i class="fa fa-2x fa-weixin"></i></a>
<a href="#" target="_blank" title="github"><i class="fa fa-github-square fa-2x"></i></a>
<div class="callflo"><img src="<?php bloginfo('template_url'); ?>/images/code.jpg"></div>
<span>
</div>
</div>