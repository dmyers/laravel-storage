<?php

return array(
	
	/*
	|--------------------------------------------------------------------------
	| Default
	|--------------------------------------------------------------------------
	|
	| Which adapter should be the default.
	|
	*/
	
	'default' => 'Local',
	
	/*
	|--------------------------------------------------------------------------
	| AmazonS3
	|--------------------------------------------------------------------------
	|
	| Authentication for Amazon S3 calls.
	|
	*/
	
	'amazons3' => array(
		'key'    => '',
		'secret' => '',
		'region' => 'us-east-1',
		'bucket' => '',
		'acl'    => 'public-read',
	),
	
	/*
	|--------------------------------------------------------------------------
	| Local
	|--------------------------------------------------------------------------
	|
	| Local path to store files.
	|
	*/
	
	'local' => array(
		'path' => public_path('files'),
		'url'  => url('files'),
	),
	
	/*
	|--------------------------------------------------------------------------
	| Route Path
	|--------------------------------------------------------------------------
	|
	| Sets up a route at the path specified.
	|
	*/
	'route_path' => false,
	
	/*
	|--------------------------------------------------------------------------
	| Temporary Path
	|--------------------------------------------------------------------------
	|
	| The path that is used temporarily to download remote files.
	|
	*/
	'tmp_path' => storage_path('tmp'),
	
);
