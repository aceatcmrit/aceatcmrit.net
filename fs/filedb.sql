create database file;
create table content(id int(100),title varchar(50) ,author varchar(50),uploader varchar(50),tags varchar(150),link varchar(150));
alter table content add primary key(id);
ALTER TABLE content modify id INT(10) NOT NULL AUTO_INCREMENT;
insert into content values(1,'abc','srihari','zeeshan','question paper, seminar','');
insert into content values(2,'def','suhas','zeeshan','seminar','');
insert into content values(3,'sdf','zeeshan','zeeshan','project','');
insert into content values(4,'yui','vidya','zeeshan','tutorial, seminar','');
insert into content values(5,'ghj','srihari','zeeshan','presentation, seminar','');
insert into content values(6,'cvb','suhas','zeeshan','entertainment, seminar','');