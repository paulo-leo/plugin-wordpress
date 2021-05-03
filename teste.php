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
if(!defined('ABSPATH')){ 
    die;
}


 function teste($x){
	 
	 return $x.'Você está usando um plugin';
	 
 }
 
add_filter('the_content','teste');













