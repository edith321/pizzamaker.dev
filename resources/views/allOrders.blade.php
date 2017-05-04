<!DOCTYPE html>
<html lang="en">
<body>
<h2>Visi užsakymai</h2>
    @foreach($orders as $order)
        <ul>
        <li>Vardas Pavardė: {{$order['name']}}</li>
        <li>Telefono numeris: {{$order['phone']}}</li>
        <li>Adresas: {{$order['address']}}</li>
        <li>Picos padas: {{$order['base_data']['name']}}</li>
            @foreach($order['order_cheese_connection_data'] as $connection)
                <li>Sūris: {{$connection['cheese_data']['name']}}</li>
            @endforeach
        <li>Ingridientai:</li>
        <ul>
            @foreach($order['order_ingredients_connection_data'] as $connection)
                <li>{{$connection['ingredients_data']['name']}}</li>
            @endforeach
        </ul>
        <li>Komentaras: {{$order['comments']}}</li>

        </ul>
    @endforeach

</body>
</html>