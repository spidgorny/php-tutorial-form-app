<?php

class DelPerson extends BaseController {

	/**
	 * @var StorageInterface
	 */
	protected $storage;

	function __construct(StorageInterface $storage) {
		$this->storage = $storage;
	}

	/**
	 * @throws Exception
	 */
	public function render() {
		$id = trim($_REQUEST['id']);
		if (!$id) {
			throw new Exception('ID not provided');
		}
		$this->storage->delete($id);
		http_redirect(ListData::class);
	}

}
