<!DOCTYPE html>
<html>
<head>
    <title>Streamers</title>
    <script src="https://embed.twitch.tv/embed/v1.js"></script>
</head>
<body>
    <?phpinclude 'db_config.php';    ?>
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