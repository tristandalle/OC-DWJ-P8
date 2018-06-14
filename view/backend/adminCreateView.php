<?php $title = 'Publier'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
        <h2><?=$_SESSION['pseudo']?>, sur cette page<br/>vous pouvez publier un nouveau chapitre</h2>
    </div>
</div>



<div class="post_chapter">
    <h4>Publiez un nouveau chapitre :</h4>
    <form action="index.php?action=addChapter" method="post" enctype="multipart/form-data">
        <p>
            <label for="title">Titre du chapitre</label><br/>
            <input type="text" id="title" name="title" />
        </p>
        <p>
            <label for="image">Image du chapitre (JPG, max. 5Mo)</label><br/>
            <input type="file" id="image" name="image" />
        </p>
        <p id="content_text_area">
            <label for="content">Texte du chapitre</label><br/>
            <textarea id="content" name="content"></textarea>
        </p>
        <p id="resume_text_area">
            <label for="resume">Résumé du chapitre</label><br/>
            <textarea id="resume" name="resume"></textarea>
        </p>
        <p>
            <input id="submit" type="submit" />
        </p>
    </form>
</div>

<div class="admin_mode">
<a href="index.php?action=accessHomeAdmin" class="admin_button">Revenir au menu Admin</a>
</div>
<div class="admin_mode">
<a href="index.php?action=disconnection" class="admin_button">Quitter la page Admin</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>