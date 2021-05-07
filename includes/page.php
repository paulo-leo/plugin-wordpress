<?php

 /* 
 Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page(){
	
    add_menu_page( 
        'Página de teste',
        'Meu lateral',
        'manage_options',
        'custompage',
        'my_custom_menu_page',
        plugins_url( 'myplugin/images/icon.png' ),
        6
    ); 
	
	add_menu_page( 
        'Página de testezz',
        'Meu lateralz',
        'manage_options',
        'custompage',
        'my_custom_menu_page',
        null,
        7
    ); 
}

add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
 
/**
 * Display a custom menu page
 */
function my_custom_menu_page(){
   get_header();
   echo '<form action="'.get_permalink().'" method="post">
  <div>
    <label for="field-name">Nome</label>
    <input type="text" name="field_name" id="field-name" placeholder="Nome" required />
  </div>
  <div>
    <label for="field-email">E-mail</label>
    <input type="email" name="field_email" id="field-email" placeholder="E-mail" required />
  </div>
  <div>
    <label for="field-message">Mensagem</label>
    <textarea name="field_message" id="field-message" cols="30" rows="10" placeholder="Mensagem"></textarea>
  </div>
  <div>
    <button type="submit">Enviar</button>
  </div>
</form>';
   
}













