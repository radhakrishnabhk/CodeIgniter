<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mygapicon extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			
			$_SESSION['page'] = 'gapi';
            $this->load->helper('url');
        	/*if (!$this->authentication->logged_in()) {				
				redirect(base_url() . 'users/login', 'refresh'); die();
			}*/

		}
		
		function web() {
			//redirect(base_url().'giftcard/giftcard_list/0/', 'refresh'); die();
			
			//////////////////////////////////////////////////////////////////////////////
			
			//ob_start();
				set_time_limit(0);
				
				// connect
				$m = new MongoClient();

				// select a database
				$db = $m->gapi;
				
				function insertRecord($table,$document,$db){	
					$collection = $db->$table;	
					//$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
					$collection->insert($document);						
				}
				
				$data['web'] = true;

				require 'gapi.class.php';

				define('ga_profile_id','103847264');

				$ga = new gapi("salonvanity-1228@appspot.gserviceaccount.com", "salonvanity-07572caf8c14.p12");

				$rObj1 = $ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate','percentNewSessions'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
				insertRecord('rTable1',$rObj1,$db);
				$data['janSessions'] = $ga->getSessions();
				$data['janAvgSessionDuration'] = $ga->getAvgSessionDuration();
				$data['janBounceRate'] = $ga->getBounceRate();
				$data['janPercentNewSessions'] = $ga->getPercentNewSessions();


				$rObj2 = $ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate','percentNewSessions'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
                insertRecord('rTable2',$rObj2,$db);
				$data['decSessions'] = $ga->getSessions();

				$data['perSessions'] = (float)(($data['decSessions']/$data['janSessions'])*100); 
				
				$data['decAvgSessionDuration'] = $ga->getAvgSessionDuration();
				
				$data['perAvgSessionDuration'] = (float)(($data['decAvgSessionDuration']/$data['janAvgSessionDuration'])*100);
				
				$data['decBounceRate'] = $ga->getBounceRate();
				
				$data['perBounceRate'] = (float)(($data['decBounceRate']/$data['janBounceRate'])*100);
				
				$data['decPercentNewSessions'] = $ga->getPercentNewSessions();
				
				$data['perPercentNewSessions'] = (float)(($data['decPercentNewSessions']/$data['janPercentNewSessions'])*100);
				
						 

		$rObj3 = $ga->requestReportData(ga_profile_id,array('source'),array('organicSearches'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
        insertRecord('rTable3',$rObj3,$db); 
		$data['janOrganicSearches'] = $ga->getOrganicSearches(); 
		$rObj4 = $ga->requestReportData(ga_profile_id,array('source'),array('organicSearches'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
        insertRecord('rTable4',$rObj4,$db);
		$data['decOrganicSearches'] = $ga->getOrganicSearches() ;
		$data['perOrganicSearches'] =  (float)(($data['decOrganicSearches']/$data['janOrganicSearches'])*100); 
		 
		  

		$rObj5 = $ga->requestReportData(ga_profile_id,array('sessionCount'),array('pageviews','visits'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
        insertRecord('rTable5',$rObj5,$db);
		$data['janPageViews'] = $ga->getPageviews(); 

		$rObj6 = $ga->requestReportData(ga_profile_id,array('sessionCount'),array('pageviews','visits'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
        insertRecord('rTable6',$rObj6,$db);
		$data['decPageViews'] = $ga->getPageviews();

		$data['perPageViews'] = (float)(($data['decPageViews']/$data['janPageViews'])*100); 		  

		$rObj7 = $ga->requestReportData(ga_profile_id,array('userDefinedValue'),array('newUsers','users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
		insertRecord('rTable7',$rObj7,$db);
		$data['janNewUsers'] = $ga->getNewUsers(); 
		
		$data['janUsers'] = $ga->getUsers(); 
		
		
		
		$rObj8 = $ga->requestReportData(ga_profile_id,array('userType'),array('users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
		insertRecord('rTable8',$rObj8,$db);
		$data['userTypeValues'] = $ga->getResults();
		
		foreach($data['userTypeValues'] as $key=>$result){
								
			if(trim($result) == 'Returning Visitor'){
				
				
				$data['janReturningUsers'] = $result->getUsers(); 
				
				
			}
			
		}


        $rObj9 = $ga->requestReportData(ga_profile_id,array('userType'),array('users'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
		insertRecord('rTable9',$rObj9,$db);
		$data['userTypeValues'] = $ga->getResults();
		
		foreach($data['userTypeValues'] as $key=>$result){
								
			if(trim($result) == 'Returning Visitor'){
				
				
				$data['decReturningUsers'] = $result->getUsers(); 
				
				
			}
			
		}  		
		
        $data['perReturningUsers'] = (float)(($data['decReturningUsers']/$data['janReturningUsers'])*100); 
		
		$rObj10 = $ga->requestReportData(ga_profile_id,array('userDefinedValue'),array('newUsers','users'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
        insertRecord('rTable10',$rObj10,$db);
		$data['decNewUsers'] = $ga->getUsers(); 

		$data['perNewUsers'] = (float)(($data['decNewUsers']/$data['janNewUsers'])*100); 
		  
		  
		 $data['decUsers']  = $ga->getUsers();

		 $data['perUsers'] = (float)(($data['decUsers']/$data['janUsers'])*100);
		  

		  

		$rObj11 =  $ga->requestReportData(ga_profile_id,array('browser','browserVersion'),array('pageviews','visits'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
        insertRecord('rTable11',$rObj11,$db);
		 $data['janViewsToSessions'] = ($data['janPageViews']/$data['janSessions']); 
		 
		 $data['decViewsToSessions'] = ($data['decPageViews']/$data['decSessions']); 
		 
		 $data['perViewsToSessions'] = (float)(($data['decViewsToSessions']/$data['janViewsToSessions'])*100); 
		

			$data['janArray'] = array();
			
			$data['decArray'] = array();
			
			$janstartdate = strtotime("01 january 2016");
			
			$decstartdate = strtotime("01 december 2015");

			for($i=1;$i<31;$i++){
						
				$janenddate = strtotime("+1 day",$janstartdate);
				
				//The call_user_func
				
				$rObj12 = $ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate'),null,null,date('Y-m-d',$janstartdate),date('Y-m-d',$janenddate),null,null,null,'HIGHER_PRECISION');
				
				$data['janArray'][] = $ga->getSessions(); 
				
				//date('Y-m-d',$janenddate)." sessions ".$ga->getSessions()."<br>";
				
				$janstartdate = $janenddate;
				
				$decenddate = strtotime("+1 day",$decstartdate);
				
				//The call_user_func
				
				$rObj12 = $ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate'),null,null,date('Y-m-d',$decstartdate),date('Y-m-d',$decenddate),null,null,null,'HIGHER_PRECISION');
				insertRecord('rTable12',$rObj12,$db);
				//echo date('Y-m-d',$decenddate)." past sessions ".$ga->getSessions()."<br>";
				
				$data['decArray'][] = $ga->getSessions();
				
				$decstartdate = $decenddate;		
				
			}

                 $rObj13 = $ga->requestReportData(ga_profile_id,array('socialNetwork'),array('users','newUsers'),null,null,'2015-11-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
				 insertRecord('rTable13',$rObj13,$db);			
					$userArray = array();
					
					$newUsersArray = array();
					
					foreach($ga->getResults() as $result){
						
						if($result == 'Facebook'){
							
							$userArray['Facebook'] = $result->getUsers();
							$newUsersArray['Facebook'] = $result->getNewUsers();
					
						}else if($result == 'Yelp'){
							
							$userArray['Yelp'] = $result->getUsers();
							$newUsersArray['Yelp'] = $result->getNewUsers();
						
						}else if($result == 'Twitter'){
							
							$userArray['Twitter'] = $result->getUsers();
							$newUsersArray['Twitter'] = $result->getNewUsers();
						
						}else if($result == 'Pinterest'){
							
							$userArray['Pinterest'] = $result->getUsers();
							$newUsersArray['Pinterest'] = $result->getNewUsers();
						
						}else{
							
							$userArray['notset'] = $result->getUsers();
							$newUsersArray['notset'] = $result->getNewUsers();									
						}
						
					}
	
					$myArray = array();
							
							foreach(array_keys($userArray) as $value){
								 
								 $myArray[] = "'".$value."'";								 
								 
							}
					
						$data['myFirstArray'] = $myArray;
						
						$data['firstuserArray'] = $userArray;
						
						$data['firstnewUsersArray'] = $newUsersArray;
					
						$rObj14 = $ga->requestReportData(ga_profile_id,array('deviceCategory'),array('users','newUsers'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						insertRecord('rTable14',$rObj15,$db);	
						$userArray = array();
						
						$newUsersArray = array();
						
							foreach($ga->getResults() as $result){
								//echo $result;
								if($result == 'desktop'){
									
									$userArray['Desktop'] = $result->getUsers();
									$newUsersArray['Desktop'] = $result->getNewUsers();
							
								}else if($result == 'mobile'){
									
									$userArray['Mobile'] = $result->getUsers();
									$newUsersArray['Mobile'] = $result->getNewUsers();
								
								}else if($result == 'tablet'){
									
									$userArray['Tablet'] = $result->getUsers();
									$newUsersArray['Tablet'] = $result->getNewUsers();
								
								}else{
									
									$userArray['notset'] = $result->getUsers();
									$newUsersArray['notset'] = $result->getNewUsers();									
								}
								
							}
			
			                $myArray = array();
							
							foreach(array_keys($userArray) as $value){
								 
								 $myArray[] = "'".$value."'";								 
								 
							}
							
							$data['mySecondArray'] = $myArray;
					        
							$data['seconduserArray'] = $userArray;
					        
							$data['secondnewUsersArray'] = $newUsersArray;
					
			
                            $rObj15 = $ga->requestReportData(ga_profile_id,array('country'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						    insertRecord('rTable15',$rObj15,$db);
							foreach($ga->getResults() as $key=>$result){
								
								if(trim($result) != '(not set)'){
									
									$resultUsersArray[$key] = $result;
									$countryUsersArray[$key] = $result->getUsers(); 
									$sessionsUsersArray[$key] = $result->getSessions();
									$pageViewsUsersArray[$key] = $result->getPageViews();
									$bounceRateUsersArray[$key] = $result->getBounceRate();
									
								}
								
							}							
							
							//foreach($ga->getResults() as $result):						
							arsort($countryUsersArray);
							$i = 1;
							$colorArray = array('#1abc9c','#fcbe61','#27ae60','#3498db','#9b59b6','#8f8f8f');
							
							$Fresult = 0;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 && isset($colorArray[$i]) && $resultUsersArray[$key] != 'India'){
															
									$Fresult += $result;
								
								}
								
								$i++;
							}
							$i = 1;
							foreach($countryUsersArray as $key=>$result){
							if($i <6 && isset($colorArray[$i]) && $resultUsersArray[$key] != 'India'){
							
								$data['myCountryJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  y: ".round((($result/$Fresult)*100),2).", color:'".$colorArray[$i]."', drilldown :'".$resultUsersArray[$key]."' }";
								$data['myCountrySeriesJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  id:"."'".$resultUsersArray[$key]."', data: "." [ ['Sessions',".$sessionsUsersArray[$key]."],['Users',".$result."],['Page Views',".$pageViewsUsersArray[$key]."],['Bounce rate',".$bounceRateUsersArray[$key]."] ] }";
							
							}
							$i++;
							}
							$data['myFirstVar']  = implode(',',$data['myCountryJsonArray']);
							
							$rObj16 = $ga->requestReportData(ga_profile_id,array('city'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						    insertRecord('rTable16',$rObj16,$db);
							$countryUsersArray = array(); 
							foreach($ga->getResults() as $key=>$result){
								
								if(trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
									
									$resultUsersArray[$key] = $result;
									$countryUsersArray[$key] = $result->getUsers(); 
									$sessionsUsersArray[$key] = $result->getSessions();
									$pageViewsUsersArray[$key] = $result->getPageViews();
									$bounceRateUsersArray[$key] = $result->getBounceRate();
									
								}
								
							}
							
							//foreach($ga->getResults() as $result):
						
							arsort($countryUsersArray);
							
							$i = 1;
							$Fresult = 0;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 && trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
															
									$Fresult += $result;
								
								}
								
								$i++;
							}
							$i=1;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 &&  trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
															
									$data['myCityJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  y: ".round((($result/$Fresult)*100),2).", color:'".$colorArray[$i]."', drilldown :'".$resultUsersArray[$key]."' }";
									$data['myCitySeriesJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  id:"."'".$resultUsersArray[$key]."', data: "." [ ['Sessions',".$sessionsUsersArray[$key]."],['Users',".$result."],['Page Views',".$pageViewsUsersArray[$key]."],['Bounce rate',".$bounceRateUsersArray[$key]."] ] }";
								
								}
								
								$i++;
							}
							
							$data['mySecondVar'] = implode(',',$data['myCityJsonArray']);
							
							$content = file_get_contents('https://saloncloudsplus.com/wsprovider/wsstaff_list/178/1677');
							
							
							$staff = json_decode($content);
							
							
							
							$rObj17 = $ga->requestReportData(ga_profile_id,array('pagePath'),array('sessions','avgsessionDuration','newUsers','bounceRate','users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
							insertRecord('rTable17',$rObj17,$db);
							$data['landingpagetraffic'] = $ga->getResults();
							
							foreach($data['landingpagetraffic'] as $key=>$result){
								
								foreach($staff as $each){
									
									if(strpos($result,$each->staff_id) !== false){										
										$data['staffPageViews'][str_replace(" ",'_',$each->name)] = $result->getSessions();
									}								
									
								}
								
								$data['resultSArray'][$key] = $result;
								$data['sessionsSArray'][$key] = $result->getSessions(); 
								$data['avgSessionDurationSArray'][$key] = round($result->getAvgSessionDuration(),2);
								$data['newUsersSArray'][$key] = $result->getNewUsers();
								$data['bounceRateUsersSArray'][$key] = round($result->getBounceRate(),2);
							
							}	
							
							arsort($data['sessionsSArray']);
							arsort($data['staffPageViews']);
							/*foreach($ga->getResults() as $key=>$result){
								
								$data['resultUsersArray'][$key] = $result;
								$data['countryUsersArray'][$key] = $result->getUsers(); 
								$data['sessionsUsersArray'][$key] = $result->getSessions();
								$data['pageViewsUsersArray'][$key] = $result->getPageViews();
								$data['bounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}*/
							
							$rObj18 = $ga->requestReportData(ga_profile_id,array('country'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
							insertRecord('rTable18',$rObj18,$db);
							$data['countryUsersArray']= array();
							
							foreach($ga->getResults() as $key=>$result){
								
								$data['resultUsersArray'][$key] = $result;
								$data['countryUsersArray'][$key] = $result->getUsers(); 
								$data['sessionsUsersArray'][$key] = $result->getSessions();
								$data['pageViewsUsersArray'][$key] = $result->getPageViews();
								$data['bounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}
							
							arsort($data['countryUsersArray']);
							
							$rObj19 = $ga->requestReportData(ga_profile_id,array('city'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						    insertRecord('rTable19',$rObj19,$db);
							$data['acountryUsersArray']= array();
							
							foreach($ga->getResults() as $key=>$result){
								
								$data['aresultUsersArray'][$key] = $result;
								$data['acountryUsersArray'][$key] = $result->getUsers(); 
								$data['asessionsUsersArray'][$key] = $result->getSessions();
								$data['apageViewsUsersArray'][$key] = $result->getPageViews();
								$data['abounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}
							
							arsort($data['acountryUsersArray']);
							$table = $rTable18;
							$collection = $db->$table;
							$cursor = $collection->find();
							
							foreach ($cursor as $document) {
								var_dump($document);
                            }
							exit;							
							//$data['countryUsersArray'] = $countryUsersArray;
                            $data['appData'] = $this->reports(178); 
							$this->load->view('gapiview',$data);
		}
	
		function mobile() {
			//redirect(base_url().'giftcard/giftcard_list/0/', 'refresh'); die();
			
			//////////////////////////////////////////////////////////////////////////////
			
			//ob_start();
				set_time_limit(0);

				require 'gapi.class.php';

				define('ga_profile_id','112533909');

				$ga = new gapi("salonvanitymobileapp@appspot.gserviceaccount.com", "salonvanitymobileapp-edcf228b6f2e.p12");
$ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate','percentNewSessions'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
				$data['janSessions'] = $ga->getSessions();
				$data['janAvgSessionDuration'] = $ga->getAvgSessionDuration();
				$data['janBounceRate'] = $ga->getBounceRate();
				$data['janPercentNewSessions'] = $ga->getPercentNewSessions();


				$ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate','percentNewSessions'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

				$data['decSessions'] = $ga->getSessions();

				$data['perSessions'] = (float)(($data['decSessions']/$data['janSessions'])*100); 
				
				$data['decAvgSessionDuration'] = $ga->getAvgSessionDuration();
				
				$data['perAvgSessionDuration'] = (float)(($data['decAvgSessionDuration']/$data['janAvgSessionDuration'])*100);
				
				$data['decBounceRate'] = $ga->getBounceRate();
				
				$data['perBounceRate'] = (float)(($data['decBounceRate']/$data['janBounceRate'])*100);
				
				$data['decPercentNewSessions'] = $ga->getPercentNewSessions();
				
				$data['perPercentNewSessions'] = (float)(($data['decPercentNewSessions']/$data['janPercentNewSessions'])*100);
				
						 

		$ga->requestReportData(ga_profile_id,array('source'),array('organicSearches'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');

		$data['janOrganicSearches'] = $ga->getOrganicSearches(); 
		$ga->requestReportData(ga_profile_id,array('source'),array('organicSearches'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

		$data['decOrganicSearches'] = $ga->getOrganicSearches() ;
		$data['perOrganicSearches'] =  (float)(($data['decOrganicSearches']/$data['janOrganicSearches'])*100); 
		 
		  

		$ga->requestReportData(ga_profile_id,array('sessionCount'),array('pageviews','visits'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');

		$data['janPageViews'] = $ga->getPageviews(); 

		$ga->requestReportData(ga_profile_id,array('sessionCount'),array('pageviews','visits'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

		$data['decPageViews'] = $ga->getPageviews();

		$data['perPageViews'] = (float)(($data['decPageViews']/$data['janPageViews'])*100); 		  

		$ga->requestReportData(ga_profile_id,array('userDefinedValue'),array('newUsers','users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
		
		$data['janNewUsers'] = $ga->getNewUsers(); 
		
		$data['janUsers'] = $ga->getUsers(); 
		
		
		
		$ga->requestReportData(ga_profile_id,array('userType'),array('users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
		
		$data['userTypeValues'] = $ga->getResults();
		
		foreach($data['userTypeValues'] as $key=>$result){
								
			if(trim($result) == 'Returning Visitor'){
				
				
				$data['janReturningUsers'] = $result->getUsers(); 
				
				
			}
			
		}


        $ga->requestReportData(ga_profile_id,array('userType'),array('users'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
		
		$data['userTypeValues'] = $ga->getResults();
		
		foreach($data['userTypeValues'] as $key=>$result){
								
			if(trim($result) == 'Returning Visitor'){
				
				
				$data['decReturningUsers'] = $result->getUsers(); 
				
				
			}
			
		}  		
		
        $data['perReturningUsers'] = (float)(($data['decReturningUsers']/$data['janReturningUsers'])*100); 
		
		$ga->requestReportData(ga_profile_id,array('userDefinedValue'),array('newUsers','users'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

		$data['decNewUsers'] = $ga->getUsers(); 

		$data['perNewUsers'] = (float)(($data['decNewUsers']/$data['janNewUsers'])*100); 
		  
		  
		 $data['decUsers']  = $ga->getUsers();

		 $data['perUsers'] = (float)(($data['decUsers']/$data['janUsers'])*100);
		  

		  

		 $ga->requestReportData(ga_profile_id,array('browser','browserVersion'),array('pageviews','visits'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

		 $data['janViewsToSessions'] = ($data['janPageViews']/$data['janSessions']); 
		 
		 $data['decViewsToSessions'] = ($data['decPageViews']/$data['decSessions']); 
		 
		 $data['perViewsToSessions'] = (float)(($data['decViewsToSessions']/$data['janViewsToSessions'])*100); 
		

			$data['janArray'] = array();
			
			$data['decArray'] = array();
			
			$janstartdate = strtotime("01 january 2016");
			
			$decstartdate = strtotime("01 december 2015");

			for($i=1;$i<31;$i++){
						
				$janenddate = strtotime("+1 day",$janstartdate);
				
				//The call_user_func
				
				$ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate'),null,null,date('Y-m-d',$janstartdate),date('Y-m-d',$janenddate),null,null,null,'HIGHER_PRECISION');
				
				$data['janArray'][] = $ga->getSessions(); 
				
				//date('Y-m-d',$janenddate)." sessions ".$ga->getSessions()."<br>";
				
				$janstartdate = $janenddate;
				
				$decenddate = strtotime("+1 day",$decstartdate);
				
				//The call_user_func
				
				$ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate'),null,null,date('Y-m-d',$decstartdate),date('Y-m-d',$decenddate),null,null,null,'HIGHER_PRECISION');
				
				//echo date('Y-m-d',$decenddate)." past sessions ".$ga->getSessions()."<br>";
				
				$data['decArray'][] = $ga->getSessions();
				
				$decstartdate = $decenddate;		
				
			}

                 $ga->requestReportData(ga_profile_id,array('socialNetwork'),array('users','newUsers'),null,null,'2015-11-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
							
					$userArray = array();
					
					$newUsersArray = array();
					
					foreach($ga->getResults() as $result){
						
						if($result == 'Facebook'){
							
							$userArray['Facebook'] = $result->getUsers();
							$newUsersArray['Facebook'] = $result->getNewUsers();
					
						}else if($result == 'Yelp'){
							
							$userArray['Yelp'] = $result->getUsers();
							$newUsersArray['Yelp'] = $result->getNewUsers();
						
						}else if($result == 'Twitter'){
							
							$userArray['Twitter'] = $result->getUsers();
							$newUsersArray['Twitter'] = $result->getNewUsers();
						
						}else if($result == 'Pinterest'){
							
							$userArray['Pinterest'] = $result->getUsers();
							$newUsersArray['Pinterest'] = $result->getNewUsers();
						
						}else{
							
							$userArray['notset'] = $result->getUsers();
							$newUsersArray['notset'] = $result->getNewUsers();									
						}
						
					}
	
					$myArray = array();
							
							foreach(array_keys($userArray) as $value){
								 
								 $myArray[] = "'".$value."'";								 
								 
							}
					
						$data['myFirstArray'] = $myArray;
						
						$data['firstuserArray'] = $userArray;
						
						$data['firstnewUsersArray'] = $newUsersArray;
						
						
						$ga->requestReportData(ga_profile_id,array('deviceCategory'),array('users','newUsers'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
							
						$userArray = array();
						
						$newUsersArray = array();
						
							foreach($ga->getResults() as $result){
								//echo $result;
								if($result == 'desktop'){
									
									$userArray['Desktop'] = $result->getUsers();
									$newUsersArray['Desktop'] = $result->getNewUsers();
							
								}else if($result == 'mobile'){
									
									$userArray['Mobile'] = $result->getUsers();
									$newUsersArray['Mobile'] = $result->getNewUsers();
								
								}else if($result == 'tablet'){
									
									$userArray['Tablet'] = $result->getUsers();
									$newUsersArray['Tablet'] = $result->getNewUsers();
								
								}else{
									
									$userArray['notset'] = $result->getUsers();
									$newUsersArray['notset'] = $result->getNewUsers();									
								}
								
							}
			
			                $myArray = array();
							
							foreach(array_keys($userArray) as $value){
								 
								 $myArray[] = "'".$value."'";								 
								 
							}
							
							$data['mySecondArray'] = $myArray;
					        
							$data['seconduserArray'] = $userArray;
					        
							$data['secondnewUsersArray'] = $newUsersArray;
					
			
                            $ga->requestReportData(ga_profile_id,array('country'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						
							foreach($ga->getResults() as $key=>$result){
								
								if(trim($result) != '(not set)'){
									
									$resultUsersArray[$key] = $result;
									$countryUsersArray[$key] = $result->getUsers(); 
									$sessionsUsersArray[$key] = $result->getSessions();
									$pageViewsUsersArray[$key] = $result->getPageViews();
									$bounceRateUsersArray[$key] = $result->getBounceRate();
									
								}
								
							}							
							
							//foreach($ga->getResults() as $result):						
							arsort($countryUsersArray);
							$i = 1;
							$colorArray = array('#1abc9c','#fcbe61','#27ae60','#3498db','#9b59b6','#8f8f8f');
							
							$Fresult = 0;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 && isset($colorArray[$i]) && $resultUsersArray[$key] != 'India'){
															
									$Fresult += $result;
								
								}
								
								$i++;
							}
							$i = 1;
							foreach($countryUsersArray as $key=>$result){
							if($i <6 && isset($colorArray[$i]) && $resultUsersArray[$key] != 'India'){
							
								$data['myCountryJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  y: ".round((($result/$Fresult)*100),2).", color:'".$colorArray[$i]."', drilldown :'".$resultUsersArray[$key]."' }";
								$data['myCountrySeriesJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  id:"."'".$resultUsersArray[$key]."', data: "." [ ['Sessions',".$sessionsUsersArray[$key]."],['Users',".$result."],['Page Views',".$pageViewsUsersArray[$key]."],['Bounce rate',".$bounceRateUsersArray[$key]."] ] }";
							
							}
							$i++;
							}
							$data['myFirstVar']  = implode(',',$data['myCountryJsonArray']);
							
							$ga->requestReportData(ga_profile_id,array('city'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						    $countryUsersArray = array(); 
							foreach($ga->getResults() as $key=>$result){
								
								if(trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
									
									$resultUsersArray[$key] = $result;
									$countryUsersArray[$key] = $result->getUsers(); 
									$sessionsUsersArray[$key] = $result->getSessions();
									$pageViewsUsersArray[$key] = $result->getPageViews();
									$bounceRateUsersArray[$key] = $result->getBounceRate();
									
								}
								
							}
							
							//foreach($ga->getResults() as $result):
						
							arsort($countryUsersArray);
							
							$i = 1;
							$Fresult = 0;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 && trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
															
									$Fresult += $result;
								
								}
								
								$i++;
							}
							$i=1;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 &&  trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
															
									$data['myCityJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  y: ".round((($result/$Fresult)*100),2).", color:'".$colorArray[$i]."', drilldown :'".$resultUsersArray[$key]."' }";
									$data['myCitySeriesJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  id:"."'".$resultUsersArray[$key]."', data: "." [ ['Sessions',".$sessionsUsersArray[$key]."],['Users',".$result."],['Page Views',".$pageViewsUsersArray[$key]."],['Bounce rate',".$bounceRateUsersArray[$key]."] ] }";
								
								}
								
								$i++;
							}
							
							$data['mySecondVar'] = implode(',',$data['myCityJsonArray']);
							
							$content = file_get_contents('https://saloncloudsplus.com/wsprovider/wsstaff_list/178/1677');
							
							
							$staff = json_decode($content);
							
							
							
							$ga->requestReportData(ga_profile_id,array('pagePath'),array('sessions','avgsessionDuration','newUsers','bounceRate','users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
							
							$data['landingpagetraffic'] = $ga->getResults();
							
							foreach($data['landingpagetraffic'] as $key=>$result){
								
								foreach($staff as $each){
									
									if(strpos($result,$each->staff_id) !== false){										
										$data['staffPageViews'][str_replace(" ",'_',$each->name)] = $result->getSessions();
									}								
									
								}
								
								$data['resultSArray'][$key] = $result;
								$data['sessionsSArray'][$key] = $result->getSessions(); 
								$data['avgSessionDurationSArray'][$key] = round($result->getAvgSessionDuration(),2);
								$data['newUsersSArray'][$key] = $result->getNewUsers();
								$data['bounceRateUsersSArray'][$key] = round($result->getBounceRate(),2);
							
							}	
							
						
						
						
						
						arsort($data['sessionsSArray']);
							//arsort($data['staffPageViews']);
							/*foreach($ga->getResults() as $key=>$result){
								
								$data['resultUsersArray'][$key] = $result;
								$data['countryUsersArray'][$key] = $result->getUsers(); 
								$data['sessionsUsersArray'][$key] = $result->getSessions();
								$data['pageViewsUsersArray'][$key] = $result->getPageViews();
								$data['bounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}*/
							
							$ga->requestReportData(ga_profile_id,array('country'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
							
							$data['countryUsersArray']= array();
							
							foreach($ga->getResults() as $key=>$result){
								
								$data['resultUsersArray'][$key] = $result;
								$data['countryUsersArray'][$key] = $result->getUsers(); 
								$data['sessionsUsersArray'][$key] = $result->getSessions();
								$data['pageViewsUsersArray'][$key] = $result->getPageViews();
								$data['bounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}
							
							arsort($data['countryUsersArray']);
							
							$ga->requestReportData(ga_profile_id,array('city'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						
							$data['acountryUsersArray']= array();
							
							foreach($ga->getResults() as $key=>$result){
								
								$data['aresultUsersArray'][$key] = $result;
								$data['acountryUsersArray'][$key] = $result->getUsers(); 
								$data['asessionsUsersArray'][$key] = $result->getSessions();
								$data['apageViewsUsersArray'][$key] = $result->getPageViews();
								$data['abounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}
							
							arsort($data['acountryUsersArray']);
														
							//$data['countryUsersArray'] = $countryUsersArray;
                            $data['appData'] = $this->reports(178);
							$this->load->view('gapiview',$data);
		}
		
		
		function CImobile() {
			//redirect(base_url().'giftcard/giftcard_list/0/', 'refresh'); die();
			
			//////////////////////////////////////////////////////////////////////////////
			
			//ob_start();
				set_time_limit(0);

				require 'gapi.class.php';

				define('ga_profile_id','112163361');

				$ga = new gapi("charlesiferganmobileapp@appspot.gserviceaccount.com", "charlesiferganmobileapp-f709c9da795b.p12");
                $ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate','percentNewSessions'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
				$data['janSessions'] = $ga->getSessions();
				$data['janAvgSessionDuration'] = $ga->getAvgSessionDuration();
				$data['janBounceRate'] = $ga->getBounceRate();
				$data['janPercentNewSessions'] = $ga->getPercentNewSessions();


				$ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate','percentNewSessions'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

				$data['decSessions'] = $ga->getSessions();

				$data['perSessions'] = (float)(($data['decSessions']/$data['janSessions'])*100); 
				
				$data['decAvgSessionDuration'] = $ga->getAvgSessionDuration();
				
				$data['perAvgSessionDuration'] = (float)(($data['decAvgSessionDuration']/$data['janAvgSessionDuration'])*100);
				
				$data['decBounceRate'] = $ga->getBounceRate();
				
				$data['perBounceRate'] = (float)(($data['decBounceRate']/$data['janBounceRate'])*100);
				
				$data['decPercentNewSessions'] = $ga->getPercentNewSessions();
				
				$data['perPercentNewSessions'] = (float)(($data['decPercentNewSessions']/$data['janPercentNewSessions'])*100);
				
						 

		$ga->requestReportData(ga_profile_id,array('source'),array('organicSearches'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');

		$data['janOrganicSearches'] = $ga->getOrganicSearches(); 
		$ga->requestReportData(ga_profile_id,array('source'),array('organicSearches'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

		$data['decOrganicSearches'] = $ga->getOrganicSearches() ;
		$data['perOrganicSearches'] =  (float)(($data['decOrganicSearches']/$data['janOrganicSearches'])*100); 
		 
		  

		$ga->requestReportData(ga_profile_id,array('sessionCount'),array('pageviews','visits'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');

		$data['janPageViews'] = $ga->getPageviews(); 

		$ga->requestReportData(ga_profile_id,array('sessionCount'),array('pageviews','visits'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

		$data['decPageViews'] = $ga->getPageviews();

		$data['perPageViews'] = (float)(($data['decPageViews']/$data['janPageViews'])*100); 		  

		$ga->requestReportData(ga_profile_id,array('userDefinedValue'),array('newUsers','users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
		
		$data['janNewUsers'] = $ga->getNewUsers(); 
		
		$data['janUsers'] = $ga->getUsers(); 
		
		
		
		$ga->requestReportData(ga_profile_id,array('userType'),array('users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
		
		$data['userTypeValues'] = $ga->getResults();
		
		foreach($data['userTypeValues'] as $key=>$result){
								
			if(trim($result) == 'Returning Visitor'){
				
				
				$data['janReturningUsers'] = $result->getUsers(); 
				
				
			}
			
		}


        $ga->requestReportData(ga_profile_id,array('userType'),array('users'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
		
		$data['userTypeValues'] = $ga->getResults();
		
		foreach($data['userTypeValues'] as $key=>$result){
								
			if(trim($result) == 'Returning Visitor'){
				
				
				$data['decReturningUsers'] = $result->getUsers(); 
				
				
			}
			
		}  		
		
        $data['perReturningUsers'] = (float)(($data['decReturningUsers']/$data['janReturningUsers'])*100); 
		
		$ga->requestReportData(ga_profile_id,array('userDefinedValue'),array('newUsers','users'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

		$data['decNewUsers'] = $ga->getUsers(); 

		$data['perNewUsers'] = (float)(($data['decNewUsers']/$data['janNewUsers'])*100); 
		  
		  
		 $data['decUsers']  = $ga->getUsers();

		 $data['perUsers'] = (float)(($data['decUsers']/$data['janUsers'])*100);
		  

		  

		 $ga->requestReportData(ga_profile_id,array('browser','browserVersion'),array('pageviews','visits'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');

		 $data['janViewsToSessions'] = ($data['janPageViews']/$data['janSessions']); 
		 
		 $data['decViewsToSessions'] = ($data['decPageViews']/$data['decSessions']); 
		 
		 $data['perViewsToSessions'] = (float)(($data['decViewsToSessions']/$data['janViewsToSessions'])*100); 
		

			$data['janArray'] = array();
			
			$data['decArray'] = array();
			
			$janstartdate = strtotime("01 january 2016");
			
			$decstartdate = strtotime("01 december 2015");

			for($i=1;$i<31;$i++){
						
				$janenddate = strtotime("+1 day",$janstartdate);
				
				//The call_user_func
				
				$ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate'),null,null,date('Y-m-d',$janstartdate),date('Y-m-d',$janenddate),null,null,null,'HIGHER_PRECISION');
				
				$data['janArray'][] = $ga->getSessions(); 
				
				//date('Y-m-d',$janenddate)." sessions ".$ga->getSessions()."<br>";
				
				$janstartdate = $janenddate;
				
				$decenddate = strtotime("+1 day",$decstartdate);
				
				//The call_user_func
				
				$ga->requestReportData(ga_profile_id,array('sessionCount'),array('sessions','avgsessionDuration','bounceRate'),null,null,date('Y-m-d',$decstartdate),date('Y-m-d',$decenddate),null,null,null,'HIGHER_PRECISION');
				
				//echo date('Y-m-d',$decenddate)." past sessions ".$ga->getSessions()."<br>";
				
				$data['decArray'][] = $ga->getSessions();
				
				$decstartdate = $decenddate;		
				
			}

                 $ga->requestReportData(ga_profile_id,array('socialNetwork'),array('users','newUsers'),null,null,'2015-11-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
							
					$userArray = array();
					
					$newUsersArray = array();
					
					foreach($ga->getResults() as $result){
						
						if($result == 'Facebook'){
							
							$userArray['Facebook'] = $result->getUsers();
							$newUsersArray['Facebook'] = $result->getNewUsers();
					
						}else if($result == 'Yelp'){
							
							$userArray['Yelp'] = $result->getUsers();
							$newUsersArray['Yelp'] = $result->getNewUsers();
						
						}else if($result == 'Twitter'){
							
							$userArray['Twitter'] = $result->getUsers();
							$newUsersArray['Twitter'] = $result->getNewUsers();
						
						}else if($result == 'Pinterest'){
							
							$userArray['Pinterest'] = $result->getUsers();
							$newUsersArray['Pinterest'] = $result->getNewUsers();
						
						}else{
							
							$userArray['notset'] = $result->getUsers();
							$newUsersArray['notset'] = $result->getNewUsers();									
						}
						
					}
	
					$myArray = array();
							
							foreach(array_keys($userArray) as $value){
								 
								 $myArray[] = "'".$value."'";								 
								 
							}
					
						$data['myFirstArray'] = $myArray;
						
						$data['firstuserArray'] = $userArray;
						
						$data['firstnewUsersArray'] = $newUsersArray;
						
						
						$ga->requestReportData(ga_profile_id,array('deviceCategory'),array('users','newUsers'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
							
						$userArray = array();
						
						$newUsersArray = array();
						
							foreach($ga->getResults() as $result){
								//echo $result;
								if($result == 'desktop'){
									
									$userArray['Desktop'] = $result->getUsers();
									$newUsersArray['Desktop'] = $result->getNewUsers();
							
								}else if($result == 'mobile'){
									
									$userArray['Mobile'] = $result->getUsers();
									$newUsersArray['Mobile'] = $result->getNewUsers();
								
								}else if($result == 'tablet'){
									
									$userArray['Tablet'] = $result->getUsers();
									$newUsersArray['Tablet'] = $result->getNewUsers();
								
								}else{
									
									$userArray['notset'] = $result->getUsers();
									$newUsersArray['notset'] = $result->getNewUsers();									
								}
								
							}
			
			                $myArray = array();
							
							foreach(array_keys($userArray) as $value){
								 
								 $myArray[] = "'".$value."'";								 
								 
							}
							
							$data['mySecondArray'] = $myArray;
					        
							$data['seconduserArray'] = $userArray;
					        
							$data['secondnewUsersArray'] = $newUsersArray;
					
			
                            $ga->requestReportData(ga_profile_id,array('country'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						
							foreach($ga->getResults() as $key=>$result){
								
								if(trim($result) != '(not set)'){
									
									$resultUsersArray[$key] = $result;
									$countryUsersArray[$key] = $result->getUsers(); 
									$sessionsUsersArray[$key] = $result->getSessions();
									$pageViewsUsersArray[$key] = $result->getPageViews();
									$bounceRateUsersArray[$key] = $result->getBounceRate();
									
								}
								
							}							
							
							//foreach($ga->getResults() as $result):						
							arsort($countryUsersArray);
							$i = 1;
							$colorArray = array('#1abc9c','#fcbe61','#27ae60','#3498db','#9b59b6','#8f8f8f');
							
							$Fresult = 0;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 && isset($colorArray[$i]) && $resultUsersArray[$key] != 'India'){
															
									$Fresult += $result;
								
								}
								
								$i++;
							}
							$i = 1;
							foreach($countryUsersArray as $key=>$result){
							if($i <6 && isset($colorArray[$i]) && $resultUsersArray[$key] != 'India'){
							
								$data['myCountryJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  y: ".round((($result/$Fresult)*100),2).", color:'".$colorArray[$i]."', drilldown :'".$resultUsersArray[$key]."' }";
								$data['myCountrySeriesJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  id:"."'".$resultUsersArray[$key]."', data: "." [ ['Sessions',".$sessionsUsersArray[$key]."],['Users',".$result."],['Page Views',".$pageViewsUsersArray[$key]."],['Bounce rate',".$bounceRateUsersArray[$key]."] ] }";
							
							}
							$i++;
							}
							$data['myFirstVar']  = implode(',',$data['myCountryJsonArray']);
							
							$ga->requestReportData(ga_profile_id,array('city'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						    $countryUsersArray = array(); 
							foreach($ga->getResults() as $key=>$result){
								
								if(trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
									
									$resultUsersArray[$key] = $result;
									$countryUsersArray[$key] = $result->getUsers(); 
									$sessionsUsersArray[$key] = $result->getSessions();
									$pageViewsUsersArray[$key] = $result->getPageViews();
									$bounceRateUsersArray[$key] = $result->getBounceRate();
									
								}
								
							}
							
							//foreach($ga->getResults() as $result):
						
							arsort($countryUsersArray);
							
							$i = 1;
							$Fresult = 0;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 && trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
															
									$Fresult += $result;
								
								}
								
								$i++;
							}
							$i=1;
							foreach($countryUsersArray as $key=>$result){
							
								if($i < 6 &&  trim($result) != '(not set)' && strtolower(trim($result)) != 'hyderabad'){
															
									$data['myCityJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  y: ".round((($result/$Fresult)*100),2).", color:'".$colorArray[$i]."', drilldown :'".$resultUsersArray[$key]."' }";
									$data['myCitySeriesJsonArray'][] = "{ name:"."'".$resultUsersArray[$key]."',  id:"."'".$resultUsersArray[$key]."', data: "." [ ['Sessions',".$sessionsUsersArray[$key]."],['Users',".$result."],['Page Views',".$pageViewsUsersArray[$key]."],['Bounce rate',".$bounceRateUsersArray[$key]."] ] }";
								
								}
								
								$i++;
							}
							
							$data['mySecondVar'] = implode(',',$data['myCityJsonArray']);
							
							$content = file_get_contents('https://saloncloudsplus.com/wsprovider/wsstaff_list/178/1677');
							
							
							$staff = json_decode($content);
							
							
							
							$ga->requestReportData(ga_profile_id,array('pagePath'),array('sessions','avgsessionDuration','newUsers','bounceRate','users'),null,null,'2016-01-01','2016-02-01',null,null,null,'HIGHER_PRECISION');
							
							$data['landingpagetraffic'] = $ga->getResults();
							
							foreach($data['landingpagetraffic'] as $key=>$result){
								
								foreach($staff as $each){
									
									if(strpos($result,$each->staff_id) !== false){										
										$data['staffPageViews'][str_replace(" ",'_',$each->name)] = $result->getSessions();
									}								
									
								}
								
								$data['resultSArray'][$key] = $result;
								$data['sessionsSArray'][$key] = $result->getSessions(); 
								$data['avgSessionDurationSArray'][$key] = round($result->getAvgSessionDuration(),2);
								$data['newUsersSArray'][$key] = $result->getNewUsers();
								$data['bounceRateUsersSArray'][$key] = round($result->getBounceRate(),2);
							
							}	
							
						
						
						
						
						arsort($data['sessionsSArray']);
							//arsort($data['staffPageViews']);
							/*foreach($ga->getResults() as $key=>$result){
								
								$data['resultUsersArray'][$key] = $result;
								$data['countryUsersArray'][$key] = $result->getUsers(); 
								$data['sessionsUsersArray'][$key] = $result->getSessions();
								$data['pageViewsUsersArray'][$key] = $result->getPageViews();
								$data['bounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}*/
							
							$ga->requestReportData(ga_profile_id,array('country'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
							
							$data['countryUsersArray']= array();
							
							foreach($ga->getResults() as $key=>$result){
								
								$data['resultUsersArray'][$key] = $result;
								$data['countryUsersArray'][$key] = $result->getUsers(); 
								$data['sessionsUsersArray'][$key] = $result->getSessions();
								$data['pageViewsUsersArray'][$key] = $result->getPageViews();
								$data['bounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}
							
							arsort($data['countryUsersArray']);
							
							$ga->requestReportData(ga_profile_id,array('city'),array('sessions','users','pageViews','bounceRate'),null,null,'2015-12-01','2016-01-01',null,null,null,'HIGHER_PRECISION');
						
							$data['acountryUsersArray']= array();
							
							foreach($ga->getResults() as $key=>$result){
								
								$data['aresultUsersArray'][$key] = $result;
								$data['acountryUsersArray'][$key] = $result->getUsers(); 
								$data['asessionsUsersArray'][$key] = $result->getSessions();
								$data['apageViewsUsersArray'][$key] = $result->getPageViews();
								$data['abounceRateUsersArray'][$key] = $result->getBounceRate();
								
							}
							
							arsort($data['acountryUsersArray']);
														
							//$data['countryUsersArray'] = $countryUsersArray;
                            $data['appData'] = $this->reports(190);
							$this->load->view('gapiview',$data);
		}
		function reports($salon_id) {
			//$_SESSION['page'] = 'reports';
			$this->load->model('salon_model');
			//$salon_id = 190;
			/*if($salon_id == '50') {
				$header = array('Content-Type: application/json', 'API-KEY: ff0e20fd542a74b1893893c3927714e9c676a1f6', 'Authorization: bearer ff0e20fd542a74b1893893c3927714e9c676a1f6');
				$url = "https://api.appannie.com/v1.2/apps/ios/app/B0073KCQ52/details";
			
				$result = $this->get_curl2($url,$header);
				print_r($result);exit;			
			}*/
			$mydata = array();
			if (!empty($salon_id)) {
				$salon = $this->salon_model->get_salon_by_id($salon_id);
				if (!empty($salon)) {
					$message	= "";
					$settings	= mysql_fetch_array(mysql_query("SELECT * FROM ".SETTINGS_TABLE." ORDER BY id ASC LIMIT 1;"));
					$email		= $settings['appfigures_email'];
					$password	= $settings['appfigures_password'];
					$android_id	= $salon['android_app_id'];
					$apple_id	= $salon['apple_app_id'];

					if(!empty($email) && !empty($password)) {
						if(!empty($android_id) || !empty($apple_id)) {
							if(isset($_POST['enddate']) && !empty($_POST['enddate'])) { $enddate = $_POST['enddate']; } else { $enddate = date('Y-m-d'); }
							if(isset($_POST['startdate']) && !empty($_POST['startdate'])) { $startdate = $_POST['startdate']; } else { $start_date_ts = strtotime("-30 days"); $startdate = '2012-01-01'; }
							 
							$header = array('Content-Type: application/json', 'API-KEY: ff0e20fd542a74b1893893c3927714e9c676a1f6', 'Authorization: bearer ff0e20fd542a74b1893893c3927714e9c676a1f6');
							//$user_pass = $email.":".$password;
							$content_1 = "";
							$content_2 = "";
							if(!empty($android_id)) {
								$url1 = "https://api.appannie.com/v1.2/accounts/261730/products?page_index=0";
								$result1 = $this->get_curl2($url1,$header);
								$result1 = json_decode($result1,true);
								$app_details = array();
								$result = array();
								foreach($result1['products'] as $product) {
									//echo "<pre>";print_r($product);echo "</pre>";
									$product_id = $product['product_id'];
									$product_name = strtolower(str_replace("&", "and", $product['product_name']));
									$salon_name = strtolower(str_ireplace("&", "and", $salon['salon_name']));
									if (strpos($salon_name,$product_name) !== false) {
										//Sales(Download Details)
										$url2 = "https://api.appannie.com/v1.2/accounts/261730/products/$product_id/sales?start_date=$startdate&end_date=$enddate";
										$result = $this->get_curl2($url2,$header);
										$result = json_decode($result,true);
										

										//App Information
										$url3 = "https://api.appannie.com/v1.2/apps/google-play/app/$product_id/details";			 
										$app_details = $this->get_curl2($url3,$header);
										$app_details = json_decode($app_details,true);
									}
								}
								if(!empty($app_details) && $app_details['code'] == 200 && !empty($result) && $result['code'] == 200 && !empty($result['sales_list'])) {
									$show_1 = 1;
									$content_1 .= "<table class='table table-bordered' style='1px solid #d4d4d4;' ><tr>
														<td><h2><img src='".$app_details['product']['icon']."' style='height:50px;width:50px;border:1px solid #999;' /> ".$app_details['product']['product_name']."</h2></td>
													</tr>";
									$content_1 .= "<tr>
														<th style='text-align:center;' >Downloads</th>
													</tr>";
									$content_1 .= "<tr>
														<td style='text-align:center;' >".$result['sales_list'][0]['units']['product']['downloads']."</td>
													</tr></table>";
													
									$mydata['androidDownloads'] = $result['sales_list'][0]['units']['product']['downloads'];			
								}
							}
							$apple_id = str_replace("id", "", strtolower($apple_id));
							if(!empty($apple_id)) {
								$url = "https://api.appannie.com/v1.2/apps/ios/app/$apple_id/details";
								 
								$app_details = $this->get_curl2($url,$header);
								//$app_details = $this->get_curl($url,$user_pass);
								$url = "https://api.appannie.com/v1.2/accounts/76290/products/$apple_id/sales?start_date=$startdate&end_date=$enddate";
								
								$result = $this->get_curl2($url,$header);
								//$result = $this->get_curl($url,$user_pass);
								
								
								$app_details = json_decode($app_details,true);
								$result = json_decode($result,true);
								if(!empty($app_details) && $app_details['code'] == 200 && !empty($result) && $result['code'] == 200 && !empty($result['sales_list'])) {
									$show_2 = 1;
									$content_2 .= "<table class='table table-bordered'><tr>
														<td><h2><img src='".$app_details['product']['icon']."' style='height:50px;width:50px;border:1px solid #999;' /> ".$app_details['product']['product_name']."</h2></td>
													</tr>";
									$content_2 .= "<tr>
														<th style='text-align:center;' >Downloads</th>
													</tr>";
									$content_2 .= "<tr>
														<td style='text-align:center;' >".$result['sales_list'][0]['units']['product']['downloads']."</td>
													</tr></table>";
													
									$mydata['iosDownloads'] = $result['sales_list'][0]['units']['product']['downloads'];				
								}
							}
							
						}
					}	
					
				}
			}
			
			return $mydata;
		}
		
		function get_curl2($url,$header) {
			
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "$url");
			curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
			curl_setopt($curl, CURLOPT_USERAGENT, "Firefox"); //Spoofs Firefox
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result	= curl_exec($curl);
			//print_r($result); exit;
			curl_close($curl);
			return $result;
		}
		
		function get_curl($url,$user_pass) {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "$url");
			curl_setopt($curl, CURLOPT_USERPWD, "$user_pass");
			curl_setopt($curl, CURLOPT_USERAGENT, "Firefox"); //Spoofs Firefox
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result	= curl_exec($curl);
			curl_close($curl);
			return $result;
		}
	}
?>