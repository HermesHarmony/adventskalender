<?php 

require_once 'vendor/autoload.php';
$form = new Formr\Formr('bulma');

// make form global

function sendConfirmationEmail($stuff, $data, $form) {

    $to = isset($stuff['email']) ? $stuff['email'] : $data['e-mail'];
    $subject = $data['mail_confirmation_subject'];
    $message = str_replace('{{name}}', $stuff['name'], $data['mail_confirmation_message']);

    $form->send_email($to, $subject, $message, $data['contact_email'], true);
}

function sendNotificationEmail($stuff, $data, $form) {

    $to = $data['contact_email'];
    $subject = 'Contact Form Submission';
    $message = '
        <p>Name: '.$stuff['name'].'</p>
        <p>Email: '.isset($stuff['email']) ? $stuff['email'] : $data['e-mail'].'</p>
        <p>Comments: '.$stuff['nachricht'].'</p>
        <p>Day: '.$data['day'].'</p>
    ';

    $form->send_email($to, $subject, $message, $data['contact_email'], true);
}

// make all fields required
$form->required = '*';

// check if the form has been submitted
if ($form->submitted()) {
    // get our form values and assign them to a variable
    $stuff = $form->validate('Name, E-Mail, Nachricht');

    if($form->ok()) {
        // send emails
        sendConfirmationEmail($stuff, $data, $form);
        sendNotificationEmail($stuff, $data, $form);

        // show a success message if no errors
        $form->success_message = str_replace('{{name}}', $stuff['name'], $data['form_success_message']);
        $form->redirect('/#success');
    } else {
        // show an error message if there are errors
        $form->error_message = $data['form_error_message'];
        $form->redirect('/error');
    }
}