<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
 
class RemainderEmail extends Mailable
{
    use Queueable, SerializesModels;
 
    public $body;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emailTemplates.remainderEmail')
        ->with('body', $this->body)
        ->subject('Friendly Reminder');
    }
}