<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<h1>Mon super Blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<h2>Modifier un commentaire</h2>

<form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div>
        <label for="comment">Modifiez le commentaire</label><br/>
        <textarea id="newComment" name="newComment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>