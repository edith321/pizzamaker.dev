<!DOCTYPE html>
<html lang="en">
<body>

{!! Form::open(['url' => route('app.orders')]) !!}
{{Form::label('name', 'Name')}}
{{Form::text('name')}}
<br/>
{{Form::label('phone', 'Phone')}}
{{Form::text('phone')}}
<br/>
{{Form::label('address', 'Address')}}
{{Form::text('address')}}
<br/>
{{Form::label('base', 'Base')}}
{{Form::select('base', $base)}}
<br/>
{{Form::label('cheese', 'Cheese')}}
<br/>
@foreach($cheese as $chees => $chee)
    {{Form::checkbox('cheese[]', $chees) }}{{$chee}}
    <br/>
@endforeach
<br/>
{{Form::label('ingredients', 'Ingredients')}}
<br/>

@foreach($ingredients as $ingredient => $ingredien)
    {{Form::checkbox('ingredients[]', $ingredient) }}{{$ingredien}}
    <br/>
@endforeach
<br/>
<br/>
{{Form::submit('Submit')}}
{!! Form::close() !!}

</body>
</html>