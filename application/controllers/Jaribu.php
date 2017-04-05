<?php
  class Jaribu extends CI_Controller
  {
    function __construct()
    {
      parent::__Construct();
    }

    function index()
    {
      echo "Events<br />";
      echo "----------<br />";
      $values = $this->events_model->read();
      var_dump($values);

      echo "<br /><br />";
      echo "Stands<br />";
      echo "----------<br />";
      $values = $this->stands_model->read();
      var_dump($values);

      echo "<br /><br />";
      echo "Companies<br />";
      echo "-------------<br />";
      $values = $this->companies_model->read();
      var_dump($values);

      echo "<br /><br />";
      echo "Reservations<br />";
      echo "----------------<br />";
      $values = $this->reservations_model->read();
      var_dump($values);
    }
  }
