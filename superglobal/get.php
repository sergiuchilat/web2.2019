<!doctype html>
<head>
<head>
<body>
<? 

/*

?x=1&y=2&m[0]=1&m[1]=2&student[name]=Ion
*/

/*
Array
(
    [x] => 1
    [y] => 2
    [m] => Array
        (
            [0] => 1
            [1] => 2
        )

    [student] => Array
        (
            [name] => Ion
        )

)
*/

echo '<pre>';
print_r($_GET);
echo '</pre>';
?>
</body>