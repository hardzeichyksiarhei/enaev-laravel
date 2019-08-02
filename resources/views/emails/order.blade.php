<p><strong>Имя:</strong></p>
<p>{{ $order->name  }}</p>

<p><strong>Почта:</strong></p>
<p>{{ $order->email  }}</p>

<p><strong>Тема обращения:</strong></p>
<p>{{ $order->caption  }}</p>

@if ($order->contact != '')
    <p><strong>Контакты:</strong></p>
    <p>{{ $order->contact  }}</p>
@endif

<p><strong>Сообщение:</strong></p>
<p>{{ $order->message  }}</p>
