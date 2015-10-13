function initMCEexact(e){
  tinyMCE.init({
                 file_browser_callback: 'openKCFinder',
                 mode:"exact",
                 elements : e,
                 theme:"advanced",
                 language : "vi",
                 plugins : "paste, autolink,lists,style,layer,table,save,advhr,advimage,advlink,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                 theme_advanced_buttons1 : "bold,italic,underline,strikethrough,formatselect,fontsizeselect,|,justifyleft,justifycenter,justifyright,justifyfull,pastetext,pasteword,|,fullscreen,|,link,unlink,|,image,media,|,fullscreen",
                 theme_advanced_buttons2 : "forecolor,backcolor,bullist,numlist,underline,justifyfull,outdent,indent,sub,sup,tablecontrols,visualaid,charmap,removeformat,|,link,unlink",
                 theme_advanced_buttons3: "",
                 theme_advanced_blockformats : "h2,h3,h4,h5,div",
                 theme_advanced_font_sizes : "8pt,9pt,10pt,11pt,12pt,14pt",

                 relative_urls : false,
                 accessibility_warnings : false,
                 //accessibility_focus : false,
                         
                 paste_text_use_dialog : false,
                 paste_auto_cleanup_on_paste : true,
                 paste_remove_styles: true,
                 paste_remove_styles_if_webkit: true,
                 paste_strip_class_attributes: true,
                 paste_text_sticky : true,
                 setup : function(ed) {ed.onInit.add(function(ed) {ed.pasteAsPlainText = true;});},

                 theme_advanced_toolbar_location : "top",
                 theme_advanced_toolbar_align : "left",
                 //theme_advanced_statusbar_location : "bottom",
                 theme_advanced_resizing : true,
                 width : "100%",
                 height: "400"
             });
}
// add textarea element with id="content" to document
//initMCEexact("content");
// add textarea element with id="content2" to document
//initMCEexact("content2");
// add textarea element with id="content3" to document
//initMCEexact("content3");