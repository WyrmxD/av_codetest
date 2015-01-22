<?php

class AnnotationController extends \BaseController {

	/**
	 * GET
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$annotations = Annotation::all();
		return Response::json($annotations);
	}


	/**
	 * GET
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	// public function create()
	// {
	// 	//
	// }


	/**
	 * POST
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Input::has('description') || !Input::has('amount')) {
			$response = Response::make('Wrong parameters', 400);
			return $response;
		}
		
		$description = Input::get('description');
		$amount = Input::get('amount');

		//TODO validate & sanitize

		$annotation = new Annotation;
		$annotation->description = $description;
		$annotation->amount = $amount;
		$annotation->save();
	}


	/**
	 * GET
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$annotation = Annotation::find($id);
		return Response::json($annotation);
	}


	/**
	 * GET
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function edit($id)
	// {
	// 	//
	// }


	/**
	 * PUT/PATCH
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!Input::has('description') || !Input::has('amount')){
			$response = Response::make('Wrong parameters', 400);
			return $response;			
		}
		
		//TODO validate & sanitize

		$annotation = Annotation::find($id);
		$annotation->description = Input::get('description');
		$annotation->amount = Input::get('amount');
		$annotation->save();
	}


	/**
	 * DELETE
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$annotation = Annotation::find($id);
		if (!isset($annotation)) {
			$response = Response::make('Record is missing', 500);
			return $response;
		}
		$annotation->delete();
	}


}
