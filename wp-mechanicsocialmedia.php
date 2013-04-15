<?php
/*
Plugin Name: Mechanic Custom Social Media
Plugin URI: http://www.adityasubawa.com/wordpress
Description: Mechanic Custom Social Media is a widgets which will display your social media page on WordPress.
Version: 1.1
Author: Aditya Subawa
Author URI: http://www.adityasubawa.com
*/
                              
class Wp_mechanicsocialmedia extends WP_Widget{
    
    function __construct(){
	 $params=array(
            'description' => 'Display custom social media', //plugin description
            'name' => 'Mechanic - Custom Social Media'  //title of plugin
        );
        
        parent::__construct('WP_mechanicsocialmedia', '', $params);
    }
       
  // extract($instance);
	 public function form($instance)  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];


?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('mecfacebook'); ?>">Facebook: <input class="widefat" id="<?php echo $this->get_field_id('mecfacebook'); ?>" name="<?php echo $this->get_field_name('mecfacebook'); ?>" type="text" value="<?php echo $instance['mecfacebook']; ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('mectwitter'); ?>">Twitter: <input class="widefat" id="<?php echo $this->get_field_id('mectwitter'); ?>" name="<?php echo $this->get_field_name('mectwitter'); ?>" type="text" value="<?php echo $instance['mectwitter']; ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('mecgplus'); ?>">Google+: <input class="widefat" id="<?php echo $this->get_field_id('mecgplus'); ?>" name="<?php echo $this->get_field_name('mecgplus'); ?>" type="text" value="<?php echo $instance['mecgplus']; ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('mecrss'); ?>">RSS Feeds: <input class="widefat" id="<?php echo $this->get_field_id('mecrss'); ?>" name="<?php echo $this->get_field_name('mecrss'); ?>" type="text" value="<?php echo $instance['mecrss']; ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('author_credit'); ?>"><?php _e('Give credit to plugin author? '); ?><input type="checkbox" class="checkbox" <?php checked( $instance['author_credit'], 'on' ); ?> id="<?php echo $this->get_field_id('author_credit'); ?>" name="<?php echo $this->get_field_name('author_credit'); ?>" /></label></p>
<p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=ZMEZEYTRBZP5N&lc=ID&item_name=Aditya%20Subawa&item_number=426267&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" target="_blank"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" alt="<?_e('Donate')?>" /></a></p>
<?php

  }
    public function widget($args, $instance){
        extract($args, EXTR_SKIP);
    $authorcredit = isset($instance['author_credit']) ? $instance['author_credit'] : false ; // give plugin author credit
	$facebook= $instance['mecfacebook'];
	$twitter= $instance['mectwitter'];
	$gplus= $instance['mecgplus'];
	$rss= $instance['mecrss'];
	
		
	echo $before_widget;
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
	
 
    if (!empty($title))
      echo $before_title . $title . $after_title;?>
	  <style type="text/css">
/* SOCIAL ICONS - GENERAL */
.social { list-style:none; margin-top:10px; width:250px; }
.social li { display:inline; float:left; background-repeat:no-repeat; }
.social li a { display:block; width:48px; height:48px; position:relative; text-decoration:none; }
.social li a strong { font-weight:normal; position:absolute; left:20px; top:-1px; color:#fff; padding:3px; z-index:9999;
 text-shadow:1px 1px 0 rgba(0, 0, 0, 0.75); background-color:rgba(0, 0, 0, 0.7);
 -moz-border-radius:3px; -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); -webkit-border-radius:3px; -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); border-radius:3px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}


li.facebook { background-image:url("http://3.bp.blogspot.com/-A85RHvx2-uU/UE2ppf5SYQI/AAAAAAAAAno/K2Fr4gsy93Q/s1600/facebook_hover.png"); }
li.twitter { background-image:url("http://4.bp.blogspot.com/-6o4Og7Yyhgo/UE2pwOlC6rI/AAAAAAAAAoY/PaAMgu0HzAo/s1600/twitter_hover.png"); }
li.googleplus { background-image:url("http://3.bp.blogspot.com/-7vut1cJhPoQ/UE2prnN5BgI/AAAAAAAAAn4/VfZ49CiUM4s/s1600/googleplus_hover.png"); }
li.rss { background-image:url("http://2.bp.blogspot.com/-_gBX33v256s/UE2pt6KziII/AAAAAAAAAoI/_d02BxbF3-Q/s1600/rss_hover.png"); }

/* SOCIAL ICONS - CSS3 */
#css3:hover li { opacity:0.2; }

#css3 li { -webkit-transition-property: opacity; -webkit-transition-duration: 500ms;
 -moz-transition-property: opacity; -moz-transition-duration: 500ms; }
#css3 li a strong { opacity:0;
 -webkit-transition-property: opacity, top; -webkit-transition-duration: 300ms;
 -moz-transition-property: opacity, top; -moz-transition-duration: 300ms; }

#css3 li:hover { opacity:1; }
#css3 li:hover a strong { opacity:1; top:-10px; }
</style>
 
<ul class="social" id="css3">
			<li class="facebook">
				<a href="<?php echo $facebook ?>"><strong>Facebook</strong></a>
			</li>
			<li class="twitter">
				<a href="<?php echo $twitter ?>"><strong>Twitter</strong></a>
			</li>
			<li class="googleplus">
				<a href="<?php echo $gplus ?>"><strong>Google+</strong></a>
			</li>
			<li class="rss">
				<a href="<?php echo $rss ?>"><strong>RSS</strong></a>
			</li>
			
		</ul>
 <?php
	 if ($authorcredit) { ?>
			<p style="font-size:10px;">
				Plugins by <a href="http://www.adityasubawa.com" title="Bali Web Design">Bali Web Design</a></p>
			</div>
			<?php }
	echo $after_widget;
  }}
add_action('widgets_init', 'register_wp_mechanicsocialmedia');
function register_wp_mechanicsocialmedia() {
register_widget('Wp_mechanicsocialmedia', 'mechanicsocialmedia_style');
}	

?>