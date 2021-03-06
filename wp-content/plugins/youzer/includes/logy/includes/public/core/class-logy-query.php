<?php

class Logy_Query {

	protected $logy;
	protected $wpdb;
	protected $users_table;

	function __construct() {

		global $Logy, $wpdb, $Logy_users_table;

		// Init Variables.
    	$this->logy = &$Logy;
    	$this->wpdb = &$wpdb;
    	$this->users_table = &$Logy_users_table;

    	// Delete User Data.
		add_action( 'delete_user', array( $this, 'delete_stored_user_data' ) );

	}

	/**
	 * Get User By Provider And ID.
	 */
	public function get_user_by_provider( $provider, $uid, $email = null ) {

		// Get SQL.
		$sql = "SELECT user_id FROM $this->users_table WHERE provider = %s AND identifier = %s";

		// if ( ! empty( $email ) && $provider == 'Facebook' ) {
		// 	$sql = "SELECT user_id FROM $this->users_table WHERE provider = %s AND email = %s";
		// 	$uid = $email;
		// }

		// Get Result
		$result = $this->wpdb->get_var( $this->wpdb->prepare( $sql, $provider, $uid ) );

		// Return Result.
		return $result;
	}

	/**
	 * Get User By Provider And ID.
	 */
	public function wpmu_is_user_need_confirmation( $email ) {
		
		// Get SQL.
		$sql = "SELECT id FROM $this->users_table WHERE email = %s AND user_id = 0";
		
		// Get Result
		$result = $this->wpdb->get_var( $this->wpdb->prepare( $sql, $email ) );
		
		if ( $result > 0 ) {
			return true;
		}

		// Return Result.
		return false;
	}

	/**
	 * Get User By Email.
	 */
	public function wpmu_update_user_social_data( $email, $user_id ) {
		// Update User ID
		$result = $this->wpdb->update( $this->users_table, array( 'user_id' => $user_id ), array( 'email' => $email ) );
		// Return Result.
		return $result;
	}

	/**
	 * Get User Stored Data
	 */
	public function get_user_stored_social_data( $user_id ) {
		// Get SQL.
		$sql = "SELECT * FROM $this->users_table WHERE user_id = %d";
		// Get Result
		$result = $this->wpdb->get_results( $this->wpdb->prepare( $sql, $user_id ) );
		$result = isset( $result[0] ) ? $result[0] : null;
		// Return Result.
		return $result;
	}

	/**
	 * Get User ID by Verified Email.
	 */
	function get_user_verified_email( $email ) {
		// Get SQL.
		$sql = "SELECT user_id FROM $this->users_table WHERE emailverified = %s";
		// Get Result
		$result = $this->wpdb->get_var( $this->wpdb->prepare( $sql, $email ) );
		// Return Result.
		return $result;
	}

	/**
	 * Store User Data Into Database.
	 */
	public function store_user_data( $user_id = null, $provider, $profile ) {

		// Update Buddypress User Meta.
		yz_update_user_profile_meta( $user_id, $profile );

		// Update User Avatar.
		if ( isset( $profile->photoURL ) && ! empty( $profile->photoURL ) ) {
			
			// Upload Image Localy.
			$profile_photo = yz_upload_image_by_url( $profile->photoURL );
			
			if ( ! empty( $profile_photo ) ) {
				$profile->photoURL = $profile_photo;
			}

			if ( is_multisite() ) {
				update_user_option( $user_id, 'logy_avatar', $profile->photoURL );
			} else {
				update_user_meta( $user_id, 'logy_avatar', $profile->photoURL );
			}
		
		}
		
		if ( isset( $profile->firstname ) ) {
			update_user_meta( $user_id, 'first_name', $profile->firstname );
		}

		if ( isset( $profile->lastname ) ) {
			update_user_meta( $user_id, 'last_name', $profile->firstname );
		}

		// Get Profile Hash
		$new_hash = sha1( serialize( $profile ) );		

		// Get User Old Profile Data.
		$old_profile = $this->get_user_profile( $user_id, $provider, $profile->identifier );
 		
		// Check if user data changed since last login.
		if ( ! empty( $old_profile ) && $old_profile[0]->profile_hash == $new_hash ) {
			return false;	
		}

		// Get Table ID.
		$table_id = ! empty( $old_profile ) ? $old_profile[0]->id : null;

		// Get Table Data.
		$table_data = array(
			'id' => $table_id,
			'user_id' => $user_id,
			'provider' => $provider,
			'profile_hash' => $new_hash
		);

		// Get Table Fields.
		$fields = array( 
			'identifier', 
			'profileurl', 
			'websiteurl', 
			'photourl', 
			'displayname', 
			'description', 
			'firstname', 
			'lastname', 
			'gender', 
			'language', 
			'age', 
			'birthday', 
			'birthmonth', 
			'birthyear', 
			'email', 
			'emailverified', 
			'phone', 
			'address', 
			'country', 
			'region', 
			'city', 
			'zip'
		);

		foreach( $profile as $key => $value ) {
			// Transform Key To LowerCase.
			$key = strtolower( $key );
			// Get Table Data.
			if ( in_array( $key, $fields ) ) {
				$table_data[ $key ] = (string) $value;
			}
		}

		// Replace Data.
		$this->wpdb->replace( $this->users_table, $table_data ); 

		return false;
	}

	/**
	 * WPMU - Store User Data Into Database.
	 */
	public function wpmu_store_user_data( $provider, $profile ) {

		$new_hash = sha1( serialize( $profile ) );		

		// Get Table Data.
		$table_data = array(
			'id' => null,
			'user_id' => 0,
			'provider' => $provider,
			'profile_hash' => $new_hash
		);

		// Get Table Fields.
		$fields = array( 
			'identifier', 
			'profileurl', 
			'websiteurl', 
			'photourl', 
			'displayname', 
			'description', 
			'firstname', 
			'lastname', 
			'gender', 
			'language', 
			'age', 
			'birthday', 
			'birthmonth', 
			'birthyear', 
			'email', 
			'emailverified', 
			'phone', 
			'address', 
			'country', 
			'region', 
			'city', 
			'zip'
		);

		foreach( $profile as $key => $value ) {
			// Transform Key To LowerCase.
			$key = strtolower( $key );
			// Get Table Data.
			if ( in_array( $key, $fields ) ) {
				$table_data[ $key ] = (string) $value;
			}
		}

		// Replace Data.
		$this->wpdb->replace( $this->users_table, $table_data ); 

		return false;
	}


	/**
	 * Delete Stored User Data form Database.
	 */
	public function delete_stored_user_data( $user_id ) {

		// Delete Data.
		$this->wpdb->query(
			$this->wpdb->prepare( "DELETE FROM $this->users_table where user_id = %d", $user_id )
		);

		// Delete User Meta
		if ( is_multisite() ) {
			delete_user_option( $user_id, 'logy_avatar' );
		} else {
			delete_user_meta( $user_id, 'logy_avatar' );
		}

	}
	
	/**
	 * Get User Profile Data.
	 */
	public function get_user_profile( $user_id, $provider, $uid ) {

		// Get SQL Request.
		$sql = "SELECT * FROM $this->users_table WHERE user_id = %d AND provider = %s AND identifier = %s";

		// Get Result.		
		$result = $this->wpdb->get_results( $this->wpdb->prepare( $sql, $user_id, $provider, $uid ) );

		return $result;
	}

}
		