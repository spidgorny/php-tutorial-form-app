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
		$people = $this->storage->list();
		foreach ($people as $id => &$person) {
			$person['link'] = Details::href(['id' => $id]);
		}

		$t = new Template(__DIR__ . '/../template/ListData.phtml');
		$content = $t->render(['people' => $people]);

		return $content;
	}

	public function __destruct()
	{
		$this->storage->save();
	}

}
