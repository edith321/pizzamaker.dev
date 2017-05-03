<!DOCTYPE html>
<html lang="en">
<body>
<h1 style="color: darkred;">Pizza Maker</h1>
<h2>Susikurkite norimą picą patys!</h2>
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
<br/>
{{Form::label('base', 'Picos padas:')}}
<br/>
{{Form::select('base', $base)}}
<br/>
<br/>
{{Form::label('cheese', 'Sūris:')}}
<br/>
@foreach($cheese as $chees => $chee)
    {{Form::checkbox('cheese[]', $chees) }}{{$chee}}
    <br/>
@endforeach
<br/>
{{Form::label('ingredients', 'Ingridientai (ne daugiau, negu 3):')}}
<br/>
@foreach($ingredients as $ingredient => $ingredien)
    {{Form::checkbox('ingredients[]', $ingredient, null, ['class' => 'ingredients']) }}{{$ingredien}}
    <br/>
@endforeach
<br/>
{{Form::label('comments', 'Komentarai:')}}
<br/>
{{Form::textarea('comments', null, ['size' => '30x5'])}}

<br/>
{{Form::submit('Užsakyti')}}
{!! Form::close() !!}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $('input[class="ingredients"]').click(function(event) {
        if (this.checked && $('input:checked').length > 3) {
            event.preventDefault();
        }
    });
</script>



</body>
</html>