<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>

<nav>
    <a href="index.php"><img id="logo" src="public/images/logoJF100.png" alt="logo JF"/></a>
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
                        <p>
                            <label for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo">
                        </p>
                        <p>
                            <label for="pass">Mot de passe </label>
                            <input type="password" name="pass" />
                        </p>
                        <input id="valid_button" type="submit" value="Valider" />
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<div id="header_about">
    <img id ="img_about" src="public/images/logoJFhd.png" alt="logo JF"/>
    <h1 id="h1_about">Jean Forteroche</h1>
</div>

<div id="intro">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet semper sem. Sed venenatis volutpat odio sed malesuada. Proin ac vulputate ante. Mauris arcu diam, auctor quis vehicula cursus, tempus id orci. Sed sollicitudin condimentum faucibus. Nulla facilisi. Ut quis velit eget sapien faucibus efficitur. Morbi in mollis diam. Vivamus sed mauris et nisi vehicula commodo tincidunt at neque.
    </p>
    <p>
        Etiam nec hendrerit urna, ultricies dignissim elit. In ultrices ipsum sit amet arcu consectetur, id elementum ex commodo. Nunc faucibus lorem faucibus porttitor euismod. In at mi eget dolor scelerisque tincidunt. Ut eleifend eros in feugiat feugiat. Vivamus vitae quam at elit scelerisque tincidunt nec vitae lacus. Maecenas vestibulum leo nulla, ac auctor leo scelerisque at. Fusce a interdum augue, in interdum tellus. Donec eget vestibulum ipsum.
    </p>
    <p>
        Cras turpis ante, dignissim eu arcu vitae, viverra faucibus metus. Maecenas viverra massa ut ex vulputate, nec molestie felis convallis. Vivamus suscipit ipsum at nibh bibendum ullamcorper. Nunc volutpat ex nec urna ultricies consectetur. Aenean pharetra vel tellus vel sodales. Cras vel sollicitudin sapien, et fermentum dolor. Phasellus quam magna, fermentum ut nunc vitae, finibus ornare odio. Phasellus ac eleifend purus. Nullam eget dictum enim. Vivamus in lacus id nulla pulvinar congue. Aliquam pharetra dolor eu est accumsan dapibus. Etiam id dolor dictum, bibendum magna vel, elementum lacus. Aliquam porttitor in metus non pretium. Nam efficitur lacus ac leo semper porttitor nec porta ante.
    </p>
    <p>
        Sed scelerisque dapibus leo rutrum mattis. Quisque dui diam, venenatis vitae diam sed, malesuada semper tortor. Duis tempor condimentum fermentum. Donec nec leo sapien. Nunc id posuere tortor, sit amet congue ipsum. Proin eleifend tellus id augue vulputate vehicula. Ut erat ex, pharetra in felis sed, porttitor suscipit felis. Duis vehicula, leo at aliquet euismod, ex ante placerat magna, non pulvinar mauris lorem a ante. Curabitur malesuada pulvinar turpis nec tincidunt. Cras nec facilisis libero. Curabitur gravida ultricies lorem ut suscipit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque elit augue, maximus aliquet magna ac, sodales feugiat sapien. Donec ultrices dapibus dolor, vel tempus odio vestibulum eget.
    </p>
    <p>
        Sed convallis enim non arcu semper, a fringilla odio varius. Vivamus mi justo, accumsan in rhoncus et, imperdiet eu augue. Curabitur vehicula massa eu purus ultrices tincidunt. Donec malesuada lacus sit amet sagittis dapibus. Vivamus sit amet elit tortor. Suspendisse potenti. Vestibulum sed nisi ex. Vestibulum et vehicula mi. Fusce in nisl non lacus varius fringilla. Vivamus varius lectus sed sollicitudin volutpat. Proin id ex vel augue sollicitudin aliquam. Nullam vitae lacinia purus.
    </p>
</div>

<div id="footer">
    <div id="left_footer">
        <p>Contactez-moi :</p>
        <p>Jean Forteroche<br/>Maison d'édition JF<br/>128, rue des éditeurs<br/>75017 Paris</p>
    </div>
    <div id="center_footer">
        <a href="#center_footer"><img src="public/images/if_square-facebook_317727.png"/></a>
        <a href="#center_footer"><img src="public/images/if_square-twitter_317723.png"/></a>
        <a href="#center_footer"><img src="public/images/if_square-google-plus_317726.png"/></a>
        <a href="#center_footer"><img src="public/images/if_instagram_317738.png"/></a>
    </div>
    <div id="right_footer">
        <p>© JForteroche 2018</p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

