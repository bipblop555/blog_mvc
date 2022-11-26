CREATE TABLE IF NOT EXISTS User
(
    id          INT            NOT NULL         PRIMARY KEY AUTO_INCREMENT,
    username    VARCHAR(255)   NOT NULL UNIQUE,
    password    VARCHAR(255)   NOT NULL,
    roles       INT            NOT NULL              
);

CREATE TABLE IF NOT EXISTS Posts
(
    id          INT             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content     TEXT            NOT NULL,
    username    VARCHAR(255)    NOT NULL,
    published   DATE            NOT NULL
);  