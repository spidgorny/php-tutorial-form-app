<?php
/**
 * Created by PhpStorm.
 * User: Slawa
 * Date: 2017-12-26
 * Time: 02:54
 */

trait HTMLHelpers {

	function e($string)
	{
		return htmlspecialchars($string, ENT_QUOTES);
	}

}
