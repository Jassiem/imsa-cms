<?php
  require_once('models/Person.php');

  class PersonController{
    private $pageInformation;

    function __construct(){
      ToroHook::add("before_handler", 'SessionController::checkLogin');
    }

    function post() {
      //update person
      if( isset( $_POST['editId'] ) ){
        self::updatePerson();
      }
      //create person
      else{
        self::createPerson();
        }
    }

    function get() {
      if( isset( $_GET['action'] ) && $_GET['action'] == 'addPerson' ){
        $pageInfo['pageTitle'] = 'Add Person';
        include( TEMPLATE_PATH . "/admin/addPerson.php" );
      }
      else if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ){
        self::editPerson();
      }
      else if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){
        self::deletePerson();
      }
      else{
        self::listPeople();
      }
    }

    //get all people and display them
    public function listPeople(){
      $results = array();
        $data = Person::getAllPeople();
        $results['people'] = $data;

      // render template
        $pageInfo['pageTitle'] = "All People";
        include( TEMPLATE_PATH . "/admin/listPeople.php" );
    }

    public function createPerson(){
          // get person data from post array
      $personData['first_name'] = stripslashes($_POST['first_name']);
      $personData['last_name']  = stripslashes($_POST['last_name']);
      $personData['title']      = $_POST['title'];
      $personData['area']       = $_POST['area'];
      $personData['email']      = $_POST['email'];
      
      $person = new Person($personData);

      if($person->save()){
        //display success message and list all people
        $this->pageInformation['successMessage'] = 'Person successfully added.';
        self::listPeople();
      }else{
        //display error message and go to add page
        $this->pageInformation['errorMessage'] = 'Unable to add person.';
        include( TEMPLATE_PATH . '/admin/addPerson.php' );
      }
    }

    public function updatePerson(){
      $newData['title'] = $_POST['title'];
      $newData['area']  = $_POST['area'];
      $newData['email'] = $_POST['email'];

      $person = Person::getById($_POST['editId']);
      if($person->update($newData)){
        //success message and display all articles
        $this->pageInformation['successMessage'] = "Person successfully updated";
        self::listPeople();
      }
      else{
        $this->pageInformation['errorMessage'] = 'Unable to update person.';
        $pageInfo['pageTitle'] = 'Edit Page';
        include( TEMPLATE_PATH . '/admin/editPerson.php' );
      }
    }

    //display edit form and populate it with data
    public function editPerson(){
      //get id from $_GET array
      $personId = $_GET['personId'];
      $person = Person::getById($personId);

      $pageInfo['pageTitle'] = 'Edit Page';
      include( TEMPLATE_PATH . '/admin/editPerson.php' );
    }

    public function deletePerson(){
      if(Person::delete($_GET['personId'])){
        $this->pageInformation['successMessage'] = 'Person successfully deleted';
      }
      else{
        $this->pageInformation['errorMessage'] = 'Unable to delete person.';
      }
      self::listPeople();
    }
  }

?>