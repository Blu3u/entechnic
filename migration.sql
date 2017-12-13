CREATE DATABASE entechnic;
USE entechnic;

-- USER STUFF

CREATE TABLE users (
  idUser INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(20) NOT NULL,
  lastName VARCHAR(35) NOT NULL,
  username VARCHAR(27) NOT NULL,
  mail VARCHAR(60) NOT NULL,
  userPassword VARCHAR(256) NOT NULL,
  userPrivileges INTEGER UNSIGNED ZEROFILL NOT NULL,
  birthDate date,
  signUpDate timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  gender enum('f','m'),
  avatarId  int unsigned DEFAULT 1,
  description text,
  PRIMARY KEY(idUser)
);

CREATE TABLE classes (
	idClass INTEGER UNSIGNED NOT NULL AUTO_INCREMENT primary KEY,
  teacherId INTEGER UNSIGNED NOT NULL,
  FOREIGN KEY (teacherId) references users(idUser)
    ON UPDATE CASCADE
    ON DELETE CASCADE   
);

CREATE TABLE students(
	userId INTEGER UNSIGNED NOT NULL,
  classId INTEGER UNSIGNED NOT NULL,
  FOREIGN KEY (userId) references users(idUser)
		ON UPDATE CASCADE
    ON DELETE CASCADE,
	FOREIGN KEY (classId) references classes(idClass)
		ON UPDATE CASCADE
    ON DELETE CASCADE
);
CREATE TABLE avatars (
	idAvatar INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  avatarPath varchar(16)
);

CREATE TABLE usersAvatars(
	userId INTEGER UNSIGNED NOT NULL,
  avatarId INTEGER UNSIGNED NOT NULL,
  foreign key (userId) references Users(idUser)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  foreign key (avatarId) references avatars(idAvatar)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE userStatus (
  idUserProgress INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  userId INTEGER UNSIGNED NOT NULL,
  level INTEGER UNSIGNED ZEROFILL NULL,
  points INTEGER UNSIGNED ZEROFILL NULL,
  PRIMARY KEY(idUserProgress),
  FOREIGN KEY(userId) REFERENCES Users(idUser)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- CHAPTERS SUBJECTS AND QUESTIONS WITH ANSWERS

CREATE TABLE chapters (
  idChapter INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  chapterName VARCHAR(64) NOT NULL,
  chapterNumber INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idChapter)
);

CREATE TABLE subjects (
  idSubject INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  subjectName VARCHAR(64) NOT NULL,
  subjectNumber INTEGER UNSIGNED NOT NULL,
  chapterId INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idSubject),
  foreign key (chapterId) REFERENCES chapters(idChapter)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE exercises (
  idExercise INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  subjectId INTEGER UNSIGNED NOT NULL,
  name VARCHAR(64) NOT NULL,
  exerciseDescription text NULL,
  exerciseCorrectAnswer VARCHAR(64) NOT NULL,
  exerciseType VARCHAR(64) NOT NULL,
  PRIMARY KEY(idExercise),
  FOREIGN KEY(subjectId) REFERENCES Subjects(idSubject)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE answers (
  idAnswer INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  excerciseId INTEGER UNSIGNED NOT NULL,
  answerDescription VARCHAR(256) NULL,
	answerIndex INTEGER(7) UNSIGNED ZEROFILL NOT NULL ,
  PRIMARY KEY(idAnswer),
  FOREIGN KEY(excerciseId) REFERENCES Exercises(idExercise)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- USER COMPLETIONS

CREATE TABLE userCompletedChapters (
  idUserCompletedChapter INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  chapterId INTEGER UNSIGNED NOT NULL,
  chapterAccess bool DEFAULT false,
  PRIMARY KEY(idUserCompletedChapter),
  FOREIGN KEY(chapterId) REFERENCES Chapters(idChapter)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE userCompletedSubjects (
  idUserCompletedSubject INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  subjectId INTEGER UNSIGNED NOT NULL,
  subjectAccess bool DEFAULT false,
  PRIMARY KEY(idUserCompletedSubject),
  FOREIGN KEY(subjectId) REFERENCES Subjects(idSubject)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE userCompletedExcercises (
  idUserCompletedExcercise INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  excerciseId INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idUserCompletedExcercise),
  FOREIGN KEY(excerciseId) REFERENCES exercises(idExercise)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- NOTES

CREATE TABLE notes(
	idNote INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  picture varchar(64),
  reading text,
  listening varchar(64)
);

CREATE TABLE chapterNotes(
  noteId INTEGER UNSIGNED NOT NULL,
  chapterId INTEGER UNSIGNED NOT NULL,
  FOREIGN KEY (chapterId) REFERENCES chapters(idChapter)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (noteId) REFERENCES notes(idNote)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
CREATE TABLE excerciseNotes(
  noteId INTEGER UNSIGNED NOT NULL,
  excerciseId INTEGER UNSIGNED NOT NULL,
  FOREIGN KEY (excerciseId) REFERENCES exercises(idExercise)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (noteId) REFERENCES notes(idNote)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
