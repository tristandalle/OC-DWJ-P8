<?php $title = 'Mettre à jour'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box">
        <h1>MODE ADMIN</h1>
        <h2>Espace Mettre à jour</h2>
    </div>
</div>

<a href="index.php" class="#">Quitter la page Admin</a>
<h4>Mettre à jour un chapître :</h4>
<div class="post_chapter">
    <form action="index.php?action=rewriteChapter&amp;id=<?= $chapter['id'] ?>" method="post">
        <div>
            <label for="title">Titre du chapître</label><br/>
            <input type="text" id="title" name="title" value="<?= $chapter['title'] ?>"/>
        </div>
        <div>
            <label for="image">Image du chapître</label><br/>
            <input type="text" id="image" name="image" value="<?= $chapter['chapter_image'] ?>"/>
        </div>
        <div>
            <label for="content">Texte du chapître</label><br/>
            <textarea id="content" name="content" ><?= $chapter['content'] ?></textarea>
        </div>
        <div>
            <label for="resume">Résumé du chapître</label><br/>
            <textarea id="resume" name="resume"><?= $chapter['chapter_resume'] ?></textarea>
        </div>
        <div>
            <input id="submit" type="submit" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>