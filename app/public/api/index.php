<?php

// Step 1: Get a datase connection from our help class
// like the import file from python; telling where the data is from
// everything after the $ is naming a variable
$db = DbConnection::getConnection();

// Step 2: Create & run the query
  //creating the statement to get all the information from the db
$stmt = $db->prepare('SELECT * FROM Patient p, PatientVisit pv
                      WHERE p.patientGuid = pv.patientGuid');
  //runs the query
$stmt->execute();
  //procures all the results
$patients = $stmt->fetchAll();

// patientGuid VARCHAR(64) PRIMARY KEY,
// firstName VARCHAR(64),
// lastName VARCHAR(64),
// dob DATE DEFAULT NULL,
// sexAtBirth CHAR(1) DEFAULT ''

// Step 3: Convert to JSON
  //the given variable information ($patients) will be tunred into json code
  //json_pretty_print indents and puts everything into a reasily readable manner
$json = json_encode($patients, JSON_PRETTY_PRINT);

// Step 4: Output
  //
header('Content-Type: application/json');
  //procures the json content
echo $json;
