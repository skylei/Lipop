<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

<p class="nocomments">必须输入密码，才能查看评论！</p>
<?php
			return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = '';
?>
<!-- You can start editing here. -->
<?php if ($comments) : ?>
<div id="comments"><span><?php comments_number('', '1 条评论', '% 条评论' );?></span></div>
<ol class="commentlist">
  <?php wp_list_comments('type=comment&callback=weisay_comment&end-callback=weisay_end_comment&max_depth=23'); ?>
</ol>
<div class="navigation">
  <div class="page_navi">
    <?php paginate_comments_links(); ?>
  </div>
</div>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
<div id="comments"><span>暂无评论</span></div>
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<div id="comments"><span>评论已经关闭</span></div>
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<div class="replyact"><a href="javascript:;" onclick="letDivCenter('.mask')">发表评论</a></div>
<div class="mask">
<div id="respond_box">
  <div id="respond">
    <h3><i class="fa fa-pencil"></i>发表评论<span><a href="javascript:;" id="close"><i class="fa fa-times"></i></a></span></h3>
    <div class="cancel-comment-reply">
      <small>
      <?php cancel_comment_reply_link(); ?>
      </small> </div>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      <p><?php print '登录者：'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出 ]'; ?></a>
        <?php elseif ( '' != $comment_author ): ?>
      <div class="com_author"><?php printf(__('欢迎回来 <strong>%s</strong>'), $comment_author); ?> <a href="javascript:toggleCommentAuthorInfo();" id="toggle-comment-author-info">[ 更改 ]</a></div>
      <script type="text/javascript" charset="utf-8">
				//<![CDATA[
				var changeMsg = "[ 更改 ]";
				var closeMsg = "[ 隐藏 ]";
				function toggleCommentAuthorInfo() {
					jQuery('#comment-author-info').slideToggle('slow', function(){
						if ( jQuery('#comment-author-info').css('display') == 'none' ) {
						jQuery('#toggle-comment-author-info').text(changeMsg);
						} else {
						jQuery('#toggle-comment-author-info').text(closeMsg);
				}
			});
		}
				jQuery(document).ready(function(){
					jQuery('#comment-author-info').hide();
				});
				//]]>
			</script>
      </p>
      <?php endif; ?>
      <?php if ( ! $user_ID ): ?>
      <div id="comment-author-info">
          <input type="text" name="author" id="author" class="commenttext" placeholder="昵称" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
          <input type="text" name="email" id="email" class="commenttext" placeholder="邮箱" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
          <input type="text" name="url" id="url" class="commenttext" placeholder="网址" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
      </div>
      <?php endif; ?>
      <div class="clear"></div>
        <textarea name="comment" id="comment" tabindex="4"></textarea>
		<div class="mood"><a href="javascript:;" id="comment-smiley">表情</a><input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="提交[Ctrl+Enter]" /></div>
		<div class="mood1"><?php include(TEMPLATEPATH . '/includes/smiley.php'); ?></div>
        <?php comment_id_fields(); ?>
      <script type="text/javascript">	//Crel+Enter
			$(document).keypress(function(e){
				if(e.ctrlKey && e.which == 13 || e.which == 10) { 
					$(".submit").click();
					document.body.focus();
				} else if (e.shiftKey && e.which==13 || e.which == 10) {
					$(".submit").click();
				}          
			})
		</script>
      <?php do_action('comment_form', $post->ID); ?>
    </form>
    <div class="clear"></div>
    <?php endif; // If registration required and not logged in ?>
  </div>
  </div>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
