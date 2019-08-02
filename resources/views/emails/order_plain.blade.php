Имя: {{ $order->name  }}

Почта: {{ $order->email  }}

Тема обращения: {{ $order->caption  }}

@if ($order->contact != '')
    Контакты: {{ $order->contact  }}
@endif

Сообщение: {{ $order->message  }}