<?php
	require 'initialize.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// Mime-Type Control etc. ?
		if ($_FILES['sound_file']['size'] > 0) {

			$convert = convertFileToMP3($_FILES);
			if (!$convert['status']) {
				setFlashMessage('danger', $convert['error']);
			} else {
				setFlashMessage('success', gettext('File successfully converted to mp3'), $convert['file']);
			}
		} else {
			setFlashMessage('warning', gettext('Audio file is required'));
		}
	}
	header('Location: index.php');
	exit;