<?php 
namespace App;
/**
 *  
 */
class SendCode 
{
	
	public static function sendCode($sendData)
	{
		  return $sendData['message'];
		
		//$code = rand(1111,9999);

		
        // $number = (int)$phone;
        // $sender = "TESTID";
        // $message = 'Verify Code: '.$code;

        //$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 

        // $url = "http://login.yourbulksms.com/api/sendhttp.php?authkey=15447ABjL1mJkd5ee33b29P15&mobiles=".$sendData['mobile']."&message=".$sendData['message']." & new&mobile&sender=TPFSMS&route=4";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $curl_scraped_page = curl_exec($ch);

        curl_close($ch);

        // return $code;
	}
}