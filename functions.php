<?php
	require_once( 'external/starkers-utilities.php' );
	
	function getImageID($image_url) {
	    global $wpdb;
	    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
	        return $attachment[0]; 
	}


	add_filter( 'tiny_mce_before_init', 'my_format_TinyMCE' );

	function my_format_TinyMCE( $in ) {
		//$in['paste_remove_styles'] = true;
		$in['paste_as_text'] = true;
		return $in;
	}

	
	function getYoutubeID($url){
	    parse_str(parse_url($url, PHP_URL_QUERY ), $yt_id);
	    return $yt_id['v'];  
	}

	function getYoutubeMeta($yt_id){
		$yt_apikey = 'AIzaSyCuQTR5LVpmHgs2EPrhBVbAGjmHunxTmMk';
		$yt_query = wp_remote_get('https://www.googleapis.com/youtube/v3/videos?id='.$yt_id.'&key='.$yt_apikey.'&fields=items(snippet(title,description,publishedAt,thumbnails(maxres,high)),statistics(viewCount))&part=snippet,statistics');
		$yt_response = json_decode($yt_query['body']);
		$yt_meta['yt_date'] = $yt_response->items[0]->snippet->publishedAt;
        $yt_meta['yt_title'] = $yt_response->items[0]->snippet->title;
		$yt_meta['yt_desc'] = $yt_response->items[0]->snippet->description;
		$yt_meta['yt_count'] = $yt_response->items[0]->statistics->viewCount;
		$yt_meta['yt_thumb_max'] = $yt_response->items[0]->snippet->thumbnails->maxres->url;
        $yt_meta['yt_thumb_high'] = $yt_response->items[0]->snippet->thumbnails->high->url;
		return $yt_meta;
	}

	//save video post type
	add_action('acf/save_post', 'my_acf_save_post', 20);
	function my_acf_save_post( $post_id ) {
	    global $post; 
	    if ($post->post_type == 'milestone'){
	        $yt_video_id = getYoutubeID(get_field('video', false, false));
	        $yt_video = getYoutubeMeta($yt_video_id);
	        $yt_title = $yt_video['yt_title'];
	        $yt_count = $yt_video['yt_count'];
	        $yt_desc = $yt_video['yt_desc'];
	        $yt_thumb_max = $yt_video['yt_thumb_max'];
	        $yt_thumb_high = $yt_video['yt_thumb_high'];
	        $yt_date = $yt_video['yt_date'];
	        if ($yt_thumb_max) {
	        	$yt_thumb = $yt_thumb_max;
	        }
	    	else {
	    		$yt_thumb = $yt_thumb_high;
	    	}
	        update_field('video_thumb', $yt_thumb, $post_id);
	    }
	}


	//add_theme_support('post-thumbnails');	
	
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
	  //add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
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

	function get_custom_feeds($feed_query) {
		if (isset($feed_query['feed']) && !isset($feed_query['post_type']))
			$feed_query['post_type'] = array('story', 'event');
		return $feed_query;
	}
	add_filter('request', 'get_custom_feeds');

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
	  remove_menu_page( 'edit.php' ); 
	  remove_menu_page( 'upload.php' );              
	  // remove_menu_page( 'edit.php?post_type=page' );    
	  remove_menu_page( 'edit-comments.php' );          
	  //remove_menu_page( 'themes.php' );                
	  //remove_menu_page( 'plugins.php' );         
	  //remove_menu_page( 'users.php' );                
	  remove_menu_page( 'tools.php' );
	}
	add_action( 'admin_menu', 'remove_menus' );

	function admin_default_page() {
	  return 'wp-admin/edit.php?post_type=story';
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
	
	

	function my_acf_init() {
		
		acf_update_setting('google_api_key', 'AIzaSyD5bqFYkSJTUhUKxJUdao3JY8tOVDjMNLA');
	}

	add_action('acf/init', 'my_acf_init');
	
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
		return human_time_diff(get_the_time('U'),current_time('timestamp')).' ago';
	}

	function getPostThumbnail(){
		return get_field('cover_image');
	}

	function getPostExcerpt($charlength) {
		$postExcerpt = get_field('excerpt');
		return substr(get_field('excerpt'), 0, $charlength).'...';

		// $charlength++;

		// if (mb_strlen($excerpt)>$charlength){
		// 	$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		// 	$exwords = explode( ' ', $subex );
		// 	$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		// 	if ( $excut < 0 ) {
		// 		return mb_substr( $subex, 0, $excut );
		// 	} else {
		// 		return $subex;
		// 	}
		// } else {
		// 	return $excerpt;
		// }
	}

	function getReactions($post_id){
	    if(!$post_id){return;}
	    $html = '<ul>';
	    
	    $reactions = ['angry', 'bored', 'love', 'happy', 'wow'];
	    foreach ($reactions as $reaction) {
	        $class = 'is-reactive';
	        $cookie = $reaction.$post_id;
	        $count = get_post_meta($post_id, $reaction, true);
	        if(empty($count)){
	            $count = 0;
	        }
	        $html .= '<li class="o-reaction"><a href="#" class="'.$class.'" data-reaction="'.$reaction.'" data-id="'.$post_id.'"><i class="o-icon s--'.$reaction.'"></i><span class="o-reaction__count">'.$count.'</span><span class="o-reaction__add">+</span></a></li>';
	    }
	    $html .= '</ul>';
	    echo $html;
	}

	function updatePostReaction(){
	    $post_id = $_POST['post_id'];
	    $reaction = $_POST['reaction'];
	    $operation = $_POST['operation'];

	    $count = get_post_meta($post_id, $reaction, true);
	    if($count == ''){
	        $count = 0;
	    }

	    if($operation == 'increment'){
		    $count += 1;
		}else{
			$count -= 1;
		}

	    update_post_meta($post_id, $reaction, $count);
	    die();
	}

	add_action('wp_ajax_updatePostReaction', 'updatePostReaction');
	add_action('wp_ajax_nopriv_updatePostReaction', 'updatePostReaction');

	function getBioContent(){
	    $bioID = $_POST['bioID'];
	    $html = '';
	    
	    $networks = acf_get_fields('127');
	    
	    $html .= '<ul class="o-networks t-light">';
	    foreach ($networks as $network) {
	    	$networkName = $network['name'];
	    	$networkField = esc_url(get_field($networkName, $bioID));
	    	if($networkField){
	    	$html .= '<li><a target="_blank" href="'.$networkField.'"><span class="o-icon s--'.$networkName.'"></span></a></li>';
	    	}
	    }
	    $html .='</ul>';


	    if(get_post_type($bioID) != 'partner'){
			$bioObject = get_post($bioID);
			$bioContent = $bioObject->post_content;
			$html .= $bioContent;
			echo json_encode($html);
		}
		else{
			$html .= '<p>'.get_post_meta( $bioID, 'introduction', true).'</p>';
			$ids = get_field('programs', $bioID, false);
			
			$linkedPrograms = new WP_Query(array('post_per_page'=>-1,'post_type'=>'program', 'post__in'=>$ids));
			if ($linkedPrograms->have_posts()){
				$html .='<h2 class="o-subheading">Programs Supported</h2><ul class="c-programs__nav s--clear">';
				while ($linkedPrograms->have_posts()){
					$linkedPrograms->the_post();
					$html .= '<li class="u-third"><a href="'.get_permalink().'" style="background-image:url('.get_field('logo').'")"></a></li>';
				}
				$html .='</ul>';
				wp_reset_postdata();
			}
			echo json_encode($html); 
		}
	    die();
	}

	add_action('wp_ajax_getBioContent', 'getBioContent');
	add_action('wp_ajax_nopriv_getBioContent', 'getBioContent');

	function getStories(){
	    $offset = $_POST['offset'];
	    $storyCategory = $_POST['category'];
	    $postsPerPage = $_POST['postsPerPage'];
	    $postIndex = intval($_POST['tailIndex']) + 1;
	    $html = '';
	    $bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large'];
	    $args = array();

	    if($storyCategory){
	    	$args = array('post_type'=>'story', 'post_per_page'=>$postsPerPage, 'offset'=>intval($offset), 'category_name' => $storyCategory);
	    } 
	    else{
	    	$args = array('post_type'=>'story', 'post_per_page'=>$postsPerPage, 'offset'=>intval($offset));
	    }

	    $stories = new WP_Query($args);
	    $storyClass = '';

	    if ($stories->have_posts()){
	    	while ($stories->have_posts()){
	    		$stories->the_post();

	    		if ($postIndex > 2) {
	    			$postIndex = 0;
	    		}

	    		if($postIndex == 2){
	    			$postClass = 'u-full';
	    		} else {
	    			$postClass = 'u-half';
	    		}

	    		$storyTitle = get_the_title();
	    		$storyLink = get_permalink();
	    		$storyTime = getPostTime();
	    		$storyThumb = getPostThumbnail();
	    		$storyExcerpt = getPostExcerpt(136);

	    		$html .= '<li id="'.$postIndex.'" class="o-article '.$postClass.'" data-aos="fade-up"><a class="u-wrap o-article__link" href="'.$storyLink.'"><section class="o-article__figure"><figure style="background-image:url('.$storyThumb.')"><div class="u-center"><i class="o-icon s--pen"></i></div><span class="o-article__time o-subtitle">'.$storyTime.'</span></figure></section><span class="o-bubble '.$bubbleSizes[array_rand($bubbleSizes)].'"></span><section class="o-article__brief"><span class="o-subheading">'.$storyTitle.'</span><section>'.$storyExcerpt.'<span class="o-link"><i class="o-icon s--arrow-ltr"></i></span></section></section></a></li>';

	    		$postIndex ++;
	    	}
	    	wp_reset_postdata();
	    	echo json_encode($html);
	    } else {
	    	echo 0;
	    }
	    die();
	}

	add_action('wp_ajax_getStories', 'getStories');
	add_action('wp_ajax_nopriv_getStories', 'getStories');

	//remove_filter('the_content', 'wpautop');


	 function my_acf_admin_head() {
	 	global $my_admin_page;
	 	$screen = get_current_screen();
	 	if($screen->post_type == 'story'){
	 	?>
	     <style type="text/css">
	         #acf-group_59846e206d355, #commentsdiv, .acf-field-59815fa3627b7, .acf-field-5981dc0466160, .acf-field-5981e2c1a5470, .acf-field-5982add6060b1, .acf-field-5982adab060af, .acf-field-5982adb6060b0, .acf-field-5982adee060b2, .acf-field-5982adf8060b3{display: none}
	     </style>
	     <?php

	     }
	 }

	add_action('acf/input/admin_head', 'my_acf_admin_head');

	function order_category_archives( $query ) {
	  if ( (is_category() || is_tag()) && $query->is_main_query() ){
	    $query->set( 'post_type', 'story' );
	  }
	}

	add_action( 'pre_get_posts', 'order_category_archives' );
?>