CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('admin', '$2y$10$eW5PIyH6ztfS5RFeQvBf.OB3.0hGwS1Q7JPoHTsfy4PBqwa.A6OZq')
ON DUPLICATE KEY UPDATE username=username;
