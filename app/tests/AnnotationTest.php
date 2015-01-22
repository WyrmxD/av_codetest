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
		$this->insertAnnotations();

		$response = $this->call('GET', '/annotation');
		$this->assertTrue($this->client->getResponse()->isOk());

		$annotations = $response->getData();
		$this->assertCount(3, $annotations);
	}

	public function testPostAnnotation()
	{
		$parameters = ['description'=> 'Example description', 'amount' => 600];
		$response = $this->call('POST', '/annotation', $parameters);
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testGetOneAnnotation()
	{
		$this->insertAnnotations();

		$response = $this->call('GET', '/annotation/1');
		$this->assertTrue($this->client->getResponse()->isOk());
		$annotation = $response->getData();
		$this->assertEquals($annotation->id, '1');
		$this->assertEquals($annotation->description, 'Example description 1');
		$this->assertEquals($annotation->amount, '100.0');
	}

	public function testUpdateAnnotation()
	{
		$this->insertAnnotations();

		$parameters = ['description'=> 'New description', 'amount' => 900];
		$response = $this->call('PUT', '/annotation/3', $parameters);
		$this->assertTrue($this->client->getResponse()->isOk());

		$response = $this->call('GET', '/annotation/3');
		$annotation = $response->getData();
		$this->assertEquals($annotation->id, '3');
		$this->assertEquals($annotation->description, 'New description');
		$this->assertEquals($annotation->amount, '900.0');
	}

	public function testDeleteAnnotation()
	{
		$response = $this->call('DELETE', '/annotation/500');
		$this->assertEquals("Record is missing", $response->original);

		$this->insertAnnotations();
		$response = $this->call('DELETE', '/annotation/1');
		$this->assertTrue($this->client->getResponse()->isOk());

		$response = $this->call('GET', '/annotation');
		$this->assertTrue($this->client->getResponse()->isOk());

		$annotations = $response->getData();
		$this->assertCount(2, $annotations);
	}

	private function insertAnnotations()
	{
		$parameters = ['description'=> 'Example description 1', 'amount' => 100];
		$this->call('POST', '/annotation', $parameters);
		$parameters = ['description'=> 'Example description 2', 'amount' => 200];
		$this->call('POST', '/annotation', $parameters);
		$parameters = ['description'=> 'Example description 3', 'amount' => 300];
		$this->call('POST', '/annotation', $parameters);
	}
}
