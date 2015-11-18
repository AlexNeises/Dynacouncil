<?php if(!defined('ABSPATH')) exit('Ah ah ah, you didn\'t say the magic word.');

/*
Plugin Name:			Kansas Knights of Columbus Council Updater
Plugin URI:				http://www.github.com/amx15/dynacouncil
Description:			Allows for the updating and modifying of KofC Council information.
Version:				0.1
Author:					Alex Neises
Author URI:				http://www.alexneises.com/
License:				Beerware
License Description:	As long as you retain this notice, you can do whatever you want with
						this stuff.  If we meet some day, and you think this stuff is worth
						it, you can buy me a beer in return.
 */

add_action('admin_menu', 'dynacouncil_setup_menu');

function dynacouncil_setup_menu()
{
	wp_register_style('dynacouncilStylesheet', plugins_url('styles.css', __FILE__));
	$page = add_menu_page('Dynamic Council Editor', 'Dynacouncil', 'manage_options', 'dynacouncil', 'dynacouncil_init');
	add_action('admin_print_styles-' . $page, 'dynacouncil_admin_styles');
}

function dynacouncil_admin_styles()
{
	wp_enqueue_style('dynacouncilStylesheet');
}

function dynacouncil_init()
{
	include('dynacouncil_import_admin.php');
}

if(!class_exists('DynacouncilVirtualPage'))
{
	class DynacouncilVirtualPage
	{
		private $slug = NULL;
		private $title = NULL;
		private $content = NULL;
		private $author = NULL;
		private $date = NULL;
		private $type = NULL;

		public function __construct($args)
		{
			if(!isset($args['slug']))
			{
				throw new Exception('No slug given for virtual page');
			}

			$this->slug = $args['slug'];
			$this->title = isset($args['title']) ? $args['title'] : '';
			$this->content = isset($args['content']) ? $args['content'] : '';
			$this->author = isset($args['author']) ? $args['author'] : 1;
			$this->date = isset($args['date']) ? $args['date'] : current_time('mysql');
			$this->dategmt = isset($args['date']) ? $args['date'] : current_time('mysql', 1);
			$this->type = isset($args['type']) ? $args['type'] : 'page';

			add_filter('the_posts', array(&$this, 'virtualPage'));
		}

		public function virtualPage($posts)
		{
			global $wp, $wp_query;

			if(count($posts) == 0 && (strcasecmp($wp->request, $this->slug) == 0 || $wp->query_vars['page_id'] == $this->slug))
			{
				$post = new stdClass;
				$post->ID = -1;
				$post->post_author = $this->author;
				$post->post_date = $this->date;
				$post->post_date_gmt = $this->dategmt;
				$post->post_content = $this->content;
				$post->post_title = $this->title;
				$post->post_excerpt = '';
				$post->post_status = 'publish';
				$post->comment_status = 'closed';
				$post->ping_status = 'closed';
				$post->post_password = '';
				$post->post_name = $this->slug;
				$post->to_ping = '';
				$post->pinged = '';
				$post->modified = $post->post_date;
				$post->modified_gmt = $post->post_date_gmt;
				$post->post_content_filtered = '';
				$post->post_parent = 0;
				$post->guid = get_home_url('/' . $this->slug);
				$post->menu_order = 0;
				$post->post_type = $this->type;
				$post->post_mime_type = '';
				$post->comment_count = 0;

				$posts = array($post);

				$wp_query->is_page = TRUE;
				$wp_query->is_singular = TRUE;
				$wp_query->is_home = FALSE;
				$wp_query->is_archive = FALSE;
				$wp_query->is_category = FALSE;
				unset($wp_query->query['error']);
				$wp_query->query_vars['error'] = '';
				$wp_query->is_404 = FALSE;
			}

			return $posts;
		}
	}
}

function is_url($url)
{
	$regex = "((https?|ftp)\:\/\/)?"; // SCHEME
	$regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass
	$regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP
	$regex .= "(\:[0-9]{2,5})?"; // Port
	$regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path
	$regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
	$regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor

	if(preg_match("/^$regex$/", $url))
	{
		// if(strpos($url, 'http://') === false)
		// {
		// 	$url = 'http://' . $url;
		// 	return $url;
		// }
		return true;
	}
	return false;
}

function valid_url($url, $text = NULL)
{
	if(is_null($text))
	{
		$text = $url;
	}
	if(is_url($url))
	{
		if(strpos($url, 'http://') === false)
		{
			$url = 'http://' . $url;
		}
		return '<a href="' . $url . '">' . $text . '</a>';
	}
	return $text;
}

function dynacouncil_create_virtual()
{
	global $wpdb;
	$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
	$result = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . 'dynacouncil' . " WHERE council_id = " . $url . " ORDER BY id DESC LIMIT 1");
	if($result)
	{
	// if($url == '534')
	// {
	// foreach($)
	$council_website = valid_url($result[0]->council_website);
	$deputy_website = valid_url($result[0]->deputy_url, $result[0]->district_deputy . '<br/>District Deputy #' . $result[0]->deputy_number);
	$insurance_website = valid_url($result[0]->insurance_url, $result[0]->insurance_representative);
	$fourth_website = valid_url($result[0]->fourth_degree_url, $result[0]->fourth_degree_council);

	// is_url($result[0]->council_website) ? $council_website = '<a href="' . $result[0]->council_website . '">' . $result[0]->council_website . '</a>' : $result[0]->council_website ;
	$args = array(
			'slug' 		=>	'councils/' . $result[0]->council_id,
			'title'		=>	'Council #' . $result[0]->council_id . ' - ' . $result[0]->council_name,
			'content'	=>	'<strong>District Deputy</strong><br/>' . $deputy_website
							. '<br/><br/>' .
							'<strong>Insurance Representative</strong><br/>' . $insurance_website
							. '<br/><br/>' .
							'<strong>Council Contact</strong><br/>' . $result[0]->council_contact_title . '<br/>' . $result[0]->council_contact_name . '<br/>Phone: ' . $result[0]->council_contact_phone . '<br/>Email: ' . $result[0]->council_contact_email
							. '<br/><br/>' .
							'<strong>Meeting Time and Location</strong><br/>' . $result[0]->meeting_time
							. '<br/><br/>' .
							$result[0]->meeting_location . '<br/>' . $result[0]->meeting_address
							. '<br/><br/>' .
							'<strong>Website</strong><br/>' . $council_website
							. '<br/><br/>' .
							'<strong>4th Degree Assembly Serving This Council</strong><br/>' . $fourth_website

		);
		$pg = new DynacouncilVirtualPage($args);
	}
	// }
}

add_action('init', 'dynacouncil_create_virtual');

global $dynacouncil_version;
$dynacouncil_version = '0.1';

function dynacouncil_install()
{
	global $wpdb;
	global $dynacouncil_version;

	$table_name = $wpdb->prefix . "dynacouncil";

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			council_id int(11) NOT NULL,
			council_name text NOT NULL,
			district_deputy text NOT NULL,
			deputy_number text NOT NULL,
			deputy_url varchar(256) DEFAULT '' NOT NULL,
			insurance_representative text NOT NULL,
			insurance_url varchar(256) DEFAULT '' NOT NULL,
			council_contact_title text NOT NULL,
			council_contact_name text NOT NULL,
			council_contact_phone varchar(128) DEFAULT '' NOT NULL,
			council_contact_email varchar(128) DEFAULT '' NOT NULL,
			meeting_time text NOT NULL,
			meeting_location text NOT NULL,
			meeting_address text NOT NULL,
			council_website varchar(55) DEFAULT '' NOT NULL,
			fourth_degree_council varchar(128) DEFAULT '' NOT NULL,
			fourth_degree_url varchar(256) DEFAULT '' NOT NULL,
			UNIQUE KEY id (id)
	) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);

	add_option('dynacouncil_version', $dynacouncil_version);
}

register_activation_hook(__FILE__, 'dynacouncil_install');
register_activation_hook(__FILE__, 'dynacouncil_install_data');
?>