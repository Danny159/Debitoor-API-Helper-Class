<?php
// Code by Daniel Roizer - http://thatblogger.co
// v1.0

//////////
/*
USAGE

$apihelp = new DebitoorApiHelper();
$apihelp->createApiCall(
	"https://app.debitoor.com/login/oauth2/access_token",
	'POST',
	NULL,
	array(
		'client_secret' => 'SECRETHERE',
		'code' => $_GET['code'],
		'redirect_uri' => 'CALLBACK HERE'
	)
);


$apihelp = new DebitoorApiHelper();
$bk = $apihelp->createApiCall(
	"https://app.debitoor.com/api/v1.0/customers",
	'GET',
	NULL,
	array(
		'access_token' => 'MYACCESSTOKEN'
	)
);
*/

class DebitoorApiHelper {
	
	public static function createApiCall($url, $method, $headers, $data = array()){
        if($method == 'PUT'){
            $headers[] = 'X-HTTP-Method-Override: PUT';
        }
		
		if($method == 'GET' && $data != NULL){
			$url_append = $url . "?";
            foreach($data as $key => $val){
				$url_append .= $key . "=" . $val . "&";
			}
			
			$url = substr($url_append, 0, -1);
        }

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

        switch($method){
            case 'GET':
                break;
            case 'POST':
                curl_setopt($handle, CURLOPT_POST, true);
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'PUT':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
				curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
        }
        $response = curl_exec($handle);
        return json_decode($response, true);
    }
}