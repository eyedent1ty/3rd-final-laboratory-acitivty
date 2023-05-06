<?php
include './connection.php';

function getItemsFromDatabase()
{
  global $connection;
  $sql = 'SELECT * FROM tblItems';
  $result = mysqli_query($connection, $sql);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($rows, $row);
  }

  return $rows;
}

$items = getItemsFromDatabase();
?>

<h1>Item List Screen</h1>
<table border="1">
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>done</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $item) : ?>
      <tr>
        <td><?php echo $item['id'] ?></td>
        <td>
          <?php
          $id = $item['id'];
          $name = $item['name'];
          echo "<a href='http://localhost/final/laboratory-3-finish/addAndEdit.php?id=$id'>$name</a>";
          ?>
        </td>
        <td>
          <?php
          $isDone = $item['isDone'];
          $isChecked = $isDone === '1' ? true : false;

          if ($isChecked) {
            echo "<input type='checkbox' checked />";
          } else {
            echo "<input type='checkbox' />";
          }
          ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<a href="http://localhost/final/laboratory-3-finish/addAndEdit.php">Add new item</a>