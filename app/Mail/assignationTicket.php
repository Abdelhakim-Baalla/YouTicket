<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class assignationTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $agent;
    public $ticket;
    public $ticketUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agent, $ticket, $ticketUrl)
    {
        $this->agent = $agent;
        $this->ticket = $ticket;
        $this->ticketUrl = $ticketUrl;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Nouveaux Assignation de Ticket - YouTicket',
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
            markdown: 'emails.tickets.assignation',
            with: [
                'ticket' => $this->ticket,
                'agent' => $this->agent,
                'ticketUrl' => $this->ticketUrl,
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
