<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly


if(isset($_POST['import_vendor'])){
			if(empty($_FILES))
			return;
		
		$file = $_FILES['vendor_csv']['tmp_name'];
		$labels = 0;
		if (($handle = fopen($file, "r")) !== FALSE) {
		    while ( ($data = fgetcsv($handle,1000,",") ) !== FALSE ) {
		    	if($labels){

					$email = $data[0];
					$name = $data[1];
					$address = $data[2];
					
					
					global $user_ID, $wpdb;
						$query = $wpdb->prepare(
							'SELECT ID FROM ' . $wpdb->posts . '
							WHERE post_title = %s
							AND post_type = \'vendor_management\'',
							$name
						);
						$wpdb->query( $query );
						 if ( $wpdb->num_rows ) {
								$post_id = $wpdb->get_var( $query );
								$check_email = get_post_meta( $post_ID, 'email', $email );
									$check_email++;
								$check_name = get_post_meta( $post_ID, 'name', $email );
									$check_name++;
								$check_address = get_post_meta( $post_ID, 'address', $address );
									$check_address++; 
								update_post_meta( $post_ID, 'email', $email );
								update_post_meta( $post_ID, 'name', $name );
								update_post_meta( $post_ID, 'address', $address );
							} else {

											
					$vendor = array(
						'post_title'	=> $name,
						'post_type'		=> 'vendor_management',
						'post_status'	=> 'new'
					);
					
					
					$post_ID = wp_insert_post( $vendor );
					
					if( $email ) {
						add_post_meta( $post_ID, 'email', $email );
							}
							
							if( $name ) {
								add_post_meta( $post_ID, 'name', $name );
								
									}
									
									if( $address ) {
										add_post_meta( $post_ID, 'address', $address );
														}
											}					
										}else{ //Skips the first row/
		    		$labels = 1;
		    	}
		    }
		    fclose($handle);
		}
	}
