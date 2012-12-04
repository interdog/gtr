<?php
class mcache
{
	private static $me=null;
	private $memcache=null;
	
	const GLOBAL_MOD=0;
	const GROUP_MOD=1;
	
	
	private function __construct()
	{
		$this->memcache=new \Memcache();
		foreach (\conf\cache::cacheGRP() as $srv)
		{
			$this->memcache->addserver($srv["address"],$srv["port"]);
		}
	}
	
	public static function getInstance()
	{
		if(self::$me==null)
		{
			self::$me=new mcache();
		}
		return self::$me;
		
	}
	
	public function setVal($key,$val,$expire=0)
	{
		return $this->memcache->set($key, $val,MEMCACHE_COMPRESSED,$expire);
	}
	
	public function getVal($key)
	{
		return $this->memcache->get($key);
	}
	
	public function flush()
	{
		return $this->memcache->flush();
	}
}
