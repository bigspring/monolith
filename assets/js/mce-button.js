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
								editor.windowManager.open( {
									title: 'Insert Childpages List Shortcode',
									minWidth: 300,
									body: [
										{
											type: 'listbox',
											name: 'listboxListTypes',
											label: 'List Type',
											'values': [
												{text: 'Unstyled', value: 'no-bullet'},
												{text: 'Inline', value: 'inline-list'},
												{text: 'Chevron', value: 'chevron'}	,									
												{text: 'Circle', value: 'circle'},
												{text: 'Disc', value: 'disc'},
												{text: 'Square', value: 'square'},
												{text: 'Caret', value: 'caret'},											
												{text: 'Tick', value: 'tick'}											
											]
										},	
									],
									onsubmit: function( e ) {
										editor.insertContent( '[childpages layout="list" class="' + e.data.listboxListTypes + '"]');
									}
								});
							}
						},						

						
						// start childpages snippet 
						{
							text: 'Snippet',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Snippet Shortcode',
									minWidth: 300,

									body: [

										{
											type: 'checkbox',
											name: 'checkboxExcerpt',
											label: 'Include Excerpt?',
                      checked: 'true'
										},	

										{
											type: 'checkbox',
											name: 'checkboxReadMore',
											label: 'Include Readmore Link?',
                                            checked: 'true'
										},
									],
									onsubmit: function( e ) {
										editor.insertContent( '[childpages layout="snippets" excerpt="'+ e.data.checkboxExcerpt+'" readmore="'+ e.data.checkboxReadMore+'"]');
									}
								});
							}
						},
						
											

						// start childpages accordion 
						{
							text: 'Accordion',
							minWidth: 300,
							onclick: function() {
								editor.insertContent( '[childpages layout="accordion"]');
							}
						},						

						// start childpages tabs 
						{
							text: 'Tabs',
							minWidth: 300,
							onclick: function() {
								editor.insertContent( '[childpages layout="tabs"]');
							}
						},						
						
						//start childpages block grid modal
						{
							text: 'Block Grid',
							minWidth: 300,
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Block Grid Shortcode',
									body: [
										
										{
											type: 'listbox',
											name: 'listboxSizeSmall',
											label: 'Mobile',
											'values': [
												{text: 'One', value: 'small-block-grid-1'},
												{text: 'Two', value: 'small-block-grid-2'},									
												{text: 'Three', value: 'small-block-grid-3'},
												{text: 'Four', value: 'small-block-grid-4'}											
											]
										},	
										
										{
											type: 'listbox',
											name: 'listboxSizeMedium',
											label: 'Tablet',
											'values': [
												{text: 'One', value: 'medium-block-grid-1'},
												{text: 'Two', value: 'medium-block-grid-2'}	,									
												{text: 'Three', value: 'medium-block-grid-3'},
												{text: 'Four', value: 'medium-block-grid-4'}											
											]
										},	
										
										{
											type: 'listbox',
											name: 'listboxSizeLarge',
											label: 'Desktop',
											'values': [
												{text: 'One', value: 'large-block-grid-1'},
												{text: 'Two', value: 'large-block-grid-2'}	,									
												{text: 'Three', value: 'large-block-grid-3'},
												{text: 'Four', value: 'large-block-grid-4'}											
											]
										},	
	
										{
											type: 'checkbox',
											name: 'checkboxImage',
											label: 'Include Image?',
                      checked: 'true'
										},	

										{
											type: 'checkbox',
											name: 'checkboxTitle',
											label: 'Include Title?',
                      checked: 'true'
										},	


										{
											type: 'checkbox',
											name: 'checkboxExcerpt',
											label: 'Include Excerpt?',
                      checked: 'true'
										},	

										{
											type: 'checkbox',
											name: 'checkboxReadMore',
											label: 'Include Readmore Link?',
                      checked: 'true'
										},
                    {
                        type: 'checkbox',
                        name: 'checkboxThumbnail',
                        label: 'Include Border on Image?',
                        checked: 'true'
                    }
									],
									onsubmit: function( e ) {
										editor.insertContent( '[childpages size="' + e.data.listboxSizeSmall + ' ' + e.data.listboxSizeMedium + ' ' + e.data.listboxSizeLarge + '" layout="block-grid" image="'+ e.data.checkboxImage+'" title="'+ e.data.checkboxTitle+'" excerpt="'+ e.data.checkboxExcerpt+'" readmore="'+ e.data.checkboxReadMore+'" image_border="'+ e.data.checkboxThumbnail+'"]');
									}
								});
							}
						}
					]
				},

				//Button Shortcode
				{
					text: 'Button',
					minWidth: 300,
					onclick: function() {
						editor.windowManager.open( {
							title: 'Insert Button Shortcode',
							body: [
								{
									type: 'textbox',
									name: 'textboxUrl',
									label: 'URL',
									value: 'http://',
									multiline: true,
									minWidth: 400,
								},
																
								{
									type: 'listbox',
									name: 'listboxType',
									label: 'Type',
									'values': [
										{text: 'Primary', value: 'primary'},
										{text: 'Secondary', value: 'secondary'}	,									
										{text: 'Success', value: 'success'},
										{text: 'Alert', value: 'alert'},
										{text: 'Warning', value: 'info'},
										{text: 'Info', value: 'warning'}
										
									]
								},	
								
								{
									type: 'listbox',
									name: 'listboxSize',
									label: 'Size',
									'values': [
										{text: 'Tiny', value: 'tiny'},
										{text: 'Small', value: 'small'}	,									
										{text: 'Medium', value: 'medium'},
										{text: 'Large', value: 'large'}									
									]
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
								editor.insertContent( '[button text="' + e.data.textboxText + '" URL="' + e.data.textboxUrl + '" Type="' + e.data.listboxType + '" Size="' + e.data.listboxSize + '"]');
							}
						});
					}
				},

				// Intro shortcode
				{
					text: 'Intro',
						onclick: function() {
							editor.windowManager.open( {
								title: 'Insert intro Shortcode',
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

				// Pages shortcode
				{
					text: 'Pages',
						onclick: function() {
							editor.windowManager.open( {
								title: 'Insert pages Shortcode',
								body: [
									{
										type: 'textbox',
										name: 'textboxIds',
										label: 'Page IDs',
										value: '',
										minWidth: 300,
									},										
								],
								onsubmit: function( e ) {
									editor.insertContent( '[pages ids="' + e.data.textboxIds + '"]');
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