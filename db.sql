-- Create a users table
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);

-- Create a comments table that has a relationship with the users table
CREATE TABLE comments (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    comment_text TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    users_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE SET NULL
);


-- Inserts user row
INSERT INTO users (username, pwd, email) VALUES ('honduran_hunk', 'Anabolic123', 'hunk@gmail.com');

-- Updates username from a user in the user table
UPDATE users SET username = 'honduranHunk' WHERE id = 1;

-- Delete user from the db 
DELETE FROM users WHERE id = 2;

-- SELECT all the users and their data in table
SELECT * FROM users;

-- SELECT a username and email from users table
SELECT username, email FROM users WHERE id = 3;

-- SELECT a username and comment from the comment table
SELECT username, comment_text FROM comments WHERE users_id = 1;

-- INNER JOIN
SELECT * FROM users INNER JOIN comments ON users.id = comments.users_id;