<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box">
        <h1>Bienvenue</h1>
        <h2>Jean Forteroche</h2>
    </div>
</div>


<p><a href="index.php">Retour à la page d'accueil</a></p>
 
<h4>Publiez un nouveau chapître :</h4>
<div class="post_chapter">
    <form action="index.php?action=addChapter" method="post">
        <div>
            <label for="title">Titre du chapître</label><br/>
            <input type="text" id="title" name="title" />
        </div>
        <div>
            <label for="content">Texte du chapître</label><br/>
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input id="submit" type="submit" />
        </div>
    </form>
</div>

<h4>Moderez les commentaires :</h4>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

