<?php

	/**
	 * Flash message setting function
	 * @param string $status
	 * @param null $message
	 * @param null $customData
	 * @return void
	 */
	function setFlashMessage($status = 'success', $message = null, $customData = null)
	{
		$_SESSION['flash']['status'] = $status;
		$_SESSION['flash']['message'] = $message;
		$_SESSION['flash']['customData'] = $customData;
	}

	/**
	 * Flash message getting function
	 * @return string
	 */
	function getFlashMessageIfExists()
	{
		if (!empty($_SESSION['flash']['status'])) {
			$message = '<div class="alert alert-' . $_SESSION['flash']['status'] . '">' . $_SESSION['flash']['message'] . '</div>';
			return $message;
		}
	}

	/**
	 * Function that get custom data if exists
	 * @return string
	 */
	function getFlashCustomDataIfExists()
	{
		if (!empty($_SESSION['flash']['customData'])) {
			$customData = $_SESSION['flash']['customData'];
			return $customData;
		}
	}

	/**
	 *
	 * @return bool
	 */
	function isFlashSuccessfully(): bool
	{
		return (!empty($_SESSION['flash']['status']) && $_SESSION['flash']['status'] == 'success');
	}

	/**
	 * Function that flush flash messages
	 * @return void
	 */
	function flushFlashMessage()
	{
		unset($_SESSION['flash']);
	}