<?php
/**
 * Created by PhpStorm.
 * User: Slawa
 * Date: 2017-12-18
 * Time: 04:01
 */

class Details extends BaseController {

	/**
	 * @var
	 */
	protected $storage;

	function __construct(StorageInterface $storage)
	{
		$this->storage = $storage;
	}

	/**
	 * @return string
	 * @throws Exception
	 */
	function render()
	{
		$id = trim(ifsetor($_REQUEST['id']));
		if (!$id) {
			throw new Exception(__CLASS__.' needs an ID');
		}

		$person = $this->storage->get($id);
		$content = json_encode($person);

		return $content;
	}

}
