<?php 
class Locking extends AppModel {
	var $useDbConfig = 'admin_endpoints';
	var $useTable = false;
	var $actsAs = array('Endpoints.Endpoint');
	
	function lock($slug = null){
		$result = $this->callEndpoint('/c2/crons/locks/lock/'.$slug);
		if($result->body == '0'){
			return false; //another lock is running
		}else{
			return true;
		}
	}

	function unlock($slug = null){
		$result = $this->callEndpoint('/c2/crons/locks/unlock/'.$slug);
		return $result->body; 
		
	}
}