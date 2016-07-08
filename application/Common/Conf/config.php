<?php
return array(
	'TOKEN_ON'=>true,  
	'TMPL_PARSE_STRING' => array(
        '__CSS__' => './Public/CSS',
        '__IMG__' => './Public/IMG',
        '__JS__' => './Public/JS'
    ),
    'URL_MODEL' => 0,
    'developer'=>"developer",
    "developerpwd"=>'developer',
    'LOAD_EXT_CONFIG' => "dbconfig",
    "TMPL_R_DELIM" =>"}>",
    'TMPL_L_DELIM' =>  '<{',  
    'pageSize'     =>15,
    'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
    'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
);