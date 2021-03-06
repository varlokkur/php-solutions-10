<?php
include('../includes/title.inc.php');
require_once('../includes/connection.inc.php');
// create database connection
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT article_id, title, LEFT(article, 100) AS first100
        FROM blog ORDER BY created DESC';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Japan Journey<?php if (isset($title)) {echo "&#8212;{$title}";} ?></title>
<link href="../styles/journey.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<div id="header">
    <h1>Japan Journey </h1>
</div>
<div id="wrapper">
    <?php include('../includes/menu.inc.php'); ?>
    <div id="maincontent">
      <?php
      foreach ($conn->query($sql) as $row) {
      ?>
        <h2><?php echo $row['title']; ?></h2>
          <p><?php echo $row['first100']; ?>
            <a href="details.php?article_id=<?php $row['article_id']; ?>"> More</a></p>
      <?php } ?>
    </div>
    <?php include('../includes/footer.inc.php'); ?>
</div>
</body>
</html>
