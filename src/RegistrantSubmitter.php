<?php

class RegistrantSubmitter
{
  public function submit($location, LassoLead $lead, $apiKey) {
    //open connection
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_URL, $location);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($lead->toArray()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    // Uncomment the code below if website does not have SSL certificate
    //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'X-Lasso-Auth:'. 'Token='. $apiKey . ',Version=1.0',
    ));
    curl_exec($curl);

    return $curl;
  }
}
