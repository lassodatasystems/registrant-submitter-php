<?php

/*
 * This class is used to format data into the Lasso Lead
 */
class LassoLead
{
  /*
   * String the first name of the lead.
   */
  private $firstName;

  /*
   * String the last name of the lead.
   */
  private $lastName;

  /*
   * String the clients id from Lasso.
   */
  private $clientId;

  /*
   * Array the project ids (integers) of Lasso projects that the lead
   * should be entered into.
   */
  private $projectIds = [];

  /*
   * Array the email objects
   * {
       email: 'person@example.com',
       type: 'Home',
       primary: true
     }
   */
  private $emails = [];

  /*
   * String the rating the registrant should be entered with
   */
  private $rating = 'N';

  /*
   * String the source type the registrant should be entered with
   */
  private $sourceType = 'website';

  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  public function setClient($clientId) {
    $this->clientId = $clientId;
  }

  public function addProject($project_id) {
    $this->projectIds[] = $project_id;
  }

  public function setLassoUid($lasso_uid) {
    $this->lasso_uid = $lasso_uid;
  }

  public function addEmail($email, $type = 'Home', $primary = true) {
    $this->emails[] = [
      'email' => $email,
      'type' => $type,
      'primary' => $primary
    ];
  }

  public function setRating($rating) {
      $this->rating = $rating;
  }

  public function setSourceType($sourceType) {
      $this->sourceType = $sourceType;
  }

  public function __construct($first_name, $last_name, $project_id, $client_id, $lasso_uid) {
    $this->setFirstName($first_name);
    $this->setLastName($last_name);
    $this->setClient($client_id);
    $this->setLassoUid($lasso_uid);
    $this->addProject($project_id);
  }

  public function toArray() {
    return get_object_vars($this);
  }
}
