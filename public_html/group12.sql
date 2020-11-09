#entity tables

CREATE TABLE User (
    UserName VARCHAR(150),
    Type VARCHAR(50) NOT NULL,
    Password VARCHAR(100) NOT NULL,
    LastName varchar(50) NOT NULL,
    FirstName varchar(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Address varchar(255) NOT NULL,
    State varchar(50) NOT NULL,
    PRIMARY KEY (UserName)
);

CREATE TABLE Payment (
    PaymentID varchar(150),
    UserName VARCHAR(150) NOT NULL,
    LastName varchar(50) NOT NULL,
    FirstName varchar(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Method VARCHAR(50) NOT NULL,
    Address varchar(255) NOT NULL,
    Payment varchar(100) not NULL,
    PRIMARY KEY (PaymentID),
    FOREIGN KEY (UserName) REFERENCES User(UserName)
);

CREATE TABLE Computer (
    ComputerID varchar(150) ,
    ComputerType VARCHAR(50) NOT NULL,
    ComputerName VARCHAR(50) NOT NULL,
    ComputerDescr VARCHAR(250) NOT NULL,
    RAM VARCHAR(10) NOT NULL,
    ComputerPrice varchar(100) not NULL,
    ComputerBrand VARCHAR(50) NOT NULL,
    ComputerPhoto VARChar(150) NOT NULL,
    PRIMARY KEY (ComputerID)
);

CREATE TABLE Orderr (
  	OrderID varchar(150),
  	UserName VARCHAR(150) NOT NULL,
  	ComputerID varchar(150) not NULL,
  	ShipDate varchar(100) not NULL,
  	LastName varchar(50) NOT NULL,
    FirstName varchar(50) NOT NULL,
  	Email VARCHAR(50) NOT NULL,
    Address varchar(255) NOT NULL,
    Itemnr varchar(100) not NULL,
  	PRIMARY KEY (OrderID),
	  FOREIGN KEY (UserName) REFERENCES User(UserName),
	  FOREIGN KEY (ComputerID) REFERENCES Computer(ComputerID)
);

CREATE TABLE Reviews (
  	ReviewID varchar(150) not NULL,
  	UserName VARCHAR(150) NOT NULL,
  	ComputerID varchar(150) not NULL,
  	ReviewComment VARCHAR(250),
  	ReviewStars varchar(100) not NULL,
  	ReviewDate varchar(100) not NULL,
  	PRIMARY KEY (ReviewID),
	FOREIGN KEY (UserName) REFERENCES User(UserName),
	FOREIGN KEY (ComputerID) REFERENCES Computer(ComputerID)
);

CREATE TABLE Cart (
  	CartID varchar(150),
  	NumOfProducts varchar(100) not NULL,
  	TotalCost varchar(100) not NULL,
  	PRIMARY KEY (CartID)
);

#relationship tables
CREATE TABLE Makesan (
  	UserName VARCHAR(150),
	OrderID varchar(150),
	PRIMARY KEY (UserName, OrderID),
  	FOREIGN KEY (UserName) REFERENCES User(UserName),
  	FOREIGN KEY (OrderID) REFERENCES Orderr(OrderID)
);


CREATE TABLE AddsTo (
  	UserName VARCHAR(150),
  	CartID varchar(150),
  	PRIMARY KEY (UserName, CartID),
  	FOREIGN KEY (UserName) REFERENCES User(UserName),
  	FOREIGN KEY (CartID) REFERENCES Cart(CartID)
);

CREATE TABLE Confirms (
  	PaymentID varchar(150),
  	OrderID varchar(150),
  	PRIMARY KEY (PaymentID, OrderID),
  	Foreign Key (PaymentID) REFERENCES Payment(PaymentID),
  	FOREIGN KEY (OrderID) REFERENCES Orderr(OrderID)
);

CREATE TABLE ShippedTo (
  	ComputerID varchar(150),
  	UserName VARCHAR(150),
  	PRIMARY KEY (ComputerID, UserName),
  	Foreign KEY (ComputerID) REFERENCES Computer(ComputerID),
  	FOREIGN KEY (UserName) REFERENCES User(UserName)
);

CREATE TABLE Makes (
  	UserName VARCHAR(150),
  	ReviewID varchar(150) ,
  	PRIMARY KEY (UserName, ReviewID),
  	FOREIGN KEY (Username) REFERENCES User(UserName),
  	FOREIGN KEY (ReviewID) REFERENCES Reviews(ReviewID)
);

#ISA Hierarchies
#User ISAs
CREATE TABLE UserFree (
  	UserName VARCHAR(150),
  	FastShipping TINYINT,
  	PRIMARY KEY (UserName),
  	FOREIGN KEY (UserName) REFERENCES User(UserName)
);

CREATE TABLE UserPremium (
  	UserName VARCHAR(150),
  	FastShipping TINYINT,
  	CouponCode VARCHAR(150),
  	PRIMARY KEY (UserName),
  	FOREIGN KEY (UserName) REFERENCES User(UserName)
);

#Computer ISAs
CREATE TABLE ComputerDesktop (
  	ComputerID varchar(150) ,
  	MonitorSize VARCHAR(150) NOT NULL,
  	Processor VARCHAR(10) NOT NULL,
  	GraphicsCard TINYINT,
  	PRIMARY KEY (ComputerID),
  	FOREIGN KEY (ComputerID) REFERENCES Computer(ComputerID)
);

CREATE TABLE ComputerLaptop (
  	ComputerID varchar(150) ,
  	OperatingSystem VARCHAR(50) NOT NULL,
  	Weight FLOAT NOT NULL,
  	Processor VARCHAR(10) NOT NULL,
  	Display Varchar(50) NOT NULL,
  	PRIMARY KEY (ComputerID),
  	FOREIGN KEY (ComputerID) REFERENCES Computer(ComputerID)
);

CREATE TABLE ComputerGamLaptop (
  	ComputerID varchar(150) ,
  	OperatingSystem VARCHAR(50) NOT NULL,
  	Processor VARCHAR(10) NOT NULL,
  	Display Varchar(50) NOT NULL,
  	GraphicsCard TINYINT,
  	CPUCore Varchar(20) NOT NULL,
  	PRIMARY KEY (ComputerID),
  	FOREIGN KEY (ComputerID) REFERENCES Computer(ComputerID)
);

#Payment ISAs
CREATE TABLE PaymentPaypal (
  	PaymentID varchar(150) ,
  	PPusername Varchar(50) NOT NULL ,
  	PPpassword Varchar(50) NOT NULL ,
  	PRIMARY KEY (PaymentID),
  	FOREIGN KEY (PaymentID) REFERENCES Payment(PaymentID)
);

CREATE TABLE PaymentBank (
  	PaymentID varchar(150),
  	Iban VARCHAR(50) NOT NULL ,
  	PRIMARY KEY (PaymentID),
  	FOREIGN KEY (PaymentID) REFERENCES Payment(PaymentID)
);

CREATE TABLE PaymentCard (
  	PaymentID varchar(150),
  	CardNumber VARCHAR(50) NOT NULL ,
  	Ccv VARCHAR(4) NOT NULL,
  	ExpirationDate VARCHAR(50) NOT NULL,
  	PRIMARY KEY (PaymentID),
  	FOREIGN KEY (PaymentID) REFERENCES Payment(PaymentID)
);



#Sample Data

insert into User values ( 'dzab', 'premium', 'fXck420', 'Zabalah', 'Daniel',
 'danielzab@gmail.com', 'College Ring 25, 28759','Bremen' );
 
insert into User values ( 'sarasucks', 'free', 'iSuck:(', 'Goku', 'Sairah',
 'sarasucks@live.com', 'Lansstraße 81, 11179','Berlin' );
 
insert into User values ( 'ian53', 'free', 'luvMg4ever', 'Pescado', 'Cristobal',
 'pescadobal@gmail.com', 'Behrendsstraße, 32139','Spenge' );
 
insert into User values ( 'unulbul', 'premium', 's3xxx69', 'Culux', 'Unulbul',
 'unulbulplus@gmail.com', 'An Der Umflut 9, 39629','Bismark' );
 
insert into User values ( 'midiren', 'free', 'pazsw0rt', 'Direno', 'Migo',
 'amigodireno@gmail.com', 'Ulmenweg 17, 39261','Zerbst' ); 


insert into UserFree values ( 'sarasucks', FALSE);
insert into UserFree values ( 'ian53', FALSE);
insert into UserFree values ( 'midiren', FALSE);

insert into UserPremium values ( 'dzab', TRUE, 030697);
insert into UserPremium values ( 'unulbul', TRUE, 230701);



insert into Computer values( 00001, 'Laptop', 'New Apple Macbook Air', '(13 ", 1.1 GHz dual-core Intel Core i3 processor of 10th generation, 8 GB RAM, 256 GB)', '8 GB', 999.17, 'Apple', 'macbook_air.jpg');

insert into Computer values( 00002, 'Laptop', 'Acer Swift 5', '(SF514-54T-76GW) 35.6 cm (14 Inch Full HD IPS Multi-Touch)
Ultrathin Laptop (Intel Core i7-1065G7, 16 GB RAM, 512 GB SSD, Intel Iris Plus Graphics, Windows 10 Home)','16 GB',1237.01, 'Acer', 'Acer_Swift5.jpg');

insert into Computer values( 00003, 'Desktop', 'HP M01-F1020ng Desktop PC', '(Intel Core i5-10400, 8GB DDR4 RAM, 1TB SSD, 
Intel Graphics, Windows 10) Black', '8 GB', 584.00, 'HP', 'HP_Desktop_M01.jpg');

insert into Computer values( 00004, 'Gaming','MSI Gaming PC',' 17.3", intel Core i7 10th Generation, memory size: 16 GB, 1512 GB HD)', '16 GB', 1753.63, 'MSI', 'MSI_PC.jpg');

insert into Computer values (00005, 'Gaming','ASUS ROG Zephyrus G15 ', 'Gaming Notebook mit 15,6 Zoll Display, Ryzen™ 7 Prozessor, 16 GB RAM, 1 TB SSD, GeForce GTX 1660Ti mit Max-Q Design, Brushed Black', '16 GB',  1461.23, 'Asus', 'ASUS_ROG.jpg');


insert into ComputerDesktop values( 00003, 20, 'Core i5', TRUE);
 
insert into ComputerLaptop values( 00001, 'IOS', 1.53, 'Core i3', '13 "');
insert into ComputerLaptop values( 00002, 'Windows', 0.85, 'Core i7', '16 "');

insert into ComputerGamLaptop values( 00004, 'Windows', 'Core i7', '17.3 "',TRUE, 'Multi-Core');
insert into ComputerGamLaptop values( 00005, 'Windows', 'Ryzen 7', '17.3 "', TRUE, 'Multi-Core');



insert into Payment values (10000, 'dzab', 'Zablah', 'Daniel',
 'danielzab@gmail.com', 'Paypal', 'College Ring 25, 28759 Bremen', 650.32);
insert into Payment values (10004, 'dzab', 'Zablah', 'Daniel',
 'danielzab@gmail.com', 'Card', 'College Ring 25, 28759 Bremen', 420.32);
insert into Payment values (10001, 'sarasucks', 'Goku', 'Sairah',
 'sarasucks@live.com', 'Bank', 'Lansstraße 81, 11179 Berlin', 537.20);
insert into Payment values (10002, 'ian53', 'Pescado', 'Cristobal',
 'pescadobal@gmail.com', 'Card', 'Behrendsstraße, 32139 Spenge', 703.25);
insert into Payment values (10003, 'unulbul', 'Culux', 'Unulbul',
 'unulbulplus@gmail.com', 'Paypal', 'An Der Umflut 9, 39629 Bismark', 865.25);


insert into PaymentPaypal values (10000, 'danielzab', 'Danzab03');
insert into PaymentPaypal values (10003, 'uculux', 'Culbul23');

insert into PaymentBank values ( 10001, 'DE24010112342307654334' );

insert into PaymentCard values (10004, 4401301270185616, 690, '7/24');   
insert into PaymentCard values (10002, 9486738193857364, 274, '5/22');


insert into Orderr values (10000, 'dzab', 00001, '2020-01-01 10:10:10', 'Zablah', 'Daniel',
 'danielzab@gmail.com',  'College Ring 25, 28759 Bremen',1);
 
insert into Orderr values (10001, 'sarasucks', 00002, '2020-10-01 10:50:10', 'Goku', 'Sairah',
 'sarasucks@live.com',  'Lansstraße 81, 11179 Berlin',2);
insert into Orderr values (10002, 'ian53', 00003, '2020-05-01 15:50:23', 'Pescado', 'Cristobal',
 'pescadobal@gmail.com',  'Behrendsstraße, 32139 Spenge',3);
insert into Orderr values (10003, 'unulbul',00004, '2020-08-02 10:50:10', 'Culux', 'Unulbul',
 'unulbulplus@gmail.com',  'An Der Umflut 9, 39629 Bismark',4);
 insert into Orderr values (10004, 'dzab', 00002, '2020-04-03 10:50:10', 'Zablah', 'Daniel',
 'danielzab@gmail.com',  'College Ring 25, 28759 Bremen',2);


 insert into Reviews values(00001, 'dzab', 00001, 'alles gut', 5, '2020-03-01 10:10:10');
 insert into Reviews values(00002, 'sarasucks', 00002, 'works well', 5, '2020-04-01 11:50:10');
 insert into Reviews values(00003, 'ian53', 00003, 'works okay for now', 5, '2020-01-01 10:10:10');
 insert into Reviews values(00004, 'unulbul', 00004, 'ok fine', 5, '2020-01-01 10:10:10');
 insert into Reviews values(00005, 'dzab', 00002, 'alles gut', 5, '2020-02-03 11:13:10');
 
 insert into Cart values(000000001, 2, 1452.98);
 insert into Cart values(000000002, 5, 3214.51);
 insert into Cart values(000000003, 1, 589.99);
 insert into Cart values(000000004, 3, 1799.86);
 insert into Cart values(000000005, 2, 954.78);
 
 
 #QUERIES
SELECT * FROM Computer
WHERE ComputerPrice < 600;

SELECT *
FROM Computer
WHERE ComputerBrand = "HP";

SELECT TotalCost 
FROM Cart
where TotalCost > 1000;

SELECT *
FROM Computer
WHERE ComputerType = "Gaming";

SELECT ComputerName, AVG(ReviewStars)
FROM Reviews JOIN Computer
WHERE Reviews.ComputerID = Computer.ComputerID
GROUP BY Computer.ComputerID;

SELECT User.FirstName, SUM(Payment)
FROM Payment JOIN User
WHERE User.UserName = Payment.UserName
GROUP BY User.UserName;

SELECT ComputerName, COUNT(Itemnr)
FROM Orderr JOIN Computer 
WHERE Orderr.ComputerID = Computer.ComputerID
GROUP BY Computer.ComputerID;

SELECT FirstName, State
FROM User
GROUP BY User.State;

SELECT COUNT(ComputerID)
FROM Orderr;
