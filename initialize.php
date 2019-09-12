<?php

	session_start();
	require 'lib/autoload.php';

	// Service Container?
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (!isCsrfTokenValid($_POST['csrf_token'])) {
			setFlashMessage('danger', gettext('Invalid CSRF Token'));
			echo getFlashMessageIfExists();
			exit;
		}
	}