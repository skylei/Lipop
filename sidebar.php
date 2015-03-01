<!--边栏-->
<div id="suspend">
  <ul>
    <li>
      <div class="bar">
        <div class="hides">
          <div class="bar-iocn"><i class="fa fa-cog"></i>设置</div>
          <div class="bar-box">暂时没有！</div>
        </div>
        <div class="shows"><i class="fa fa-cog"></i></div>
      </div>
    </li>
    <li>
      <div class="bar">
        <div class="hides">
          <div class="bar-iocn"><i class="fa fa-search-plus"></i>搜索</div>
          <div class="bar-box">
            <form id="searchForm" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <fieldset>
                <input name="s" id="s" type="text" class="text" placeholder="请输入关键字" />
                <button type="submit" value="" id="searchsubmit"><i class="fa fa-search"></i></button>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="shows"><i class="fa fa-search-plus"></i></div>
      </div>
    </li>
    <li>
      <div class="bar">
        <div class="hides">
          <div class="bar-iocn"><i class="fa fa-tags"></i>标签</div>
          <div class="bar-box"><?php wp_tag_cloud('smallest=13&largest=13&number=50&orderby=count'); ?></div>
        </div>
        <div class="shows"><i class="fa fa-tags"></i></div>
      </div>
    </li>
    <li>
      <div class="bar">
        <div class="hides">
          <div class="bar-iocn"><i class="fa fa-comments"></i>评论</div>
          <div class="bar-box">共<?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?>条评论
          </div>
        </div>
        <div class="shows"><i class="fa fa-comments"></i></div>
      </div>
    </li>
    <li>
      <div class="bar">
        <div class="hides">
          <div class="bar-iocn"><i class="fa fa-file-text"></i>文章</div>
          <div class="bar-box">
           共<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?>篇文章
          </div>
        </div>
        <div class="shows"><i class="fa fa-file-text"></i></div>
      </div>
    </li>
    <li>
      <div class="bar">
        <div class="hides">
          <div class="bar-iocn"><i class="fa fa-qq"></i>QQ</div>
          <div class="bar-box">暂时没有！</div>
        </div>
        <div class="shows"><i class="fa fa-qq"></i></div>
      </div>
    </li>
  </ul>
</div>
<!--sidebar end--> 
