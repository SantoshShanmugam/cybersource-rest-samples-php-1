<?php
require_once('vendor/autoload.php');
require_once('./Resources/ExternalConfiguration.php');

function CreateAdhocReport()
{
	$commonElement = new CyberSource\ExternalConfiguration();
	$config = $commonElement->ConnectionHost();
	$apiclient = new CyberSource\ApiClient($config);
	$api_instance = new CyberSource\Api\ReportsApi($apiclient);
	  $createReportRequestArr =[
		"reportDefinitionName"=> "TransactionRequestClass",
		"timezone"=> "GMT",
		"reportMimeType"=> "application/xml",
		"reportName"=> "testrest_v47233",
		"reportStartTime"=> "2018-09-01T12:00:00+05:00",
		"reportEndTime"=> "2018-09-02T12:00:00+05:00",
		"reportPreferences"=> ["signedAmounts"=>"true","fieldNameConvention"=>"SOAPI"],
		"reportFields"=>["Request.RequestID","Request.TransactionDate","Request.MerchantID"]
	  ];
	  
	  
	$reportRequest = new CyberSource\Model\RequestBody1($createReportRequestArr);
	$api_response = list($response,$statusCode,$httpHeader)=null;
	try {
		$api_response = $api_instance->createReport($reportRequest);
		echo "<pre>";print_r($api_response);

	} catch (Exception $e) {
		print_r($e->getresponseBody());
    	print_r($e->getmessage());
	}
}    

// Call Sample Code
if(!defined('DO_NOT_RUN_SAMPLES')){
    echo "CreateAdhocReport Samplecode is Running.. \n";
	CreateAdhocReport();

}
?>	
