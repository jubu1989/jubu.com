<?php

/**
 * PA Helper Functions.
 */
namespace PremiumAddons\Includes;

//Premium Addons Pro Classes
use PremiumAddonsPro\Includes\White_Label\Helper;

//Elementor Classes
use Elementor\Core\Settings\Manager as SettingsManager;

if( ! defined('ABSPATH') ) exit;

/**
 * Class Helper_Functions.
 */
class Helper_Functions {
    
    /**
	 * Google maps prefixes
	 *
	 * @var google_localize
	 */
    private static $google_localize = null;
    
    /**
	 * script debug enabled
	 *
	 * @var script_debug
	 */
	private static $script_debug = null;
    
    /**
	 * JS scripts directory
	 *
	 * @var js_dir
	 */
	private static $js_dir = null;
    
    /**
	 * CSS fiels directory
	 *
	 * @var js_dir
	 */
	private static $css_dir = null;

	/**
	 * JS Suffix
	 *
	 * @var js_suffix
	 */
	private static $assets_suffix = null;
    
    /**
     * Check if white labeling - hide rating message is checked
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return boolean
     */
    public static function is_hide_rate() {
        
        if( self::check_papro_version() ) {

            $white_label = Helper::get_white_labeling_settings(); 

            $hide_meta = $white_label['premium-wht-lbl-name'];

            if( isset(get_option('pa_wht_lbl_save_settings')['premium-wht-lbl-rate'] ) ) {
                $hide_rate = get_option('pa_wht_lbl_save_settings')['premium-wht-lbl-rate'];
            }
        }
        
        return isset( $hide_rate ) ? $hide_rate : false;
    }
    
    /**
     * Check if white labeling - Free version author field is set
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return string
     */
    public static function author() {
        
        $author_free = 'Leap13';
        
        if( self::check_papro_version() ) {

            $white_label = Helper::get_white_labeling_settings(); 

            $author_free = $white_label['premium-wht-lbl-name'];

        }
        
        return '' != $author_free ? $author_free : 'Leap13';
    }
    
    /**
     * Check if white labeling - Free version name field is set
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return string
     */
    public static function name() {

        $name_free = 'Premium Addons for Elementor';
        
        if( self::check_papro_version() ) {
            
            $white_label = Helper::get_white_labeling_settings(); 

            $name_free = $white_label['premium-wht-lbl-plugin-name'];

        }
        
        return '' != $name_free ? $name_free : 'Premium Addons for Elementor';
    }
    
    /**
     * Check if white labeling - Hide row meta option is checked
     * 
     * @since 1.0.0
     * @return string
     * 
     */
    public static function is_hide_row_meta() {
        
        if( self::check_papro_version() ) {

            $white_label = Helper::get_white_labeling_settings(); 

            $hide_meta = $white_label['premium-wht-lbl-row'];
            
        }
        
        return isset( $hide_meta ) ? $hide_meta : false;
    }

    /**
     * Check if white labeling - Hide plugin logo option is checked
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return string
     */
    public static function is_hide_logo() {
        
        if( self::check_papro_version() ) {

            if( isset( get_option('pa_wht_lbl_save_settings')['premium-wht-lbl-logo'] ) ) {

                $hide_logo = get_option('pa_wht_lbl_save_settings')['premium-wht-lbl-logo'];
                
            }
            
        }
        
        return isset( $hide_logo ) ? $hide_logo : false;
    }
    
    /**
     * Get White Labeling - Widgets Category string
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return string
     */
    public static function get_category() {
        
        $category = __( 'Premium Addons', 'premium-addons-for-elementor' );

        if( self::check_papro_version() ) {

            $white_label = Helper::get_white_labeling_settings();

            $category = $white_label['premium-wht-lbl-short-name'];
            
        }
        
        return '' != $category ? $category : __('Premium Addons', 'premium-addons-for-elementor');
        
    }
    
    /**
     * Get White Labeling - Widgets Prefix string
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return string
     */
    public static function get_prefix() {

        $prefix = __( 'Premium', 'premium-addons-for-elementor' );
        
        if( self::check_papro_version() ) {

            $white_label = Helper::get_white_labeling_settings();

            $prefix = $white_label['premium-wht-lbl-prefix'];

        }
        
        return '' != $prefix ? $prefix : __('Premium', 'premium-addons-for-elementor');
    }
    
    /**
     * Get White Labeling - Widgets Badge string
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return string
     */
    public static function get_badge() {

        $badge = 'PA';
        
        if( self::check_papro_version() ) {

            $white_label = Helper::get_white_labeling_settings();

            $badge = $white_label['premium-wht-lbl-badge'];
            
        }
        
        return '' != $badge ? $badge : 'PA';
    }
    
    /**
     * Get Google Maps localization prefixes
     * 
     * @since 1.0.0
     * @access public
     * 
     * @return array
     */
    public static function get_google_maps_prefixes() {
        
        if ( null === self::$google_localize ) {

			self::$google_localize = array(
                'ar' => __( 'Arabic', 'premium-addons-for-elementor'),
                'eu' => __( 'Basque', 'premium-addons-for-elementor'),
                'bg' => __( 'Bulgarian', 'premium-addons-for-elementor'),
                'bn' => __( 'Bengali', 'premium-addons-for-elementor'),
                'ca' => __( 'Catalan', 'premium-addons-for-elementor'),
                'cs' => __( 'Czech', 'premium-addons-for-elementor'),
                'da' => __( 'Danish', 'premium-addons-for-elementor'),
                'de' => __( 'German', 'premium-addons-for-elementor'),
                'el' => __( 'Greek', 'premium-addons-for-elementor'),
                'en' => __( 'English', 'premium-addons-for-elementor'),
                'en-AU' => __( 'English (australian)', 'premium-addons-for-elementor'),
                'en-GB' => __( 'English (great britain)', 'premium-addons-for-elementor'),
                'es' => __( 'Spanish', 'premium-addons-for-elementor'),
                'fa' => __( 'Farsi', 'premium-addons-for-elementor'),
                'fi' => __( 'Finnish', 'premium-addons-for-elementor'),
                'fil' => __( 'Filipino', 'premium-addons-for-elementor'),
                'fr' => __( 'French', 'premium-addons-for-elementor'),
                'gl' => __( 'Galician', 'premium-addons-for-elementor'),
                'gu' => __( 'Gujarati', 'premium-addons-for-elementor'),
                'hi' => __( 'Hindi', 'premium-addons-for-elementor'),
                'hr' => __( 'Croatian', 'premium-addons-for-elementor'),
                'hu' => __( 'Hungarian', 'premium-addons-for-elementor'),
                'id' => __( 'Indonesian', 'premium-addons-for-elementor'),
                'it' => __( 'Italian', 'premium-addons-for-elementor'),
                'iw' => __( 'Hebrew', 'premium-addons-for-elementor'),
                'ja' => __( 'Japanese', 'premium-addons-for-elementor'),
                'kn' => __( 'Kannada', 'premium-addons-for-elementor'),
                'ko' => __( 'Korean', 'premium-addons-for-elementor'),
                'lt' => __( 'Lithuanian', 'premium-addons-for-elementor'),
                'lv' => __( 'Latvian', 'premium-addons-for-elementor'),
                'ml' => __( 'Malayalam', 'premium-addons-for-elementor'),
                'mr' => __( 'Marathi', 'premium-addons-for-elementor'),
                'nl' => __( 'Dutch', 'premium-addons-for-elementor'),
                'no' => __( 'Norwegian', 'premium-addons-for-elementor'),
                'pl' => __( 'Polish', 'premium-addons-for-elementor'),
                'pt' => __( 'Portuguese', 'premium-addons-for-elementor'),
                'pt-BR' => __( 'Portuguese (brazil)', 'premium-addons-for-elementor'),
                'pt-PT' => __( 'Portuguese (portugal)', 'premium-addons-for-elementor'),
                'ro' => __( 'Romanian', 'premium-addons-for-elementor'),
                'ru' => __( 'Russian', 'premium-addons-for-elementor'),
                'sk' => __( 'Slovak', 'premium-addons-for-elementor'),
                'sl' => __( 'Slovenian', 'premium-addons-for-elementor'),
                'sr' => __( 'Serbian', 'premium-addons-for-elementor'),
                'sv' => __( 'Swedish', 'premium-addons-for-elementor'),
                'tl' => __( 'Tagalog', 'premium-addons-for-elementor'),
                'ta' => __( 'Tamil', 'premium-addons-for-elementor'),
                'te' => __( 'Telugu', 'premium-addons-for-elementor'),
                'th' => __( 'Thai', 'premium-addons-for-elementor'),
                'tr' => __( 'Turkish', 'premium-addons-for-elementor'),
                'uk' => __( 'Ukrainian', 'premium-addons-for-elementor'),
                'vi' => __( 'Vietnamese', 'premium-addons-for-elementor'),
                'zh-CN' => __( 'Chinese (simplified)', 'premium-addons-for-elementor'),
                'zh-TW' => __( 'Chinese (traditional)', 'premium-addons-for-elementor'),
			);
		}

		return self::$google_localize;
        
    }
    
    /**
     * Checks if a plugin is installed
     * 
     * @since 1.0.0
     * @access public
     * 
     * @param $plugin_path string plugin path
     * 
     * @return boolean
     */
    public static function is_plugin_installed( $plugin_path ) {
        
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        
        $plugins = get_plugins();
        
        return isset( $plugins[ $plugin_path ] );
    }
    
    /**
	 * Check if script debug mode enabled.
	 *
	 * @since 3.11.1
     * @access public
	 *
	 * @return boolean is debug mode enabled
	 */
	public static function is_debug_enabled() {

		if ( null === self::$script_debug ) {

			self::$script_debug = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
		}

		return self::$script_debug;
	}
    
    /**
	 * Get scripts dir.
	 *
	 * @access public
	 *
	 * @return string JS scripts directory.
	 */
	public static function get_scripts_dir() {

		if ( null === self::$js_dir ) {

			self::$js_dir = self::is_debug_enabled() ? 'js' : 'min-js';
		}

		return self::$js_dir;
	}
    
    /**
	 * Get styles dir.
	 *
	 * @access public
	 *
	 * @return string CSS files directory.
	 */
	public static function get_styles_dir() {

		if ( null === self::$css_dir ) {

			self::$css_dir = self::is_debug_enabled() ? 'css' : 'min-css';
		}

		return self::$css_dir;
	}

	/**
	 * Get assets suffix.
	 *
	 * @access public
	 *
	 * @return string JS scripts suffix.
	 */
	public static function get_assets_suffix() {

		if ( null === self::$assets_suffix ) {

			self::$assets_suffix = self::is_debug_enabled() ? '' : '.min';
		}

		return self::$assets_suffix;
	}
    
    /**
     * Get Installed Theme
     * 
     * Returns the active theme slug
     * 
     * @access public
     * 
     * @return string theme slug
     */
    public static function get_installed_theme() {

        $theme = wp_get_theme();

        if( $theme->parent() ) {

            $theme_name = $theme->parent()->get('Name');

        } else {

            $theme_name = $theme->get('Name');

        }

        $theme_name = sanitize_key( $theme_name );
        
        return $theme_name;
    }
    
    /*
     * Get Vimeo Video Data
     * 
     * Get video data using Vimeo API
     * 
     * @since 3.11.4
     * @access public
     * 
     * @param string $id video ID
     */
    public static function get_vimeo_video_data( $id ) {
        
        $vimeo_data         = wp_remote_get( 'http://www.vimeo.com/api/v2/video/' . intval( $id ) . '.php' );
        
        if ( isset( $vimeo_data['response']['code'] ) ) {

            if( '200' == $vimeo_data['response']['code'] ) {

                $response       = unserialize( $vimeo_data['body'] );
                $thumbnail = isset( $response[0]['thumbnail_large'] ) ? $response[0]['thumbnail_large'] : false;
                
                $data = [
                    'src'       => $thumbnail,
                    'url'       => $response[0]['user_url'],
                    'portrait'  => $response[0]['user_portrait_huge'],
                    'title'     => $response[0]['title'],
                    'user'      => $response[0]['user_name']
                ];
            
                return $data;

            }
            
        }
        
        return false;
        
    }
    
    /*
     * Get Video Thumbnail
     * 
     * Get thumbnail URL for embed or self hosted
     * 
     * @since 3.7.0
     * @access public
     * 
     * @param string $id video ID
     * @param string $type embed type
     * @param string $size youtube thumbnail size
     */
    public static function get_video_thumbnail( $id, $type, $size = '' ) {
        
        $thumbnail_src = '';
        
        if ( 'youtube' === $type ) {
            if ( '' === $size ) {
                $size = 'maxresdefault';
            }
            $thumbnail_src = sprintf( 'https://i.ytimg.com/vi/%s/%s.jpg', $id, $size );

        } elseif ( 'vimeo' === $type ) {

            $vimeo = self::get_vimeo_video_data( $id );
            
            // if( isset( $vimeo['src'] ) ) {
                $thumbnail_src = $vimeo['src'];
            // }
            
        } else {
            $thumbnail_src = 'transparent';
        }
        
        return $thumbnail_src;
    }

    /**
     * Transient Expire
     * 
     * Gets expire time of transient.
     *
     * @since 3.20.8
     * @access public
     * 
     * @param string $period reviews transient expiration period.
     * 
     * @return the reviews transient expire time in seconds.
    */
    public static function transient_expire( $period ) {

        $expire_time  = 24 * HOUR_IN_SECONDS;

        if ( 'hour' === $period ) {
            $expire_time = MINUTE_IN_SECONDS;
        } elseif ( 'hour' === $period ) {
            $expire_time = 60 * MINUTE_IN_SECONDS;
        } elseif ( 'week' === $period ) {
            $expire_time = 7 * DAY_IN_SECONDS;
        } elseif ( 'month' === $period ) {
            $expire_time = 30 * DAY_IN_SECONDS;
        } elseif ( 'year' === $period ) {
            $expire_time = 365 * DAY_IN_SECONDS;
        }

        return $expire_time;
    }

    /**
     * Get Campaign Link
     * 
     * @since 3.20.9
     * @access public
     *
     * @param string $link page link
     * @param string $source campaign source
     * @param string $medium campaign media
     * @param string $campaign
     * 
     * @return string $link campaign URL
     */
    public static function get_campaign_link( $link, $source, $medium, $campaign = '' ) {

        $theme = self::get_installed_theme();

        $url = add_query_arg( array(
            'utm_source'    => $source,
            'utm_medium'    => $medium,
            'utm_campaign'  => $campaign,
            'utm_term'      => $theme
        ), $link );

        return $url;

    }

    /** 
     * Get Elementor UI Theme
     * 
     * Detects user setting for UI theme
     * 
     * @since 3.21.1
     * @access public
     * 
     * @return string $theme UI Theme
     */
    public static function get_elementor_ui_theme() {

        $theme = SettingsManager::get_settings_managers( 'editorPreferences' )->get_model()->get_settings( 'ui_theme' );

        return $theme;

    }

    /**
     * Check PAPRO Version
     * 
     * Check if PAPRO version is updated
     * 
     * @since 3.21.6
     * @access public
     * 
     * @return boolen $is_updated
     */
    public static function check_papro_version() {

        if( ! defined ( 'PREMIUM_PRO_ADDONS_VERSION' ) ) {
            return false;
        }

        $is_updated = get_option( 'papro_updated', true );

        return $is_updated;

    }
}