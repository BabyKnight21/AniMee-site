use f33ee;

create table customers (    
    email char (30) not null primary key,
    customername char (30),
    password char(30) not null,
    membertype char(20) not null,
    customeraddress char (100),
    mobile char(16),
    joindate date not null
);

-- create table member (
--     email char(30) not null primary key,
--     password char(30) not null,
--     membertype char(20) not null
-- );

create table products (
	productid int unsigned not null auto_increment primary key,
	productname char(80) not null,
    source char(30) not null,
    producttype char(30) not null,
	author char(30) not null,
    price float(6,2),
    stock int not null
);

create table orders (
    tablecount int auto_increment primary key,
    email char(30) not null,
    orderid int not null,
    date date not null,
    productid int not null,
    quantity int not null      
);

create table orderdetails (
    orderid int not null primary key,
    email char(30) not null,
    name char(30) not null,
    address char(100) not null
);



insert into customers values
('admin@animee.com','admin',sha1('password'),'admin',null,null,'2020-10-29'),
('member@animee.com','member',sha1('password'),'member',null,'12345678','2020-10-30');

-- insert into member values 
-- ('member@animee.com',sha1('password'),'member'),
-- ('admin@animee.com',sha1('password'),'admin');

insert into products values
(1,'1/7 Scale Figure of Shinobu Oshino -- GoodSmile Company','GoodSmile Company','1/7th Scale','Ken Yokota','150','2'),
(2,'1/7 Scale Figure of Ram and Rem -- GoodSmile Company','GoodSmile Company','1/7th Scale','Anon','300','3'),
(3,'Nendroid of Ichigo Kurosaki - Goodsmile Company #994','GoodSmile Company','Nendroid','KAMUI','70','2'),
(4,'Umaru Nendroid','GoodSmile Company','Nendroid','GoodSmile','70','20'),
(5,'Wallpaper 1','Photoshop','Wallpaper','Pixiv','10','20'),
(6,'Wallpaper 2','Photoshop','Wallpaper','Pixiv','10','17'),
(7,'Wallpaper 3','Photoshop','Wallpaper','Pixiv','10','20'),
(8,'Poster 1','Photoshop','Poster','Luffy','12.50','20'),
(9,'Poster 2','Photoshop','Poster','No Sei','12.50','20'),
(10,'Poster 3','Photoshop','Poster','Pixiv','12.50','20'),
(11,'Keychain 1','Acrylic','Keychain','Pixiv','3','20'),
(12,'Keychain 2','Acrylic','Keychain','Pixiv','3','20'),
(13,'Sticker 1','Acrylic','Sticker','Pixiv','1','100'),
(14,'Sticker 2','Acrylic','Sticker','Ezaki','1','100'),
(15,'Sticker 3','Acrylic','Sticker','Pixiv','1','100'),
(16,'Sticker 4','Acrylic','Sticker','Pixiv','1','100'),
(17,'Sticker 5','Acrylic','Sticker','Pixiv','0.5','100'),
(18,'Casing 1','Acrylic','Phone Casing','Pixiv','20','100'),
(19,'Casing 2','Acrylic','Phone Casing','Kimi no na Wa','20','100'),
(20,'Casing 3','Acrylic','Phone Casing','Birb','20','100');

insert into orders values
(1,'member@animee.com','1','2020-10-28','4','1'),
(2,'member@animee.com','2','2020-10-29','4','1'),
(3,'member@animee.com','2','2020-10-29','5','1'),
(4,'member@animee.com','3','2020-10-30','4','1'),
(5,'member@animee.com','4','2020-10-30','4','1'),
(6,'member@animee.com','4','2020-10-30','5','1'),
(7,'member@animee.com','4','2020-10-30','6','1');


insert into orderdetails values
(1,'member@animee.com','Member-san','Member-san house'),
(2,'member@animee.com','Member-san','Member-san house'),
(3,'member-brother@animee.com','Member-san Brother ','Member-san house'),
(4,'member-alt-email@animee.com','Member-san','Member-san house')