<?php
namespace conf
{
	class db
	{
		static function dbw($bid)
		{
			$srvs_w=array("127.0.0.1");
			$srvs=count($srvs_w);
			return $srvs_w[$bid % $srvs];
		}
		
		static function dbr($bid)
		{
			$srvs_r=array("127.0.0.1");
			$srvs=count($srvs_r);
			return $srvs_r[$bid % $srvs];
		}
		const dbpasswd="wsadhjk";
		const dbname="gtr";
		const dbuser="root";
	}
	
	class cache
	{
		static function cacheGRP()
		{
			$srvs=array(array("address"=>"127.0.0.1","port"=>"11211"));
			return $srvs;
		}
	}
	
	class keys
	{
		const APP_PREFIX="gtr_";
		
		const GLOBAL_BALANCE_COUNTER="bcounter";
		
		const SESSION_ASSIGNED_SRV="bassgined";
	}
}