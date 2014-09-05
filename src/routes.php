<?php

use \Dmyers\Storage\Storage;

if ($route_path = Storage::config('route_path', false)) {
	// Register storage route.
	\Route::get($route_path.'{path}', function ($path) {
		try {
			$response = Storage::render($path);
		} catch (\Exception $e) {
			\App::abort(404, 'File not found');
		}
		
		return $response;
	});
}