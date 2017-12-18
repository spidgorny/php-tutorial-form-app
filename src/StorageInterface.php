<?php

interface StorageInterface {

	public function list(): array;

	public function add(array $data);

	public function get($id);

	public function delete($id);

}
