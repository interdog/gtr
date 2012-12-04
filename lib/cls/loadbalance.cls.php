<?php
class loadbalance
{
	static function getBalanceID()
	{
		if(isset($_SESSION[\conf\keys::SESSION_ASSIGNED_SRV]))
		{
			return $_SESSION[\conf\keys::SESSION_ASSIGNED_SRV];
		}
		$cache=\mcache::getInstance();
		$val=$cache->getVal(\conf\keys::GLOBAL_BALANCE_COUNTER);
		if($val)
		{
			$val++;
		}
		else
		{
			$val=1;
		}
		$_SESSION[\conf\keys::SESSION_ASSIGNED_SRV]=$val;
		$cache->setVal(\conf\keys::GLOBAL_BALANCE_COUNTER,$val);
		return $val;
	}
}