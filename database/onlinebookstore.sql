-- drop database onlinebookstore; 

CREATE DATABASE onlinebookstore; 
USE onlinebookstore;

CREATE TABLE  if not exists book_info( 
	bid INT(100) PRIMARY KEY, 
	name VARCHAR(20) not null, 
	title VARCHAR(20) not null, 
	price DECIMAL(10,0) not null, 
	-- author_id INT(50) not null, 
	category VARCHAR(50) not null, 
	description longtext not null, 
	image varchar(10) NOT NULL,
	date datetime NOT NULL DEFAULT current_timestamp()
	 
);

INSERT INTO book_info (bid, name, title, price , category, description, image, date) VALUES
(72, 'Atomic Habits', 'James C', '20', 'knowledge', 'Her imaginative childrens books feature many natural animals that can be found in the British countryside', 'ah.png', '2023-02-23 13:14:49'),
(81, 'Darwin', 'Darwin D.', '18', 'knowledge', 'Beatrix Potter ', 'sddxc.jpg', '2023-02-24 10:54:38'),
(83, 'Capture The Crown ', 'Jennifer E.', '22', 'Magic', 'From the author of The Witch Boy trilogy comes a graphic novel about family, romance, and first love', 'gf.jpg', '2023-02-24 10:56:14'),
(84, 'Crush The King ', 'Jennifer L', '15', 'knowledge', 'These stories are carefully chosen to highlight the power of the gods and how sometimes the demons challenge it. The stories are narrated in a way that would be suitable for children and ensures small moral lessons in each story. Children will learn that there are no short cuts to success, and our confidence is our biggest super power.', 'uuh.jpg', '2023-02-24 10:58:12'),
(85, 'Stephen King', 'Carre', '25', 'Adventure', 'The political struggle in the ancient city of Hastinapur is escalating as the Pandavas and Kauravas are on the verge of war. But its the rise of the demonic Asura King, Mahendrasura, that most troubles Krishna. Fueled by vengeance, Mahendrasura is not looking to just win a battle. Instead, he in search of dark powers to eradicate humanity once and for all.', 'FGGH.jpg', '2023-02-24 10:58:53'),
(86, 'The Winter King', 'Christ C', '22', 'knowledge', 'Trapped in an era beyond his wildest dreams, Abhay has managed to land right in the middle of all these conflicts. Along with Krishna and Suryaputra Karna, the responsibility to save the past, the present, and the future of mankind has fallen on Abhays shoulders. And for that, he must unlock ancient puzzles, encounter mythical beasts - and confront his terrifying destiny!', 'ghfh.jpg', '2023-02-24 10:59:29'),
(88, 'Ray Bearer', 'Jordan I.', '20', 'Magic', 'Once upon a time there were four little Rabbits, and their names were -- ', 'jjj.jpg', '2023-02-24 11:05:00'),
(89, 'The Sea Girl', 'Adriene ', '20', '', 'From the authovel about family, romance, and first love. ', 'jhj.jfif', '2023-02-24 11:07:51'),
(90, 'Love Boat', 'Abile Hing', '24', 'Adventure', 'Feel the power of strength and banding together come alive through the celebration of our very own female animal characters in Lili the Lioness & Friends. Written, designed and produced in-house, this impactful read highlights the importance of community ', 'jkkj.jpg', '2023-02-24 11:25:52'),
(93, 'Seventh Sun', ' Lani Forbes', '25', 'Magic', 'The terrible Asuras are pretty notorious. These demons have decided to spread chaos across the world and win over heaven. Here comes an Asura trying to kidnap mother Earth', 'kjljl.jpg', '2023-02-24 11:55:58'),
(94, 'Sunrise', 'Jhon D', '18', 'Magic', 'Charming but venturesome college student, Abhay Sharma, always thought the Mahabharata was just a story; until he set out to explore the secrets of an ancient temple – and finds himself transported five thousand years back in time!', 'hujh.jpg', '2023-02-24 11:57:02'),
(95, 'Batman Knight', 'DC', '22', 'Adventure', 'This collection of adorable stories for children show us how the Asuras tried to defeat the Devas, and how the gods ultimately won over. These stories will entertain, educate and provide healthy enjoyment to the readers.', 'kjkjl.jpg', '2023-02-24 11:59:54'),
(96, 'Last Blood ', 'Alexander G', '24', '', 'The political struggle in the ancient city of Hastinapur is escalating as the Pandavas and Kauravas are on the verge of war. But its the rise of the demonic Asura King, Mahendrasura, that most troubles Krishna. Fueled by vengeance, Mahendrasura is not looking to just win a battle. Instead, he in search of dark powers to eradicate humanity once and for all.', 'lb.jpg', '2023-02-24 12:12:30');

-- select * from book_info;

CREATE TABLE if not exists cart ( 
	id INT(225) PRIMARY KEY not null, 
	book_id INT(20) not null, 
	user_id INT(100) not null, 
	name VARCHAR(50) not null, 
	price double(10,2),
	image varchar(25),
	quantity INT(25) not null, 
	total DOUBLE(10,2) not null, 
	date datetime NOT NULL DEFAULT current_timestamp()

);

INSERT INTO cart (id, book_id, user_id, name, price, image, quantity, total , date) 
VALUES (162, 96, 51, 'Last Blood ', 17, 'lb.jpg', 3, 50.00, '2023-03-10 14:44:26');

CREATE TABLE orders (
  id int(225) PRIMARY KEY AUTO_INCREMENT,
  user_id int(100),
  address varchar (50),
  city varchar(100) ,
  state varchar(50),
  country varchar(50),
  pincode int(6),
  book varchar(50),
  unit_price double(10,2),
  quantity int(10) ,
  sub_total double(10,2),
  payment_status varchar(100) default 'pending'
  --   order_date varchar(50),

 );

INSERT INTO orders (id, user_id, address, city, state, country, pincode, book, unit_price, quantity, sub_total, payment_status) VALUES
(1, 51, 'yey', '747hfh', 'PP', 'Cam', 6546, 'yukuyk', 56778.00, 1, 56778.00, 'completed');


CREATE TABLE if not exists confirm_order  (
  order_id INT(225) primary key not null AUTO_INCREMENT,
  user_id INT(100) not null,
  name VARCHAR(50) not null,
  email VARCHAR(50) not null,
  number INT(12) not null,
  address VARCHAR(500) not null,
  payment_method varchar(20) not null,
  total_books VARCHAR(500) not null,
  order_date datetime NOT NULL DEFAULT current_timestamp(),
  payment_status  varchar(100) NOT NULL DEFAULT 'pending',
  date datetime NOT NULL DEFAULT current_timestamp(),
  total_price DECIMAL(10,2) not null,
  foreign key (order_id) references orders(id)

);

INSERT INTO confirm_order (order_id, user_id, name, email, number, address, payment_method, total_books, order_date, payment_status, date, total_price) 
VALUES (1, 51, 'Sovanda Ban', 'sovanda@gmail.com', 1234567890, '123 Main St, Anytown, CA 12345', 'cash on delivery', 'Ray Bearer #88,(1)', '2023-03-10 14:44:26', 'completed', '2023-03-11 10:00:00', 50);


CREATE TABLE if not exists msg (
	 id INT(100) PRIMARY KEY not null, 
	 user_id INT(100) not null, 
	 name VARCHAR(20) not null, 
	 email VARCHAR(20) not null, 
	 number INT(20) not null, 
	 msg VARCHAR(50) not null, 
	 date datetime NOT NULL DEFAULT current_timestamp()

 );

INSERT INTO msg (id, user_id, name, email, number, msg, date)
VALUES
	(7, 51, 'Sovanda', 'sovanda@gmail.com', 12345678, 'Hello, this is a test message.', '2023-03-10 14:44:26'),
	(8, 52, 'Sophanny', 'sophanny@gmail.com', 87654321, 'Hi, I have a question about my order.', '2023-03-10 14:46:00'),
	(9, 53, 'Manson', 'manson@gmail.com', 11111111, 'Thank you for the prompt response.', '2023-03-10 14:50:26');




-- select * from orders;

CREATE TABLE if not exists author (
	author_id INT(50) PRIMARY KEY not null, 
	b_id INT(50)not null, 
	author_name VARCHAR(50) not null, 
	title longtext, 
	dob DATE not null
);

INSERT INTO author (author_id, b_id,author_name, title, dob)
VALUES
(1, 96, 'Alexander G', 'Author of Last Blood', '1980-01-01'),
(2, 81, 'Darwin D.', 'Author of Darwin', '1809-02-12'),
(3, 83, 'Jennifer E.', 'Author of Capture The Crown', '1990-05-15');

CREATE TABLE if not exists users_info (
	 user_id INT(100) PRIMARY KEY not null, 
	 name VARCHAR(20) not null, 
	 surname VARCHAR(20) not null, 
	 email VARCHAR(20) not null, 
	 password VARCHAR(20) not null, 
	 user_type VARCHAR(20) not null default 'user'
 );
 
INSERT INTO users_info (user_id, name, surname, email, password, user_type)
VALUES (51, 'sovanda', 'sovandaban', 'sovanda@gmail.com', '12345678', 'User'),
       (52, 'sophanny', 'sophannycheng', 'sophanny@gmail.com', '12345678', 'Admin'),
       (53, 'manson', 'mansonchao', 'manson@gmail.com', '12345678', 'Admin'),
       (54, 'chaylim', 'chaylimcheng', 'chaylim@gmail.com', '12345678', 'Admin');
       

-- auto increase 
ALTER TABLE book_info MODIFY bid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;


ALTER TABLE cart MODIFY id int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

-- ALTER TABLE confirm_order MODIFY order_id INT(225) AUTO_INCREMENT;

ALTER TABLE msg MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE users_info MODIFY user_id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

-- add foreign key
ALTER TABLE author ADD FOREIGN KEY (b_id) REFERENCES book_info(bid);

ALTER TABLE cart ADD FOREIGN KEY (user_id) REFERENCES users_info(user_id);
ALTER TABLE cart ADD FOREIGN KEY (book_id) REFERENCES book_info(bid);

ALTER TABLE confirm_order ADD FOREIGN KEY (user_id) REFERENCES users_info(user_id);

ALTER TABLE orders ADD FOREIGN KEY (user_id) REFERENCES users_info(user_id); 

ALTER TABLE msg ADD FOREIGN KEY (user_id) REFERENCES users_info(user_id);





