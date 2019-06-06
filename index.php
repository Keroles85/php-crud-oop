<?php
include 'autoload.php';

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// retrieve records here

$database = new Database();
$db = $database->connect_db();

$category = new Category($db);
$product = new Product($db);

// set page header
$page_title = "Read Products";
include_once "include/layout_header.php";
?>

<div class='right-button-margin'>
  <a href='create.php' class='btn btn-default pull-right'>Create Product</a>
</div>



<?php
// set page footer
include_once "include/layout_footer.php";
?>