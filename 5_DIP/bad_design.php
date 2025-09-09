<?php
/*
 * A NotificationService (high-level) that sends notifications via email or SMS.
 * and NotificationService directly depends on concrete classes (low-level) like
 * EmailSender and SMSSender.
 *
 * If we want to add a new sender (e.g., PushSender), we'd have to modify
 * NotificationService itself. High-level modules is depend on low-level modules,
 * violation of DIP.
 *
 */


// email sender to send email
class EmailSender
{
    public function send(string $message) : void
    {
        echo "Sending email: " . $message . PHP_EOL;
    }
}

// sms sender to send sms
class SMSSender
{
    public function send(string $message) : void
    {
        echo "Sending SMS: " . $message . PHP_EOL;
    }
}

// call senders and send message
class NotificationServices
{
        private EmailSender $emailsender;
        private SMSSender $smssender;

    
    public function __construct(){
        $this->emailsender = new EmailSender();
        $this->smssender = new SMSSender();
    }

    public function notify(string $message, string $type)
    {
        $type = strtolower($type);

        if($type === 'email'){
            $this->emailsender->send(message: $message);

        } elseif($type === 'sms'){
            $this->smssender->send(message: $message);

        }
    }
}

// Usages
$notification = new NotificationServices();
$notification->notify(type: 'email', message: 'Hello!'); // Sending email: Hello!

$notification->notify(type: 'sms', message: 'Hello!'); // Sending SMS: Hello!

