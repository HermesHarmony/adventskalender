<?php 

require_once 'vendor/autoload.php';
$form = new Formr\Formr('bulma');

// make form global

function sendConfirmationEmail($stuff, $data) {
    global $form;

    $to = $stuff['email'];
    $subject = $data['mail_confirmation_subject'];
    $message = str_replace('{{name}}', $stuff['name'], $data['mail_confirmation_message']);

    $form->send_email($to, $subject, $message);
}

function sendNotificationEmail($stuff, $data) {
    global $form;

    $to = $data['contact_email'];
    $subject = 'Contact Form Submission';
    $message = '
        <p>Name: '.$stuff['name'].'</p>
        <p>Email: '.$stuff['email'].'</p>
        <p>Comments: '.$stuff['comments'].'</p>
    ';

    $form->send_email($to, $subject, $message);
}

// make all fields required
$form->required = '*';

// check if the form has been submitted
if ($form->submitted()) {
    // get our form values and assign them to a variable
    $stuff = $form->validate('Name, Email, Comments');

    if($form->ok()) {
        // send emails
        sendConfirmationEmail($stuff, $data);
        sendNotificationEmail($stuff, $data);

        // show a success message if no errors
        $form->success_message = str_replace('{{name}}', $stuff['name'], $data['form_success_message']);
    }
}