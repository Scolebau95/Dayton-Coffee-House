-- select the database --
USE daytoncoffeehouse;  

-- drop tables if already exist --

DROP TABLE IF EXISTS Administrative;
DROP TABLE IF EXISTS Cart;
DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS OnlineItems;
DROP TABLE IF EXISTS HouseMenu;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Locations;
DROP TABLE IF EXISTS Users;

-- create the tables --

CREATE TABLE Users (
	userName		VARCHAR(50)		NOT NULL,
	password		VARCHAR(255)	NOT NULL,
	accountType		VARCHAR(10)		NOT NULL,
	CONSTRAINT PK_Users PRIMARY KEY (userName)
);

CREATE TABLE Locations (
	locationID		VARCHAR(10)		NOT NULL,
	image			VARCHAR(50)		NOT NULL,
	CONSTRAINT PK_Locations PRIMARY KEY (locationID)
);

CREATE TABLE Customer (
	userName		VARCHAR(50)		NOT NULL,
	firstName		VARCHAR(15)		NOT NULL,
	lastName		VARCHAR(30)		NOT NULL,
	email			VARCHAR(50)		NOT NULL,
	shippingAddress	VARCHAR(100)	NOT NULL,
	city			VARCHAR(30)		NOT NULL,
	location		VARCHAR(30)		NOT NULL,
	zipcode			VARCHAR(5)		NOT NULL,
	phone			VARCHAR(10)		NOT NULL,
	CONSTRAINT PK_Customer PRIMARY KEY (userName),
	CONSTRAINT FOREIGN KEY (userName) references Users (userName)
);

CREATE TABLE HouseMenu (
	houseItem		VARCHAR(30)		NOT NULL,
	price			FLOAT(6)		NOT NULL,
	description		VARCHAR(150)		NOT NULL,
	CONSTRAINT PK_HouseMenu PRIMARY KEY (houseItem)
);

CREATE TABLE OnlineItems (
	onlineItem		VARCHAR(20)		NOT NULL,
	image			VARCHAR(50)		NOT NULL,
	price			FLOAT(6)		NOT NULL,
	description		VARCHAR(50)		NOT NULL,
	quantity		INT(3)		NOT NULL,
	CONSTRAINT PK_OnlineItems PRIMARY KEY (onlineItem)
);

CREATE TABLE Orders (
	userName		VARCHAR(50)		NOT NULL,
	onlineItem		VARCHAR(20)		NOT NULL,
	quantity		INT(3)		NOT NULL,
	orderDate		DATETIME		NOT NULL,
	CONSTRAINT PK_Orders PRIMARY KEY (userName, onlineItem, orderDate),
	CONSTRAINT FOREIGN KEY (onlineItem) references OnlineItems (onlineItem) 
);

CREATE TABLE Cart (
	userName		VARCHAR(50)		NOT NULL,
	onlineItem		VARCHAR(20)		NOT NULL,
	quantity		INT(3)		NOT NULL,
	CONSTRAINT PK_Cart PRIMARY KEY (userName, onlineItem),
	CONSTRAINT FOREIGN KEY (userName) references Users (userName),
	CONSTRAINT FOREIGN KEY (onlineItem) references OnlineItems (onlineItem) 
);

CREATE TABLE Administrative (
	onlineItem		VARCHAR(20)		NOT NULL,
	image			VARCHAR(50)		NOT NULL,
	price			FLOAT(6)		NOT NULL,
	description		VARCHAR(50)		NOT NULL,
	quantity		INT(3)		NOT NULL,
	CONSTRAINT PK_Administrative PRIMARY KEY (onlineItem)
);

-- populate the database

INSERT INTO Users (userName, password, accountType) VALUES
('user1', 'coffeecup', 'default'),
('user2', 'frenchpress', 'default'),
('user3', 'yosemite', 'default'),
('admin', 'admin', 'admin');

INSERT INTO Locations (locationID, image) VALUES
('Dayton', 'Dayton.jpg');

INSERT INTO Customer (userName, firstName, lastName, email, shippingAddress, city, location, zipcode, phone) VALUES
('user1', 'Sam', 'Smith', 'Samsmith295@gmail.com', '5736 Bonaly Court', 'Dublin', 'Ohio', '43016', '6145689245'),
('user2', 'Paul', 'Jefferson', 'Jefferson94@gmail.com', '574 Douglas Way', 'Tipp City', 'Ohio', '45371', '9376671055'),
('user3', 'Kayla', 'Broughton', 'Knoellebroughton@gmail.com', '412 North Alabama Street', 'Indianapolis', 'Indiana', '46204', '3178542596'),
('admin', 'Seth', 'Colebaugh', 'Scolebau95@gmail.com', '4053 Magnolia Way', 'Beavercreek', 'Ohio', '45431', '9378183350');

INSERT INTO HouseMenu (houseItem, price, description) VALUES
('Latte', '3.75', 'Coffee drink made with espresso and steamed milk'),
('Cappuccino', '4.25', 'Italian coffee drink traditionally prepared with espresso, hot milk, and steamed-milk foam'),
('Americano', '2.85', 'Drink of espresso diluted with hot water'),
('Drip Coffee', '2.00', 'Todays rotating selection of coffee');

INSERT INTO OnlineItems (onlineItem, image, price, description, quantity) VALUES
('Veranda Blend', 'Veranda.jpg', '17.85', 'Mellow and flavorful with a nice softness', '10'),
('Espresso Roast', 'Espresso.jpg', '18.65', 'Darker roast that is rich and caramelly', '10'),
('Pike Place Roast', 'Pike.jpg', '15.42', 'Medium roast that is smooth and balanced', '10'),
('Breakfast Blend', 'Breakfast.jpg', '16.98', 'Medium roast that is bright and tangy', '10');

INSERT INTO Administrative (onlineItem, image, price, description, quantity) VALUES
('Veranda Blend', 'Veranda.jpg', '17.85', 'Mellow and flavorful with a nice softness', '10'),
('Espresso Roast', 'Espresso.jpg', '18.65', 'Darker roast that is rich and caramelly', '10'),
('Pike Place Roast', 'Pike.jpg', '15.42', 'Medium roast that is smooth and balanced', '10'),
('Breakfast Blend', 'Breakfast.jpg', '16.98', 'Medium roast that is bright and tangy', '10');
