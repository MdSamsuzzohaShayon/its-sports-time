<?php
/**
 * Contact form submission
 */

function handle_contact_form() {
    // Check nonce for security
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_redirect(home_url('/contact/?error=invalid_nonce'));
        exit;
    }

    // Get form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // Validate email
    if (!is_email($email)) {
        wp_redirect(home_url('/contact/?error=invalid_email'));
        exit;
    }

    // Set up email details
    $to = get_option('admin_email'); // Send to admin email
    $subject = 'Contact Form Submission from ' . $name;
    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');
    $body = 'Name: ' . $name . '<br>Email: ' . $email . '<br>Message:<br>' . nl2br($message);

    // Send email
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_redirect(home_url('/contact/?success=1'));
    } else {
        wp_redirect(home_url('/contact/?error=mail_failed'));
    }
    exit;
}
add_action('admin_post_contact_form', 'handle_contact_form');
add_action('admin_post_nopriv_contact_form', 'handle_contact_form');




?>
