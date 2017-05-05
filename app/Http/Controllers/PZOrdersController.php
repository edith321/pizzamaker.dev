<?php namespace App\Http\Controllers;

use App\models\PZBase;
use App\models\PZCheese;
use App\models\PZIngredients;
use App\models\PZOrders;
use Illuminate\Routing\Controller;

class PZOrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /pzorders
     *
     * @return Response
     */
    public function index()
    {
        return PZOrders::with(['baseData', 'orderCheeseConnectionData', 'orderIngredientsConnectionData'])->get();
    }
    public function showAllOrders()
    {
        $data = [];
        $data['orders'] = PZOrders::with(['baseData', 'orderCheeseConnectionData', 'orderIngredientsConnectionData'])->get()->toArray();

        /*$data['cheese'] = PZCheese::pluck('name', 'id')->toArray();
        $data['ingredients'] = PZIngredients::pluck('name', 'id')->toArray();*/
       return view('allOrders', $data);
    }
    /**
     * Show the form for creating a new resource.
     * GET /pzorders/create
     *
     * @return Response
     */
    public function create()
    {
        $data['base'] = PZBase::pluck('name', 'id')->toArray();
        $data['cheese'] = PZCheese::pluck('name', 'id')->toArray();
        $data['ingredients'] = PZIngredients::pluck('name', 'id')->toArray();
        $data['calories'] = PZCheese::pluck('calories', 'id')->toArray();

        return view('order', $data);
    }
    /**
     * Returns orders data
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     *
     */
    public function showData()
    {
        return PZOrders::with(['orderCheeseConnectionData'])->get();
    }

    public function countCalories($data)
    {
        $data['pizzaOrders'] = PZOrders::with(['orderIngredientsConnectionData', 'orderCheeseConnectionData', 'baseData'])->get()->toArray();

        foreach($data['pizzaOrders'] as $pizza)
        {
            foreach($pizza['order_ingredients_connection_data'] as $ingredients)
            {
                $ingredientsCalories = $ingredients['ingredients_data']['calories'];
            }
        }
        foreach($data['pizzaOrders'] as $pizza)
        {
            foreach($pizza['order_cheese_connection_data'] as $cheese)
            {
                $cheeseCalories = $cheese['cheese_data']['calories'];
            }
        }
        foreach($data['pizzaOrders'] as $pizza)
        {
            $baseCalories = $pizza['base_data']['calories'];
        }

       $totalCalories = $ingredientsCalories + $cheeseCalories + $baseCalories;

        return $totalCalories;
    }

    /**
     * Store a newly created resource in storage.
     * POST /pzorders
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();

        if(sizeOf($data['ingredients']) > 3) {
            return 'Negalima pasirinkti daugiau negu 3 ingridientus';
        } else {

        $record = PZOrders::create(array(
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'base_id' => $data['base'],
            'comments' => $data['comments'],
            /*'total_calories' => $this->countCalories($data),*/
        ));

        $record['base'] = PZBase::pluck('name', 'id')->toArray();
        $record['cheese'] = PZCheese::pluck('name', 'id')->toArray();
        $record['ingredients'] = PZIngredients::pluck('name', 'id')->toArray();
        $record['calories'] = PZCheese::pluck('calories', 'id')->toArray();

        $record->orderCheeseConnection()->sync($data['cheese']);
        $record->orderIngredientConnection()->sync($data['ingredients']);

        return view('order', $record->toArray());
        }
    }

    /**
     * Display the specified resource.
     * GET /pzorders/{id}
     *
     * @param  int $id
     * @return Response
     */


    public function show($id)
    {

        $data['order'] = PZOrders::with(['baseData', 'orderCheeseConnectionData', 'orderIngredientsConnectionData'])->find($id)->toArray();
        return view('singleOrder', $data);

    }

    /**
     * Show the form for editing the specified resource.
     * GET /pzorders/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {



        $data['base'] = PZBase::pluck('name', 'id')->toArray();
        $data['cheese'] = PZCheese::pluck('name', 'id')->toArray();
        $data['ingredients'] = PZIngredients::pluck('name', 'id')->toArray();
        $data['calories'] = PZCheese::pluck('calories', 'id')->toArray();


        $data['id'] = $id;

        $data['order'] = PZOrders::with(['baseData', 'orderCheeseConnectionData', 'orderIngredientsConnectionData'])->find($id)->toArray();

        $data['ingredientID'] = [];
        foreach ($data['order']['order_ingredients_connection_data'] as $order) {

            array_push($data['ingredientID'], $order['ingredient_id']);
        }

        return view('orderEdit', $data);
    }

    /**
     * Update the specified resource in storage.
     * PUT /pzorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $record = PZOrders::find($id);

        $data = request()->all();

        $record->update(array(
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'base_id' => $data['base'],
            'comments' => $data['comments'],
            /*'total_calories' => $this->countCalories($data),*/
        ));

        $record['base'] = PZBase::pluck('name', 'id')->toArray();
        $record['cheese'] = PZCheese::pluck('name', 'id')->toArray();
        $record['ingredients'] = PZIngredients::pluck('name', 'id')->toArray();
        $record['calories'] = PZCheese::pluck('calories', 'id')->toArray();

        $record->orderCheeseConnection()->sync($data['cheese']);
        $record->orderIngredientConnection()->sync($data['ingredients']);

        return view('order', $record->toArray());

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /pzorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    { ////// reikia web.php get prie delete'o pakeist i delete, ir ideti jquery, paziuret kaip pas aivara, prie nuorodos prideti klase jquerio 
        $data['order'] = PZOrders::with(['baseData', 'orderCheeseConnectionData', 'orderIngredientsConnectionData'])->find($id)->toArray();

        PZOrders::destroy($data['order']);
    }

}