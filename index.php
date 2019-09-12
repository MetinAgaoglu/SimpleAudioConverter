<?php require 'initialize.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Audio Converter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        Audio Converter
    </a>
</nav>
<br>

<div class="container">

	<?= getFlashMessageIfExists() ?>

	<?php if (isFlashSuccessfully()): ?>
        <audio controls>
            <source src="stream.php?file=<?= getFlashCustomDataIfExists() ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <a href="stream.php?file=<?= getFlashCustomDataIfExists() ?>">Download</a>
	<?php endif; ?>
	<?php flushFlashMessage(); ?>

    <div class="row">
        <div class="col">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                <div class="form-group">
                    <label><?php gettext('Audio file') ?></label>
                    <input type="file" class="form-control-file" name="sound_file">
                </div>

                <input type="submit" class="btn btn-primary" name="convert_and_download">
            </form>
        </div>
        <div class="col">
            <h2><?= gettext('History') ?></h2>
			<?php foreach (getUploadedMp3ByUserId() as $value) {
				?>
                <audio controls>
                    <source src="stream.php?file=<?= $value ?>" type="audio/mpeg">
                    <?= gettext('Your browser does not support the audio element.') ?>
                </audio>
				<?php
			} ?>
        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>