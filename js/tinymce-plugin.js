(function() {
    tinymce.create("tinymce.plugins.blockquote_button_plugin", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button
            ed.addButton("col_6", {
                title : "Колоки 1/2",
                cmd : "col_6_command",
                image : url + '/../images/admin/col-6-6.png'
            });

            //add new button
            ed.addButton("col_4", {
                title : "Колоки 1/3",
                cmd : "col_4_command",
                image : url + '/../images/admin/col-4-4-4.png'
            });

            //add new button
            ed.addButton("blockquote_warning", {
                title : "Цитата с восклицательным знаком",
                cmd : "blockquote_warning_command",
                image : url + '/../images/admin/blockquote-warning-ico.png'
            });

            //add new button
            ed.addButton("blockquote_info", {
                title : "Цитата с знаком i",
                cmd : "blockquote_info_command",
                image : url + '/../images/admin/blockquote-info-ico.png'
            });

            //add new button
            ed.addButton("blockquote_danger", {
                title : "Цитата с красным крестом",
                cmd : "blockquote_danger_command",
                image : url + '/../images/admin/blockquote-danger-ico.png'
            });

            //add new button
            ed.addButton("blockquote_check", {
                title : "Цитата с галочкой",
                cmd : "blockquote_check_command",
                image : url + '/../images/admin/blockquote-check-ico.png'
            });

            //add new button
            ed.addButton("blockquote_quote", {
                title : "Цитата с кавычкой",
                cmd : "blockquote_quote_command",
                image : url + '/../images/admin/blockquote-quote-ico.png'
            });

            //add new button
            ed.addButton("spoiler_btn", {
                title : "Спойлер",
                cmd : "spoiler_btn_command",
                image : url + '/../images/admin/spoiler-ico.png'
            });

            //add new button
            ed.addButton("mask_link", {
                title : "Замаскировать ссылку",
                cmd : "mask_link_command",
                image : url + '/../images/admin/link.png'
            });


            //button functionality.
            ed.addCommand("col_6_command", function() {
                var selected_text = ed.selection.getContent({
                    'format': 'html'
                });
                if ( selected_text.length == 0 ) selected_text = 'текст';
                var return_text = "[root-col-6-start]" + selected_text + " [/root-col-6-start][root-col-6-end][/root-col-6-end]";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

            ed.addCommand("col_4_command", function() {
                var selected_text = ed.selection.getContent({
                    'format': 'html'
                });
                if ( selected_text.length == 0 ) selected_text = 'текст';
                var return_text = "[wpshop-col-4-start]" + selected_text + " [/wpshop-col-4-start][wpshop-col-4-end][/wpshop-col-4-end]";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

            ed.addCommand("blockquote_warning_command", function() {
                var selected_text = ed.selection.getContent({
                    'format': 'html'
                });
                var return_text = "<blockquote class='warning fas'>" + selected_text + "</blockquote>";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

            ed.addCommand("blockquote_info_command", function() {
                var selected_text = ed.selection.getContent({
                    'format': 'html'
                });
                var return_text = "<blockquote class='info fas'>" + selected_text + "</blockquote>";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

            ed.addCommand("blockquote_danger_command", function(ui, v) {
                var selected_text = ed.selection.getContent({format : 'html'});
                var return_text = "<blockquote class='danger fas'>" + selected_text + "</blockquote>";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

            ed.addCommand("blockquote_check_command", function(ui, v) {
                var selected_text = ed.selection.getContent({format : 'html'});
                var return_text = "<blockquote class='check fas'>" + selected_text + "</blockquote>";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

            ed.addCommand("blockquote_quote_command", function(ui, v) {
                var selected_text = ed.selection.getContent({format : 'html'});
                var return_text = "<blockquote class='quote fas'>" + selected_text + "</blockquote>";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

            ed.addCommand("mask_link_command", function(ui, v) {
                var selected_text = ed.selection.getContent({format : 'raw'});
                if ( selected_text == '' )  {
                    alert( 'Необходимо выделить текст ссылки' );
                    return;
                }

                var href = jQuery.trim( prompt("Введите адрес ссылки") );
                if ( href != '' )  {
                    ed.execCommand('mceInsertContent', 0, '[mask_link]<a href="' + href + '" target="_blank">' + selected_text + '</a>[/mask_link]');
                } else {
                    alert( 'Необходимо указать адрес ссылки' );
                    return;
                }
            });

            ed.addCommand("spoiler_btn_command", function() {

                var text = ed.selection.getContent({
                    'format': 'html'
                });
                if ( text.length === 0 ) {
                    alert( 'Выделите текст для спойлера' );
                    return;
                }

                // Ask the user to enter a URL
                var result = prompt('Введите заголовок спойлера или оставьте пустым');
                var result_title = ' title="' + result + '"';
                if (result.length === 0) {
                    // User didn't enter a URL - exit
                    result_title = '';
                }

                // Insert selected text back into editor, wrapping it in an anchor tag
                ed.execCommand('mceReplaceContent', false, '[spoiler' + result_title + ']' + text + '[/spoiler]');

            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "Extra Buttons",
                author : "WPShop.biz",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("blockquote_button_plugin", tinymce.plugins.blockquote_button_plugin);
})();
