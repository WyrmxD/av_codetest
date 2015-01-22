<?php

class AnnotationTest extends TestCase {

	public function setUp()
	{
		parent::setUp();

		$this->prepareForTests();
	}

	private function prepareForTests()
	{
		Artisan::call('migrate');
		Mail::pretend(true);
	}

	public function testGetAnnotations()
	{
		$response = $this->call('GET', 'annotation');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testPostAnnotation()
	{
		$parameters = ['description'=> 'Example description', 'amount' => 600];
		$response = $this->call('POST', 'annotation', $parameters);
		$this->assertTrue($this->client->getResponse()->isOk());
	}
}
