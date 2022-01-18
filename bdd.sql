CREATE TABLE Users(
   id_user BIGINT NOT NULL AUTO_INCREMENT,
   pseudo VARCHAR(50),
   firstName VARCHAR(50),
   name VARCHAR(50),
   birthday DATE,
   email VARCHAR(255),
   password VARCHAR(255),
   pointFidelity INT,
   role VARCHAR(50),
   createAt DATETIME,
   updateAt DATETIME,
   PRIMARY KEY(id_user),
   UNIQUE(email)
);

CREATE TABLE Paiement(
   id_payement BIGINT NOT NULL AUTO_INCREMENT,
   token VARCHAR(255),
   methode VARCHAR(50),
   status VARCHAR(50),
   idAddress VARCHAR(255),
   updateDate DATE,
   createdDate DATE,
   PRIMARY KEY(id_payement)
);

CREATE TABLE Media(
   id_media BIGINT NOT NULL AUTO_INCREMENT,
   source TEXT,
   createdDate DATETIME,
   updateAt DATETIME,
   PRIMARY KEY(id_media)
);

CREATE TABLE Category(
   id_category INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(255),
   id_category_1 INT,
   PRIMARY KEY(id_category),
   UNIQUE(name),
   FOREIGN KEY(id_category_1) REFERENCES Category(id_category)
);

CREATE TABLE Product(
   id_product BIGINT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   price DECIMAL(15,2),
   description VARCHAR(50),
   color VARCHAR(50),
   size VARCHAR(50),
   stock INT,
   promo VARCHAR(50),
   fidelityPoint INT,
   createAt DATETIME,
   updateAt DATETIME,
   id_category INT NOT NULL,
   id_user BIGINT,
   PRIMARY KEY(id_product),
   FOREIGN KEY(id_category) REFERENCES Category(id_category),
   FOREIGN KEY(id_user) REFERENCES Users(id_user)
);

CREATE TABLE Tag(
   id_tag INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(255),
   PRIMARY KEY(id_tag),
   UNIQUE(name)
);

CREATE TABLE Commentary(
   id_comment BIGINT NOT NULL AUTO_INCREMENT,
   comment TEXT,
   id_user BIGINT NOT NULL,
   id_product BIGINT NOT NULL,
   PRIMARY KEY(id_comment),
   FOREIGN KEY(id_user) REFERENCES Users(id_user),
   FOREIGN KEY(id_product) REFERENCES Product(id_product)
);

CREATE TABLE Address(
   id_adresse INT NOT NULL AUTO_INCREMENT,
   number INT,
   street VARCHAR(50),
   postal VARCHAR(50),
   city VARCHAR(50),
   country VARCHAR(50),
   id_user BIGINT NOT NULL,
   PRIMARY KEY(id_adresse),
   FOREIGN KEY(id_user) REFERENCES Users(id_user)
);

CREATE TABLE `order`(
   id_order INT NOT NULL AUTO_INCREMENT,
   createAt DATETIME,
   updateAt DATETIME,
   numero VARCHAR(50),
   id_user BIGINT NOT NULL,
   id_payement BIGINT NOT NULL,
   id_adresse INT NOT NULL,
   PRIMARY KEY(id_order),
   UNIQUE(id_payement),
   UNIQUE(numero),
   FOREIGN KEY(id_user) REFERENCES Users(id_user),
   FOREIGN KEY(id_payement) REFERENCES Paiement(id_payement),
   FOREIGN KEY(id_adresse) REFERENCES Address(id_adresse)
);

CREATE TABLE product_media(
   id_media BIGINT NOT NULL AUTO_INCREMENT,
   id_product BIGINT,
   PRIMARY KEY(id_media, id_product),
   FOREIGN KEY(id_media) REFERENCES Media(id_media),
   FOREIGN KEY(id_product) REFERENCES Product(id_product)
);

CREATE TABLE order_detail(
   id_product BIGINT,
   id_order INT,
   quatity SMALLINT,
   price DECIMAL(15,2),
   createAt DATETIME,
   updateAt DATETIME,
   PRIMARY KEY(id_product, id_order),
   FOREIGN KEY(id_product) REFERENCES Product(id_product),
   FOREIGN KEY(id_order) REFERENCES `order`(id_order)
);

CREATE TABLE tag_product(
   id_product BIGINT,
   id_tag INT,
   PRIMARY KEY(id_product, id_tag),
   FOREIGN KEY(id_product) REFERENCES Product(id_product),
   FOREIGN KEY(id_tag) REFERENCES Tag(id_tag)
);

CREATE TABLE like_product(
   id_user BIGINT,
   id_product BIGINT,
   `like` BOOLEAN,
   dislike BOOLEAN,
   PRIMARY KEY(id_user, id_product),
   FOREIGN KEY(id_user) REFERENCES Users(id_user),
   FOREIGN KEY(id_product) REFERENCES Product(id_product)
);
