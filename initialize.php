<?php

	header('X-Content-Type-Options: nosniff');
	header('X-Frame-Options: DENY');
	header('X-XSS-Protection: 1; mode=block');
	session_start();
	require 'lib/autoload.php';

	setUserID();
	// Service Container?
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (!isCsrfTokenValid($_POST['csrf_token'])) {
			setFlashMessage('danger', gettext('Invalid CSRF Token'));
			echo getFlashMessageIfExists();
			exit;
		}
	}