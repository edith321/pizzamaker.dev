<?php namespace App\Http\Controllers;

use App\models\PZBase;
use Illuminate\Routing\Controller;

class PZBaseController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pzbase
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('base');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pzbase/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = request()->all();

        $record = PZBase::create(array(
            'name' => $data['name'],
            'calories' => $data['calories'],
        ));

        return view('base', $record->toArray());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pzbase
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pzbase/{id}
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
	 * GET /pzbase/{id}/edit
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
	 * PUT /pzbase/{id}
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
	 * DELETE /pzbase/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}