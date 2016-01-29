<?php

require('src/LassoLead.php');
require('src/RegistrantSubmitter.php');

/* These variables should only be attached to the request on the server side */
$clientId = 19;
$projectId = 6;

/* This is a security token and should be kept private
 * this should not be a hidden field on your registration page.
 */
$lassoUid  = '';

/* Contructing and submitting a lead */
$lead = new LassoLead($_REQUEST['firstName'],
                      $_REQUEST['lastName'],
                      $projectId,
                      $clientId,
                      $lassoUid);
$lead->addEmail($_REQUEST['email']);
$lead->setRating('MrNew');

$submitter = new RegistrantSubmitter();
$curl = $submitter->submit('http://api.andrew.mylasso.com/registrants', $lead, 'L32rnSAF0');

// Example, reading the error codes returned by the submission processor
// CURLOPT_FOLLOWLOCATION - set false to disable redirection

// Viewing the submission body
#echo json_encode($lead->toArray());

// Getting the response servers response code
#echo curl_getinfo($curl, CURLINFO_HTTP_CODE);

// Getting all details of the cUrl request
print_r(curl_getinfo($curl));
