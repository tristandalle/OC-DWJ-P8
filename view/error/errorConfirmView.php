<?php $title = 'Alerte'; ?>

<?php ob_start(); ?>

<div id="header_error">
    <img src="public/images/Signal_attention.png"/>
</div>

<div id="error_message">
<form action="index.php?action=<?= $link ?>" method="post">
<p><?= $message ?></p>
    <input type="submit" id="yes" name="confirm" value="oui"/>
    <input type="submit" id="no" name="confirm" value="non"/>
</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

