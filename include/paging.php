<ul class="pagination">

  <?php
  $page_url = "index.php?";
  $total_rows = $product->countAll();
  ?>

  <!-- first link button -->
  <?php if ($page > 1): ?>
    <li><a href="<?= $page_url?>" title="Go to first page">First</a></li>
  <?php endif; ?>

  <?php
  //calculate total pages
  $total_pages = ceil($total_rows / $records_per_page);

  //range of links to show in pagination
  $range = 2;
  $initial_num = $page - $range;
  $condition_limit_num = ($page + $range) + 1;
  //echo $range . ' : ' . $initial_num . ' : ' . $condition_limit_num;

  for($i = $initial_num; $i < $condition_limit_num; $i++) {

    if(($i > 0) && ($i <= $total_pages)) {
      //current page
      if ($i == $page) {
        echo "<li class='active'><a href=\"#\">$i <span class=\"sr-only\">(current)</span></a></li>";
        //not current page
      } else {
        echo "<li><a href='{$page_url}page=$i'>$i</a></li>";
      }
    }
  }
  ?>

  <!-- last link button -->
  <?php if($page < $total_pages): ?>
    <li><a href="<?= $page_url ?>page=<?= $total_pages ?>" title='Last page is <?= $total_pages ?>.'>Last</a></li>
  <?php endif; ?>

</ul>