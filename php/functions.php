<?php
require_once 'C:\Users\User\vendor\autoload.php';
function format_email($info, $format)
{
    $root = 'D:\file hoc hanh\XAMPP\htdocs\project';
    //grab the template content
    $template = file_get_contents($root. '\html\signup_template.' . $format);
    //replace all the tags
    $template = preg_replace('{USERNAME}', $info['username'], $template);
    $template = preg_replace('{EMAIL}', $info['email'], $template);
    $template = preg_replace('{KEY}', $info['key'], $template);
    $template = preg_replace('{SITEPATH}', 'localhost/project/php', $template);

    //return the html of the template
    return $template;

}

function send_email_swift($info)
{
//format each email
    $body = format_email($info, 'html');
    $body_plain_txt = format_email($info, 'txt');

//setup the mailer
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        ->setUsername('duonganhkhoa95@gmail.com')
        ->setPassword('KhoaUQ95');
    $mailer = Swift_Mailer::newInstance($transport);
    $message = Swift_Message::newInstance();
    $message->setSubject('Welcome to TravelNow');
    $message->setFrom(array('duonganhkhoa95@gmail.com' => 'TravelNow'));
    $message->setTo(array($info['email'] => $info['username']));
    $message->setBody($body_plain_txt);
    $message->addPart($body, 'text/html');
    $result = $mailer->send($message);
    return $result;
}
