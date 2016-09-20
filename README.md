# Foxes-SC
A thing for the PE office.

### What is this?
Computer Science Advanced Studies requires a project to be done in the field of your study each semester. As a project for User Interface Design, I am creating a project for the PE office. It will allow coaches to add, delete, and edit semesters and periods of their students. These students will then be able to log their workouts for the coaches to view. It will also automatically calculate the weights each student should be lifting. Finally, coaches will have a screen to project during the student's period.

### Is it done yet?
Probably!

### Can I use this for anything?
Yes, as long as you credit me.

### How do I set this up on my own website?
You probably shouldn't.

### No, really!
Ok, here are the tables you need to create in a MySQL database:

#### Basic CLASS table:
```SQL
CREATE TABLE `CLASS` (
  `ID` int(11) NOT NULL COMMENT 'ID in the table',
  `COACH` text COMMENT 'Coach that belongs to this period',
  `SEMESTER` text NOT NULL COMMENT 'Semester in school, ex Spring 2016',
  `PERIOD` text NOT NULL COMMENT 'Period from the semester, ex Period 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `CLASS`
  ADD PRIMARY KEY (`ID`);
  
ALTER TABLE `CLASS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID in the table', AUTO_INCREMENT=1;
```

#### Basic COACH table:
```SQL
CREATE TABLE `COACH` (
  `id` int(11) NOT NULL COMMENT 'ID of the coach',
  `username` text NOT NULL COMMENT 'Username of the coach',
  `password` text NOT NULL COMMENT 'Hashword of the coach'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `COACH`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `COACH`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of the coach', AUTO_INCREMENT=1;
```

#### Basic DATA table:
```SQL
CREATE TABLE `DATA` (
  `ID` int(11) NOT NULL COMMENT 'ID of this entry',
  `LINKED_ID` int(11) NOT NULL COMMENT 'Link to the STUDENT$ table',
  `WEEK` int(11) NOT NULL COMMENT 'Week of the data',
  `BENCH` int(11) NOT NULL,
  `DEADLIFT` int(11) NOT NULL,
  `BACKSQUAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `DATA`
  ADD PRIMARY KEY (`ID`);
  
ALTER TABLE `DATA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of this entry', AUTO_INCREMENT=1;
```

#### Basic STUDENTS table:
```SQL
CREATE TABLE `STUDENT$` (
  `ID` int(11) NOT NULL COMMENT 'ID of the student in this table',
  `STUDENT_ID` text NOT NULL COMMENT 'Student ID',
  `NAME` text NOT NULL COMMENT 'Name of the student',
  `GENDER` varchar(1) NOT NULL DEFAULT 'M' COMMENT 'Gender of the student',
  `PERIOD` text NOT NULL COMMENT 'Period of the student',
  `SEMESTER` text NOT NULL COMMENT 'Semester of the student',
  `COACH` text NOT NULL COMMENT 'The coach of the student',
  `BASE_BENCH` int(11) NOT NULL COMMENT 'Bench Press Base',
  `BASE_DEADLIFT` int(11) NOT NULL COMMENT 'Dead Lift Base',
  `BASE_BACKSQUAT` int(11) NOT NULL COMMENT 'Back Squat Base',
  `POST_BENCH` int(11) NOT NULL COMMENT 'Post test of the backsquat',
  `POST_DEADLIFT` int(11) NOT NULL COMMENT 'Post test of the deadlift',
  `POST_BACKSQUAT` int(11) NOT NULL COMMENT 'Post test of the backsquat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `STUDENT$`
  ADD PRIMARY KEY (`ID`),
  
ALTER TABLE `STUDENT$`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of the student in this table', AUTO_INCREMENT=1;
```

You'll need a basic LAMP (or FAMP, or WAMP, or whatever, as long as you have PHP, Apache, and MySQL) stack. From there, it's simply setting the login in the PHP configuration, playing wack-a-mole with the source code and then voilà, it should work!

WARNING: Requires expert level knowledge in PHP and MySQL!

WARNING: The code is not organized. If you find one thing broken, it's most likely copied and pasted in other files. This is a really bad example of how to 

WARNING: There are nearly zero comments in this code... but perhaps it'll be useful to somebody!

