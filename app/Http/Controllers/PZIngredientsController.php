<?php namespace App\Http\Controllers;

use App\models\PZIngredients;
use Illuminate\Routing\Controller;

class PZIngredientsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pzingredients
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('ingredients');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pzingredients/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = request()->all();

        $record = PZIngredients::create(array(
            'name' => $data['name'],
            'calories' => $data['calories'],
        ));

        return view('ingredients', $record->toArray());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pzingredients
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pzingredients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pzingredients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pzingredients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pzingredients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}