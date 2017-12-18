<?php

class AddPerson {

	function render()
	{
		try {
			$data = $this->validate();
			$content = json_encode($data);
		} catch (Exception $error) {
			$form = new Home();
			$form->error = $error->getMessage();
			$content = $form->render();
		}

		return $content;
	}

	/**
	 * @return null
	 * @throws Exception
	 */
	function validate()
	{
		$name = trim(ifsetor($_REQUEST['name']));
		$name = filter_var($name, FILTER_SANITIZE_STRING);
		if (!$name) {
			throw new Exception('Please enter a name');
		}

		$email = trim(ifsetor($_REQUEST['email']));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new Exception('Please enter a valid email');
		}

		return null;
	}

}
