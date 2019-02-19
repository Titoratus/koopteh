(function() {
    tinymce.PluginManager.add('wpse_141344_tinymce_button', function( editor, url ) {
        editor.addButton( 'wpse_141344_tinymce_button', {
            // image : 'url/to/an/icon', // optional
            text : 'Hi',
            title : 'Hi',
            onclick: function() {
                editor.insertContent('Hello I\'m <B>Mark</b>!');
            }

        });
    });
})();