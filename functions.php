<?php
add_filter( 'show_admin_bar', '__return_false' );
if ( function_exists('add_theme_support') )
add_theme_support('post-thumbnails');
//获取图片
function post_thumbnail_src(){
    global $post;
	if( $values = get_post_custom_values("show") ) {	//输出自定义域图片地址
		$values = get_post_custom_values("show");
		$post_thumbnail_src = $values [0];
	} elseif( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		$post_thumbnail_src = $thumbnail_src [0];
    } else {
		$post_thumbnail_src = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$post_thumbnail_src = $matches [1] [0];
if(empty($post_thumbnail_src)){return false;}	//获取该图片 src
	};
	echo $post_thumbnail_src;
}

//访问计数
function record_visitors(){
	if (is_singular()) {global $post;
	 $post_ID = $post->ID;
	  if($post_ID) 
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');  
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
};

//分页
function par_pagenavi($range = 9) {
    global $paged, $wp_query;
    if (!$max_page) {
        $max_page = $wp_query->max_num_pages;
    }
    if ($max_page > 1) {
        if (!$paged) {
            $paged = 1;
        }
        if ($paged != 1) {
            echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'>首页</a>";
        }
        previous_posts_link("上一页");
        if ($max_page > $range) {
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    echo "<a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo "<a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    echo "<a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            }
        } else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo "<a href='" . get_pagenum_link($i) . "'";
                if ($i == $paged) echo " class='current'";
                echo ">$i</a>";
            }
        }
        next_posts_link("下一页");
        if ($paged != $max_page) {
            echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 最后</a>";
        }
    }
}

//评论回复/头像缓存
function weisay_comment($comment, $args, $depth) {$GLOBALS['comment'] = $comment;
	global $commentcount,$wpdb, $post;
     if(!$commentcount) { 
          $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1' AND !comment_parent");
          $cnt = count($comments);
          $page = get_query_var('cpage');
          $cpp=get_option('comments_per_page');
         if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) {
             $commentcount = $cnt + 1;
         } else {$commentcount = $cpp * $page + 1;}
     }
?>

<li <?php comment_class(); ?>>
  <div class="comment-author">
    <?php if (get_option('swt_type') == 'Display') { ?>
    <?php
				$p = 'avatar/';
				$f = md5(strtolower($comment->comment_author_email));
				$a = $p . $f .'.jpg';
				$e = ABSPATH . $a;
				if (!is_file($e)){ 
				$d = get_bloginfo('wpurl'). '/avatar/default.jpg';
				$s = '40'; 
				$r = get_option('avatar_rating');
				$g = 'http://www.gravatar.com/avatar/'.$f.'.jpg?s='.$s.'&d='.$d.'&r='.$r;
                $avatarContent = file_get_contents($g);
                file_put_contents($e, $avatarContent);
				if ( filesize($e) == 0 ){ copy($d, $e); }
				};
			?>
    <img src='<?php bloginfo('wpurl'); ?>/<?php echo $a ?>' alt='' class='avatar' />
    <?php { echo ''; } ?>
    <?php } else { include(TEMPLATEPATH . '/comment_gravatar.php'); } ?>
  </div>
  <div class="comment-body">
    <?php $add_below = 'div-comment'; ?>
    <span id="reader-name">
   <a rel="external nofollow" href="<?php comment_author_url(); ?>" target="_blank"><?php print get_comment_author(); ?></a>
    </span>
	<span class="datetime">
    &nbsp;&nbsp;<?php comment_date('Y-m-d') ?>
    <?php comment_time() ?>
    </span>
    <?php edit_comment_link('编辑','&nbsp;&nbsp;',''); ?>
    <?php if ( $comment->comment_approved == '0' ) : ?>
    <span style="color:#C00; font-style:inherit">您的评论正在等待审核中...</span> <br />
    <?php endif; ?>
    <?php comment_text() ?>
    <div class="clear"></div>
	<div class="reply">
    <?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="fa fa-reply"></i> 回复', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    </div> </div>
  <?php
}
function weisay_end_comment() {echo '</li>';};
//登陆显示头像
function weisay_get_avatar($email, $size = 48){
return get_avatar($email, $size);
};
//自定义表情地址
function custom_smilies_src($src, $img){return get_bloginfo('template_directory').'/images/smilies/' . $img;}
add_filter('smilies_src', 'custom_smilies_src', 10, 2);

//头像使用duoshuo缓存 
function get_avatar_deadwood( $avatar ) { 
  $avatar = preg_replace( "/http:\/\/(www|\d).gravatar.com/","http://gravatar.duoshuo.com",$avatar ); 
  return $avatar; 
} 
add_filter( 'get_avatar', 'get_avatar_deadwood' );

//评论
function bg_recent_comments($no_comments = 5, $comment_len = 80, $avatar_size = 48) {
 
  $comments_query = new WP_Comment_Query();
    $comments = $comments_query->query( array( 'number' => $no_comments ) );
 
    $comm = '';
    if ( $comments ) : foreach ( $comments as $comment ) :
        $comm .= '<li>' . get_avatar( $comment->comment_author_email, $avatar_size );
        $comm .= '<a class="author" href="' . get_permalink( $comment->post_ID ) . '#comment-' . $comment->comment_ID . '">';
        $comm .= get_comment_author( $comment->comment_ID ) . ':</a> ';
        $comm .= '<p>' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '</p></li>';
    endforeach; else :
        $comm .= 'No comments.';
    endif;
 
    echo $comm;
}
  
if (!is_admin()) {
	function zfunc_scripts_method() {
		if (is_singular()) {
			wp_enqueue_script('comments_ajax_js', (get_template_directory_uri()."/comments-ajax.js"), false, '1.3', true);
		}
	}
	add_action('wp_enqueue_scripts', 'zfunc_scripts_method');
}
require get_template_directory() . '/includes/do.php';


/*支持菜单*/
if(function_exists('register_nav_menus')){
register_nav_menus();
}

// options theme.
include(TEMPLATEPATH . '/inc/options-s.php');
?>