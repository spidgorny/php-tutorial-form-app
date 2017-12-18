<?php

class FileStorage implements StorageInterface {

	var $filename;

	var $data = [];

	function __construct($filename)
	{
		$this->filename = $filename;
		$this->data = json_decode(file_get_contents($this->filename), true);
	}

	public function list(): array
	{
		return $this->data;
	}

	public function add(array $data)
	{
		$id = uniqid();
		$this->data[$id] = $data;
		$this->save();
	}

	public function get($id)
	{
		return $this->data[$id];
	}

	public function delete($id)
	{
		unset($this->data[$id]);
		$this->save();
	}

	protected function save()
	{
		file_put_contents($this->filename, json_encode($this->data));
	}

}
