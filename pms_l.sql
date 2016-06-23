 drop schema if exists pms_l;
 CREATE SCHEMA pms_l DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;
 USE pms_l;




CREATE TABLE Activity
(
	Id           INTEGER NULL,
	Description                  VARCHAR(500) NULL,
	Date						 DATETIME NOT NULL DEFAULT NOW(),
	TaskId             INTEGER NOT NULL,
    created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Activity
	ADD  PRIMARY KEY (Id);

ALTER TABLE Activity MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE Activity AUTO_INCREMENT = 1;


CREATE TABLE Document
(
	Id            INTEGER NULL,
	Title                 VARCHAR(100) NULL,
	Description                  VARCHAR(255) NULL,
	ProjectId            INTEGER NOT NULL,
	Date           DATE NULL,
	BlobFajl 				 LONGBLOB NULL,
	Size					 INT NULL,
	created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Document
	ADD  PRIMARY KEY (Id);



ALTER TABLE Document MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE Document AUTO_INCREMENT = 1;


CREATE TABLE Person
(
	Id            INTEGER NULL,
	Name                   VARCHAR(50) NULL,
	LastName               VARCHAR(50) NULL,
	privileges INTEGER NULL,
    Address varchar(100) null,
    PhoneNumber varchar(40) null,
    MobileNumber varchar(40) null,
    created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Person
	ADD  PRIMARY KEY (Id);

ALTER TABLE Person MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE Person AUTO_INCREMENT = 1;


CREATE TABLE Income
(
	Id              INTEGER NULL,
	ProjectId            INTEGER NOT NULL,
	Description                  VARCHAR(255) NULL,
	Amount INTEGER NULL,
	ActivityId INTEGER NOT NULL,
	Date DATE NULL,
	created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Income
	ADD  PRIMARY KEY (Id);

ALTER TABLE Income MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE Income AUTO_INCREMENT = 1;



drop table if exists project;
CREATE TABLE Project
(
	Id            INTEGER NULL,
	Title                 VARCHAR(255) NULL,
	StartDate               date NULL ,
	EndDate                  date NULL,
	Description                  VARCHAR(1000) NULL,
	Budget                INTEGER NULL,
	created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Project
	ADD  PRIMARY KEY (Id);

ALTER TABLE Project MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE Project AUTO_INCREMENT = 1;

drop table if exists works_on_project;
CREATE TABLE Works_On_Project
(
	PersonId           INTEGER NOT NULL,
	ProjectId            INTEGER NOT NULL,
	role           INTEGER NULL,
	created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Works_On_Project
	ADD  PRIMARY KEY (PersonId,ProjectId);


CREATE TABLE Works_On_Task
(
	TaskId             INTEGER NOT NULL,
	PersonId            INTEGER NOT NULL,
	ActivityId           INTEGER NOT NULL,
	StartDate          DATE NULL,
	created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);

ALTER TABLE Works_On_Task
	ADD  PRIMARY KEY (TaskId,PersonId,ActivityId);



CREATE TABLE Revision
(
	Id            INTEGER NULL,
	Date        DATE NULL,
	Number                  NUMERIC NULL,
	description                  VARCHAR(255) NULL,
	DocumentId            INTEGER NOT NULL,
	created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Revision
	ADD  PRIMARY KEY (Id);


ALTER TABLE Revision MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE Revision AUTO_INCREMENT = 1;


CREATE TABLE Expense
(
	Id              INTEGER NOT NULL,
	Description                  VARCHAR(255) NULL,
	Amount                 INTEGER NULL,
	ProjectId            INTEGER NOT NULL,
	ActivityId           INTEGER NOT NULL,
	Date 					 DATE NULL,
	created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Expense
	ADD  PRIMARY KEY (Id);

ALTER TABLE Expense MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE Expense AUTO_INCREMENT = 1;



CREATE TABLE Task
(
	Id             INTEGER NULL,
	ProjectId            INTEGER NOT NULL,
	Description                  VARCHAR(255) NULL,
	Start datetime NULL,
	End                  datetime NULL,
	Deadline datetime NULL,
	Title                 VARCHAR(100) NULL,
	ManHour			 INTEGER NULL,
	PercentageDone			 INTEGER DEFAULT 0,
	Hours			 INTEGER DEFAULT 0,
	created_at datetime not null default now(),
    updated_at datetime not null default now(),
    deleted_at datetime
);



ALTER TABLE Task
	ADD  PRIMARY KEY (Id);

ALTER TABLE Task MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE Task AUTO_INCREMENT = 1;


ALTER TABLE Activity
	ADD FOREIGN KEY FK_Activity_Task (TaskId) REFERENCES Task(Id);


ALTER TABLE Document
	ADD FOREIGN KEY FK_Document_Project (ProjectId) REFERENCES Project(Id);



ALTER TABLE Income
	ADD FOREIGN KEY FK_Income_Project (ProjectId) REFERENCES Project(Id);


ALTER TABLE Expense
	ADD FOREIGN KEY FK_Expense_Activity (ActivityId) REFERENCES Activity(Id);

ALTER TABLE Works_On_Project
	ADD FOREIGN KEY FK_Works_On_Project_Person (PersonId) REFERENCES Person(Id);


ALTER TABLE Works_On_Project
	ADD FOREIGN KEY FK_Works_On_Project_Project (ProjectId) REFERENCES Project(Id);



ALTER TABLE Works_On_Task
	ADD FOREIGN KEY FK_Works_On_Task_Task (TaskId) REFERENCES Task(Id);


ALTER TABLE Works_On_Task
	ADD FOREIGN KEY FK_Works_On_Task (PersonId) REFERENCES Person(Id);


ALTER TABLE Works_On_Task
	ADD FOREIGN KEY FK_Works_On_Task_Activity (ActivityId) REFERENCES Activity(Id);



ALTER TABLE Revision
	ADD FOREIGN KEY FK_Revision_Document (DocumentId) REFERENCES Document(Id);



ALTER TABLE Expense
	ADD FOREIGN KEY FK_Expense_Project (ProjectId) REFERENCES Project(Id);


ALTER TABLE Expense
	ADD FOREIGN KEY FK_Expense_Activity (ActivityId) REFERENCES Activity(Id);



ALTER TABLE Task
	ADD FOREIGN KEY FK_Task_Project (ProjectId) REFERENCES Project(Id);
    


create table project_roles
(
	Id integer not null,
    Description varchar(100)
    );
    
alter table project_roles add primary key (Id);
	
ALTER TABLE project_roles MODIFY COLUMN Id INT AUTO_INCREMENT;
ALTER TABLE project_roles AUTO_INCREMENT = 1;

alter table works_on_project
	add foreign key fk_project_role (role) references project_roles(Id);
    
insert into project_roles (Description) values( "Manadger");
insert into project_roles (Description) values ("Admin");
insert into project_roles (Description) values("Worker");
    
-- EXECUTE THIS PART OF THE SCRIPT AFTER MIGRATION
alter table person
add column userId Integer ,
add foreign key fk_user_person (userId) references user(id);
	
    
    