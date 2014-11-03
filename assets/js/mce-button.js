// magic code to add a tinymce dropdown for shortcodes in Monolith.

(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'Shortcodes',
			icon: false,
			type: 'menubutton',
			menu: [
				
				//new shiz
				{
					text: 'Childpages',
					menu: [
						
						// start childpages list 
						{
							text: 'List',
							onclick: function() {
								editor.insertContent( '[childpages layout="list"]');
							}
						},						

						// start childpages snippet 
						{
							text: 'Snippet',
							onclick: function() {
								editor.insertContent( '[childpages layout="snippet"]');
							}
						},						

						// start childpages accordion 
						{
							text: 'Accordion',
							onclick: function() {
								editor.insertContent( '[childpages layout="accordion"]');
							}
						},						

						// start childpages tabs 
						{
							text: 'Tabs',
							onclick: function() {
								editor.insertContent( '[childpages layout="tabs"]');
							}
						},						

						
						//start childpages block grid modal
						{
							text: 'Block Grid',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Block Grid Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textboxSize',
											label: 'Size',
											value: ''
										},
										{
											type: 'textbox',
											name: 'textboxClasses',
											label: 'Classes',
											value: '',
											multiline: true,
											minWidth: 300,
											minHeight: 100
										},										
									],
									onsubmit: function( e ) {
										editor.insertContent( '[childpage size="' + e.data.textboxSize + '" classes="' + e.data.textboxClasses + '" layout="block-grid"]');
									}
								});
							}
						},
						
					]
				},

				//Button Shortcode
				{
					text: 'Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Insert Button Shortcode',
							body: [
								{
									type: 'textbox',
									name: 'textboxUrl',
									label: 'URL',
									value: 'http://',
									placeholder: 'fuck',
									multiline: true,
									minWidth: 400,
								},
								{
									type: 'textbox',
									name: 'textboxType',
									label: 'Type',
									value: '',
									multiline: true,
									minWidth: 400,
								},
								{
									type: 'textbox',
									name: 'textboxSize',
									label: 'Size',
									value: '',
									multiline: true,
									minWidth: 400,
								},
								{
									type: 'textbox',
									name: 'textboxText',
									label: 'Button Text',
									value: '',
									multiline: true,
									minWidth: 400,
									minHeight: 100,
								},
							],
							onsubmit: function( e ) {
								editor.insertContent( '[button text="' + e.data.textboxText + '" URL="' + e.data.textboxUrl + '" Type="' + e.data.textboxType + '" Size="' + e.data.textboxSize + '"]');
							}
						});
					}
				},

				// Intro shortcode
				{
					text: 'Intro',
						onclick: function() {
							editor.windowManager.open( {
								title: 'Insert Block Grid Shortcode',
								body: [
									{
										type: 'textbox',
										name: 'textboxIntro',
										label: 'Intro Text',
										value: '',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									},										
								],
								onsubmit: function( e ) {
									editor.insertContent( '[intro]' + e.data.textboxIntro + '[/intro]');
								}
							});
						}
				},						


				//Blockquote Shortcode
				{
					text: 'Blockquote',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Insert Blockquote',
							body: [
								{
									type: 'textbox',
									name: 'textboxQuote',
									label: 'Quote',
									value: '',
									multiline: true,
									minWidth: 400,
									minHeight: 200,
								},
								{
									type: 'textbox',
									name: 'textboxCite',
									label: 'Cite',
									value: '',
									multiline: true,
									minWidth: 400,
								},
							],
							onsubmit: function( e ) {
								editor.insertContent( '[blockquote cite="' + e.data.textboxCite + '" ]' + e.data.textboxQuote + '[/blockquote]');
							}
						});
					}
				},
				
			]
		});
	});
})();