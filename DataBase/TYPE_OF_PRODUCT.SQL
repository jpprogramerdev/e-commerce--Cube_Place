use cube_place_db;

CREATE TABLE type_of_product(
    ID_Type_Product SMALLINT PRIMARY KEY AUTO_INCREMENT,
    Name_Type_Product VARCHAR (200) NOT NULL
);

INSERT INTO type_of_product(Name_Type_Product) VALUES
('3X3X3'),--1
('2X2X2'),--2
('4X4X4'),--3
('5X5X5'),--4
('6X6X6'),--5
('7X7X7'),--6
('Skewb'),--7
('Pyraminx'),--8
('Square-1'),--9
('Megaminx'),--10
('Clock'),--11
('Lubrificantes'),--12
('Suportes'),--13
('Bolsa'),--14
('Timer'),--15
('Tapetes'),--16
('Cover');--17