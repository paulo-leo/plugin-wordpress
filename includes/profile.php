<?php
// CAMPOS DE PERFIL PERSONALIZADOS
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Você nas redes sociais</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitteruser" id="twitteruser" value="<?php echo esc_attr( get_the_author_meta( 'twitteruser', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">O seu nome de usuário do Twitter</span>
			</td>
		</tr>

		<tr>
			<th><label for="facebookuser">Facebook</label></th>

			<td>
				<input type="text" name="facebookuser" id="facebookuser" value="<?php echo esc_attr( get_the_author_meta( 'facebookuser', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">O seu perfil no Facebook (URL)</span>
			</td>
		</tr>		

	</table>

	<h3>Oi Paulo</h3>

	<table class="form-table">

		<tr>
			<th><label for="pais">País</label></th>

			<td>
				<input type="text" name="pais" id="pais" value="<?php echo esc_attr( get_the_author_meta( 'pais', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">O seu país</span>
			</td>
		</tr>

		<tr>
			<th><label for="cidade">Cidade</label></th>

			<td>
				<input type="text" name="cidade" id="cidade" value="<?php echo esc_attr( get_the_author_meta( 'cidade', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Cidade onde se encontra</span>
			</td>
		</tr>		

	</table>	
<?php } 


// GUARDAR E MANTER INFO DOS CAMPOS
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'twitteruser', $_POST['twitteruser'] );
	update_usermeta( $user_id, 'facebookuser', $_POST['facebookuser'] );
	update_usermeta( $user_id, 'cidade', $_POST['cidade'] );
	update_usermeta( $user_id, 'pais', $_POST['pais'] );
}

?>