<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class editTicketUtilisateur extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $ticket;
    public $ticketUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $ticket, $ticketUrl)
    {
        $this->user = $user;
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
            subject: 'Modification sur Votre Ticket',
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
            markdown: 'emails.tickets.editPourUtilisateur',
            with: [
                'user' => $this->user,
                'ticket' => $this->ticket,
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
