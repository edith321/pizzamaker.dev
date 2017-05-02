<!DOCTYPE html>
<html lang="en">
<body>

{!! Form::open(['url' => route('app.ingredients')]) !!}
{{Form::label('name', 'Name')}}
{{Form::text('name')}}
<br/>
{{Form::label('calories', 'Calories')}}
{{Form::text('calories')}}
<br/>
{{Form::submit('Submit')}}
{!! Form::close() !!}

</body>
</html>