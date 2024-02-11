CREATE DATABASE trainreservationsystem;

create table Train(t_no varchar(50) not null primary key,
Trn_name varchar(50)DEFAULT 'Express', Seats numeric(10) DEFAULT NULL,Trn_source varchar(30) DEFAULT NULL,
Trn_destination varchar(30) DEFAULT NULL);
insert into Train VALUES('EXP-001','pakistan','500','Karachi','Peshawar','05:00:00','06:00:00');
insert into Train VALUES('EXP-002','awam','300','Jhelum','Sailkot','05:30:00','06:30:00');
insert into Train VALUES('EXP-003','tezgam','700','Multan','Karachi','08:00:00','08:30:00');
insert into Train VALUES('EXP-004','karachi','600','Karachi','Lahore','04:00:00','04:40:00');
insert into Train VALUES('EXP-005','islamabad','800','Islamabad','Lahore','05:00:00','05:50:00');
insert into Train VALUES('EXP-006','karakoram','900','Peshawar','Islamabad','04:30:00','40:50:00');
insert into Train VALUES('EXP-007','hazara','200','hazara','Islamabad','03:00:00','03:30:00');
select *from Train;
create table User_Info(User_id int AUTO_INCREMENT primary key,
FName varchar(50) DEFAULT NULL,LName varchar(50) DEFAULT NULL,
t_no varchar(50),foreign key(t_no) references Train(t_no),
Age numeric(5) DEFAULT NULL,Gender varchar(30) DEFAULT NULL,
Email varchar(50)unique Not null, Password varchar(50)unique not null,
PhoneNo numeric(12)unique Default null);
insert into User_Info values('Aimen','Fatima','20','Female','aimen@gmail.com','987654321','6788997654');
insert into User_Info values('Fiza','Mazhar','22','Female','fiza@gmail.com','12345678','7899089765');

create table Booking(Book_id int AUTO_INCREMENT primary key,
User_id int, foreign key(User_id) references User_Info(User_id),
t_no varchar(50),foreign key(t_no) references Train(t_no),
Book_status varchar(50) not null Default 'Waiting', Arrival_time time,
Departure_time time);

create table Admin_Info(email varchar(50) primary key, password varchar(50) not null);
insert into Admin_Info values('laiba@gmail.com','railway');