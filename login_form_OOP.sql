CREATE TABLE users (
    usersId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    usersName TINYTEXT NOT NULL,
    usersSurname TINYTEXT NOT NULL,
    usersUid TINYTEXT NOT NULL,
    usersEmail TINYTEXT NOT NULL,
    usersPassword LONGTEXT NOT NULL,
    usersRoles INT(11) FOREIGN KEY DEFAULT 1 NOT NULL,
);

/* https://www.youtube.com/watch?v=BaEm2Qv14oU */