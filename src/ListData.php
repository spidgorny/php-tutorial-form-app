<?php

class ListData extends BaseController {

	/**
	 * @var StorageInterface
	 */
	protected $storage;

	function __construct(StorageInterface $storage)
	{
		$this->storage = $storage;
	}

	public function render()
	{
		$content = [];
		$people = $this->storage->list();
		foreach ($people as $id => $person) {
			$content[] = '<a href="'.Details::href(['id' => $id]).'">'.$this->e($person['name']).'</a><br />';
		}
		return $content;
	}

	public function __destruct()
	{
		$this->storage->save();
	}

}
