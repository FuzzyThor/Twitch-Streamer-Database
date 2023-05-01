<?php
include 'db_config.php';
    
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        $streamer_name = $_POST['streamer_name'];
        $streamer_username = $_POST['streamer_username'];
        
        // Check if streamer already exists
        $check_query = "SELECT * FROM t_streamers WHERE streamer_username='$streamer_username'";
        $result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($result) > 0) {
            echo "<p>Streamer already exists.</p>";
        } else {
            // Insert streamer into database
            $insert_query = "INSERT INTO t_streamers (streamer_name, streamer_username) VALUES ('$streamer_name', '$streamer_username')";
            if (mysqli_query($conn, $insert_query)) {
                echo "<p>Streamer added successfully.</p>";
            } else {
                echo "<p>Error adding streamer: " . mysqli_error($conn) . "</p>";
            }
        }
    }
    
        // Check if form submitted
    if (isset($_POST['remove_streamer'])) {
        // Get array of streamer IDs from form data
        $streamer_ids = $_POST['streamer_ids'];
        
        // Loop through IDs and delete streamers from database
        foreach ($streamer_ids as $streamer_id) {
            $delete_query = "DELETE FROM t_streamers WHERE streamer_id=$streamer_id";
            mysqli_query($conn, $delete_query);
        }
        
        // Redirect to streamers page
        header('Location: add_remove_streamer.php');
    }
    
    // Retrieve list of streamers from database
    $select_query = "SELECT * FROM t_streamers";
    $result = mysqli_query($conn, $select_query);
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Streamer</title>
</head>
<body style="color:#ff992c;">
    <h1>Add Streamer</h1>
    <form method="post">
        <label for="streamer_name">Streamer Name:</label>
        <input type="text" id="streamer_name" name="streamer_name" required><br><br>
        
        <label for="streamer_username">Streamer Username:</label>
        <input type="text" id="streamer_username" name="streamer_username" required><br><br>
        
        <input type="submit" name="submit" value="Add Streamer">
    </form>
    <h1>Remove Streamer</h1>
    <form method="post">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <label>
                <input type="checkbox" name="streamer_ids[]" value="<?php echo $row['streamer_id']; ?>">
                <?php echo $row['streamer_name']; ?>
            </label><br>
        <?php } ?>
        <button type="submit" name="remove_streamers">Remove Selected Streamers</button>
    </form>
    
</body>
</html>