<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet" />
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=hgfv5np9htpj8kze0vkqlfnjqwhvr99sep9zw0q52s56tumu"></script>
        
    </head>
    
    <body>
        <?= $content ?>
        
        <script>
         tinymce.init({
            selector: '#content, #resume',
            language_url : 'public/js/fr_FR.js',
            height: 500,
            theme: 'modern',
            plugins: [
               'advlist autolink lists link image charmap print preview hr anchor pagebreak',
               'tinymcespellchecker']
         });
      </script>
    </body>
    
    
</html>