<?php
class dboperator
{
	private static $me=null;
	
	const WRITE_MODE=0;
	const READ_MODE=1;
	
	private $opr_w=null;
	private $opr_r=null;
	
	private function __construct()
	{
	}
	
	static function getInstance()
	{
		if(self::$me==null)
		{
			self::$me=new dboperator();
		}
		return self::$me;
	}
	
	function getOperator($mode=0,$srv)
	{
		switch($mode)
		{
			case self::WRITE_MODE:
				if(is_null($this->opr_w))
				{
					$this->opr_w=new clsTbsSql($srv,\conf\db::dbuser,\conf\db::dbpasswd,\conf\db::dbname);
				}
			    return 	$this->opr_w;
				break;
			
			case self::READ_MODE:
				if(is_null($this->opr_r))
				{
					$this->opr_r=new clsTbsSql($srv,\conf\db::dbuser,\conf\db::dbpasswd,\conf\db::dbname);
				}
				return 	$this->opr_r;
				break;
		}
	}
}