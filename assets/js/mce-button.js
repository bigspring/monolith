// magic code to add a tinymce dropdown for shortcodes in WP post editor
// thanks to http://www.wpexplorer.com/wordpress-tinymce-tweaks/ for the help!

(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'Shortcodes',
			icon: false,
			type: 'menubutton',
			menu: [

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
				}, // end block quote

				//Button Shortcode
				// ====================================
				{
					text: 'Button',
					minWidth: 300,
					onclick: function() {
						editor.windowManager.open( {
							title: 'Insert Button Shortcode',
							body: [

								// button text
								{
									type: 'textbox',
									name: 'textboxText',
									label: 'Button Text',
									value: 'Learn More',
									multiline: false,
									minWidth: 400
								},

								// button URL
								{
									type: 'textbox',
									name: 'textboxUrl',
									label: 'URL',
									value: 'http://',
									multiline: false,
									minWidth: 400,
								},

								{
									type: 'listbox',
									name: 'listboxType',
									label: 'Type',
									'values': [
										{text: 'Default', value: ''},
										{text: 'Primary', value: 'primary'},
										{text: 'Secondary', value: 'secondary'}	,
										{text: 'Success', value: 'success'},
										{text: 'Alert', value: 'alert'}
									]
								},

								{
									type: 'listbox',
									name: 'listboxSize',
									label: 'Size',
									'values': [
										{text: 'Default', value: ''},
										{text: 'Tiny', value: 'tiny'},
										{text: 'Small', value: 'small'}	,
										{text: 'Medium', value: 'medium'},
										{text: 'Large', value: 'large'},
										{text: 'Expand', value: 'expand'}
									]
								},



							],
							onsubmit: function( e ) {
								editor.insertContent( '[button text="' + e.data.textboxText + '" URL="' + e.data.textboxUrl + '" Type="' + e.data.listboxType + '" Size="' + e.data.listboxSize + '"]');
							}
						});
					}
				},


				//new shiz
				{
					text: 'Child Pages',
					menu: [

						// Accordions
						// ====================================
						{
							text: 'Accordion',
							minWidth: 300,
							onclick: function() {
								editor.insertContent( '[childpages layout="accordion"]');
							}
						},

						// Grid
						// ====================================
						{
							text: 'Grid',
							minWidth: 300,
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Block Grid Shortcode',
									body: [

										{
											type: 'listbox',
											name: 'listboxSizeSmall',
											label: 'Mobile',
											value: 'small-block-grid-1',
											'values': [
												{text: '1 column', value: 'small-block-grid-1'},
												{text: '2 columns', value: 'small-block-grid-2'},
												{text: '3 columns', value: 'small-block-grid-3'},
												{text: '4 columns', value: 'small-block-grid-4'}
											]
										},

										{
											type: 'listbox',
											name: 'listboxSizeMedium',
											label: 'Tablet',
											value: 'medium-block-grid-2',
											'values': [
												{text: '1 column', value: 'medium-block-grid-1'},
												{text: '2 columns', value: 'medium-block-grid-2'}	,
												{text: '3 columns', value: 'medium-block-grid-3'},
												{text: '4 columns', value: 'medium-block-grid-4'}
											]
										},

										{
											type: 'listbox',
											name: 'listboxSizeLarge',
											label: 'Desktop',
											value: 'large-block-grid-2', // pre-select the value
											'values': [
												{text: '1 column', value: 'large-block-grid-1'},
												{text: '2 columns', value: 'large-block-grid-2'},
												{text: '3 columns', value: 'large-block-grid-3'},
												{text: '4 columns', value: 'large-block-grid-4'}
											]
										},

										{
											type: 'listbox',
											name: 'listboxOrder',
											label: 'Ordering',
											value: 'menu_order', // pre-select the value
											'values': [
												{text: 'Title', value: 'title'},
												{text: 'Menu Order', value: 'menu_order'},
												{text: 'Date', value: 'date'},
												{text: 'Random', value: 'rand'}
											]
										},

										{
											type: 'checkbox',
											name: 'checkboxImage',
											label: 'Featured Image',
                      checked: true
										},

                    {
                        type: 'checkbox',
                        name: 'checkboxThumbnail',
                        label: 'Image border',
                        checked: false
                    },

										{
											type: 'checkbox',
											name: 'checkboxTitle',
											label: 'Page Title',
                      checked: false
										},

										{
											type: 'checkbox',
											name: 'checkboxLinkTitle',
											label: 'Link Title',
                      checked: false
										},


										{
											type: 'checkbox',
											name: 'checkboxExcerpt',
											label: 'Page Summary',
                      checked: false
										},

										{
											type: 'checkbox',
											name: 'checkboxReadMore',
											label: '"Read More" link',
                      checked: false
										}
									],
									onsubmit: function( e ) {
										editor.insertContent( '[childpages size="' + e.data.listboxSizeSmall + ' ' + e.data.listboxSizeMedium + ' ' + e.data.listboxSizeLarge + '" layout="block-grid" image="'+ e.data.checkboxImage+'" title="'+ e.data.checkboxTitle+'" titlelink="'+ e.data.checkboxLinkTitle+'" excerpt="'+ e.data.checkboxExcerpt+'" readmore="'+ e.data.checkboxReadMore+'" image_border="'+ e.data.checkboxThumbnail+'" orderby="'+ e.data.listboxOrder+'"]');
									}
								});
							}
						}, // end grid list

						// List
						// ====================================
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
												{text: 'Default', value: 'disc'},
												{text: 'Unstyled', value: 'no-bullet'},
												{text: 'Inline', value: 'inline-list'},
												{text: 'Chevrons', value: 'chevron'}	,
												{text: 'Circles', value: 'circle'},
												{text: 'Squares', value: 'square'},
												{text: 'Carets', value: 'caret'},
												{text: 'Ticks', value: 'tick'}
											]
										},

										{
											type: 'listbox',
											name: 'listboxOrder',
											label: 'Ordering',
											value: 'menu_order', // pre-select the value
											'values': [
												{text: 'Title', value: 'title'},
												{text: 'Menu Order', value: 'menu_order'},
												{text: 'Date', value: 'date'},
												{text: 'Random', value: 'rand'}
											]
										},


									],
									onsubmit: function( e ) {
										editor.insertContent( '[childpages layout="list" class="' + e.data.listboxListTypes + '" orderby="'+ e.data.listboxOrder+'"]');
									}
								});
							}
						},


						// Snippets
						// ====================================
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

										{
											type: 'listbox',
											name: 'listboxOrder',
											label: 'Ordering',
											value: 'menu_order', // pre-select the value
											'values': [
												{text: 'Title', value: 'title'},
												{text: 'Menu Order', value: 'menu_order'},
												{text: 'Date', value: 'date'},
												{text: 'Random', value: 'rand'}
											]
										},

									],
									onsubmit: function( e ) {
										editor.insertContent( '[childpages layout="snippets" excerpt="'+ e.data.checkboxExcerpt+'" orderby="'+ e.data.listboxOrder+'" readmore="'+ e.data.checkboxReadMore+'"]');
									}
								});
							}
						},


						// Tabs
						// ====================================
						{
							text: 'Tabs',
							minWidth: 300,
							onclick: function() {
								editor.insertContent( '[childpages layout="tabs"]');
							}
						}

					]
				},

				//List Shortcode
				// ====================================

				{
					text: 'List',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Insert list style',
							body: [
								{
									type: 'listbox',
									name: 'listboxListTypes',
									label: 'List Type',
									'values': [
										{text: 'Chevrons', value: 'chevron'},
										{text: 'Carets', value: 'caret'},
										{text: 'Ticks', value: 'tick'}
									]
								},
							],
							onsubmit: function( e ) {
								editor.insertContent( '[list type="' + e.data.listboxListTypes + '" ]<ul><li>List Item</li></ul>[/list]');
							}
						});
					}
				}, // end list shortcode

				// Intro shortcode
				// ====================================
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

				// Panel Shortcode
				// ====================================

				{
					text: 'Panel',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Choose panel style',
							body: [
								{
									type: 'listbox',
									name: 'listboxListTypes',
									label: 'List Type',
									'values': [
										{text: 'Default', value: ''},
										{text: 'Callout', value: 'callout'}
									]
								},
							],
							onsubmit: function( e ) {
								editor.insertContent( '[panel type="' + e.data.listboxListTypes + '" ]<p>Panel Content</p>[/panel]');
							}
						});
					}
				}, // end list shortcode

				// Text Columns
				// ====================================
				{
					text: 'Columns',
					minWidth: 300,
					onclick: function() {
						editor.insertContent( '[columns][/columns]');
					}
				}

			]

		});

	});
})();
