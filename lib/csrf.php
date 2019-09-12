<?php

	/**
	 * Csrf token getting function
	 * @return string
	 */
	function getCsrfToken()
	{
		$_SESSION['csrf_token'] = md5(uniqid());
		return $_SESSION['csrf_token'];
	}

	/**
	 * Checks if Csrf token is valid
	 * @param $formToken
	 * @return bool
	 */
	function isCsrfTokenValid($formToken): bool
	{
		return $_SESSION['csrf_token'] == $formToken;
	}