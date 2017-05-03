<!DOCTYPE html>
<html lang="en">
<body>

@if(isset($name))
    <div style="background-color: #1f648b; color: greenyellow"> Jūsų užsakytos picos kalorijų kiekis
        @foreach($calories as $calorie)
            {{$calorie}}
    @endforeach
    </div>
@endif

{!! Form::open(['url' => route('app.orders')]) !!}
{{Form::label('name', 'Vardas Pavardė')}}
{{Form::text('name')}}
<br/>
{{Form::label('phone', 'Telefonas')}}
{{Form::text('phone')}}
<br/>
{{Form::label('address', 'Adresas')}}
{{Form::text('address')}}
<br/>
{{Form::label('base', 'Padas')}}
{{Form::select('base', $base)}}
<br/>
@foreach($cheese as $chees => $chee)
    {{Form::checkbox('cheese[]', $chees) }}{{$chee}}
    <br/>
@endforeach
<br/>
{{Form::label('ingredients', 'Ingridientai')}}
<br/>
@foreach($ingredients as $ingredient => $ingredien)
    {{Form::checkbox('ingredients[]', $ingredient) }}{{$ingredien}}
    <br/>
@endforeach
<br/>
{{Form::label('comments', 'Komentarai')}}
<br/>
{{Form::textarea('comments')}}

<br/>
{{Form::submit('Užsakyti')}}
{!! Form::close() !!}

</body>
</html>