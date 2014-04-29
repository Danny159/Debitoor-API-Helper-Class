<?php
// Debitoor API Helper
// Code by Daniel Roizer - http://thatblogger.co
// v2.0

class DebitoorApiHelper {
	public static function createApiCall($url, $method, $headers, $data = array()){
		
		// Append URL
		$url = apiURL . $url . "?access_token=" . token;
		
        if($method == 'PUT'){
            $headers[] = 'X-HTTP-Method-Override: PUT';
        }
		
		if($method == 'GET' && $data != NULL){
			$url_append = $url . "&";
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
                curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case 'PUT':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case 'DELETE':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
				curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($data));
                break;
        }
        $response = curl_exec($handle);
		$uncoded = json_decode($response, true);
		if($uncoded['code'] == "unAuthorized" || $uncoded['code'] == "system"){
			return false;
		}else{
        	return $uncoded;
		}
    }
}