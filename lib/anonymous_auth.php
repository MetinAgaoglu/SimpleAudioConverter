<?php

	/**
	 * Assigns a unique id for each anonymous user.
	 */
	function setUserID()
	{
		if (empty($_SESSION['user_id'])) {
			$_SESSION['user_id'] = uniqid();
		}
	}

	/**
	 * Gets the user id of the anonymous user.
	 * @return mixed|void
	 */
	function getUserID()
	{
		return $_SESSION['user_id'] ?? setUserID();
	}

	/**
	 * Writing to user history if the file was uploaded successfully.
	 * @param $fileName
	 */
	function setHistory($fileName)
	{
		$_SESSION[getUserID()]['files'][] = $fileName;
	}

	/**
	 * @return array
	 */
	function getUploadedMp3ByUserId(): array
	{
		return $_SESSION[getUserID()]['files'] ?? [];
	}
