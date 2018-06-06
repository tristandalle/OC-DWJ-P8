<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box">
        <h1>MODE ADMIN</h1>
        <h2>Espace Modérateur</h2>
    </div>
</div>

<a href="index.php" class="#">Quitter la page Admin</a>

<p>Voici la liste des commentaires signalés :</p>
<?php
while ($signaledComment = $signaledComments->fetch()){
?>
<div class="signaled_comments">
    <form action="index.php?action=updateComment&amp;id=<?= $signaledComment['id'] ?>" method="post">
    <p>
        <em>Posté par : <?= $signaledComment['author'] ?> le <?= $signaledComment['comment_date_fr'] ?></em><br/>
        <?= nl2br(htmlspecialchars($signaledComment['comment'])) ?>
    </p>
        <input type="submit" id="validate" name="choice" value="Valider ce commentaire"/>
        <input type="submit" id="delete" name="choice" value="Supprimer ce commentaire"/>
    </form>
    
    
</div>
<?php
}
?>
 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

