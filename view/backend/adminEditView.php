<?php $title = 'Editer'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box">
        <h1>MODE ADMIN</h1>
        <h2>Espace edition</h2>
    </div>
</div>

<a href="index.php" class="#">Quitter la page Admin</a>

<div id="edit_mode">
    <form action="index.php?action=updateChapter" method="post">
<p>
    
    <label for="chapter">Choisissez un chapître : </label>
<select name="chapters"> 
    <?php
        while ($data = $titles->fetch())
        {
        ?>
    <option value="#"><?= $data['title']?></option> 
    
    <?php
    }
    $titles->closeCursor();
    ?>
</select>
    <input type="submit" id="update" name="update" value="Mettre à jour"/>
    <input type="submit" id="delete" name="delete" value="Supprimer"/>

</p>
</form>
</div>
 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>