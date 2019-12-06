<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlace extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->order->billing_email, $this->order->billing_name)
            ->bcc('another@another.com')
            ->subject('Order for laravel ecommerce example')
            ->view('emails.orders.placed')
            ->with('name', $this->order->billing_name)
            ->with('email', $this->order->billing_email)
            ->with('total', $this->order->billing_total);
    }
}
