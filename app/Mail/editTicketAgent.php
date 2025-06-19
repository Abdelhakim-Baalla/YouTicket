<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class editTicketAgent extends Mailable
{
    use Queueable, SerializesModels;

    public $agent;
    public $ticket;
    public $ticketUrl;
    public $modifiedBy;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agent, $modifiedBy,$ticket,$ticketUrl)
    {
        $this->agent = $agent;
        $this->ticket = $ticket;
        $this->ticketUrl = $ticketUrl;
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Modifications Sur Une Ticket - YouTicket',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.tickets.editPourAgent',
            with: [
                'agent' => $this->agent,
                'ticket' => $this->ticket,
                'ticketUrl' => $this->ticketUrl,
                'modifiedBy' => $this->modifiedBy,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
