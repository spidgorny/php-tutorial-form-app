<?php

class AddPerson {

	/**
	 * @var StorageInterface
	 */
	protected $storage;

	function __construct(StorageInterface $storage)
	{
		$this->storage = $storage;
	}

	function render()
	{
		$content = '';
		$input = $this->getInput(['name', 'email']);
		//debug($input);
		try {
			$data = $this->validate($input);
			//$content = json_encode($data);
			$this->storage->add($data);
			http_redirect(ListData::class);
		} catch (Exception $error) {
			$form = new Home();
			$content = $form->render($input + ['error' => $error->getMessage()]);
		}

		return $content;
	}

	function getInput(array $fields)
	{
		$input = [];
		foreach ($fields as $f) {
			$input[$f] = trim(ifsetor($_REQUEST[$f]));
		}
		return $input;
	}

	/**
	 * @param array $input
	 *
	 * @return null
	 * @throws Exception
	 */
	function validate(array $input)
	{
		$input['name'] = filter_var($input['name'], FILTER_SANITIZE_STRING);
		if (!$input['name']) {
			throw new Exception('Please enter a name');
		}

		$input['email'] = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
		if (!$input['email']) {
			throw new Exception('Please enter a valid email');
		}

		return $input;
	}

}
