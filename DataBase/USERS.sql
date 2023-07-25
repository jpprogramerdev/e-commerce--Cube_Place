use cube_place_db;

CREATE TABLE users(
    ID_User SMALLINT PRIMARY KEY AUTO_INCREMENT,
    Name_User VARCHAR(200) NOT NULL,
    Email_User VARCHAR(300) NOT NULL,
    Password_User VARCHAR(200) NOT NULL
    Type_User SMALLINT NOT NULL,
    FOREIGN KEY(Type_User) references Type_Of_User(ID_Type_User)
);