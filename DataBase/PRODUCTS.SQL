use cube_place_db;

CREATE TABLE products(
    ID_Product INT PRIMARY KEY AUTO_INCREMENT,
    Name_Product VARCHAR(200) NOT NULL,
    Img_Product VARCHAR(500) NOT NULL,
    Price_Product DECIMAL(5,2) NOT NULL,
    Description_Product VARCHAR(800) NOT NULL,
    Quantity_Product INT NOT NULL,
    Type_Product SMALLINT NOT NULL, 
    FOREIGN KEY(Type_Product) references type_of_product(ID_Type_Product)
);