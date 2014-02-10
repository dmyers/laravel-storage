<?php namespace Dmyers\Storage\Adapter;

use \Dmyers\Storage\Storage;

abstract class Base
{
	protected $name;
	protected $bucket;
	
	public function getBucket()
	{
		return $this->bucket;
	}
	
	public function setBucket($bucket)
	{
		$this->bucket = $bucket;
	}
	
	protected function config($key, $default = null)
	{
		return Storage::config($this->name.'.'.$key, $default);
	}
	
	abstract public function exists($path);
	
	abstract public function get($path);
	
	abstract public function put($path, $contents);
	
	abstract public function upload($path, $target);
	
	abstract public function delete($path);
	
	abstract public function move($path, $target);
	
	abstract public function copy($path, $target);
	
	abstract public function type($path);
	
	abstract public function size($path);
	
	abstract public function lastModified($path);
	
	abstract public function isDirectory($path);
	
	abstract public function files($path);
	
	abstract public function url($path);
}