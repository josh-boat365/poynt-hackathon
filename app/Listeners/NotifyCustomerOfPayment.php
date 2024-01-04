<?php

namespace App\Listeners;

use App\Events\PaymentConfirmed;
use App\Mail\OrderConfirmedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyCustomerOfPayment
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentConfirmed $event): void
    {
        // send customer confirmation email
        // since we don't have a customer, we can send this to a fake email
        Mail::to('fake@email.com')->send(new OrderConfirmedMail($event->order));
    }
}
