id int(11) NOT NULL AUTO_INCREMENT,
name varchar(30) NOT NULL,
price int(20) NOT NULL,
imgPath text NOT NULL,


				(a1,'T10小燈',150,2000,'顏色:白藍紅綠黃粉，用於小燈、尾燈、牌照燈等T10規格之燈泡。','../imgs/prod/led_1.png'
				table shopingcar list id  [ 1, a1 ,  3 , 450  ], [ 2, a2 ,  5 , 700  ]

CREATE TABLE `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  'datestemp' not null,
  'username' not null
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

CREATE TABLE `orderdeteil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productID` id ,
  count int, 
  'amount' nit null
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO order VALUES( 1, 2020-05-11 20:50:30  , daniel, A1);
INSERT INTO orderdeteil VALUES( A1, p1,  3 , 450);
INSERT INTO orderdeteil VALUES( A1, p2,  4 , 480);