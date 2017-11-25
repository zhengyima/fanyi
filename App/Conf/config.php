<?php
return array(
    //'配置项'=>'配置值'
    //开启应用分组
    'APP_GROUP_LIST' => 'Index',
    'DEFAULT_GROUP' => 'Index',

    //配置数据库
    'DB_TYPE'   => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_USER' => 'root',
    'DB_PWD' => '123456zyd',
    'DB_NAME' => 'trans_caption',
    'DB_PORT' => '3306',
    'DB_PREFIX' => '',
    //数据字段验证

    'DB_FIELDTYPE_CHECK' => true,
    /*点语法默认解析
    'TMPL_VAR_IDENTIFY' => 'array',*/
    'TMPL_FILE_DEPR' => '_',

    //调试工具
    //'SHOW_PAGE_TRACE' => true,

    //url模式：0：普通模式（默认） 1：pathinfo模式 2：rewrite模式 3：兼容模式
    'URL_MODEL' => 1,

    //变量过滤
    'VAR_FILTERS'=>'htmlspecialchars',

    //URL伪静态
    'URL_HTML_SUFFIX'=>'html',

    //URL不区分大小写
    'URL_CASE_INSENSITIVE' =>true,
 	'LOG_RECORD' => true, // 开启日志记录
 	'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR,WARN,DEBUG,SQL',
);
?>
