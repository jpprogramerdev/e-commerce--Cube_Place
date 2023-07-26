use cube_place_db;

CREATE TABLE type_of_product(
    ID_Type_Product SMALLINT PRIMARY KEY AUTO_INCREMENT,
    Name_Type_Product VARCHAR (200) NOT NULL
);

INSERT INTO type_of_product(Name_Type_Product) VALUES
('3X3X3'),
('2X2X2'),
('4X4X4'),
('5X5X5'),
('6X6X6'),
('7X7X7'),
('Skewb'),
('Pyraminx'),
('Square-1'),
('Megaminx'),
('Clock'),
('Lubrificantes'),
('Suportes'),
('Bolsa'),
('Timer'),
('Tapetes'),
('Cover');