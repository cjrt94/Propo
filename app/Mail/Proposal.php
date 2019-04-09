<?php

namespace Propo\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Proposal;

class Proposal extends Mailable
{
    use Queueable, SerializesModels;
    private $propo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Proposal $propo)
    {
        $this->propo= $propo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.propo');
    }
}
