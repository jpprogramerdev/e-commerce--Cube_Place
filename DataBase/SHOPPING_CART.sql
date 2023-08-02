use cube_place_db;

CREATE TABLE shopping_cart(
    Id_Cart INT PRIMARY KEY AUTO_INCREMENT,
    Id_Client SMALLINT NOT NULL,
    Id_Product int NOT NULL,
    Quantity int NOT NULL,
    FOREIGN KEY(Id_Client) references users(ID_User),
    FOREIGN KEY(Id_Product) references products(Id_Product)
);