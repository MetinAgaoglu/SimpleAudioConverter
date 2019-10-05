<?php require 'initialize.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?= gettext('Audio Converter') ?></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!-- For PWA -->
    <link rel="manifest" href="manifest.json">
</head>
<body>

<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Simple Mp3 Converter</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Homepage</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a href="index.php">Homepage</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<br>

<div class="section no-pad-bot" id="index-banner">
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
            <div class="col s6 col s12">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span><?= gettext('Audio file') ?></span>
                            <input type="file" name="sound_file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="submit" class="btn btn-primary" name="convert_and_download">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col s6 col s12">
                <h2><?= gettext('History') ?></h2>
                <?php foreach (getUploadedMp3ByUserId() as $value) {
                    ?>
                        <div class="col s12 m6">
                            <div class="card blue-grey darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title"></span>
                                    <audio controls style="width:100%;">
                                        <source src="stream.php?file=<?= $value ?>" type="audio/mpeg">
										<?= gettext('Your browser does not support the audio element.') ?>
                                    </audio>
                                </div>
                                <div class="card-action">
                                    <a href="stream.php?file=<?= $value ?>"><?= gettext('Download') ?></a>
                                </div>
                            </div>
                        </div>

                    <?php
                } ?>
            </div>
        </div>

    </div>
</div>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/init.js"></script>
</body>
</html>