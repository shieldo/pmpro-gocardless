<?php
/**
  * Plugin Name: Paid Memberships Pro - GoCardless Pro plugin
  * Plugin URI: https://github.com/shieldo/pmpro-gocardless
  * Description: Add GoCardless Pro as a payment option at checkout for memberships, to support Direct Debit payments.
  * Version: 0.1
  * Author: Douglas Greenshields
  **/

function pmpro_gocardless_register_styles()
{
    wp_register_style( 'pmpro-gocardless-styles', plugins_url( 'css/pmpro-gocardless.css', __FILE__ ) );
    wp_enqueue_style( 'pmpro-gocardless-styles' );
}
add_action('wp_enqueue_scripts', 'pmpro_gocardless_register_styles');

/**
 * Set up GoCardless Pro as a valid gateway.
 */
function pmproappe_add_gocardless_as_gateway(array $gateways)
{
    array_push($gateways, 'gocardless');

    return $gateways;
}
add_filter('pmpro_valid_gateways', 'pmproappe_add_gocardless_as_gateway');

/**
 * Add form to checkout.
 */
function pmproappe_add_gocardless_to_checkout()
{
    /**
     * Flag for whether a billing address is required.
     *
     * @var bool $pmpro_requirebilling
     */
    global $pmpro_requirebilling;

    /**
     * @var string $gateway
     */
    global $gateway;

    /**
     * @var bool Flag for whether this is an order review step.
     */
    global $pmpro_review;

    if (empty($pmpro_review)) {
        //do appropriate stuff if in review
        return;
    }

    //render gocardless form etc etc
}
