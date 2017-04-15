<?php
require_once 'C:\Users\User\vendor\autoload.php';
function format_email($info, $format)
{

    //grab the template content
    $template = file_get_contents('D:\file hoc hanh\XAMPP\htdocs\project\signup_template.' . $format);

    //replace all the tags
    $template = preg_replace('{USERNAME}', $info['username'], $template);
    $template = preg_replace('{EMAIL}', $info['email'], $template);
    $template = preg_replace('{KEY}', $info['key'], $template);
    $template = preg_replace('{SITEPATH}', 'http://site-path.com', $template);

    //return the html of the template
    return $template;

}

function send_email($info)
{
    $body = format_email($info, 'html');
    $body_plain_txt = format_email($info, 'txt');
    $mail = new PHPMailer;
    $mail->SMTPDebug = 1;
    $mail->isSMTP();                                      // send via SMTP
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'duonganhkhoa95@gmail.com';         // SMTP username
    $mail->Password = 'KhoaUQ95';                         // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('duonganhkhoa95@gmail.com', 'TravelNow');
    $mail->addAddress($info['email'], $info['username']);     // Add a recipient
    $mail->AddReplyTo('duonganhkhoa95@gmail.com', 'TravelNow');
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Welcome to TravelNow';
    $mail->Body = $body;
    $mail->AltBody = $body_plain_txt;

    return $mail->send();
}

function show_errors($action)
{
    $error = false;
    if (!empty($action['result'])) {
        $error = "<ul class=\"alert $action[result]\">" . "\n";
        if (is_array($action['message'])) {
            //loop out each error
            foreach ($action['message'] as $message) {
                $error .= "<li><p>$message</p></li>" . "\n";
            }

        } else {
            //single error
            $error .= "<li><p>$action[message]</p></li>";

        }
        $error .= "</ul>" . "\n";
    }
    return $error;

}