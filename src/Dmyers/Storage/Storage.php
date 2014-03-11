<?php namespace Dmyers\Storage;

class Storage
{
	protected $adapter;
	
	public function getAdapter()
	{
		return $this->adapter;
	}
	
	public function setAdapter($adapter)
	{
		$this->adapter = $adapter;
	}
	
	public static function __callStatic($method, $args)
	{
		$instance = static::instance();
		$adapter = $instance->getAdapter();
		
		if (!method_exists($adapter, $method)) {
			throw new \BadMethodCallException("Method {$method} does not exist.");
		}
		
		return call_user_func_array(array($adapter, $method), $args);
	}
	
	public static function config($key, $default = null)
	{
		return \Config::get('laravel-storage::'.$key, $default);
	}
	
	public static function instance($name = null)
	{
		if (empty($name)) {
			$name = static::config('storage', 'Local');
		}
		
		$adapter = 'Dmyers\\Storage\\Adapter\\'.$name;
		
		if (!class_exists($adapter)) {
			throw new \InvalidArgumentException("Storage adapter {$name} does not exist.");
		}
		
		$instance = new static();
		$adapter = new $adapter();
		$instance->setAdapter($adapter);
		
		return $instance;
	}
}