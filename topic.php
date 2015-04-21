<?php
// topic.php

$data           = array("topic1","topic2","topic3","topic4");      // array to pass back data

// Write the Select Statement for the Subtpics Here and keep appending that data to the $data variable

    
// return all our data to an AJAX call
echo json_encode($data);
?>