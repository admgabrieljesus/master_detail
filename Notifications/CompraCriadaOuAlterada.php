<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompraCriadaOuAlterada extends Notification
{
    use Queueable;

    protected $compra;
    protected $action;

    /**
     * Create a new notification instance.
     */
    public function __construct($compra, $action)
    {
        $this->compra = $compra;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
   
        $subject = $this->action === 'created' ? 'Nova Compra Criada' : 'Compra Alterada';

        return (new MailMessage)
            ->subject($subject)
            ->line("A compra com o nome '{$this->compra->nome}' foi {$this->action}.")
            ->line("Data: {$this->compra->data}")
            ->line("Valor Total: R$ {$this->compra->valor_total}")
            ->action('Ver Compra', url("/compras/{$this->compra->id}"))
            ->line('Obrigado por usar nosso sistema!');


    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
         return [
            'compra_id' => $this->compra->id,
            'action' => $this->action,
            'nome' => $this->compra->nome,
            'valor_total' => $this->compra->valor_total,
        ];
    }
}
