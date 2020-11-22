<?php
/**
 * Template Library Modal Header
 */

use PremiumAddons\Includes\Helper_Functions;

?>
<span class="premium-template-modal-header-logo-icon">
    <img src="<?php echo PREMIUM_ADDONS_URL .'admin/images/premium-addons-logo.png'; ?>">
</span>
<span class="premium-template-modal-header-logo-label">
    <?php echo sprintf( '%1$s %2$s', Helper_Functions::get_prefix(), __('Templates', 'premium-addons-for-elementor') ); ?>
</span>

