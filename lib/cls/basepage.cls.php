<?php

class basepage
{
	public $pgTitle="";
	public $pgKeyWords="";
	public $pgDescription="";
	
	private $tbs=null;
	private $dbopr=bull;
	private $tplpath=null;
	
	function __construct($template)
	{
		$this->tplpath=__TEMPLATE_ROOT__.$template;
		$this->tbs=new clsTinyButStrong();
		$this->tbs->MethodsAllowed=true;
		$this->tbs->ObjectRef["BP"]=$this;
	}
	
	function addExtraObjectRef($ObjectArray)
	{
		foreach ($ObjectArray as $k=>$v)
		{
			$this->tbs->ObjectRef[$k]=$v;
		}
	}
	
	function getDBContext($mode=\dboperator::READ_MODE)
	{
		$bid=\loadbalance::getBalanceID();
		$opr=false;
		$db=dboperator::getInstance();
		$assigned_srv=\conf\db::dbr($bid);
		if($mode==\dboperator::WRITE_MODE)
		{
			$assigned_srv=\conf\db::dbw($bid);
		}
		return $db->getOperator($mode,$assigned_srv);
		
	}
	
	function toPage()
	{
		$this->tbs->LoadTemplate($this->tplpath,__CHARTSET__);
		$this->tbs->Show();
	}
	
	function toText()
	{
		$this->tbs->LoadTemplate($this->tplpath,__CHARTSET__);
		$this->tbs->Show(TBS_NOTHING);
		return $this->tbs->Source;
	}
	
	function ping()
	{
		echo 'pong';
	}
}