create database visitorboarddb;
GRANT ALL ON visitorboarddb.* to visitoruser@localhost;
FLUSH PRIVILEGES;
SET PASSWORD FOR visitoruser@localhost=password('visitorpw');
create table visitorboarddb.houses
	(id int auto_increment, name varchar(255), delete_flag boolean not null default 0, created varchar(255), PRIMARY KEY (`id`)) engine=InnoDB;

create table visitorboarddb.visitors
	(id int auto_increment, house_id int, name varchar(255), room varchar(255), visitType int, number int, date varchar(255), time varchar(255), lang varchar(255), created varchar(255), PRIMARY KEY (`id`), foreign key(house_id) references houses(id)) engine=InnoDB;



-- test data
-- insert into houses (id, name, created) value ('999', 'その他', '2018-02-28 14:12:50');
-- insert into houses (name, created) value ('建物名', '2018-02-28 14:12:50');
-- insert into visitors (house_id, name, room, visitType, number, date, time, lang, created) value (1, '山田花子', '101', 1, 2, '02/21/2018', '21:20', 'ja', '2018-02-21 21:21:50');