<?php
/**
 * Contact form submission
 */

function thesportsanctum_contact_form()
{
//    wp_send_json_success("It works");
//    $data = json_encode($_POST);
//    wp_send_json_success($data);

    $formdata = [];
    wp_parse_str($_POST['contact'], $formdata);

    // Admin email
    $admin_email = get_option('admin_email');
    // Email headers
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From:' . $admin_email;
    $headers[] = ' Reply-to:' . $formdata['email'];
    $headers[] = ' BCC:' . $formdata['email'];


    //Subject
//    $subject = 'Contact form ' . $formdata['name'];
    $subject = "A contact request from blog website from - " . $formdata['name'];

    //Message
    $message_data = $formdata['message'];
    $message = '';
    foreach($formdata as $index => $field){
        $message .= '<strong>'. $index .'</strong>' . $field . '</br>' ;
    }


//Here put your Validation and send mail
    try {
        $sent_message = wp_mail($admin_email, $subject, $message, $headers);
        if ($sent_message) {
            wp_send_json_success(array(
                "admin_email" => $admin_email,
                "headers" => $headers,
                "send_to" => $admin_email,
                "message" => $message,
                "sent" => $sent_message
            ));
        } else {
            wp_send_json_error(array(
                "admin_email" => $admin_email,
                "headers" => $headers,
                "send_to" => $admin_email,
                "message" => $message,
                "sent" => $sent_message
            ));
        }
    } catch (Exception $e) {
        wp_send_json_error($e->getMessage());
    }

}

add_action('wp_ajax_contact', 'thesportsanctum_contact_form');
add_action('wp_ajax_nopriv_contact', 'thesportsanctum_contact_form');
?>
