<?php

class AnnotationController extends BaseController {

	public function __construct(IAnnotationRepository $annotation)
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
	public function store($id = null)
	{
		if (!Input::has('description') || !Input::has('amount')) {
			$response = Response::make('Wrong parameters', 400);
			return $response;
		}
		
		$description = Input::get('description');
		$amount = Input::get('amount');

		// validate & sanitize
		if (!Annotation::validate($description, $amount)) {
			$response = Response::make('Wrong parameters', 400);
			return $response;
		}
		
		$data = array( 
			'description' => Annotation::sanitize_description($description),
			'amount' => Annotation::sanitize_amount($amount)
		);

		if (is_null($id)) {
			$annotation = $this->annotation->createOrUpdate(null, $data);
		} else {
			$annotation = $this->annotation->createOrUpdate($id, $data);	
		}
		
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
