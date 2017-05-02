<!DOCTYPE html>
<html lang="en">
<body>

{!! Form::open(['url' => route('app.orders')]) !!}
{{Form::label('name', 'Pavadinimas')}}
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
{{Form::label('cheese', 'Sūris')}}
{{Form::select('cheese', $cheese, 1)}}
<br/>
{{Form::label('ingredients', 'Ingridientai')}}
<br/>
@foreach($ingredients as $ingredient => $ingredien)
    {{Form::checkbox('ingredients[]', $ingredient) }}{{$ingredien}}
    <br/>
@endforeach
<br/>
<br/>
{{Form::submit('Užsakyti')}}
{!! Form::close() !!}

</body>
</html>