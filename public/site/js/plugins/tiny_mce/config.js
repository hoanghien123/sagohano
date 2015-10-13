function writeCookie(name, value, days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires=" + date.toGMTString();
            }else{
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var i, c, ca, nameEQ = name + "=";
    ca = document.cookie.split(';');
    for(i=0;i < ca.length;i++) {
        c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1,c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length,c.length);
        }
    }
    return '';
}

function openKCFinder(field_name, url, type, win) {
	tinyMCE.activeEditor.windowManager.open({
		file: readCookie('sessionPath')+'/public/plugin/kcfinder/browse.php?opener=tinymce&cms=codeigniter&lang=vi&type=' + type,
		title: 'File Manage',
		width: 700,
		height: 500,
		resizable: "yes",
		inline: true,
		close_previous: "no",
		popup_css: false
	}, {
		window: win,
		input: field_name
	});
	return false;
}
