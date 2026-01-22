<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionOtpNotification extends Notification
{
    use Queueable;

    public function __construct(private Transaction $transaction)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('تأكيد العملية المالية')
            ->line('يرجى استخدام الرمز التالي لتأكيد العملية المالية:')
            ->line($this->transaction->verification_code)
            ->line('إذا لم تطلب هذه العملية، يرجى التواصل مع الدعم.');
    }
}
