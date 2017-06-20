<?php

/**
 * This class is used to format data into the Lasso Lead
 */
class LassoLead
{
  /**
   * @var String the first name of the lead.
   */
  private $firstName;

  /**
   * @var String the last name of the lead.
   */
  private $lastName;

  /**
   * @var String the clients id from Lasso.
   */
  private $clientId;

  /**
   * @var Array|int[] the project ids of Lasso projects that the lead
   * should be entered into.
   */
  private $projectIds = [];

  /**
   * @var Array the email objects
   * {
   *   email: 'person@example.com',
   *   type: 'Home',
   *   primary: true
   * }
   */
  private $emails = [];

  /**
   * @var Array the phone objects
   * {
   *   phone: '123 456 7890',
   *   type: 'Mobile',
   *   primary: true
   * }
   */
  private $phones = [];

  /**
   * @var Array the question objects
   * {
   *   id: '110',
   *   path: '/questions',
   *   name: 'Your Question',
   *   answers: {
   *              id: '220',
   *              text: 'My Answer'
   *            }
   * }
   */
  private $questions = [];

  /**
   * @var Array the address objects
   * {
   *   address: '123 Street',
   *   city: 'Vancouver',
   *   country: 'Canada',
   *   province: 'BC',
   *   postalCode: 'V1V1V1',
   *   type: 'Home',
   *   primary: true
   * }
   */
  private $addresses = [];

  /**
   * String $nameTitle
   */
  private $nameTitle = '';

  /**
   * String $company
   */
  private $company = '';

  /**
   * String $rating
   */
  private $rating = 'N';

  /**
   * String $sourceType
   */
  private $sourceType = 'Online Registration';

  /**
   * String $secondarySourceType
   */
  private $secondarySourceType = '';

  /**
   * String $followUpProcess
   */
  private $followUpProcess = '';

  /**
   * bool $sendSalesRepAssignmentNotification
   */
  private $sendSalesRepAssignmentNotification = false;

  /**
   * String $thankYouEmailTemplateId
   */
  private $thankYouEmailTemplateId = '';

  /**
   * bool $sendOptInEmail
   */
  private $sendOptInEmail = false;

  /**
   * @var String $guid
   */
  private $guid = '';

  /**
   * @var String $domainAccountId;
   */
  private $domainAccountId = '';

  /**
   * @var Integer $ratingId
   */
  private $ratingId = '';

  /**
   * @var Integer $rotationId
   */
  private $rotationId = '';

  /**
   * @var Array $notes
   */
  private $notes = '';

  /**
   * @param String $firstName
   */
  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  /**
   * @param String $lastName
   */
  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  /**
   * @param Integer $clientId
   */
  public function setClient($clientId) {
    $this->clientId = $clientId;
  }

  /**
   * @param Integer $projectId
   */
  public function addProject($projectId) {
    $this->projectIds[] = $projectId;
  }

  /**
   * @param String $email
   * @param String $type
   * @param Boolean $primary
   */
  public function addEmail($email, $type = 'Home', $primary = true) {
    $this->emails[] = [
      'email' => $email,
      'type' => $type,
      'primary' => $primary
    ];
  }

  /**
   * @param String $phone
   * @param String $type
   * @param Boolean $primary
   */
  public function addPhone($phone, $type = 'Mobile', $primary = true) {
    $this->phones[] = [
      'phone' => $phone,
      'type' => $type,
      'primary' => $primary
    ];
  }

  /**
   * @param String $address unit number
   * @param String $city
   * @param String $state state/province
   * @param String $zip zip/postal code
   * @param String $country
   * @param String $type
   * @param Boolean $primary
   */
  public function addAddress($address, $city, $state, $zip, $country, $type = 'Home', $primary = true) {
    $this->addresses[] = [
      'address' => $address,
      'city' => $city,
      'country' => $country,
      'province' => $state,
      'postalCode' => $zip,
      'type' => $type,
      'primary' => $primary
    ];
  }

  /**
   * @param String $path folder structure
   * @param String $question
   * @param Mixed String|Array
   */
  public function addQuestion($path, $question, $answer) {
    $answers = is_array($answer) ? $answer : [['id' => '', 'text' => $answer]];
    $this->questions[] = [
      'id' => '',
      'path' => $path,
      'name' => $question,
      'answers' => $answers
    ];
  }

  /**
   *  @param Integer $questionId
   *  @param Mixed Integer|Array $answerId
   */
  public function answerQuestionById($questionId, $answerId){
    $answers = is_array($answerId) ? array_map(function($id){ return ['id' => $id ]; } , $answerId) : [['id' => $answerId ]];
    $this->questions[] = [
        'id' => $questionId,
        'path' => '',
        'name' => '',
        'answers' => $answers
    ];
  }

  /**
   *  @param Integer $questionId
   *  @param String $answerText
   */
  public function answerQuestionByIdForText($questionId, $answerText){
    $this->questions[] = [
        'id' => $questionId,
        'path' => '',
        'name' => '',
        'answers' => [['id' => '',
                      'text' => $answerText]]
    ];
  }

  /**
   * @param String $nameTitle
   */
  public function setNameTitle($nameTitle) {
      $this->nameTitle = $nameTitle;
  }

  /**
   * @param String $company
   */
  public function setCompany($company) {
      $this->company = $company;
  }

  /**
   * @param String $rating
   */
  public function setRating($rating) {
      $this->rating = $rating;
  }

  /**
   * @param String $sourceType
   */
  public function setSourceType($sourceType) {
      $this->sourceType = $sourceType;
  }

  /**
   * @param String $secondarySourceType
   */
  public function setSecondarySourceType($secondarySourceType) {
      $this->secondarySourceType = $secondarySourceType;
  }

  /**
   * @param String $followUpProcess
   */
  public function setFollowUpProcess($followUpProcess) {
      $this->followUpProcess = $followUpProcess;
  }

  /**
   * Trigger an email notification to be sent to the assigned sales rep(s) upon successful registration.
   */
  public function sendAssignmentNotification() {
      $this->sendSalesRepAssignmentNotification = true;
  }

  /**
   * Trigger an automatic thank you email to be sent to the registrant upon successful registration.
   */
  public function sendAutoReplyThankYouEmail($thankYouEmailTemplateId) {
      $this->thankYouEmailTemplateId = $thankYouEmailTemplateId;
  }

  /**
   * Trigger an opt-in email request to be sent to the registrant upon successful registration.
   */
  public function sendOptInEmail() {
      $this->sendOptInEmail = true;
  }

  /**
   *  @param Integer $ratingId
   */
  public function setRatingId($ratingId){
    $this->ratingId = $ratingId;
  }

  /**
   *  @param Integer $rotationId
   */
  public function setRotationId($rotationId){
    $this->rotationId = $rotationId;
  }

  /**
   * @param String $domainAccountId
   * @param String $guid
   */
  public function setWebsiteTracking($domainAccountId, $guid) {
    $this->domainAccountId = $domainAccountId;
    $this->guid = $guid;
  }

  /**
   * @param String $note
   */
  public function addNote($note){
    $this->notes[] = $note;
  }

  /**
   * @param String $firstName
   * @param String $lastName
   * @param Integer $projectId
   * @param Integer $clientId
   */
  public function __construct($firstName, $lastName, $projectId, $clientId) {
    $this->setFirstName($firstName);
    $this->setLastName($lastName);
    $this->setClient($clientId);
    $this->addProject($projectId);
  }

  /**
   * @return array
   */
  public function toArray() {
    return get_object_vars($this);
  }
}
