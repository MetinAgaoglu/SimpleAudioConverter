<?php

	/**
	 * Converts the uploaded file to mp3 format using ffmpeg
	 * @param $fileObject | Single PHP $_FILES object
	 * @return array
	 */
	function convertFileToMP3($fileObject)
	{
		$fileName = md5(time()) . '.mp3';
		$mp3 = 'results/' . $fileName;
		exec('ffmpeg -i '
			. escapeshellarg($fileObject['sound_file']['tmp_name'])
			.' -f mp3 -ab 192000 -vn '
			.escapeshellarg($mp3)
			.' 2>&1',
			$output, $result);

		if ($result) {
			return ['status' => false, 'error' => $output[12]];
		} else {
			setHistory($mp3);
			return ['status' => true, 'file' => $fileName];
		}
	}

	/**
	 * HTTP mp3 stream if file exists
	 * @param $file
	 */
	function mp3Stream($file)
	{
		if (file_exists($file)) {
			header('Content-type: {$mime_type}');
			header('Content-length: ' . filesize($file));
			header('Content-Disposition: filename="' . $file);
			header('X-Pad: avoid browser bug');
			header('Cache-Control: no-cache');
			header("Content-Transfer-Encoding: binary");
			header("Content-Type: audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3");
			readfile($file);
		}
	}