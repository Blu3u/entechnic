drop database if exists entechnic;
create database entechnic;

use entechnic;

CREATE TABLE IF NOT EXISTS mult_choice_questions (
	id int auto_increment primary key,
    question varchar(256) not null,
    a varchar(256) not null,
    b varchar(256) not null,
    c varchar(256) not null,
    d varchar(256) not null,
    correct char(1) not null
);

CREATE TABLE IF NOT EXISTS gap_questions (
	id int auto_increment primary key
);

CREATE TABLE IF NOT EXISTS gaps (
	id int auto_increment primary key,
    gap_question_id int not null,
    foreign key(gap_question_id) references gap_questions(id),
    content varchar(256) not null,
    is_gap bool
);

insert into mult_choice_questions values
	(null, 'Question content asasas?', 'a answer', 'b answer', 'c answer', 'd answer', 'a'),
	(null, 'Question content second?', 'a aaaaanswer', 'b bbanswer', 'c ccanswer', 'd ddanswer', 'a');

insert into gap_questions values
	(null),
    (null);

insert into gaps values
	(null, 1, 'First part', false),
	(null, 1, 'first gap', true),
	(null, 1, '2nd part', false),
	(null, 1, '2nd gap', true),
	(null, 1, 'third part', false);