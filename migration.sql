DROP DATABASE entechnic;
CREATE DATABASE entechnic;
USE entechnic;

-- USER STUFF

CREATE TABLE Users (
  idUsers INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  userName VARCHAR(32) NULL,
  userMail VARCHAR(128) NULL,
  userPassword VARCHAR(256) NULL,
  userPrivileges INTEGER UNSIGNED ZEROFILL NULL,
  PRIMARY KEY(idUsers)
);

CREATE TABLE UserProfiles (
  idUserProfiles INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Users_idUsers INTEGER UNSIGNED NOT NULL,
  userFirstName VARCHAR(64) NULL,
  userLastName VARCHAR(64) NULL,
  userDescription VARCHAR(1024) NULL,
  userRegistrationDate DATE NULL,
	userBirthDate DATE NULL,
	userGender DATE NULL,
  userAvatarIndex INTEGER UNSIGNED ZEROFILL NULL,
  PRIMARY KEY(idUserProfiles),
  FOREIGN KEY(Users_idUsers)
    REFERENCES Users(idUsers)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE UserProgress (
  idUserProgress INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Users_idUsers INTEGER UNSIGNED NOT NULL,
  userLevel INTEGER UNSIGNED ZEROFILL NULL,
  userRank INTEGER UNSIGNED ZEROFILL NULL,
  PRIMARY KEY(idUserProgress),
  FOREIGN KEY(Users_idUsers)
    REFERENCES Users(idUsers)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

-- CHAPTERS SUBJECTS AND QUESTIONS WITH ANSWERS

CREATE TABLE Chapters (
  idChapters INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  chapterDescription VARCHAR(1024) NULL,
  chapterName VARCHAR(128) NULL,
  chapterNumber INTEGER UNSIGNED NULL,
  PRIMARY KEY(idChapters)
);

CREATE TABLE Subjects (
  idSubjects INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Chapters_idChapters INTEGER UNSIGNED NOT NULL,
  subjectDescription VARCHAR(1024) NULL,
  subjectName VARCHAR(128) NULL,
  subjectNumber INTEGER UNSIGNED NULL,
  PRIMARY KEY(idSubjects),
  FOREIGN KEY(Chapters_idChapters)
    REFERENCES Chapters(idChapters)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Exercises (
  idExercises INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Subjects_idSubjects INTEGER UNSIGNED NOT NULL,
  exerciseTitle VARCHAR(512) NULL,
  exerciseDescription VARCHAR(2048) NULL,
  exerciseCorrectAnswer VARCHAR(64) NULL,
  exerciseType VARCHAR(64) NULL,
  PRIMARY KEY(idExercises),
  FOREIGN KEY(Subjects_idSubjects)
    REFERENCES Subjects(idSubjects)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Answers (
  idAnswers INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Exercises_idExercises INTEGER UNSIGNED NOT NULL,
  answerDescription VARCHAR(256) NULL,
	answerIndex VARCHAR(256) NULL,
  PRIMARY KEY(idAnswers),
  FOREIGN KEY(Exercises_idExercises)
    REFERENCES Exercises(idExercises)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

-- USER COMPLETIONS

CREATE TABLE UserCompletedChapters (
  idUserCompletedChapters INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Chapters_idChapters INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idUserCompletedChapters),
  FOREIGN KEY(Chapters_idChapters)
    REFERENCES Chapters(idChapters)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE UserCompletedSubjects (
  idUserCompletedSubjects INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Subjects_idSubjects INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idUserCompletedSubjects),
  FOREIGN KEY(Subjects_idSubjects)
    REFERENCES Subjects(idSubjects)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

-- INSERTS

INSERT INTO Chapters VALUES
  (null, null, null, null);

INSERT INTO Subjects VALUES
  (null, 1, null, null, null),
  (null, 1, null, null, null),
  (null, 1, null, null, null);

INSERT INTO Exercises VALUES
  (null, 1, 'Example title', 'Example description', 'a', 'mult'),
  (null, 2, 'Example title2', 'Example description2', 'b', 'mult'),
  (null, 3, 'Example title3', 'Example description3', 'c', 'mult');

INSERT INTO Answers VALUES
  (null, 1, 'First q first ans', 'a'),
  (null, 1, 'First q second ans', 'b'),
  (null, 1, 'First q third ans', 'c'),
  (null, 1, 'First q fourth ans', 'd'),
  (null, 2, 'Second q first ans', 'a'),
  (null, 2, 'Second q second ans', 'b'),
  (null, 2, 'Second q third ans', 'c'),
  (null, 2, 'Second q fourth ans', 'd'),
  (null, 3, 'Third q first ans', 'a'),
  (null, 3, 'Third q second ans', 'b'),
  (null, 3, 'Third q third ans', 'c'),
  (null, 3, 'Third q fourth ans', 'd');
