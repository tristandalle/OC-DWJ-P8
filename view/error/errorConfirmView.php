<?php $title = 'Alerte'; ?>

<?php ob_start(); ?>

<form action="index.php?action=<?= $link ?>" method="post">
<p><?= $message ?></p>
    <input type="submit" id="yes" name="confirm" value="oui"/>
    <input type="submit" id="no" name="confirm" value="non"/>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

