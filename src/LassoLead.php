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
  private $projectIds = array();

  /**
   * @var Array the email objects
   * {
   *   email: 'person@example.com',
   *   type: 'Home',
   *   primary: true
   * }
   */
  private $emails = array();

  /**
   * @var Array the phone objects
   * {
   *   phone: '123 456 7890',
   *   type: 'Mobile',
   *   primary: true
   * }
   */
  private $phones = array();

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
  private $questions = array();

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
  private $addresses = array();

  /**
   * String $rating
   */
  private $rating = 'N';

  /**
   * String $sourceType
   */
  private $sourceType = 'Online Registration';

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
    $this->emails[] = array(
      'email' => $email,
      'type' => $type,
      'primary' => $primary
    );
  }

  /**
   * @param String $phone
   * @param String $type
   * @param Boolean $primary
   */
  public function addPhone($phone, $type = 'Mobile', $primary = true) {
    $this->phones[] = array(
      'phone' => $phone,
      'type' => $type,
      'primary' => $primary
    );
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
    $this->addresses[] = array(
      'address' => $address,
      'city' => $city,
      'country' => $country,
      'province' => $state,
      'postalCode' => $zip,
      'type' => $type,
      'primary' => $primary
    );
  }

  /**
   * @param String $path folder structure
   * @param String $question
   * @param Mixed String|Array
   */
  public function addQuestion($path, $question, $answer) {
    $answers = is_array($answer) ? $answer : array(array('id' => '', 'text' => $answer));
    $this->questions[] = array(
      'id' => '',
      'path' => $path,
      'name' => $question,
      'answers' => $answers
    );
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
