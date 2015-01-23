<?php

class AnnotationRepository {

	public function getAll()
	{
		return Annotation::all();
	}

	public function createOrUpdate($id = null, $data)
	{
		if(is_null($id)) {
			$annotation = new Annotation;
		} else {
			$annotation = $this->getById($id);
		}

		$annotation->description = $data['description'];
		$annotation->amount = $data['amount'];
		$annotation->save();
		return $annotation;
	}

	public function getById($id)
	{
		return Annotation::find($id);
	}

	public function delete($id) {
		$annotation = $this->getById($id);
		if (isset($annotation)) {
			$annotation->delete();
			return true;
		}
		return false;
	}
}