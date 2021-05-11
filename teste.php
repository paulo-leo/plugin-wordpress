<?php
/**
 * @package Akismet
 */
/*
Plugin Name: Teste do Paulo
Plugin URI: https://pldasc.com
Description: Esse é um plugin de teste.
Version: 0.1
Author: Paulo Leonardo
Author URI: https://pldasc.com
License: GPLv2 or later
Text Domain: akismet
*/
//=================================================
//Aborte se este arquivo for chamado diretamente
//=================================================

/*define o diretório de onde virão os arquivos*/

function wp_include($file){
	include(plugin_dir_path( __FILE__ ).'includes/'.$file);
}

function wp_classe($file){
	include(plugin_dir_path( __FILE__ ).'classes/'.$file);
}

function wp_function($file){
	include(plugin_dir_path( __FILE__ ).'functions/'.$file);
}

if(!defined('ABSPATH')){ 
    die;
}


 function teste($x){
	 
	 return $x.'Você está usando um plugin';
	 
 }
 
 
/*Acesso a base de dados*/

function wp_select($table)
{
	global $wpdb;
	$table = $wpdb->prefix.$table;
	$sql = "SELECT * FROM {$table}";
	return $wpdb->get_results($sql,ARRAY_A); 
}
 
 function hello(){
	 
	 echo "<h1>Um plugin</h1>";
 }
add_filter('the_content','teste');

wp_function('database.php');

wp_include('page.php');
wp_include('profile.php');















