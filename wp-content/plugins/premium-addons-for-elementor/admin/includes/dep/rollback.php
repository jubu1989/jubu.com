<?php

/**
 * PA Rollback
 */
namespace PremiumAddons\Admin\Includes;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Admin_Helper
 */
class PA_Rollback {
	
	/**
	 * Plugin URL
	 *
	 * @var package_url
	 */
	protected $package_url;
	
	/**
	 * Plugin Version
	 *
	 * @var version
	 */
	protected $version;

	/**
	 * Plugin Name
	 *
	 * @var plugin_name
	 */
	protected $plugin_name;

    /**
	 * Plugin Slug
	 *
	 * @var plugin_slug
	 */
	protected $plugin_slug;
    
	public function __construct( $args = [] ) {
		foreach ( $args as $key => $value ) {
			$this->{$key} = $value;
		}
	}

	private function print_inline_style() {
        ?>

		<style>
			.wrap {
				overflow: hidden;
			}

			h1 {
				background: #6ec1e4;
				text-align: center;
				color: #fff !important;
				padding: 70px !important;
				text-transform: uppercase;
				letter-spacing: 1px;
			}
			h1 img {
				max-width: 300px;
				display: block;
				margin: auto auto 50px;
			}
		</style>
        
		<?php
	}

	protected function apply_package() {
        
		$update_plugins = get_site_transient( 'update_plugins' );
        
		if ( ! is_object( $update_plugins ) ) {
            
			$update_plugins = new \stdClass();
		}

		$plugin_info = new \stdClass();
        
		$plugin_info->new_version = $this->version;
        
		$plugin_info->slug = $this->plugin_slug;
        
		$plugin_info->package = $this->package_url;
        
		$plugin_info->url = 'https://premiumaddons.com/';
        
		$update_plugins->response[ $this->plugin_name ] = $plugin_info;

		set_site_transient( 'update_plugins', $update_plugins );
        
	}

	protected function upgrade() {
        
		require_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );

		$logo_url = PREMIUM_ADDONS_URL . 'admin/images/premium-addons-logo.png';

		$upgrader_args = [
			'url' => 'update.php?action=upgrade-plugin&plugin=' . rawurlencode( $this->plugin_name ),
			'plugin' => $this->plugin_name,
			'nonce' => 'upgrade-plugin_' . $this->plugin_name,
			'title' => '<img src="' . $logo_url . '" alt="Premium Addons">' . __( 'Rolling Back to Version ' . $this->version, 'premium-addons-for-elementor' ),
		];

		$this->print_inline_style();

		$upgrader = new \Plugin_Upgrader( new \Plugin_Upgrader_Skin( $upgrader_args ) );
        
		$upgrader->upgrade( $this->plugin_name );
        
	}

	public function run() {
        
		$this->apply_package();
        
		$this->upgrade();
        
	}
}
