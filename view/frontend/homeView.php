<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div id="header">
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
</div>


<p>Derniers chapîtres publiés :</p>
 
<div class="chapters_container">
    <?php
    while ($data = $chapters->fetch())
    {
    ?>

        <div class="chapter">
            <h3>
                <?= $data['title']; ?>
                <br/><em>publié le <?= $data['publication_date_fr']; ?></em>
            </h3>

            <p>
                <?= nl2br($data['content']);?>
                <br />
                <em><a href="index.php?action=chapter&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>

    <?php
    }

    $chapters->closeCursor();
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

