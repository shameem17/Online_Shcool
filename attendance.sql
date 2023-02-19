
create table Bangla(
   dt varchar(20),
   month varchar(4),
   class varchar(3),
   roll varchar(20)

);
create table English(
   dt varchar(20),
   month varchar(4),
   class varchar(3),
   roll varchar(20)

);
create table Math(
   dt varchar(20),
   month varchar(4),
   class varchar(3),
   roll varchar(20)

);
create table Science(
   dt varchar(20),
   month varchar(4),
   class varchar(3),
   roll varchar(20)

);
create table Religion(
   dt varchar(20),
   month varchar(4),
   class varchar(3),
   roll varchar(20)

);
create table History(
   dt varchar(20),
   month varchar(4),
   class varchar(3),
   roll varchar(20)

);


INSERT into examschedule(exam_id,exam_name,class,schedule,start,end) VALUES('B1','Bangla' '3','2022-01-15','12','01');
INSERT into examschedule(exam_id,exam_name,class,schedule,start,end) VALUES('M2','Math' '3','2022-01-15','12','01');
INSERT into examschedule(exam_id,exam_name,class,schedule,start,end) VALUES('E3','English' '2','2022-01-15','12','01');
INSERT into examschedule(exam_id,exam_name,class,schedule,start,end) VALUES('S1','Science' '3','2022-01-15','12','01');
INSERT into examschedule(exam_id,exam_name,class,schedule,start,end) VALUES('B12','Bangla' '2','2022-01-15','12','01');