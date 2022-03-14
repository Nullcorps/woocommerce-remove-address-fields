<?php defined('ABSPATH') or die("No script kiddies please!"); /**
 * Plugin Name: WooCommerce remove address & billing fields
 * Author URI: https://github.com/Nullcorps
 * Description: Remove all the address and billing fields which are not needed for an adult site or site selling only online content. Only a name and email remain. Comment/delete any fields you want to keep
 * Version: 0.001
 * Author: NullCorps
 * Author URI:
 * Text Domain:
 * Domain Path:
 * Network:
 * License:
 */



// any fields you want to keep, comment out with // at the start of the line like this one
// if you want to make the field required, then also comment ou tthe matching "required" line for that field.


// Remove billing fields, rename name field and set email field class to wide
add_filter( 'woocommerce_billing_fields', 'remove_billing_fields', 20, 1 );
function remove_billing_fields($fields) {
   $fields ['billing_last_name']['required'] = false;  // these lines make the fields not required
   $fields ['billing_first_name']['label'] = "Name"; // this renames the "first name" field
   $fields ['billing_phone']['required'] = false; 
   $fields ['billing_company']['required'] = false; 
   $fields ['billing_address_1']['required'] = false; 
   $fields ['billing_address_2']['required'] = false;
   $fields ['billing_city']['required'] = false; 
   $fields ['billing_postcode']['required'] = false; 
   $fields ['billing_state']['required'] = false; 
   $fields ['billing_country']['required'] = false; 
   $fields ['order_comments']['required'] = false; 
   
   unset( $fields ['billing_last_name'] ); // These lines remove each of the fields
   unset( $fields ['billing_phone'] ); 
   unset( $fields ['billing_company'] ); 
   unset( $fields ['billing_address_1'] ); 
   unset( $fields ['billing_address_2'] ); 
   unset( $fields ['billing_city'] ); 
   unset( $fields ['billing_postcode'] ); 
   unset( $fields ['billing_state'] ); 
   unset( $fields ['order_comments'] ); 
   
   $fields ['billing_email']['class'] = array('form-row-wide'); // Make the field wide

   
   return $fields;
}


// Remove shipping fields
add_filter( 'woocommerce_shipping_fields', 'remove_shipping_fields', 20, 1 );
function remove_shipping_fields($fields) {
   $fields ['shipping_last_name']['required'] = false; // these lines make the fields not required
   $fields ['shipping_phone']['required'] = false; 
   $fields ['shipping_company']['required'] = false; 
   $fields ['shipping_address_1']['required'] = false; 
   $fields ['shipping_address_2']['required'] = false; 
   $fields ['shipping_city']['required'] = false; 
   $fields ['shipping_postcode']['required'] = false; 
   $fields ['shipping_state']['required'] = false; 
   $fields ['shipping_country']['required'] = false; 
   
   unset( $fields ['shipping_phone'] ); // These lines remove each of the fields
   unset( $fields ['shipping_company'] ); 
   unset( $fields ['shipping_address_1'] ); 
   unset( $fields ['shipping_address_2'] ); 
   unset( $fields ['shipping_city'] ); 
   unset( $fields ['shipping_postcode'] ); 
   unset( $fields ['billing_state'] ); 
   
   return $fields;
}



//add_filter( 'woocommerce_checkout_fields', 'remove_additional_billing_fields', 20, 1 );
function remove_additional_billing_fields($fields) {
   //$fields ['order_comments']['required'] = false; // To be sure "NOT required"
   unset( $fields['order']['order_comments']);
   return $fields;
}


