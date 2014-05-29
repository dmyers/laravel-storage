<?php namespace Dmyers\Storage;

class Storage
{
	protected $adapter;
	protected static $instances;
	
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
			$name = static::config('default', 'Local');
		}
		
		if (isset(static::$instances[$name])) {
			return static::$instances[$name];
		}
		
		$adapter = static::adapter($name);
		
		$instance = new static();
		$instance->setAdapter($adapter);
		
		static::$instances[$name] = $instance;
		
		return $instance;
	}
	
	public static function adapter($name)
	{
		$class = 'Dmyers\\Storage\\Adapter\\'.$name;
		
		if (!class_exists($class)) {
			throw new \InvalidArgumentException("Storage adapter {$name} does not exist.");
		}
		
		$adapter = new $class();
		
		return $adapter;
	}
}