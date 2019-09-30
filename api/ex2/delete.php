<?php
if($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    die($_SERVER['REQUEST_METHOD'] . ' not supported for this route');
}

echo 'Item deleted';
