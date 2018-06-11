<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
        <h2><?=$_SESSION['pseudo']?>, sur cette page vous pouvez valider ou supprimer<br/>les commentaires qui ont été signalés</h2>
    </div>
</div>


<div class="comments_container">
<h4>Voici la liste des commentaires signalés :</h4>
<?php
while ($signaledComment = $signaledComments->fetch()){
?>
<div class="comment">
    <form action="index.php?action=updateComment&amp;id=<?= $signaledComment['id'] ?>" method="post">
    <p>
        <em>Posté par : <?= $signaledComment['author'] ?> le <?= $signaledComment['comment_date_fr'] ?></em><br/>
        <?= nl2br(htmlspecialchars($signaledComment['comment'])) ?>
    </p>
    <p>
        <input type="submit" id="validate" name="choice" value="Valider ce commentaire"/>
        <input type="submit" id="delete" name="choice" value="Supprimer ce commentaire"/>
    </p>
    </form>
    
    
</div>


<?php
}
?>
</div>
<div class="admin_mode">
<a href="index.php?action=accessHomeAdmin" class="admin_button">Revenir au menu Admin</a>
</div>
<div class="admin_mode">
<a href="index.php?action=disconnection" class="admin_button">Quitter la page Admin</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

