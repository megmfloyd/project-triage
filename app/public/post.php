<?php

//0. validate data
$db = DbConnection::getConnection();

// Step 2: Create & run the query
  //creating the statement to get all the information from the db
$stmt = $db->prepare(
  'INSERT INTO Patient(patientGuid, firstName, lastName, dob, sexAtBirth, )
  VALUES (?,?,?,?,?)'
);
  //runs the query
$stmt->execute({
  $_POST['patientGuid'],
  $_POST['visitDescription'],
  $_POST['priority']
});

//todo error checking

//Output
header('HTTP/1.1 303 See Other');
header('Location: ../records/?guid'.$guid);
