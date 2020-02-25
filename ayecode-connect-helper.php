<?php

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

if(!class_exists("AyeCode_Connect_Helper")){
	/**
	 * Class AyeCode_Connect_Helper
	 */
	class AyeCode_Connect_Helper {

		public static function init(){
//			echo '###';exit;
			// Show AyeCode Connect Notice
			//if ( !defined( 'AYECODE_CONNECT_VERSION' ) ) {
			add_action( 'admin_notices', array( __CLASS__, 'ayecode_connect_install' ) );
			//}
		}

		/**
		 * Show notice on extensions page to connect site.
		 */
		public static function ayecode_connect_install(){
			if(self::maybe_show()){
				?>
				<div class="notice notice-info is-dismissible">
					<p>
						<?php
						_e( "<strong>xHave a license?</strong> Forget about entering license keys or downloading zip files, connect your site for instant access.", 'geodirectory' );
						?>
						<button id="gd-connect-site" class="button button-primary" data-connecting="<?php esc_attr_e("Connecting...","geodirectory");?>" ><?php _e("Connect Site","geodirectory");?></button>
					</p>
				</div>
				<?php
			}
		}

		/**
		 * Decide what pages to show on.
		 *
		 * @return bool
		 */
		public static function maybe_show(){
			$show = false;

			$pages = array(
				'gd-addons',
				'wpi-addons',
				'uwp-addons',
			);

			if(isset($_REQUEST['page']) && in_array($_REQUEST['page'],$pages)){
				$show = true;
			}

			return $show;
		}

	}

	// start the show
	AyeCode_Connect_Helper::init();
}
