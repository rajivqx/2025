<?php

$arr=[5, 4, 6, 9, 10];
$total_sum=array_add($arr);
$total_itm=count($arr);
$avarage=$total_sum/$total_itm;



foreach($arr as $item)
{

    if($item>$avarage)
    echo $item;
}

  ?>


<div  class="copy-right">
                    &copy; <?php
                    echo esc_html( date( 'Y' ) ) . " ";
                    bloginfo( 'name' );
                    ?>  
                </div><!-- .copy-right -->


<form method="post" action="">
    <input type="hidden" name="product_title" value="<?php echo get_the_title(); ?>">
    <?php $terms = get_the_terms( get_the_ID(), 'product_cat' ); ?>
    <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
        <input type="hidden" name="product_category" value="<?php echo esc_attr( $terms[0]->name ); ?>">
    <?php endif; ?>
    <textarea name="inquiry_message" placeholder="Enter your inquiry"></textarea>
    <input type="submit" name="submit_inquiry" value="Submit Inquiry">
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Form</h2>
    <form action="process_form.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required><br><br>
        <input type="email" name="email" placeholder="Your Email" required><br><br>
        <select name="state" id="state" required>
            <option value="">Select State</option>
            <?php
            // Include your database connection
            $db_connection = mysqli_connect("localhost", "username", "password", "database");
            $query = "SELECT * FROM states";
            $result = mysqli_query($db_connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row['id']."'>".$row['state_name']."</option>";
            }
            ?>
        </select><br><br>
        <select name="city" id="city" required>
            <option value="">Select City</option>
        </select><br><br>
        <textarea name="message" placeholder="Your Message" required></textarea><br><br>
        <button type="submit">Submit</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#state').change(function() {
                var state_id = $(this).val();
                $.ajax({
                    url: 'get_cities.php',
                    type: 'POST',
                    data: {state_id: state_id},
                    success: function(response) {
                        $('#city').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>



