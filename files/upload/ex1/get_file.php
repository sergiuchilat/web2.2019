<?php
echo '<pre>';
print_r($_FILES);
echo '</pre>';


move_uploaded_file($_FILES['photo']['tmp_name'], 'files/' . $_FILES['photo']['name']);
