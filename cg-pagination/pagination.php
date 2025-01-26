<?php
/**
 This example assumes you have an array of data ($data) and you want to display a certain number of items per page ($itemsPerPage). It uses the array_slice function to extract the relevant portion of the data array for the current page.

The pagination links are generated based on the total number of pages ($totalPages), and each link includes the page number in the URL.

Note: In a real-world scenario, you would likely fetch data from a database instead of using a static array. Also, you should perform proper input validation and sanitation, especially when dealing with user input like page numbers from the URL.
 */
?>

 <?php
// Sample data array (replace this with your actual data source)
$data = range(1, 100); // Array with 1 to 100 elements

// Number of items per page
$itemsPerPage = 10;

// Get current page number from the URL, default to 1
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the data array
$offset = ($page - 1) * $itemsPerPage;

// Get the current page's data
$pageData = array_slice($data, $offset, $itemsPerPage);

// Display the data
echo "<h1>Page $page</h1>";
echo "<ul>";
foreach ($pageData as $item) {
    echo "<li>$item</li>";
}
echo "</ul>";

// Pagination links
$totalPages = ceil(count($data) / $itemsPerPage);

echo "<div>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}
echo "</div>";
?>
  