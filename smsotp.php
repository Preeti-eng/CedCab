<?php
session_start();
    $mobile = $_POST['mobile'];
    $otp = rand(10000,99999);
    echo $otp;
    $_SESSION["OTP"] = $otp;

    $field = array(
        "sender_id" => "FSTSMS",
        "language" => "english",
        "route" => "qt",
        "numbers" => $mobile,
        "message" => "42846",
        "variables" => "{#AA#}|{#CC#}",
        "variables_values" => "$otp|asdaswdx"
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($field),
      CURLOPT_HTTPHEADER => array(
        "authorization: uWp68PJvhU45tAXDLTV7FfnEoxQGzlOiHj3kIRsNq09MwKcdBYQEG69Ft2flLSH3j8beh7yp5iTcDvqm",
        "cache-control: no-cache",
        "accept: */*",
        "content-type: application/json"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
    
   


?>