<html>
<body>
<!--
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>
-->
<form method="post" action="test_post.php">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<a href="http://localhost/projets_php/test_get.php?fname=benhar+khalid">tester GET</a>

<script>
function myfunction() {
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "demo_ajax.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.send("fname=BENHAR");
  }
</script>

  <button onclick="myfunction()">Click me!</button>
  <h1 id="demo"></h1>

<?php
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_REQUEST['fname']);
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
} */
?>


</body>
</html>