<?php

namespace Leadin\auth;

use Leadin\data\User;
use Leadin\data\Portal_Options;
use Leadin\auth\OAuthCrypto;
use Leadin\admin\Routing;
use Leadin\admin\MenuConstants;

/**
 * Class managing OAuth2 authorization
 */
class OAuth {

	const MAX_RETRIES              = 3;
	const RETRY_DELAY_MICROSECONDS = 100000; // 100ms converted to microseconds

	/**
	 * Authorizes the plugin with given oauth credentials by storing them in the options DB.
	 *
	 * @param string $refresh_token OAuth refresh token to store.
	 */
	public static function authorize( $refresh_token ) {
		$encrypted_refresh_token = OAuthCrypto::encrypt( $refresh_token );
		Portal_Options::set_refresh_token( $encrypted_refresh_token );

		Portal_Options::set_last_authorize_time();
	}

	/**
	 * Deauthorizes the plugin by deleting OAuth credentials from the options DB.
	 */
	public static function deauthorize() {
		Portal_Options::delete_refresh_token();

		Portal_Options::set_last_deauthorize_time();
	}

	/**
	 * Attempts to get and decrypt the refresh token with retries.
	 * Records an error if decryption fails or if the token is invalid.
	 *
	 * @return string The decrypted refresh token, or an empty string on failure.
	 */
	public static function get_refresh_token() {
		for ( $attempt = 0; $attempt < self::MAX_RETRIES; $attempt++ ) {
			$encrypted_refresh_token = Portal_Options::get_refresh_token();

			if ( ! self::is_valid_value( $encrypted_refresh_token ) ) {
					Portal_Options::set_refresh_token_error( 'Token is invalid or missing' );
					self::retry_delay();
					continue;
			}

			$refresh_token = OAuthCrypto::decrypt( $encrypted_refresh_token );

			if ( ! self::is_valid_value( $refresh_token ) ) {
					Portal_Options::set_refresh_token_error( 'Decryption failed' );
					self::retry_delay();
					continue;
			}

			return $refresh_token;
		}

		return '';
	}

	/**
	 * Checks if the provided value is valid (not false, null, or empty).
	 *
	 * @param mixed $value The value to check.
	 * @return bool Whether the value is valid.
	 */
	private static function is_valid_value( $value ) {
		return false !== $value && null !== $value && '' !== $value;
	}

	/**
	 * Delays the execution to handle transient issues before retrying.
	 */
	private static function retry_delay() {
		usleep( self::RETRY_DELAY_MICROSECONDS );
	}
}
