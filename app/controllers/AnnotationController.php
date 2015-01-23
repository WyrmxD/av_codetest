<?php

class AnnotationController extends BaseController {

	public function __construct(AnnotationRepository $annotation)
	{
		$this->annotation = $annotation;
	}

	/**
	 * GET
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$annotations = $this->annotation->getAll();
		return Response::json($annotations);
	}


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

		$data = array( 'description' => $description, 'amount' => $amount);
		$annotation = $this->annotation->createOrUpdate(null, $data);

		$response = Response::make($annotation, 200);
		$response->header('Content-Type', 'application/json');
		return $response;
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
		$annotation = $this->annotation->getById($id);
		return Response::json($annotation);
	}


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

		$data = array( 
			'description' => Input::get('description'), 
			'amount' => Input::get('amount')
		);
		$annotation = $this->annotation->createOrUpdate($id, $data);

		$response = Response::make($annotation, 200);
		$response->header('Content-Type', 'application/json');
		return $response;
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
		$success = $this->annotation->delete($id);
		if ($success) {
			$response = Response::make(200);
			return $response;
		}
		$response = Response::make('Record is missing', 500);
		return $response;

	}


}
