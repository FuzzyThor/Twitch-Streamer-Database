CREATE TABLE t_streamers (
    streamer_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    streamer_name VARCHAR(255) NOT NULL,
    streamer_username VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
