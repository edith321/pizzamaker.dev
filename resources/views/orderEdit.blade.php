<!DOCTYPE html>
<html lang="en">
<body>
<h1 style="color: darkred;">Pizza Maker</h1>
<h2>Susikurkite norimą picą patys!</h2>
@if(isset($name))
    <div style="background-color: #1f648b; color: greenyellow"> Jūsų užsakytos picos kalorijų kiekis
        {{$total_calories}}
    </div>
@endif


{!! Form::open(['url' => route('app.orderEdit', $id)]) !!}
{{Form::label('name', 'Vardas Pavardė')}}
{{Form::text('name', $order['name'])}}
<br/>
{{Form::label('phone', 'Telefonas')}}
{{Form::text('phone', $order['phone'])}}
<br/>
{{Form::label('address', 'Adresas')}}
{{Form::text('address', $order['address'])}}
<br/>
<br/>
{{Form::label('base', 'Picos padas:')}}
<br/>
@foreach ($base as $key => $value)
    @if ($order['base_id'] == $key)
        {{Form::select('base', $base, $key)}}
    @endif
@endforeach
<br/>
<br/>
{{Form::label('cheese', 'Sūris:')}}
<br/>
@foreach($cheese as $key => $value)
    @if($order['order_cheese_connection_data'][0]['cheese_data']['id'] == $key )
        {{Form::checkbox('cheese[]', $key, true) }}
    @else
        {{Form::checkbox('cheese[]', $key, false) }}
    @endif
    {{$value}}
    <br/>
@endforeach
<br/>
{{Form::label('ingredients', 'Ingridientai (ne daugiau, negu 3):')}}
<br/>
@foreach($ingredients as $key => $value)
    @if(in_array($key, $ingredientID))
    {{Form::checkbox('ingredients[]', $key, true)}}{{$value}}
        @else
        {{Form::checkbox('ingredients[]', $key, false)}}{{$value}}
    @endif
    <br/>
@endforeach
<br/>
{{Form::label('comments', 'Komentarai:')}}
<br/>
{{Form::textarea('comments', $order['comments'], ['size' => '30x5'])}}
<br/>
{{Form::submit('Atnaujinti')}}
{!! Form::close() !!}
