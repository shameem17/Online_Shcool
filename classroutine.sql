drop table class1_routine;
drop table class2_routine;
drop table class3_routine;
drop table class4_routine;
drop table class5_routine;
drop table todo;

create table class1_routine(
	day varchar(30),
	c1 varchar(30),
	c2 varchar(30),
	c3 varchar(30),
	c4 varchar(30),
	c5 varchar(30),
	c6 varchar(30),
	c7 varchar(30)
);
create table class2_routine(
	day varchar(30),
	c1 varchar(30),
	c2 varchar(30),
	c3 varchar(30),
	c4 varchar(30),
	c5 varchar(30),
	c6 varchar(30),
	c7 varchar(30)
);
create table class3_routine(
	day varchar(30),
	c1 varchar(30),
	c2 varchar(30),
	c3 varchar(30),
	c4 varchar(30),
	c5 varchar(30),
	c6 varchar(30),
	c7 varchar(30)
);
create table class4_routine(
	day varchar(30),
	c1 varchar(30),
	c2 varchar(30),
	c3 varchar(30),
	c4 varchar(30),
	c5 varchar(30),
	c6 varchar(30),
	c7 varchar(30)
);
create table class5_routine(
	day varchar(30),
	c1 varchar(30),
	c2 varchar(30),
	c3 varchar(30),
	c4 varchar(30),
	c5 varchar(30),
	c6 varchar(30),
	c7 varchar(30)
);
insert into class1_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Sun","-","Bangla","English","Math","Science","History","Religion");
insert into class1_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Mon","Science","-","Bangla","English","Math","History","Religion");
insert into class1_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Tue","Religion","-","English","Math","Science","History","Bangla");
insert into class1_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Wed","Bangla","English","Math","-","Science","History","Religion");
insert into class1_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Thu","Math","English","-","Bangla","Science","History","Religion");

insert into class2_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Sun","Bangla","English","Math","Science","History","Religion","-");
insert into class2_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Mon","Math","English","-","Bangla","Science","History","Religion");
insert into class2_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Tue","Religion","-","English","Math","Science","History","Bangla");
insert into class2_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Wed","Bangla","English","Math","-","Science","History","Religion");
insert into class2_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Thu","Science","-","Bangla","English","Math","History","Religion");

insert into class3_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Sun","Bangla","English","Math","Science","History","Religion","-");
insert into class3_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Mon","Math","English","-","Bangla","Science","History","Religion");
insert into class3_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Tue","Religion","-","English","Math","Science","History","Bangla");
insert into class3_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Wed","Bangla","English","Math","-","Science","History","Religion");
insert into class3_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Thu","Science","-","Bangla","English","Math","History","Religion");


insert into class4_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Sun","Bangla","English","Math","Science","History","Religion","-");
insert into class4_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Mon","Math","English","-","Bangla","Science","History","Religion");
insert into class4_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Tue","Religion","-","English","Math","Science","History","Bangla");
insert into class4_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Wed","Bangla","English","Math","-","Science","History","Religion");
insert into class4_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Thu","Science","-","Bangla","English","Math","History","Religion");


insert into class5_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Sun","Bangla","English","Math","Science","History","Religion","-");
insert into class5_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Mon","Math","English","-","Bangla","Science","History","Religion");
insert into class5_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Tue","Religion","-","English","Math","Science","History","Bangla");
insert into class5_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Wed","Bangla","English","Math","-","Science","History","Religion");
insert into class5_routine(day,c1,c2,c3,c4,c5,c6,c7) values("Thu","Science","-","Bangla","English","Math","History","Religion");


-- Todo list

create table todo(
	id varchar(20),
  username varchar(20),
  class varchar(10),
  roll varchar(10),
  work varchar(200),
  done varchar(1),
  dt varchar(20)
);

insert into todo(id,username,class,roll,work,done,dt) values('1','New Id','1','2201001','Onke Kaj Baki','0','07/01/2022');
insert into todo(id,username,class,roll,work,done,dt) values('2','New Id','1','2201001','Onke Kaj Ase','1','07/01/2022');
insert into todo(id,username,class,roll,work,done,dt) values('3','New Id','1','2201001','Onke Kaj Baki Vai','0','08/01/2022');
insert into todo(id,username,class,roll,work,done,dt) values('4','Shameem Ahammed','1','2201001','Onke Kaj Baki','0','07/01/2022');
insert into todo(id,username,class,roll,work,done,dt) values('5','Shameem Ahammed','1','2201001','Onke Kaj Vai','0','07/01/2022');
insert into todo(id,username,class,roll,work,done,dt) values('6','Shameem Ahammed','1','2201001','Onke Ses Baki','1','07/01/2022');
insert into todo(id,username,class,roll,work,done,dt) values('7','Shameem Ahammed','1','2201001','Onke Kaj Baki','0','08/01/2022');