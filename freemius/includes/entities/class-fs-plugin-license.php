<?php
	/**
	 * @package
	 * @copyright
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.5
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Class FS_Plugin_License
	 */
	class FS_Plugin_License extends FS_Entity {

		#region Properties

		/**
		 * @var number
		 */
		public $plugin_id;
		/**
		 * @var number
		 */
		public $user_id;
		/**
		 * @var number
		 */
		public $plan_id;
		/**
		 * @var number
		 */
		public $pricing_id;
		/**
		 * @var int|null
		 */
		public $quota;
		/**
		 * @var int
		 */
		public $activated;
		/**
		 * @var int
		 */
		public $activated_local;
		/**
		 * @var string
		 */
		public $expiration;
		/**
		 * @var string
		 */
		public $secret_key;
		/**
		 * @var bool $is_free_localhost Defaults to true. If true, allow unlimited localhost installs with the same
		 *      license.
		 */
		public $is_free_localhost;
		/**
		 * @var bool $is_block_features Defaults to true. If false, don't block features after license expiry - only
		 *      block updates and support.
		 */
		public $is_block_features;
		/**
		 * @var bool
		 */
		public $is_cancelled;

		#endregion Properties

		/**
		 * @param stdClass|bool $license
		 */
		function __construct( $license = false ) {
			parent::__construct( $license );
		}

		/**
		 * Get entity type.
		 *
		 * @return string
		 */
		static function get_type() {
			return 'license';
		}

		/**
		 * Check how many site activations left.
		 *
		 * @author
		 * @since  1.0.5
		 *
		 * @return int
		 */
		function left() {
			if ( ! $this->is_active() || $this->is_expired() ) {
				return 0;
			}

			if ( $this->is_unlimited() ) {
				return 999;
			}

			return ( $this->quota - $this->activated - ( $this->is_free_localhost ? 0 : $this->activated_local ) );
		}

		/**
		 * Check if single site license.
		 *
		 * @author
		 * @since  1.1.8.1
		 *
		 * @return bool
		 */
		function is_single_site() {
			return ( is_numeric( $this->quota ) && 1 == $this->quota );
		}

		/**
		 * @author
		 * @since  1.0.5
		 *
		 * @return bool
		 */
		function is_expired() {
			return ! $this->is_lifetime() && ( strtotime( $this->expiration ) < WP_FS__SCRIPT_START_TIME );
		}

		/**
		 * Check if license is not expired.
		 *
		 * @author
		 * @since  1.2.1
		 *
		 * @return bool
		 */
		function is_valid() {
			return ! $this->is_expired();
		}

		/**
		 * @author
		 * @since  1.0.6
		 *
		 * @return bool
		 */
		function is_lifetime() {
			return is_null( $this->expiration );
		}

		/**
		 * @author
		 * @since  1.2.0
		 *
		 * @return bool
		 */
		function is_unlimited() {
			return is_null( $this->quota );
		}

		/**
		 * Check if license is fully utilized.
		 *
		 * @author
		 * @since  1.0.6
		 *
		 * @param bool $is_localhost
		 *
		 * @return bool
		 */
		function is_utilized( $is_localhost = null ) {
			if ( is_null( $is_localhost ) ) {
				$is_localhost = WP_FS__IS_LOCALHOST_FOR_SERVER;
			}

			if ( $this->is_unlimited() ) {
				return false;
			}

			return ! ( $this->is_free_localhost && $is_localhost ) &&
			       ( $this->quota <= $this->activated + ( $this->is_free_localhost ? 0 : $this->activated_local ) );
		}

		/**
		 * @author
		 * @since  1.2.1
		 *
		 * @return bool
		 */
		function is_active() {
			return ( ! $this->is_cancelled );
		}

		/**
		 * Check if license's plan features are enabled.
		 *
		 *  - Either if plan not expired
		 *  - If expired, based on the configuration to block features or not.
		 *
		 * @author
		 * @since  1.0.6
		 *
		 * @return bool
		 */
		function is_features_enabled() {
			return $this->is_active() && ( ! $this->is_block_features || ! $this->is_expired() );
		}

		/**
		 * Subscription considered to be new without any payments
		 * if the license expires in less than 24 hours
		 * from the license creation.
		 *
		 * @author
		 * @since  1.0.9
		 *
		 * @return bool
		 */
		function is_first_payment_pending() {
			return ( WP_FS__TIME_24_HOURS_IN_SEC >= strtotime( $this->expiration ) - strtotime( $this->created ) );
		}
	}
