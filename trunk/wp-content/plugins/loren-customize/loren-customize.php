<?php
/**
 * Plugin Name: Trang Loren Plugin
 * Plugin URI: http:://trangloren.com
 * Version: 1.0
 * Author: Cuong Bui
 * Author URI: http:://trangloren.com
 * Description: Plugin for Trangloren
 */

class WPLoren {
	/*
	* Cunstructor. Called when plugin is initialised
	*/

	function __construct() {

		add_action( 'init', array( $this, 'register_custom_post_type' ));

		add_filter( 'manage_edit-teacher_columns', array( $this, 'add_teacher_table_columns' ) );
	}

	function register_custom_post_type() {

		// Add course_post_type
		register_post_type( 'course', array(
			'labels' => array(
				'name' 				=> 'Courses',
				'singular_name' 	=> 'Course',
				'menu_name' 		=> 'Courses',
				'name_admin_bar' 	=> 'Course',
				'add_new'			=> 'Add New',
				'add_new_item'		=> 'Add New Course',
				'new_item'			=> 'New Course',
				'edit_item'			=> 'Edit Course',
				'view_item'			=> 'View Course',
				'all_items'			=> 'All Courses',
				'search_items'		=> 'Search Courses',
				'parent_item_colon'	=> 'Parent Courses:',
				'not_found'			=> 'No courses found.',
				'not_found_in_trash'=> 'No courses found in Trash.'
			),

			// Frontend
			'has_archive'		=> true,
			'public'			=> true,
			'publicly_queryable'=> true,

			// Admin
			'capability_type'	=> 'post',
			'menu_icon'			=> 'dashicons-format-aside',
			'query_var'			=> true,
			'show_in_menu'		=> true,
			'show_ui'			=> true,
			'supports'			=> array(
				'title',
				'editor',
				'author',
				'comments',
				'thumbnail',
				'excerpt',
				// 'trackbacks',
				'custom-fields',
				'revisions',
				'page-attributes',
			),
		) );

		// Add course_post_type
		register_post_type( 'teacher', array(
			'labels' => array(
				'name' 				=> 'Teachers',
				'singular_name' 	=> 'Teacher',
				'menu_name' 		=> 'Teachers',
				'name_admin_bar' 	=> 'Teacher',
				'add_new'			=> 'Add New',
				'add_new_item'		=> 'Add New Teacher',
				'new_item'			=> 'New Teacher',
				'edit_item'			=> 'Edit Teacher',
				'view_item'			=> 'View Teacher',
				'all_items'			=> 'All Teachers',
				'search_items'		=> 'Search Teachers',
				'parent_item_colon'	=> 'Parent Teachers:',
				'not_found'			=> 'No teachers found.',
				'not_found_in_trash'=> 'No teachers found in Trash.'
			),

			// Frontend
			'has_archive'		=> true,
			'public'			=> true,
			'publicly_queryable'=> true,

			// Admin
			'capability_type'	=> 'post',
			'menu_icon'			=> 'dashicons-groups',
			'query_var'			=> true,
			'show_in_menu'		=> true,
			'show_ui'			=> true,
			'supports'			=> array(
				'title',
				'editor',
				'author',
				//'comments',
				'thumbnail',
				'excerpt',
				// 'trackbacks',
				//'custom-fields',
				'revisions',
				'page-attributes',
			),
		) );

		// Add course_post_type
		register_post_type( 'student', array(
			'labels' => array(
				'name' 				=> 'Students',
				'singular_name' 	=> 'Student',
				'menu_name' 		=> 'Students',
				'name_admin_bar' 	=> 'Student',
				'add_new'			=> 'Add New',
				'add_new_item'		=> 'Add New Student',
				'new_item'			=> 'New Student',
				'edit_item'			=> 'Edit Student',
				'view_item'			=> 'View Student',
				'all_items'			=> 'All Students',
				'search_items'		=> 'Search Students',
				'parent_item_colon'	=> 'Parent Students:',
				'not_found'			=> 'No students found.',
				'not_found_in_trash'=> 'No students found in Trash.'
			),

			// Frontend
			'has_archive'		=> false,
			'public'			=> false,
			'publicly_queryable'=> false,

			// Admin
			'capability_type'	=> 'post',
			'menu_icon'			=> 'dashicons-welcome-learn-more',
			'query_var'			=> true,
			'show_in_menu'		=> true,
			'show_ui'			=> true,
			'supports'			=> array(
				'title',
				//'editor',
				'author',
				//'comments',
				'thumbnail',
				//'excerpt',
				// 'trackbacks',
				//'custom-fields',
				'revisions',
				'page-attributes',
			),
		) );

		// Add course_post_type
		register_post_type( 'feedback', array(
			'labels' => array(
				'name' 				=> 'Feedbacks',
				'singular_name' 	=> 'Feedback',
				'menu_name' 		=> 'Feedbacks',
				'name_admin_bar' 	=> 'Feedback',
				'add_new'			=> 'Add New',
				'add_new_item'		=> 'Add New Feedback',
				'new_item'			=> 'New Feedback',
				'edit_item'			=> 'Edit Feedback',
				'view_item'			=> 'View Feedback',
				'all_items'			=> 'All Feedbacks',
				'search_items'		=> 'Search Feedbacks',
				'parent_item_colon'	=> 'Parent Feedbacks:',
				'not_found'			=> 'No feedbacks found.',
				'not_found_in_trash'=> 'No feedbacks found in Trash.'
			),

			// Frontend
			'has_archive'		=> false,
			'public'			=> false,
			'publicly_queryable'=> false,

			// Admin
			'capability_type'	=> 'post',
			'menu_icon'			=> 'dashicons-format-status',
			'query_var'			=> true,
			'show_in_menu'		=> true,
			'show_ui'			=> true,
			'supports'			=> array(
				'title',
				//'editor',
				'author',
				//'comments',
				'thumbnail',
				//'excerpt',
				// 'trackbacks',
				//'custom-fields',
				'revisions',
				'page-attributes',
			),
		) );

		// Add course_post_type
		register_post_type( 'schedule', array(
			'labels' => array(
				'name' 				=> 'Schedules',
				'singular_name' 	=> 'Schedule',
				'menu_name' 		=> 'Schedules',
				'name_admin_bar' 	=> 'Schedule',
				'add_new'			=> 'Add New',
				'add_new_item'		=> 'Add New Schedule',
				'new_item'			=> 'New Schedule',
				'edit_item'			=> 'Edit Schedule',
				'view_item'			=> 'View Schedule',
				'all_items'			=> 'All Schedules',
				'search_items'		=> 'Search Schedules',
				'parent_item_colon'	=> 'Parent Schedules:',
				'not_found'			=> 'No schedules found.',
				'not_found_in_trash'=> 'No schedules found in Trash.'
			),

			// Frontend
			'has_archive'		=> false,
			'public'			=> true,
			'publicly_queryable'=> false,

			// Admin
			'capability_type'	=> 'post',
			'menu_icon'			=> 'dashicons-calendar',
			'query_var'			=> true,
			'show_in_menu'		=> true,
			'show_ui'			=> true,
			'supports'			=> array(
				'title',
				'editor',
				'author',
				'comments',
				'thumbnail',
				'excerpt',
				// 'trackbacks',
				'custom-fields',
				'revisions',
				'page-attributes',
			),
		) );

		// Add course_post_type
		register_post_type( 'register', array(
			'labels' => array(
				'name' 				=> 'Register',
				'singular_name' 	=> 'Register',
				'menu_name' 		=> 'Register List',
				'name_admin_bar' 	=> 'Register',
				'add_new'			=> 'Add New',
				'add_new_item'		=> 'Add New',
				'new_item'			=> 'New Register',
				'edit_item'			=> 'Edit Register',
				'view_item'			=> 'View Register',
				'all_items'			=> 'All Registers',
				'search_items'		=> 'Search Registers',
				'parent_item_colon'	=> 'Parent Registers:',
				'not_found'			=> 'No registers found.',
				'not_found_in_trash'=> 'No registers found in Trash.'
			),

			// Frontend
			'has_archive'		=> false,
			'public'			=> false,
			'publicly_queryable'=> false,

			// Admin
			'capability_type'	=> 'post',
			'menu_icon'			=> 'dashicons-welcome-learn-more',
			'query_var'			=> true,
			'show_in_menu'		=> true,
			'show_ui'			=> true,
			'supports'			=> array(
				'title',
			),
		) );
	}

	function add_teacher_table_columns( $columns ) {
		$columns['title'] = 'Tên giáo viên';
		$columns['author'] = 'Người tạo';
		$columns['date'] = 'Ngày tạo';
		return $columns;
	}
}

$wpLoren = new WPLoren;