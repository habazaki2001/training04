/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
config.toolbar = [
  ['Format','FontSize']
  ,['TextColor','BGColor','-','Bold','Italic','Underline','Strike','-','Link','Unlink','-','RemoveFormat']
  ,'/'
  ,['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Table','Image','HorizontalRule','Nbsp']
  ,['Cut','Copy','Paste','PasteText','-','Undo','Redo']
  ,['Source','-','Maximize']
];
  config.extraPlugins = 'wordcount';
  
  config.skin = "kama";
	// Se the most common block elements.
	config.format_tags = 'p;h3;h4;h5;div';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';
  
  config.coreStyles_bold =
    {
        element : 'span',
        attributes : { 'style' : 'font-weight: bold;' }
    };
  config.allowedContent = true;
  config.templates_replaceContent = 0;
  config.wordcount = {
    showCharCount: true,
    showWordCount: false
  };
};
