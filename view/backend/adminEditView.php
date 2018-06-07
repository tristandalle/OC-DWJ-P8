<?php $title = 'Editer'; ?>

<?php ob_start(); ?>

<div id="header_admin">
    <div id="title_box_admin">
        <h1>ADMIN</h1>
        <h2>Espace édition</h2>
    </div>
</div>



<div class="admin_mode">
    <form action="index.php?action=updateChapter" method="post">
<p class="admin_form">
    
    <label for="chapter">Choisissez un chapître : </label>
<select name="id"> 
    <?php
    
        while ($data = $chapters->fetch())
        {
        ?>
    <option value="<?= $data['id']?>"><?= $data['title']?></option> 
   
    <?php
    }
    $chapters->closeCursor();
    ?>

    <input type="submit" id="update" name="choice" value="Mettre à jour"/>
    <input type="submit" id="delete" name="choice" value="Supprimer"/>
</select>
    

</p>
</form>
</div>

<div class="admin_mode">
<a class="admin_button" href="index.php" class="#">Quitter la page Admin</a>
</div>
 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>