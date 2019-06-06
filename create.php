<?php
include 'autoload.php';

$database = new Database();
$db = $database -> connect_db();

$category = new Category($db);
$product = new Product($db);


// set page headers
$page_title = "Create Product";
include_once "include/layout_header.php";

?>

<div class='right-button-margin'>
  <a href='index.php' class='btn btn-default pull-right'>Read Products</a>
</div>

<!-- PHP Post Code -->
<?php

if ($_POST) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category_id = $_POST['category_id'];

  if ($product->create($name, $description, $price, $category_id)) {
    echo "<div class='alert alert-success'>Product was created.</div>";
  } else {
    echo "<div class='alert alert-danger'>Unable to create product.</div>";
  }
}

?>

<form action="" method="post">

  <table class='table table-hover table-responsive table-bordered'>

    <tr>
      <td>Name</td>
      <td><input type='text' name='name' class='form-control' /></td>
    </tr>

    <tr>
      <td>Price</td>
      <td><input type='text' name='price' class='form-control' /></td>
    </tr>

    <tr>
      <td>Description</td>
      <td><textarea name='description' class='form-control'></textarea></td>
    </tr>

    <tr>
      <td>Category</td>
      <td>
        <select class='form-control' name='category_id'>
          <option>Select category...</option>

            <?php
              $categories = $category -> read();
              foreach($categories as $category):
            ?>

              <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

            <?php endforeach; ?>

        </select>
      </td>
    </tr>

    <tr>
      <td></td>
      <td>
        <button type="submit" class="btn btn-primary">Create</button>
      </td>
    </tr>

  </table>
</form>

<?php
// footer
include_once "include/layout_footer.php";
?>