/**
* @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = 'http://localhost/sagohano/public/plugin/ckeditor/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = 'http://localhost/sagohano/public/plugin/ckeditor/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = 'http://localhost/sagohano/public/plugin/ckeditor/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = 'http://localhost/sagohano/public/plugin/ckeditor/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = 'http://localhost/sagohano/public/plugin/ckeditor/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = 'http://localhost/sagohano/public/plugin/ckeditor/kcfinder/upload.php?type=flash';
	/*
	var base = 'http://localhost:69/CI_webtopone/public/plugin/ckeditor/';
    
	config.filebrowserBrowseUrl = base+'Filemanager-master/index.html';
    config.filebrowserImageBrowseUrl = base+'Filemanager-master/index.html?Type=Images';
    config.filebrowserFlashBrowseUrl = base+'Filemanager-master/index.html?Type=Flash';
    config.filebrowserUploadUrl = base+'Filemanager-master/connectors/ashx/filemanager.ashx?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = base+'Filemanager-master/connectors/ashx/filemanager.ashx?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = base+'Filemanager-master/connectors/ashx/filemanager.ashx?command=QuickUpload&type=Flash';
	config.autoParagraph = false;
	*/
	
};

