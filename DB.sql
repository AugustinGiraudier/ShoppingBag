CREATE TABLE admin(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`username` VARCHAR(100) NOT NULL,
`password` VARCHAR(40) NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE categories(
`id` TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(100) NOT NULL) ENGINE = InnoDB;

CREATE TABLE customers(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`forname` VARCHAR(50) NOT NULL,
`surname` VARCHAR(50) NOT NULL,
`add1` VARCHAR(50) NOT NULL,
`add2` VARCHAR(50) NOT NULL,
`add3` VARCHAR(50) NOT NULL,
`postcode` VARCHAR(10) NOT NULL,
`phone` VARCHAR(20) NOT NULL,
`email` VARCHAR(150) NOT NULL,
`registered` TINYINT NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE
delivery_addresses(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`firstname` VARCHAR(50) NOT NULL,
`lastname` VARCHAR(50) NOT NULL,
`add1` VARCHAR(50) NOT NULL,
`add2` VARCHAR(50) NOT NULL,
`city` VARCHAR(50) NOT NULL,
`postcode` VARCHAR(10) NOT NULL,
`phone` VARCHAR(20) NOT NULL,
`email` VARCHAR(150) NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE logins(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`customer_id` INT NOT NULL,
`username` VARCHAR(100) NOT NULL,
`password` VARCHAR(40) NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE orderitems(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`order_id` INT NOT NULL,
`product_id` INT NOT NULL, `quantity` INT NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE orders(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`customer_id` INT NOT NULL,
`registered` INT NOT NULL,
`delivery_add_id` INT NOT NULL,
`payment_type` INT NOT NULL,
`date` DATETIME NOT NULL,
`status` TINYINT NOT NULL,
`session` VARCHAR(100) NOT NULL,
`total` FLOAT NOT NULL)
ENGINE = InnoDB;

CREATE TABLE products (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`cat_id` TINYINT NOT NULL,
`name` VARCHAR(150) NOT NULL,
`description` TEXT NOT NULL,
`image` VARCHAR(30) NOT NULL,
`price` FLOAT NOT NULL
)ENGINE = InnoDB;



INSERT INTO admin (`id`, `username`, `password`)
VALUES (NULL, 'john', SHA1('John+123'));

INSERT INTO categories(`id`, `name`)
VALUES (NULL, 'boissons'),(NULL, 'biscuits');

INSERT INTO `customers` (`id`, `forname`, `surname`, `add1`, `add2`, `postcode`, `phone`, `email`, `registered`) 
VALUES (1, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', '01800','0612345678','s.hamida@gmail.com',1),
(2, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2','69009', '0796321458','jb.delaroche@gmx.fr',1);

INSERT INTO `isiweb4shop`.`logins` (`id`, `customer_id`, `username`,`password`)
VALUES (NULL, '1', 'Hamidou', SHA1('Hamidou+123')), (NULL, '2','Delaroche', SHA1('delaroche+123'));

INSERT INTO products(`id`, `cat_id`, `name`, `description`, `image`,`price`)
VALUES (NULL, '1', 'Saveur Impériale', 'Sachet de thé de qualité supérieure.200 sachets par boite', '', '4.99'),
(NULL, '1', 'Jus d’Orange de Floride', 'Bouteille d’un litre.','bestorange-juice.jpg', '0.9');