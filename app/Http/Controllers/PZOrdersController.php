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
        $data['base'] = PZBase::pluck('name', 'id')->toArray();
        $data['cheese'] = PZCheese::pluck('name', 'id')->toArray();
        $data['ingredients'] = PZIngredients::pluck('name', 'id')->toArray();

        return view('order', $data);
    }

    /**
     * Show the form for creating a new resource.
     * GET /pzorders/create
     *
     * @return Response
     */
    public function create()
    {
        $data = request()->all();

        $record = PZOrders::create(array(
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'base_id' => $data['base'],
        ));

        $record['base'] = PZBase::pluck('name', 'id')->toArray();
        $record['cheese'] = PZCheese::pluck('name', 'id')->toArray();
        $record['ingredients'] = PZIngredients::pluck('name', 'id')->toArray();

        $record->orderCheeseConnection()->sync($data['cheese']);
        $record->orderIngredientConnection()->sync($data['ingredients']);

        return view('order', $record->toArray());
    }

    /**
     * Store a newly created resource in storage.
     * POST /pzorders
     *
     * @return Response
     */
    public function store()
    {
        //
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /pzorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}