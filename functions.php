<?php
	require_once( 'external/starkers-utilities.php' );
	add_theme_support('post-thumbnails');	
	function starkers_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ($comment->comment_approved == '1'): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	show_admin_bar(false);

	function disable_wp_emojicons() {
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	}
	add_action( 'init', 'disable_wp_emojicons' );

	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	
	add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
	function remove_jquery_migrate( &$scripts)
	{
	    if(!is_admin())
	    {
	        $scripts->remove( 'jquery');
	        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	    }
	}

	remove_action('wp_head','rest_output_link_wp_head');
	remove_action('wp_head','wp_oembed_add_discovery_links');
	remove_action('template_redirect', 'rest_output_link_header', 11, 0);


	add_action( 'admin_init', 'hide_editor' );
	function hide_editor() {
	  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	  if( !isset( $post_id ) ) return;
	  
	  $page = get_the_title($post_id);
	  if(!in_array($page, array('all'), true )){ 
	    remove_post_type_support('page', 'editor');
	  }

	  $template_file = get_post_meta($post_id, '_wp_page_template', true);
	  if($template_file == 'my-page-template.php'){
	    remove_post_type_support('page', 'editor');
	  }
	}

	function setActiveClass($page){
		if(is_page($page)){
			return ' is-active';
		}
	}

	function remove_menus(){
	  global $menu;
	  global $submenu;
	  remove_menu_page( 'index.php' );                 
	  // remove_menu_page( 'jetpack' ); 
	  // remove_menu_page( 'edit.php' ); 
	  // remove_menu_page( 'upload.php' );              
	  // remove_menu_page( 'edit.php?post_type=page' );    
	  remove_menu_page( 'edit-comments.php' );          
	  //remove_menu_page( 'themes.php' );                
	  //remove_menu_page( 'plugins.php' );         
	  //remove_menu_page( 'users.php' );                
	  remove_menu_page( 'tools.php' );
	}
	add_action( 'admin_menu', 'remove_menus' );

	function admin_default_page() {
	  return 'wp-admin/edit.php';
	}
	add_filter('login_redirect', 'admin_default_page');

	function verifyEmail($a){
		if(isset($_POST[$a])) {
			$userEmail = trim($_POST[$a]);
			if(($userEmail != 'Email') && (preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", $userEmail))){
				return $userEmail;
			}
		}
	}
	add_action('admin_post_submitContact', 'submitContact');
	add_action('admin_post_nopriv_submitContact', 'submitContact');
	function submitContact(){
		if(isset($_POST['form_nonce']) || wp_verify_nonce($_POST['form_nonce'], 'form_nonce_key')){
			if(isset($_POST['userName'])){
				$userName = trim($_POST['userName']);
			}
			if(isset($_POST['userTelephone'])){
				$userTelephone = trim($_POST['userTelephone']);
			}			
			if(isset($_POST['userEmail'])){
				$userEmail = verifyEmail('userEmail');
			}
			if(isset($_POST['userMessage'])){
				$userEmail = verifyEmail('userEmail');
			}

			$messageHeader[] = 'From: '.$userName.' <'.$userEmail.'>';
			$messageHeader[] = 'Reply-To: '.$userName.' <'.$userEmail.'>';

			if(isset($_POST['userMessage'])){
				$userMessage = trim($_POST['userMessage']);
				if(!strstr($userMessage, 'http://')){
					$messageBody = 'Email: '.$userEmail."\n".'Name: '.$userName."\n".'Phone Number: '.$userTelephone."\n".'Message: '.$userMessage;
					wp_mail('info@reachahand.org', 'RAHU Website Inquiry', $messageBody, $messageHeader);	
				}
				else {exit;}
			}
		}
		else {exit;}	
	}

	function getPostTime(){
		echo human_time_diff(get_the_time('U'),current_time('timestamp')).' ago';
	}

	function getPostThumbnail(){
		if (has_post_thumbnail($post->ID)){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			echo $image[0];
		}
	}

	function getPostExcerpt($charlength) {
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo $subex;
			}
		} else {
			echo $excerpt;
		}
	}



	remove_filter('the_content', 'wpautop');
?>