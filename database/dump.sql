CREATE TABLE IF NOT EXISTS User
(
    id          INT            NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username    VARCHAR(255)   NOT NULL,
    password    VARCHAR(255)   NOT NULL,
    roles       INT            NOT NULL              DEFAULT 0
);

CREATE TABLE IF NOT EXISTS Posts
(
    id      INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
    author  VARCHAR(255) NOT NULL FOREIGN KEY
);