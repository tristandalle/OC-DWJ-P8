<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<header id="header">
    <div id="title_box">
        <h1>Billet simple pour l'Alaska</h1>
        <h2>Jean Forteroche</h2>
    </div>
    <div id="admin_link">
        <a href="#">Admin</a>
        <form action="index.php?action=accessAdmin" method="post">
            <label for="mot_de_passe">Mot de passe </label><input type="password" name="mot_de_passe" />
            <input type="submit" value="Valider" />
        </form>
    </div>
</header>

<div id="intro">
<p><strong>Bonjour et bienvenue dans mon roman, "Billet simple pour l'Alaska"</strong><br/>
Phasellus eros sapien, pellentesque non convallis eget, faucibus eget libero. Cras eu lacus et mi eleifend suscipit. Curabitur quis sapien turpis. Sed mattis magna non lorem egestas, nec efficitur ex semper. Sed iaculis sapien a augue ultrices, eu vulputate metus euismod. Maecenas gravida orci ac neque ultricies pellentesque. Nam vel mauris at tellus euismod sagittis. Aenean vel dui nec sem rhoncus tristique a eu magna. Nunc sit amet sem sodales libero tempus rutrum a eu ipsum. </p>
</div>


<p><strong>Derniers chapîtres publiés :</strong></p>


    <div class="chapters_container">
        <?php
        while ($data = $chapters->fetch())
        {
        ?>
            
            <div class="chapter">
                <a href="index.php?action=chapter&amp;id=<?= $data['id'] ?>">
                <h3>
                    <?= $data['title']; ?>
                    <br/><em>publié le <?= $data['publication_date_fr']; ?></em>
                </h3>
                <div class="image_text">
                    <img src="<?= $data['chapter_image']; ?>">
                    <p>
                        <?= nl2br($data['content']);?>                        
                    </p>
                </div>
                </a>
            </div>


    <?php
    }

    $chapters->closeCursor();
    ?>
</div>

<footer>
    <p>pied de page</p>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

