<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PersonController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$persons = DB::table('Information')->get();

 		return View::make('person',array('persons' => $persons)); 
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('addp');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$fname = Input::get('fname');
		$lname = Input::get('lname');
		$mi = Input::get('mi');
		$age = Input::get('age');
		$gender = Input::get('gender');

 		$data = array(
 				"last_name" => $lname,
 				"first_name" =>	$fname,
 				"middle_name" => $mi,
 				"age" => $age,
 				"gender" => $gender
 			);

		DB::table('Information')->insert($data);

		return Redirect::to('/show');
		
		
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
 		$person = DB::table('Information')->where('id', $id)->first();

 		$data = array(
 				"id" => $person->id,
 	 			"last_name" => $person->last_name,
 				"first_name" =>	$person->first_name,
 				"middle_name" => $person->middle_name,
 				"age" => $person->age,
 				"gender" => $person->gender
 			);

		return View::make('editp',$data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$fname = Input::get('fname');
		$lname = Input::get('lname');
		$mi = Input::get('mi');
		$age = Input::get('age');
		$gender = Input::get('gender');	
 		
 		$data = array(
 				 "last_name" => $lname,
 				"first_name" =>	$fname,
 				"middle_name" => $mi,
 				"age" => $age,
 				"gender" => $gender
 			);

		DB::table('Information')
            ->where('id', $id)
            ->update($data);

        return Redirect::to('/show');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('Information')->where('id', '=', $id)->delete();

		return Redirect::to('/show');
	}


}
