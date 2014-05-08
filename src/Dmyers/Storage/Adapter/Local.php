<?php namespace Dmyers\Storage\Adapter;

class Local extends Base
{
	protected $name = 'local';
	
	public function __construct()
	{
		$path = $this->config('path');
		
		if (!\File::isDirectory($path)) {
			\File::makeDirectory($path, 0777, true);
		}
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function exists($path)
	{
		return \File::exists($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function get($path)
	{
		return \File::get($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function put($path, $contents)
	{
		return \File::put($this->computePath($path), $contents);
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function upload($path, $target)
	{
		return \File::copy($path, $this->computePath($target));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function download($path, $target)
	{
		return \File::copy($this->computePath($path), $target);
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function delete($path)
	{
		return \File::delete($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function move($path, $target)
	{
		return \File::move($this->computePath($path), $this->computePath($target));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function copy($path, $target)
	{
		return \File::copy($this->computePath($path), $this->computePath($target));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function type($path)
	{
		return \File::type($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function mime($path)
	{
		$finfo = new \Finfo(FILEINFO_MIME_TYPE);
		
		return $finfo->file($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function size($path)
	{
		return \File::size($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function lastModified($path)
	{
		return \File::move($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function isDirectory($path)
	{
		return \File::isDirectory($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function files($path)
	{
		return \File::files($this->computePath($path));
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function url($path)
	{
		return $this->config('url').'/'.$path;
	}
	
	protected function computePath($path)
	{
		$path = $this->config('path').'/'.$path;
		
		$this->ensureDirExists($path);
		
		return $path;
	}
	
	protected function ensureDirExists($path)
	{
		$parts = explode('/', $path);
		unset($parts[count($parts)-1]);
		$path = implode('/', $parts);
		
		if (!\File::isDirectory($path)) {
			\File::makeDirectory($path, 0777, true);
		}
	}
}