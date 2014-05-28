<?php namespace Dmyers\Storage\Adapter;

use \Dmyers\Storage\Storage;

abstract class Base
{
	protected $name;
	
	protected function config($key, $default = null)
	{
		return Storage::config($this->name.'.'.$key, $default);
	}
	
	/**
	 * Check if a file exists in storage.
	 *
	 * @param string $path The path to the file to check.
	 *
	 * @return bool
	 */
	abstract public function exists($path);
	
	/**
	 * Get a file's contents from storage.
	 *
	 * @param string $path The path to the file to get.
	 *
	 * @return string
	 */
	abstract public function get($path);
	
	/**
	 * Put a file into storage.
	 *
	 * @param string $path     The path to the file to store.
	 * @param string $contents The file contents to store.
	 *
	 * @return bool
	 */
	abstract public function put($path, $contents);
	
	/**
	 * Upload a file into storage.
	 *
	 * @param string $path   The path to the local file to upload.
	 * @param string $target The path to the file to store.
	 *
	 * @return bool
	 */
	abstract public function upload($path, $target);
	
	/**
	 * Download a file from storage.
	 *
	 * @param string $path   The path to the file to download.
	 * @param string $target The path to the local file to store.
	 *
	 * @return bool
	 */
	abstract public function download($path, $target);
	
	/**
	 * Delete a file from storage.
	 *
	 * @param string $path The path to the file to delete.
	 *
	 * @return bool
	 */
	abstract public function delete($path);
	
	/**
	 * Move a file in storage.
	 *
	 * @param string $path   The current path to the file to move.
	 * @param string $target The new path to the file.
	 *
	 * @return bool
	 */
	abstract public function move($path, $target);
	
	/**
	 * Copy a file in storage.
	 *
	 * @param string $path   The path to the file to copy.
	 * @param string $target The path to the file to store.
	 *
	 * @return bool
	 */
	abstract public function copy($path, $target);
	
	/**
	 * Get a file's type from storage.
	 *
	 * @param string $path The path to the file to get the type.
	 *
	 * @return string
	 */
	abstract public function type($path);
	
	/**
	 * Get a file's mime type from storage.
	 *
	 * @param string $path The path to the file to get the mime.
	 *
	 * @return string
	 */
	abstract public function mime($path);
	
	/**
	 * Get a file's size from storage.
	 *
	 * @param string $path The path to the file to get the size.
	 *
	 * @return string
	 */
	abstract public function size($path);
	
	/**
	 * Get a file's last modification date from storage.
	 *
	 * @param string $path The path to the file to get the last modified date.
	 *
	 * @return string
	 */
	abstract public function lastModified($path);
	
	/**
	 * Check if a path is a directory in storage.
	 *
	 * @param string $path The path to check.
	 *
	 * @return bool
	 */
	abstract public function isDirectory($path);
	
	/**
	 * List all files in storage.
	 *
	 * @param string $path The path to list files from.
	 *
	 * @return array
	 */
	abstract public function files($path);
	
	/**
	 * Get the full URL to a file in storage.
	 *
	 * @param string $path The path to the file to get the url.
	 *
	 * @return string
	 */
	abstract public function url($path);
	
	/**
	 * Render a file from storage to the browser.
	 *
	 * @param string $path The path to the file to render.
	 *
	 * @return Response
	 */
	public function render($path)
	{
		$file = static::get($path);
		
		$mime = static::mime($path);
		
		return \Response::make($file, 200, array(
			'Content-Type' => $mime,
		));
	}
}