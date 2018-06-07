<?php $title = $chapter['title']; ?>

<?php ob_start(); ?>

<nav>
    <a href="index.php"><img id="logo" src="public/images/logoJF100.png"/></a>
    <ul id="menu">
        <li>
            <a href="index.php">Accueil</a>
        </li>
        <li>
            <a href="#">&Agrave; propos de l'auteur</a>
        </li>
        <li>
            <a href="index.php#intro">Chapîtres</a>
            <ul>
<?php
    while ($menudata = $titles->fetch())
    {
?>
                <li>
                    <a href="index.php?action=chapter&amp;id=<?= $menudata['id'] ?>"><?= $menudata['title']; ?></a>
                </li>
<?php
}
$titles->closeCursor();
?>
            </ul>
        </li>
        <li>
            <a href="#">Admin</a>
            <ul id="ul_form">
                <li id="li_form">
                    <form action="index.php?action=accessAdmin" method="post">
                        <p><label for="mot_de_passe">Mot de passe </label></p>
                        <p><input type="password" name="mot_de_passe" /></p>
                        <p><input id="valid_button" type="submit" value="Valider" /></p>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<div id="header_chapter">
    <div id="title_box">
        <h1>Billet simple pour l'Alaska</h1>
        <h2><?= $chapter['title']; ?></h2>
    </div>
</div>
<a href="index.php#intro"><p id="text_center">Retour à la liste des chapîtres</p></a>
<div class="only_chapter">
            <h3>
                <?= $chapter['title']; ?>
                <br/><em>publié le <?= $chapter['publication_date_fr']; ?></em>
            </h3>

            <p>
                <?= $chapter['content'];?>
            </p>
</div>





<div class="comments_container">
    <h4>Vos commentaires :</h4>
<?php
while ($comment = $comments->fetch()){
?>
<div class="comment">
    <p>
        <span id="signal_comment"><a href="index.php?action=signalComment&amp;id=<?= $comment['id']?>&amp;chapterId=<?= $chapter['id'] ?>"><?= $comment['comment_signal'] ?></a></span>
        <em>Posté par : <?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?></em><br/>
        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    </p>
    
    
</div>
<?php
}
?>
</div>
<div class="post_comment">
    <h4>Postez un commentaire :</h4>
    <form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
        <p>
            <label for="author">Votre nom</label><br/>
            <input type="text" id="author" name="author" />
        </p>
        <p>
            <label for="comment">Votre commentaire</label><br/>
            <textarea id="comment" name="comment"></textarea>
        </p>
        <p>
            <input id="submit" type="submit" />
        </p>
    </form>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>