<?php
require_once('vendor/autoload.php');
require_once('./Resources/ExternalConfiguration.php');

function DownloadFileWithFileIdentifier()
{
    $commonElement = new CyberSource\ExternalConfiguration();
	$config = $commonElement->ConnectionHost();
    $apiclient = new CyberSource\ApiClient($config);
    $api_instance = new CyberSource\Api\SecureFileShareApi($apiclient);
    $fileId = "RGVtb19SZXBvcnQtNzg1NWQxM2YtOTM5Ny01MTEzLWUwNTMtYTI1ODhlMGE3MTkyLnhtbC0yMDE4LTEwLTIw";

    $api_response = list($response,$statusCode,$httpHeader)=null;
	try {
		$api_response = $api_instance->getFile($fileId, $organizationId = "testrest");
		echo "<pre>";print_r($api_response);

	} catch (Cybersource\ApiException $e) {
		print_r($e);
        print_r($e->getMessage());
    }
}

    // Call Sample Code
    if(!defined('DO_NOT_RUN_SAMPLES')){
         echo "DownloadFileWithFileIdentifier Samplecode is Running.. \n";
         DownloadFileWithFileIdentifier();
    }

?>