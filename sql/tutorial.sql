CREATE TABLE users(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    dateofbirth DATE NULL,
    Password varchar(200),
    create_at DATE NOT NULL DEFAULT CURRENT_TIMESTAMP
);
