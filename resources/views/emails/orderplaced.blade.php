<h1>Bestelling #{{ $order->slug }}</h1>
<p><em>{{ $order->name }} ({{ $order->speltak }})</em></p>

<p>Uw bestelling is geplaatst! U ontvangt een mail zodra de bestelling opgehaald kan worden op het Scoutinggebouw. Na de sluitingsdatum van de winkel ({{ $order->opening->end->toFormattedDateString() }}) sturen we alle bestelling tegelijk door naar de producent. Hierna kan het nog 2 tot 5 weken duren voor de bestelling klaar is!</p>

@if(!$order->payed)
    <h3>Nog niet betaald</h3>
    <p>Let op: deze bestelling is nog niet betaald. Alleen als u de betaling voldoet voor de sluitingsdatum ({{ $order->opening->end->toFormattedDateString() }}) wordt uw bestelling nog meegenomen. U kunt de bestelling ook nog annuleren.</p>
    <p><a href="{{ route('order.show', [$order, $order->slug]) }}">Ga naar de website om te betalen of te annuleren &gt;.</a></p>
@endif

<hr>
<table class="table mb-5">
    <?php $total = 0; ?>
    @foreach($order->rules as $rule)
        <tr>
            <td>{{ $rule->product }}</td>
            <td>{{ $rule->type }} {{ $rule->size }}</td>
            <td class="text-right">&euro;{{ $rule->price }}</td>
            <?php $total += $rule->price; ?>
        </tr>
    @endforeach
    <tr>
        <td colspan="2"><strong>Totaal</strong></td>
        <td class="text-right"><strong>&euro;{{ number_format($total, 2) }}</strong></td>
    </tr>
</table>