<?php

interface IAnnotationRepository {
	
	public function getAll();

	public function createOrUpdate($id = null, $data);

	public function getById($id);

	public function delete($id);
}