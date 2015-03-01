<script type="text/javascript" language="javascript">
/* <![CDATA[ */
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
    	}
    }
/* ]]> */
</script>
<a href="javascript:grin(':orz1:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz1.gif" alt="" /></a>
<a href="javascript:grin(':orz2:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz2.gif" alt="" /></a>
<a href="javascript:grin(':orz3:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz3.gif" alt="" /></a>
<a href="javascript:grin(':orz4:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz4.gif" alt="" /></a>
<a href="javascript:grin(':orz5:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz5.gif" alt="" /></a>
<a href="javascript:grin(':orz6:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz6.gif" alt="" /></a>
<a href="javascript:grin(':orz7:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz7.gif" alt="" /></a>
<a href="javascript:grin(':orz8:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz8.gif" alt="" /></a>
<a href="javascript:grin(':orz9:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz9.gif" alt="" /></a>
<a href="javascript:grin(':orz10:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz10.gif" alt="" /></a>
<a href="javascript:grin(':orz11:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz11.gif" alt="" /></a>
<a href="javascript:grin(':orz12:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz12.gif" alt="" /></a>
<a href="javascript:grin(':orz13:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz13.gif" alt="" /></a>
<a href="javascript:grin(':orz14:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz14.gif" alt="" /></a>
<a href="javascript:grin(':orz15:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz15.gif" alt="" /></a>
<a href="javascript:grin(':orz16:')"><img src="<?php bloginfo('template_url'); ?>/images/orz/orz16.gif" alt="" /></a>
<br />