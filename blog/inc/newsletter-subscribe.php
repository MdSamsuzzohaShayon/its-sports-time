<?php
/**
 * Handle Form Submission and Validation
 */
function itssportstime_newsletter_subscribe() {
    // Verify nonce for security
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'newsletter_subscribe')) {
        wp_die('Security check failed');
    }

    // Check if the email field is set and not empty
    if (isset($_POST['newsletter_email']) && !empty($_POST['newsletter_email'])) {
        $email = sanitize_email($_POST['newsletter_email']);

        if (is_email($email)) {
            // Add the email to the database
            global $wpdb;
            $table_name = $wpdb->prefix . 'newsletter_subscribers';
            $wpdb->insert(
                $table_name,
                array(
                    'email' => $email,
                    'date_subscribed' => current_time('mysql')
                )
            );

            // Redirect to a thank you page or display a success message
            wp_redirect(add_query_arg('subscribed', 'true', wp_get_referer()));
            exit;
        } else {
            // Invalid email address
            wp_redirect(add_query_arg('subscribed', 'invalid', wp_get_referer()));
            exit;
        }
    } else {
        // Email field is empty
        wp_redirect(add_query_arg('subscribed', 'empty', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_nopriv_newsletter_subscribe', 'itssportstime_newsletter_subscribe');
add_action('admin_post_newsletter_subscribe', 'itssportstime_newsletter_subscribe');

/**
 * Store Subscriber Information
 */
function itssportstime_create_newsletter_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter_subscribers';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        date_subscribed datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'itssportstime_create_newsletter_table');
itssportstime_create_newsletter_table();
