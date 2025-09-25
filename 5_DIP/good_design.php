<?php
/*
 * To solve DSP issues in bad design, we introduce an abstraction: a MessageSender interface.
 * Now, NotificationService depends on the interface (abstraction), not the concrete classes.
 * Concrete senders implement the interface.
 *
 * This way, we can easily add new senders (e.g., PushSender) without changing
 * NotificationService.
 */


// interface for abstraction
interface MessageSender
{
    public function send(string $message) : void;
}


// email sender implements interface
class EmailSender implements MessageSender
{
    public function send(string $message): void
    {
        echo 'Sending email: ' . $message . PHP_EOL;
    }
}


// sms sender implements interface
class SMSSender implements MessageSender
{
    public function send(string $message): void
    {
        echo 'Sending sms: ' . $message . PHP_EOL;

    }
}

// Easy to add more senders without changing NotificationService
class PushSender implements MessageSender
{
    public function send(string $message): void
    {
        echo 'Sending push: ' . $message . PHP_EOL;

    }
}


// call all available senders and send message
class NotificationService
{
    private array $senders;

    // Constructor injection: Pass dependencies from outside
    public function __construct( MessageSender ...$senders)
    {
        $this->senders = $senders;
    }

    public function notify(string $message){
        foreach ($this->senders as $sender){
            $sender->send($message);
        }
    }

}


// Usages
try {
    $emailsender = new EmailSender();
    $smssender = new SMSSender();
    $pushsender = new PushSender();

    $notifications = new NotificationService($emailsender, $smssender, $pushsender);
    $notifications->notify(message: 'Hello!');
    
} catch (\Throwable $th) {

    print $th->getMessage();
}



/*
Output::

    Sending email: Hello!
    Sending sms: Hello!
    Sending push: Hello!
*/

