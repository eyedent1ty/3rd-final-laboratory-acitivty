<h1>Item Form Screen</h1>

<a href="http://localhost/final/laboratory-3-finish/">Shopping Item</a>

<?php
include './connection.php';

$id = $_GET['id'];

$nameValue = '';
$isDoneValue = '0';

function getItemById($id)
{
  global $connection;
  $sql = "SELECT * FROM tblItems WHERE tblItems.id = $id";
  $result = mysqli_query($connection, $sql);
  return mysqli_fetch_assoc($result);
}

if (isset($id)) {
  $currentItem = getItemById($id);
  $nameValue = $currentItem['name'];
  $isDoneValue = $currentItem['isDone'];
}
?>

<form method="POST" action="">
  <div>
    <label for="name">Item name: </label>
    <?php
    echo "<input id='name' name='name' type='text' required value='$nameValue' />";
    ?>
  </div>

  <div>
    <label for="isDone">is Done?</label>
    <?php
    if ($isDoneValue) {
      echo "<input id='isDone' name='isDone' type='checkbox' checked";
    } else {
      echo "<input id='isDone' name='isDone' type='checkbox'";
    }
    ?>
    />
  </div>

  <input type="submit" name="submit" value="Save" />
</form>

<?php
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $isDone = $_POST['isDone'] === 'on' ? '1' : '0';
  $sql = '';

  if (isset($id)) {
    $sql = "UPDATE tblItems SET name='$name', isDone='$isDone' WHERE tblItems.id = $id";
  } else {
    $sql = "INSERT INTO tblItems (name, isDone) VALUES ('$name', '$isDone')";
  }

  mysqli_query($connection, $sql);
}
?>