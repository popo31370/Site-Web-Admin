<?php

$data = ["apple", "banana", "cherry", "date", "grape", "kiwi", "mango", "orange"];

$search = strtolower($_GET['term']);
$results = array_filter($data, function($item) use ($search) {
    return strpos($item, $search) !== false;
});

echo json_encode(array_values($results));
?>
