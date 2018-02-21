create database visitorboarddb;
GRANT ALL ON visitorboarddb.* to visitoruser@localhost;
FLUSH PRIVILEGES;
SET PASSWORD FOR visitoruser@localhost=password('visitorpw');
create table visitorboarddb.visitors
	(id int auto_increment, house_id int, name varchar(255), room varchar(255), visitType int, number int, date varchar(255), time varchar(255), lang varchar(255), created varchar(255), PRIMARY KEY (`id`));

-- test data
-- insert into visitors (house_id, name, room, visitType, number, date, time, lang, created) value (1, '山田花子', '101', 1, 2, '02/21/2018', '21:20', 'ja', '2018-02-21 21:21:50');