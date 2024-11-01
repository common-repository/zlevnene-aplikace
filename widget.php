<?php

class ZAWidget extends WP_Widget {
	public function __construct() {
		parent::__construct('za-widget', 'Zlevněné aplikace');
	}
	
	public function widget($args, $instance) {
?>
<script type='text/javascript'>window.appWidgetPosts = <?php echo $instance['posts']; ?>;</script>
<?php
		
		extract($args);
		extract($instance);
		
		require_once __DIR__ . '/widget_template.php';
	}
	
	public function form($instance) {
		$posts = 10;
		if(isset($instance['posts'])) {
			$posts = $instance['posts'];
		}
		
		$platforms = array('android' => 'Android', 'ipad' => 'iPad', 'iphone' => 'iPhone', 'windows' => 'Windows Phone');
?>
<p>
	<label for="<?php echo $this -> get_field_id('title'); ?>">Titulek:</label>
	<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
</p>
<p>
	<label for="<?php echo $this -> get_field_id('posts'); ?>">Počet zobrazených aplikací:</label>
	<input class="widefat" id="<?php echo $this -> get_field_id('posts'); ?>" name="<?php echo $this -> get_field_name('posts'); ?>" type="text" value="<?php echo $posts; ?>" />
</p>
<?php foreach($platforms as $slug => $name): ?>
<p>
	<input id="<?php echo $this -> get_field_id(slug); ?>" name="<?php echo $this -> get_field_name($slug); ?>" type="checkbox" <?php echo empty($instance[$slug]) ? '' : 'checked="checked="'; ?> />
	<label for="<?php echo $this -> get_field_id($slug); ?>"><?php echo $name; ?></label>
</p>
<?php endforeach; ?>
<?php 
	}
	
	public function update($new_instance, $old_instance) {
		if(isset($new_instance['posts'])) {
			$old_instance['posts'] = $new_instance['posts'];
		}
		$old_instance['title'] = strip_tags($new_instance['title']);
	
		$platforms = array('android', 'windows', 'ipad', 'iphone');
		foreach($platforms as $platform) {
			if(!empty($new_instance[$platform])) {
				$old_instance[$platform] = true; 
			}
			else {
				$old_instance[$platform] = false;
			}
		}
		
		return $old_instance;
	}
}

function za_widget() {
	register_widget('ZAWidget');
}

add_action('widgets_init', 'za_widget');