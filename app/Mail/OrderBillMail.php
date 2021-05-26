<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;

class OrderBillMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $orderdetail=[];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,$orderdetail)
    {
        $this->order=$order;
        $this->orderdetail=$orderdetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('User.mail.order_bill');
    }
}
