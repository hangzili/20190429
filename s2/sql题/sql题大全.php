6.查看表结构///desc ~表名~;

7.尝试删除表///drop table if exists ~表名~;

8.查看表的建表语句///mysql> show create table~表名~\G;

9.添加：-------------------------------------------------===添加===-----------
--标准添加，指定所有字段给定所有的值///mysql> insert into ~表名~(id,name,age) value(1,'zhangsan',20);
-- 不指定字段添加值，注意：字段顺序和表结构一致///mysql> insert into ~表名~ value(2,"lisi",22);
-- 指定部分字段，添加值///mysql> insert into ~表名~(id,name) value(3,"wangwu");
-- 查看学生信息表的同时，追加一个beijing值的字段，字段名为city（城市）///mysql> select *,"beijing" city from ~表名~;

10.查看-------------------------------------------------===查看===-----------
--查看所有数据库///show databases;
--查看数据库中所有表///show tables;
--查看表中的所有数据///mysql> select * from ~表名~;
-- 查看~表名~标的部分字段的数据///mysql> select name,age,classid from ~表名~;
-- 查看部分字段 ，并为name字段起个别名，叫username字段名///mysql> select name as username,age,classid from ~表名~;
-- 查看年龄以及5年后的年龄///mysql> select age,age+5 from ~表名~;
-- 按钮年龄升序排序，取第一条，并显示 : mysql> select * from ~表名~ order by age asc limit 1;
-- 查看学生信息表的同时，追加一个beijing值的字段，字段名为city（城市）///mysql> select *,"beijing" city from ~表名~;
-- 通过表名取字段信息///mysql> select s.name,s.age  from ~表名~ s;
--- where条件查询----
==================================
-- 1. 查看lamp97班级的所有学生信息///mysql> select * from ~表名~ where classid='lamp97';

-- 2. 查看lamp97期性别为m的所有学生信息///mysql> select * from ~表名~ where classid='lamp97' and sex='m';
 
-- 3. 查看年龄age是20~30岁的学生信息
mysql> select * from ~表名~ where age>=20 and age<=30;
mysql> select * from ~表名~ where age between 20 and 30;
 
-- 4. 查看年龄age是20~30岁之外的学生信息
mysql> select * from ~表名~ where age<20 or age>30;
mysql> select * from ~表名~ where age not between 20 and 30;

-- 5. 查看id号为3,5,8,10的学生信息
mysql> select * from ~表名~ where id=3 or id=5 or id=8 or id=10;
mysql> select * from ~表名~ where id in(3,5,8,10);

-- 6. 查看lamp97期和lamp98期性别为w的信息
mysql> select * from ~表名~ where classid in('lamp97','lamp98') and sex='w';
mysql> select * from ~表名~ where (classid='lamp97' or classid='lamp98') and sex='w';

-- 7. 查看姓名中包含ang字串的学生信息
mysql> select * from ~表名~ where name like '%ang%';
mysql> select * from ~表名~ where name regexp "ang";  --使用正则

-- 8. 查看年龄为偶数，并且性别为m的学生信息///mysql> select * from ~表名~ where age%2=0 and sex='m';

-- 9. 查看姓名为4个任意字符的学生信息
mysql> select * from ~表名~ where name like '____';
mysql> select * from ~表名~ where name regexp '^.{4}$';

--10. 查看姓名不为null的信息。///mysql> select * from ~表名~ where name is not null;
--- 统计查询（聚合查询）： count() sum() avg() max() min();
-- 统计学生表的数据条数
mysql> select count(id) from ~表名~;
mysql> select count(*) from ~表名~;
-- 分组，按班级分组//mysql> select classid from ~表名~ group by classid;
-- 统计每个班级的人数和平均年龄。///mysql> select classid,count(*),avg(age) from ~表名~ group by classid;

-- 统计学生信息表中男女生各自人数（按性别分组）。///mysql> select sex,count(*) from ~表名~ group by sex;
-- 统计lamp97期的按性别分组后的人数///mysql> select sex,count(*) from ~表名~ where classid='lamp97' group by sex;
-- 统计每个班的男女生各自人数（按性别分组）。///mysql> select classid,sex,count(*) from ~表名~ group by classid,sex;
-- 统计每个班的平均年龄，要求只显示24岁以上的班级。///mysql> select classid,avg(age) from ~表名~ group by classid having avg(age)>24;
-- 排序：order by 字段名 [asc|desc]    
--   默认asc(升序)  desc(降序)
-- 查询所有数据 并按年龄做默认升序排序///mysql> select * from ~表名~ order by age;
-- 查询所有数据 并按年龄做默认升序排序///mysql> select * from ~表名~ order by age asc;
-- 查询所有数据 并按年龄降序排序///mysql> select * from ~表名~ order by age desc;
-- 按班级升序，相同的班级按年龄降序排序。///mysql> select * from ~表名~ order by classid asc,age desc;
-- limit 子句：（分页）
--====================================
-- 提取前4条数据////mysql> select * from ~表名~ limit 4;
-- 排除前4条，取3条///mysql> select * from ~表名~ limit 4,3;
-- limit后面的数值不可以为负数。////mysql> select * from ~表名~ limit 60,-3;
-- 统计每个班级的人数，并按人数从大到小排序，只取前两条。////mysql> select classid,count(*) num from ~表名~ group by classid order by num desc limit 2;
-- 查询id为7的下一条数据////mysql> select  * from ~表名~ where id>7 order by id limit 1;
--================================================================
--  组合查询（多表查询）
--  1. 嵌套查询
--  2. where 关联查询
--  3. join 连接 (左联 left join、右联 right join、内联inner join)
--=================================================================
-- 最大年龄//// mysql> select max(age) from ~表名~;
-- 查询年龄为36岁的人//// mysql> select * from ~表名~ where age=36;
-- 查询年龄最大的学生信息////mysql> select * from ~表名~ where age=(select max(age) from ~表名~);
-- 查询php成绩最高的学生id号////mysql> select sid from grade where php=(select max(php) from grade);
-- 查出php成绩最高的学生信息
    mysql> select * from ~表名~ where id in(
        -> select sid from grade where php=(select max(php) from grade));
-- 查询所有字段，条件是学生的id和成绩的sid关联//// mysql> select * from ~表名~,grade where ~表名~.id=grade.sid;
-- 查询部分字段，条件是学生的id和成绩的sid关联//// mysql> select ~表名~.id,~表名~.name,~表名~.age,grade.php,grade.mysql from ~表名~,grade where ~表名~.id=grade.sid;
-- 通过别名方式查询部分字段，条件是学生的id和成绩的sid关联////mysql> select s.id,s.name,s.age,g.php,g.mysql from ~表名~ s,grade g where s.id =g.sid;
-- 左联查询：查询学生表中所有的成绩，没有参加考试的补空
   mysql> select s.id,s.name,s.sex,g.php,g.mysql from ~表名~ s left join grade g
    -> on s.id=g.sid;
-- 内联相当于where关联，就是学生表和成绩表共有的数据。
   mysql> select s.id,s.name,s.sex,g.php,g.mysql from ~表名~ s inner join grade g -> on s.id=g.sid;
where是在没分组之前先进行过滤，having是在分组完成之后在进行过滤。
select * from => where => group by => having => order by =>limit;
关联查询 select 表1.字段 as 别名，表2.字段 as 别名 from 表1，表2 where 链接条件；
11.：------------------------------------------------===修改===------------
--修改id值为3的年龄信息为25///mysql> update ~表名~ set age=25 where id=3;
-- 修改id值为5的年龄26，名字为qq ///mysql> update ~表名~ set  age=26,name='qq' where id=5;
(-- 修改一个不存在的数据，不会报错。mysql> update ~表名~ set age=100 where id>50;)
-- 将id值为10的~表名~信息中的name改为qq，sex改为w/// mysql> update ~表名~ set name='qq',sex='w' where id=10;
-- 修改年龄最小的一条的性别信息/// mysql> update ~表名~ set sex='m' order by age asc limit 1;
-- 改名其中为name起别名的as关键字可以省略不用写///mysql> select name username,age,classid from ~表名~;
-- 为age+5起个别名age5（对外的字段名）///mysql> select age,age+5 age5 from ~表名~;
-- 修改demo1表结构，为m字段添加一个前导补零(先进入表格mysql> desc demo1;)，m m表示没有改字段名////mysql> alter table demo1 change m m int(5) unsigned zerofill;

12.删除：------------------------------------------------===删除===------------
-- 删除name值为~表名~01的数据/// mysql> delete from ~表名~ where name='~表名~01';
-- 删除id值为100到200的数据 ///mysql> delete from ~表名~ where id>=100 and id<=200;
-- 删除id值为10,11和20的数据库 /// mysql> delete from ~表名~ where id in(10,11,20);
-- 删除id值大于100的信息///mysql> delete from ~表名~ where id>100;
-- 删除age大于等于50并且小于等于100的数据///mysql> delete from ~表名~ where age>=50 && age<=100;
-- 删除age比10小的或比100大的///mysql> delete from ~表名~ where age<10 || age>100;
-- 使用关键字distinct 去除重复的classid值///mysql> select distinct classid from ~表名~;

13-- 导出lamp97数据库并以lamp97.sql文件存储
D:\xampp\htdocs\lamp97\lesson23_mysql>mysqldump -u root -p lamp97>lamp97.sql

14-- 导出lamp97数据库中的~表名~表及数据，以lamp97_~表名~.sql文件存储。
D:\xampp\htdocs\lamp97\lesson23_mysql>mysqldump -u root -p lamp97 ~表名~>lamp97_~表名~.sql
1        
-- 数据库恢复，将lamp97.sql文件中的数据恢复到数据库lamp97中
D:\xampp\htdocs\lamp97\lesson23_mysql>mysql -u root -p lamp97<lamp97.sql