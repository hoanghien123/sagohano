<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// section default
$template['default']['template'] = 'default/default_template';
$template['default']['regions'] = array(
    'top',
    'menu',
    'left',
    'content',
    'right',
    'bottom'
);
$template['default']['parser'] = 'parser';
$template['default']['parser_method'] = 'parse';
$template['default']['parse_template'] = FALSE;

// section admin
$template['admin']['template'] = 'admin/template_admin';
$template['admin']['regions'] = array(
    'content'
);
$template['admin']['parser'] = 'parser';
$template['admin']['parser_method'] = 'parse';
$template['admin']['parse_template'] = FALSE;

// section site
$template['site']['template'] = 'site/template_site';
$template['site']['regions'] = array(
    'MetaDescription',
	'MetaKeywords',
	'MetaExtend',
	'content',
	'footer'
);
$template['site']['parser'] = 'parser';
$template['site']['parser_method'] = 'parse';
$template['site']['parse_template'] = FALSE;

// section site
$template['thanhvien']['template'] = 'site/template_thanhvien';
$template['thanhvien']['regions'] = array(
    'MetaDescription',
	'MetaKeywords',
	'MetaExtend',
	'content',
	'footer'
);
$template['thanhvien']['parser'] = 'parser';
$template['thanhvien']['parser_method'] = 'parse';
$template['thanhvien']['parse_template'] = FALSE;