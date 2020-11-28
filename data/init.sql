DROP DATABASE IF EXISTS favo;
CREATE DATABASE favo;
USE favo;
DROP TABLE IF EXISTS name;

CREATE TABLE user (
  id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(32) NOT NULL,
  PRIMARY KEY(id)
)DEFAULT CHARACTER SET=utf8;

CREATE TABLE post (
		id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
		user_id INT(11) NOT NULL,
		name VARCHAR(32) NOT NULL,
		post VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
)DEFAULT CHARACTER SET=utf8;

CREATE TABLE favo(
		id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
		user_id INT(11) NOT NULL,
    post_id INT(11) NOT NULL,
    del_flg INT(11) NOT NULL,
    PRIMARY KEY(id)
)DEFAULT CHARACTER SET=utf8;

insert into user(name) values('takuya');
insert into user(name) values('kato');
insert into user(name) values('ito');

insert into post(user_id,name,post) values(1,'takuya','test1');
insert into post(user_id,name,post) values(2,'kato','test2');
insert into post(user_id,name,post) values(3,'ito','test3');

insert into favo(user_id,post_id,del_flg) values(1,2,0);
insert into favo(user_id,post_id,del_flg) values(1,3,0);