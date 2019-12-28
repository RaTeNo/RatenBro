(function() 
{

	tinymce.PluginManager.requireLangPack('urlspan');

	tinymce.create('tinymce.plugins.UrlspanPlugin', 
		{
			init : function(ed, url) 
			{
				ed.addCommand('mceUrlspan', 
					function() 
					{
						var content = tinyMCE.activeEditor.selection.getContent({format : 'raw'});
						var href = jQuery.trim(prompt("Введите адрес, куда нужно ссылатся"));
						if(href != '' && content != '')  {
							ed.execCommand('mceInsertContent', 0, '[urlspan]<a href="'+href+'">'+content+'</a>[/urlspan]');
						}

					}
				);
				
				ed.addButton('urlspan', 
					{
						title : 'Urlspan',
						cmd : 'mceUrlspan',
						image : url + '/link.png'
					}
				);
				
				
			},
		
			createControl : function(n, cm) 
			{
				return null;
			},

			getInfo : function() 
			{
				return {
					longname : 'UrlSpan plugin',
					author : 'Сергей',
					authorurl : 'http://irinazaytseva.ru',
					infourl : 'http://irinazaytseva.ru',
					version : "1.0"
				};
			}
		});

	// Register plugin
	tinymce.PluginManager.add('urlspan', tinymce.plugins.UrlspanPlugin);
})();