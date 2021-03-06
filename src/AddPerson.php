<?php

class AddPerson extends BaseController {

	/**
	 * @var StorageInterface
	 */
	protected $storage;

	function __construct(StorageInterface $storage)
	{
		$this->storage = $storage;
	}

	function index()
	{
		return $this->showForm();
	}

	function performAddAction()
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
			$content = $this->showForm($input + ['error' => $error->getMessage()]);
		}

		return $content;
	}

	function showForm(array $placeholders = []) {
		$heading = 'hello world';
		$form = new Template(__DIR__.'/../template/form.phtml');
		$placeholders += [
			'heading' => $heading,
			'error' => null,
			'name' => '',
			'email' => '',
		];
		$content = $form->render($placeholders);
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
