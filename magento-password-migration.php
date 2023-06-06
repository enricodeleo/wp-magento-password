<?php
/**
  * Plugin Name: Magento Password Migration
  * Version: 1.0.0
  * Description: This plugin allows WordPress to authenticate users with password hashes imported from a Magento 2 database, enabling seamless integration between the two platforms.
  * Author: AdminColumns.com
  * Author URI: https://enricodeleo.com
  * Requires PHP: 7.2
  * Requires at least: 5.5
  */

add_filter('wp_authenticate_user', function($user, $password) {
    // If the password is correct according to WordPress, no need to do anything.
    if (wp_check_password($password, $user->user_pass, $user->ID)) {
      return $user;
    }

    // Verify the password with Magento's algorithm.
    if (check_password_magento($user, $password)) {
      error_log('Password is correct, but needs to be updated.');
      // If the password is correct, rehash it with WordPress's algorithm and save it.
      wp_set_password($password, $user->ID);

      // Now that the password has been updated, return the user.
      return $user;
    }

    // If the password isn't correct, reject the login.
    return new WP_Error(
      'incorrect_password',
      sprintf(
        __('The password you entered for the username <strong>%1$s</strong> is incorrect.', 'woocommerce'),
        $user->user_login
      )
    );
}, 10, 2);

function check_password_magento($user, $password) {
    // If the user doesn't exist, return false
    if (!$user) return false;

    // Get the hashed password
    $hash = $user->user_pass;

    // Verify the password
    return magento_verify_password($password, $hash);
}

function magento_verify_password($password, $hash) {
    // Explode the hash into its components
    list($hash, $salt, $version) = explode(':', $hash, 3);

    if (strlen($salt) < SODIUM_CRYPTO_PWHASH_SALTBYTES) {
        $salt = str_pad($salt, SODIUM_CRYPTO_PWHASH_SALTBYTES, $salt);
    } elseif (strlen($salt) > SODIUM_CRYPTO_PWHASH_SALTBYTES) {
        $salt = substr($salt, 0, SODIUM_CRYPTO_PWHASH_SALTBYTES);
    }


    // Generate the hash of the password using the same method as Magento
    $passwordHash = bin2hex(
        sodium_crypto_pwhash(
            SODIUM_CRYPTO_SIGN_SEEDBYTES,
            $password,
            $salt,
            SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
            SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE,
            SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13
        )
    );

    // Compare the generated hash with the stored hash
    return hash_equals($hash, $passwordHash);
}

