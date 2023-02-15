<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use SendGrid\Mail\Mail;

class SendGrid
{
    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function send_email($to, $subject, $body)
    {
        $email = new Mail();
        $email->setFrom("paulvel2001@gmail.com", "Trytodo");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $body);

        $sendgrid = new \SendGrid('trytodo');
        try {
            $response = $sendgrid->send($email);
            return true;
        } catch (Exception $e) {
            show_error($e->getMessage());
            return false;
        }
    }
}
