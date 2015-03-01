<?php         
class ClassicOptions {            
    function getOptions() {
        $options = get_option('classic_options'); 
        if (!is_array($options)) { 
            $options['zkeywords'] = ''; 
            $options['zdescription'] = ''; 
            update_option('classic_options', $options);         
        }   
        return $options;  
    }
    function init() {
        if(isset($_POST['classic_save'])) {
			$options = ClassicOptions::getOptions();
            $options['zkeywords'] = stripslashes($_POST['zkeywords']);
            $options['zdescription'] = stripslashes($_POST['zdescription']);
            update_option('classic_options', $options);   
        } else {   
            ClassicOptions::getOptions();         
        }   
        add_theme_page("Theme Options", "主题设置", 'edit_themes', basename(__FILE__), array('ClassicOptions', 'display'));         
    } 
    function display() {   
        wp_enqueue_script('my-upload', get_bloginfo( 'stylesheet_directory' ) . '/js/upload.js'); 
		wp_enqueue_style('my-upload', get_bloginfo('stylesheet_directory') . '/inc/options.css');
        wp_enqueue_script('thickbox');   
        wp_enqueue_style('thickbox');   
        $options = ClassicOptions::getOptions(); 
		?>

<form method="post" enctype="multipart/form-data" name="classic_form" id="classic_form">
  <!-- 设置内容 -->
  <div class="options">
    <div class="options-title">
      <h3>主题说明</h3>
      <p>本主题作者：Toyye，欢迎访问我的个人博客：<a href="http://www.yelook.com" target="_blank">有野出没</a>。</p>
	  <p>如果您感觉这款主题对您有价值，欢迎<a href="http://www.yelook.com/donate" target="_blank">给我捐助</a>。</p>
	  <p>如果您发现主题有问题，请联系我并告知我。</p>
    </div>
        <div class="pane">
          <div class="section">
            <h4 class="heading">网站关键字设置</h4>
            <div class="option">
              <div class="controls">
                <textarea rows="3" class="upload" name="zkeywords"><?php echo($options['zkeywords']);?></textarea>
              </div>
              <div class="explain">填写网站的关键字。</div>
            </div>
          </div>
          <div class="section">
            <h4 class="heading">网站描述设置</h4>
            <div class="option">
              <div class="controls">
                <textarea rows="8" class="upload" type="text"  name="zdescription"><?php echo($options['zdescription']);?></textarea>
              </div>
              <div class="explain">填写网站的站点描述。</div>
            </div>
          </div>
        </div>
    <!-- TODO: 在这里追加其他选项内容 -->
    <div class="submit">
      <input type="submit"  class="button button-primary button-large" name="classic_save" value="<?php _e('保存设置') ?>" />
    </div>
  </div>
</form>
<?php         
    }         
} 
add_action('admin_menu', array('ClassicOptions', 'init'));  
?>
