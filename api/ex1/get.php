<?php
$students = [
    [
        'name' => "Ion",
        'age' => 3
    ],
    [
        'name' => "Mihai",
        'age' => 4
    ]
];

echo json_encode($students, JSON_FORCE_OBJECT);
