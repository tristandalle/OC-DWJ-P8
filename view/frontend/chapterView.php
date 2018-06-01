<?php $title = htmlspecialchars($chapter['title']); ?>

<?php ob_start(); ?>

<div id="header_chapter">
    <div id="title_box">
        <h1>Billet simple pour l'Alaska</h1>
        <h2>Jean Forteroche</h2>
    </div>
</div>
<p><a href="index.php">Retour à la liste des chapîtres</a></p>
<div class="only_chapter">
            <h3>
                <?= htmlspecialchars($chapter['title']); ?>
                <br/><em>publié le <?= $chapter['publication_date_fr']; ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($chapter['content']));?>
            </p>
</div>

<h4>Vos commentaires :</h4>

<?php
while ($comment = $comments->fetch()){
?>
<div class="comment">
    <p>
        <em>Posté par : <?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?></em><br/>
        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    </p>
</div>
<?php
}
?>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>