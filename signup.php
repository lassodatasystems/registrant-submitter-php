<?php

require('src/LassoLead.php');
require('src/RegistrantSubmitter.php');

/*
 * These variables should only be attached to the request on the server side
 */
$clientId  = '';
$projectId = '';

/*
 * This is a security token and should be kept private and should not be a
 * hidden field on your registration page
 */
$apiKey = '';

if (empty($clientId) || empty($projectId) || empty($apiKey)) {
    throw new Exception('Required parameters are not set, please
                       check that your $clientId, $projectId and $apiKey are
                       configured correctly');
}

/*
 * Constructing and submitting a lead:
 * Map your forms fields into the lead object and submit
 */
$lead = new LassoLead($_REQUEST['firstName'],
    $_REQUEST['lastName'],
    $projectId,
    $clientId);
$lead->addEmail($_REQUEST['email']);
$lead->addPhone($_REQUEST['phone']);
$lead->addAddress($_REQUEST['address'],
    $_REQUEST['city'],
    $_REQUEST['province'],
    $_REQUEST['postal'],
    $_REQUEST['country']);
$lead->setRating('N');
$lead->setSendSalesRepAssignmentNotification(true);
$lead->addQuestion('\TheProject\Registration', 'How Heard', 'Newsletter');

$submitter = new RegistrantSubmitter();
$curl      = $submitter->submit('https://api.lassocrm.com/registrants', $lead, $apiKey);

/*
 * ---------------------------------------------------------------
 * Troubleshooting examples
 * ---------------------------------------------------------------
 */

/* Viewing the submission body */
//echo json_encode($lead->toArray());

/* Getting the response servers response code */
//echo curl_getinfo($curl, CURLINFO_HTTP_CODE);

/* Getting all details of the cUrl request */
//print_r(curl_getinfo($curl));
