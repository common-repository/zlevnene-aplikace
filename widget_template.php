<?php 
	$list = array('android', 'ipad', 'iphone', 'windows');
	$platforms = array();
	foreach($list as $platform) {
		if(!empty($$platform)) {
			$platforms[] = $platform;
		}
	}

	if(empty($posts)) {
		$posts = 10;
	}
?>

<?php echo $before_widget; ?>

<?php echo $before_title; ?>
<?php echo $title; ?>
<?php echo $after_title; ?>

<table id="za-widget-apps" data-platforms="<?php echo implode(',', $platforms); ?>" data-posts="<?php echo $posts; ?>">
</table>
<?php echo $after_widget; ?>