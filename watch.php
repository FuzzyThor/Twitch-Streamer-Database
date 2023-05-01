<?php
include 'db_config.php';
    
    // Get streamer username from URL parameter
    $streamer_username = $_GET['username'];
    
    // Retrieve streamer from database
    $select_query = "SELECT * FROM t_streamers WHERE streamer_username='$streamer_username'";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($result);
    $streamer_name = $row['streamer_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $streamer_name; ?></title>
</head>
<body>
   
    <h1><?php echo $streamer_name; ?></h1>
  <div style="display:inline;float: left;" id="twitch-embed"></div>

    <!-- Load the Twitch embed JavaScript file -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>

    <!-- Create a Twitch.Embed object that will render within the "twitch-embed" element -->
    <script type="text/javascript">
      new Twitch.Embed("twitch-embed", {
        width: 854,
        height: 480,
        channel: "<?php echo $streamer_username; ?>",
        // Only needed if this page is going to be embedded on other websites
        parent: ["forum.levolution.us"]
      });
    </script>
        <h1>Streamers</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Username</th>
        </tr>
        <?php
            // Retrieve streamers from database
            $select_query = "SELECT * FROM t_streamers";
            $result = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result)) {
                $streamer_name = $row['streamer_name'];
                $streamer_username = $row['streamer_username'];
                echo "<tr>";
                echo "<td><a href='watch.php?username=$streamer_username'>$streamer_name</a></td>";
                echo "<td>$streamer_username</td>";
                echo "</tr>";
            }
        ?>
        </table>
</body>
</html>
