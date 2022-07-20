<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ldap {
	var $username = "";
	var $password  = "";
	var $config;
	var $ds;
	
	public function __construct($param){	
		$this->username = $param['username'];
		$this->password = $param['password'];
		$this->config = $param['ldapconfig'];
		//print_r($this->config);
	}
	
	public function authen(){
		// using ldap bind
		$ldaprdn  = $this->username . $this->config['suffix']  ;
		$this->ds = ldap_connect( $this->config['server']) or  die ("Could not connect to LDAP server.");			 
    	// binding to ldap server   	
    	ldap_set_option($this->ds, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($this->ds, LDAP_OPT_REFERRALS, 0);
		
    	$result = @ldap_bind($this->ds, $ldaprdn, $this->password) ;
	 	return $result  ;
	}
	
	public function authenWithMaster(){
		// using ldap bind
		$ldaprdn  = $this->config['username'] .$this->config['suffix']  ;     // ldap rdn or dn
		 $this->ds = ldap_connect($this->config['server']) or  die ("Could not connect to LDAP server.");			 
    	// binding to ldap server	
    	ldap_set_option($this->ds, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($this->ds, LDAP_OPT_REFERRALS, 0);		
    	$result = @ldap_bind($this->ds, $ldaprdn, $this->config['password']) ;
	 	return $result  ;
	}
	
	public function getUserInfo(){
		$info=array() ;
		$attributes = array("sAMAccountName","displayName","description");
   		$filter = "(&(objectCategory=person)(sAMAccountName=$this->username))";		
		$entries = $this->searchObj($filter, $attributes);
	    
		foreach($entries as $account){
				if( !empty ($account["displayname"])){
					 $info = array( "displayname" => $account['displayname'][0] ,
					 				          "description" => $account['description'][0] ,
					 				          "accountname" => $account['samaccountname'][0] 
					 				          );
				}	
		}
		return $info;
	}
	
		
	public function searchObj( $filter,$attributes ){
		if( $this->authenWithMaster() ){
   			$result = ldap_search($this->ds, $this->config['basedn'], $filter, $attributes); 
   			$entries = ldap_get_entries($this->ds, $result);
			 return $entries;
		}
	}
	
	public  function search( ){
		if( $this->authenWithMaster() ){
			$attributes = array("sAMAccountName","displayName");
   			$filter = "(&(objectCategory=person))";
   			$result = ldap_search($this->ds, $this->config['basedn'], $filter, $attributes); 
   			$entries = ldap_get_entries($this->ds, $result);
			print_r($entries);
			}
		
		}
		
		
  
 }
