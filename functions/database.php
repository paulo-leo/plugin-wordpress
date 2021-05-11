<?php
namespace WPSE\SomeNameSpace;


function wp_find($table,$row,$value=null)
{
	global $wpdb;
	$table = $wpdb->prefix.$table;
	
	if(is_numeric($row)){
		$sql = "SELECT * FROM {$table} WHERE id = {$row}";
	}else{
		$sql = "SELECT * FROM {$table} WHERE {$row} = '{$value}'";
	}
	return $wpdb->get_row($sql); 
}

function wp_results($table)
{
	global $wpdb;
	$table = $wpdb->prefix.$table;
	$sql = "SELECT * FROM {$table}";
	return $wpdb->get_results($sql); 
}

function wp_paginate($table,$total_reg=10)
{
	global $wpdb;
	$table = $wpdb->prefix.$table;
	
	$search = "SELECT * FROM {$table}";

	$page = $_GET['page'];
    if (!$page) {
     $pc = "1";
    } else {
      $pc = $page;
    }
	$init = $pc - 1;
    $init = $init * $total_reg;
	$limit = $wpdb->get_results("$search LIMIT $init,$total_reg");
    $count = count($wpdb->get_results($search));

    $tr = $count; // verifica o número total de registros
    $tp = $tr / $total_reg; // verifica o número total de páginas
	
	$previous = $pc -1;
    $next = $pc +1;
	 
    $previous = ($pc>1) ? "?page=$previous" : null;
    $next =  ($pc<$tp) ? "?page=$next" : null;
	
	$a_previous = $previous ?  "<a href='{$previous}'><</a>" : null;
	$a_next = $next ? "<a href='{$next}'>></a>" : null;
	
	$array = array(
	'total'=>$count,
	'next'=>$next,
	'previous'=>$previous,
	'results'=>$limit,
	'a_next'=>$a_next,
    'a_previous'=>$a_previous
	);
	
    return (object) $array;
}

/*
    $r = wp_paginate('posts',2);

    if($r->results){
    foreach($r->results as $value){
	    echo '<h1>'.$value->post_title.'</h1>';
    }
    }else{
	   echo '<h1>Nenhum registro encontrado.</h1>';
    }
	
    if($r->a_previous) echo $r->a_previous;
    if($r->a_next) echo $r->a_next;
*/



 



