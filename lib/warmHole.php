<?php

	

	// cross-site scripting affected functions
	// parameter = 0 means, all parameters will be traced
	$NAME_XSS = 'Cross-Site Scripting';
	$XSSWarmhole = array(
		'echo', 
		'print',
		'print_r',
		'exit',
		'die',
		'printf',
		'vprintf',
		'trigger_error',
		'user_error',
		'odbc_result_all',
		'ovrimos_result_all',
		'ifx_htmltbl_result'
	);
	
	// HTTP header injections
	$NAME_HTTP_HEADER = 'HTTP Response Splitting';
    $HTTPWarmhole = array(
		'header' 
	);
	
	// session fixation
	$NAME_SESSION_FIXATION = 'Session Fixation';
    $checkSessionFixation = array(
		'setcookie' ,
		'setrawcookie' ,
		'session_id' 
	); 
	
	// code evaluating functions  => (parameters to scan, securing functions)
	// example parameter array(1,3) will trace only first and third parameter 
	$NAME_CODE = 'Code Execution';
	$CodeExecutionWarmhole = array(
		'assert',	
		'create_function', 
		'eval' ,			
		'mb_ereg_replace',
		'mb_eregi_replace',
		'preg_filter',
		'preg_replace',
		'preg_replace_callback'
	);
	
	// reflection injection
	$NAME_REFLECTION = 'Reflection Injection';
	$reflectionWarmhole = array(
		'event_buffer_new',					
		'event_set'			,			
		'iterator_apply'	,			
		'forward_static_call',			
		'forward_static_call_array',		
		'call_user_func',	
		'call_user_func_array',			
		'array_diff_uassoc'	,	
		'array_diff_ukey',	
		'array_filter',	
		'array_intersect_uassoc',	
		'array_intersect_ukey',	
		'array_map',	
		'array_reduce',	
		'array_udiff',	
		'array_udiff_assoc',	
		'array_udiff_uassoc',	
		'array_uintersect',	
		'array_uintersect_assoc',	
		'array_uintersect_uassoc',	
		'array_walk',	
		'array_walk_recursive',	
		'assert_options',	
		'ob_start',	
		'register_shutdown_function',	
		'register_tick_function',	
		'runkit_method_add',
		'runkit_method_copy',			
		'runkit_method_redefine',		
		'runkit_method_rename',		
		'runkit_function_add',	
		'runkit_function_copy',
		'runkit_function_redefine',		
		'runkit_function_rename',	
		'session_set_save_handler',	
		'set_error_handler',		
		'set_exception_handler',		
		'spl_autoload',			
		'spl_autoload_register',		
		'sqlite_create_aggregate',		
		'sqlite_create_function',		
		'stream_wrapper_register',		 
		'uasort',		
		'uksort',		
		'usort',		
		'yaml_parse',		
		'yaml_parse_file',		
		'yaml_parse_url',		
		'eio_busy',		
		'eio_chmod'	,		
		'eio_chown'	,		
		'eio_close'	,		
		'eio_custom',		
		'eio_dup2',		
		'eio_fallocate'	,		
		'eio_fchmod',		
		'eio_fchown',		
		'eio_fdatasync'	,		
		'eio_fstat'	,		
		'eio_fstatvfs'	,		
		'preg_replace_callback'	,		
		'dotnet_load'					
	);
	
	// file inclusion functions => (parameters to scan, securing functions)
	$NAME_FILE_INCLUDE = 'File Inclusion';
	$fileWarmhole = array(
		'include' 						,
		'include_once' 					,
		'parsekit_compile_file'			,
		'php_check_syntax' 				,	
		'require' 						,
		'require_once' 					, 
		'runkit_import'					,
		'set_include_path' 				,
		'virtual' 								
	);

	// file affecting functions  => (parameters to scan, securing functions)
	// file handler functions like fopen() are added as parameter 
	// for functions that use them like fread() and fwrite()
	$NAME_FILE_READ = 'File Disclosure';
	$fileDisclosureWarmhole = array(
		'bzread'				, 
		'bzflush'				, 
		'dio_read'				,   
		'eio_readdir'			,  
		'fdf_open'				, 
		'file'					, 
		'file_get_contents'		,  
		'finfo_file'			,
		'fflush'				,
		'fgetc'					,
		'fgetcsv'				,
		'fgets'					,
		'fgetss'				,
		'fread'					, 
		'fpassthru'				,
		'fscanf'				, 
		'ftok'					,
		'get_meta_tags'			, 
		'glob'					,
		'gzfile'				, 
		'gzgetc'				,
		'gzgets'				, 
		'gzgetss'				, 
		'gzread'				,  
		'gzpassthru'			, 
		'highlight_file'		,  
		'imagecreatefrompng'	, 
		'imagecreatefromjpg'	, 
		'imagecreatefromgif'	, 
		'imagecreatefromgd2'	, 
		'imagecreatefromgd2part', 
		'imagecreatefromgd'		,  
		'opendir'				,  
		'parse_ini_file' 		,	
		'php_strip_whitespace'	,	
		'readfile'				, 
		'readgzfile'			, 
		'readlink'				,		
		//'stat'				,
		'scandir'				,
		'show_source'			,
		'simplexml_load_file'	,
		'stream_get_contents'	,
		'stream_get_line'		,
		'xdiff_file_bdiff'		,
		'xdiff_file_bpatch'		,
		'xdiff_file_diff_binary',
		'xdiff_file_diff'		,
		'xdiff_file_merge3'		,
		'xdiff_file_patch_binary',
		'xdiff_file_patch'		,
		'xdiff_file_rabdiff'	,
		'yaml_parse_file'		,
		'zip_open'						
	);
	
	// file or file system affecting functions
	$NAME_FILE_AFFECT = 'File Manipulation';
	$fileManipWarmhole = array(
		'bzwrite'				,		
		'chmod'					,		
		'chgrp'					,		
		'chown'					,		
		'copy'					,		
		'dio_write'				,		
		'eio_chmod'				,		
		'eio_chown'				,		
		'eio_mkdir'				,		
		'eio_mknod'				,		
		'eio_rmdir'				,		
		'eio_write'				,		
		'eio_unlink'			,		
		'error_log'				,		
		'event_buffer_write'	,		
		'file_put_contents'		,		
		'fputcsv'				,		
		'fputs'					,		
		'fprintf'				,		
		'ftruncate'				,		
		'fwrite'				,		
		'gzwrite'				,		
		'gzputs'				,		
		'loadXML'				,		
		'mkdir'					,		
		'move_uploaded_file'	,		
		'posix_mknod'			,		
		'recode_file'			,	
		'rename'				,		
		'rmdir'					,			
		'shmop_write'			,		
		'touch'					,		
		'unlink'				,		
		'vfprintf'				,		
		'xdiff_file_bdiff'		,		
		'xdiff_file_bpatch'		,		
		'xdiff_file_diff_binary',		
		'xdiff_file_diff'		,			
		'xdiff_file_merge3'		,		
		'xdiff_file_patch_binary',		
		'xdiff_file_patch'		,		
		'xdiff_file_rabdiff'	,		
		'yaml_emit_file'
	);

	// OS Command executing functions => (parameters to scan, securing functions)
	$NAME_EXEC = 'Command Execution';
	$cmdWarmhole = array(
		'backticks'	, # transformed during parsing
		'exec',
        'eval',
		'expect_popen'					,
		'passthru'						,
		'pcntl_exec'					,
		'popen'							,
		'proc_open',	
        'ssh2_2',
		'shell_exec'					,
		'system'						,
		'mail'							, // http://esec-pentest.sogeti.com/web/using-mail-remote-code-execution
		'mb_send_mail'					,
		'w32api_invoke_function'		,
		'w32api_register_function'		,
	);

	// SQL executing functions => (parameters to scan, securing functions)
	$NAME_DATABASE = 'SQL Injection';
	$sqlWarmhole = array(
	// Abstraction Layers
		'dba_open',				
		'dba_popen',					
		'dba_insert',					
		'dba_fetch',					
		'dba_delete',					
		'dbx_query',					 
		'odbc_do',					
		'odbc_exec',					
		'odbc_execute',					
	// Vendor Specific	
		'db2_exec',						
		'db2_execute',					
		'fbsql_db_query',				
		'fbsql_query',				 
		'ibase_query',				 
		'ibase_execute',				 
		'ifx_query'	,				 
		'ifx_do',				
		'ingres_query',				
		'ingres_execute',				
		'ingres_unbuffered_query',		
		'msql_db_query',	 
		'msql_query',				
		'msql',					 
		'mssql_query',					 
		'mssql_execute',					
		'mysql_db_query',				  
		'mysql_query',				 
		'mysql_unbuffered_query',		 
		'mysqli_stmt_execute',		
		'mysqli_query',	
        'mysqli',
		'mysqli_real_query',				
		'mysqli_master_query',			
		'oci_execute',			
		'ociexecute',					
		'ovrimos_exec',					
		'ovrimos_execute',				
		'ora_do',				
		'ora_exec',					
		'pg_query',						
		'pg_send_query',					
		'pg_send_query_params',			
		'pg_send_prepare',		
		'pg_prepare',				
		'sqlite_open',					
		'sqlite_popen',					
		'sqlite_array_query',			
		'arrayQuery',			
		'singleQuery',					
		'sqlite_query',				
		'sqlite_exec',				
		'sqlite_single_query',			
		'sqlite_unbuffered_query',		
		'sybase_query',		
		'sybase_unbuffered_query'		
	);
	
	// Xpath injection
	$NAME_XPATH = 'XPath Injection';
	$xpathWarmhole = array(
		'xpath_eval'					,	
		'xpath_eval_expression'			,		
		'xptr_eval'						
	);
	
	// ldap injection
	$NAME_LDAP = 'LDAP Injection';
	$ldapWarmhole = array(
		'ldap_add'						,
		'ldap_delete'					,
		'ldap_list'						,
		'ldap_read'						,
		'ldap_search'					
	);	
		
	// connection handling functions
	$NAME_CONNECT = 'Protocol Injection';
    $protocalWarmhole = array(
		'curl_setopt'		,
		'curl_setopt_array' ,
		'cyrus_query' 		,
		'error_log'			,
		'fsockopen'			,
		'ftp_chmod' 		,
		'ftp_exec'			, 
		'ftp_delete' 		,
		'ftp_fget' 			,
		'ftp_get'			, 
		'ftp_nlist' 		, 
		'ftp_nb_fget' 		, 
		'ftp_nb_get' 		, 
		'ftp_nb_put'		, 
		'ftp_put'			, 
		'get_headers'		,
		'imap_open'			,  
		'imap_mail'			,
		'mail' 				, 
		'mb_send_mail'		, 
		'ldap_connect'		,
		'msession_connect'	,
		'pfsockopen'		,  
		'session_register'	,
		'socket_bind'		, 
		'socket_connect'	, 
		'socket_send'		,
		'socket_write'		, 
		'stream_socket_client', 
		'stream_socket_server',
		'printer_open'					
	);
	
	// other critical functions
	$NAME_OTHER = 'Possible Flow Control'; // :X
	$possibleWarmhole = array(
		'dl' 					,	
		'ereg'					, # nullbyte injection affected		
		'eregi'					, # nullbyte injection affected			
		'ini_set' 				,
		'ini_restore'			,
		'runkit_constant_redefine',
		'runkit_method_rename'	,
		'sleep'					,
		'usleep'				,
		'extract'				,
		'mb_parse_str'			,
		'parse_str'				,
		'putenv'				,
		'set_include_path'		,
		'apache_setenv'			,	
		'define'				,
		'is_a'							 // calls __autoload()
	);
	
	// property oriented programming with unserialize
	$NAME_POP = 'PHP Object Injection';
	$PhpWarmhole = array(
		'unserialize', // calls gadgets
		'yaml_parse'	 // calls unserialize
	);
	
	// XML
	//simplexml_load_string
	
	
	# interruption vulnerabilities
	# trim(), rtrim(), ltrim(), explode(), strchr(), strstr(), substr(), chunk_split(), strtok(), addcslashes(), str_repeat() htmlentities() htmlspecialchars(), unset()

?>	