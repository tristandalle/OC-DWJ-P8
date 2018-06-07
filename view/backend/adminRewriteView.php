<?php $title = 'Mettre à jour'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
        <h2>Espace Mettre à jour</h2>
    </div>
</div>



<div class="post_chapter">
    <h4>Mettre à jour un chapître :</h4>
    <form action="index.php?action=rewriteChapter&amp;id=<?= $chapter['id'] ?>" method="post">
        <p>
            <label for="title">Titre du chapître</label><br/>
            <input type="text" id="title" name="title" value="<?= $chapter['title'] ?>"/>
        </p>
        <p>
            <label for="image">Image du chapître</label><br/>
            <input type="text" id="image" name="image" value="<?= $chapter['chapter_image'] ?>"/>
        </p>
        <p id="content_text_area">
            <label for="content">Texte du chapître</label><br/>
            <textarea id="content" name="content" ><?= $chapter['content'] ?></textarea>
        </p>
        <p id="resume_text_area">
            <label for="resume">Résumé du chapître</label><br/>
            <textarea id="resume" name="resume"><?= $chapter['chapter_resume'] ?></textarea>
        </p>
        <p>
            <input id="submit" type="submit" />
        </p>
    </form>
</div>

<div class="admin_mode">
<a class="admin_button" href="index.php" class="#">Quitter la page Admin</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>