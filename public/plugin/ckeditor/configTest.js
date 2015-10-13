/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
    // config.uiColor = '#AADC6E';

    config.filebrowserBrowseUrl = '../kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = '../kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = '../kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = '../kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = '../kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '../kcfinder/upload.php?type=flash';

//    config.filebrowserBrowseUrl = '../ckfinder/ckfinder.html';
//    config.filebrowserImageBrowseUrl = '../ckfinder/ckfinder.html?Type=Images';
//    config.filebrowserFlashBrowseUrl = '../ckfinder/ckfinder.html?Type=Flash';
//    config.filebrowserUploadUrl = '../ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Files';
//    config.filebrowserImageUploadUrl = '../ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Images';
//    config.filebrowserFlashUploadUrl = '../ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Flash';
};

