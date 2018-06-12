tinymce.init({
            selector: '#content',
            height: 500,
            language_url : 'public/js/fr_FR.js',   
            theme: 'modern',
            plugins: [
               'advlist autolink lists link image charmap print preview hr anchor pagebreak',
               'tinymcespellchecker']
         });
            tinymce.init({
            selector: '#resume',
            height: 200,
            language_url : 'public/js/fr_FR.js',
            theme: 'modern',
            plugins: [
               'advlist autolink lists link image charmap print preview hr anchor pagebreak',
               'tinymcespellchecker']
         });