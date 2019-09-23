<!doctype html>
<html>
<head>
    <title><?=$pageTitle;?></title>
</head>
<body>

  <ul>
    <li><a href="?model=students&action=list">Students list</a></li>
    <li><a href="?model=groups&action=list">Groups list</a></li>
  </ul>
  <div style="background: red; height: 200px;"></div>
  <?=$pageContent;?>
</body>
</html>

