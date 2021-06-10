CREATE TABLE students (
	studentID int(11) NOT NULL AUTO_INCREMENT,
	studentName varchar(255) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    loginPass varchar(255) DEFAULT NULL,
	PRIMARY KEY (studentID),
    UNIQUE (email)
);

CREATE TABLE subjects (
	subjectID int(11) NOT NULL AUTO_INCREMENT,
	subjectName varchar(255) DEFAULT NULL,
	PRIMARY KEY (subjectID)
);

CREATE TABLE courses (
	courseID int(11) NOT NULL AUTO_INCREMENT,
    subjectID int(11) DEFAULT NULL,
    courseName varchar(255) DEFAULT NULL,
	semester varchar(255) DEFAULT NULL,
    courseHours int(11) DEFAULT NULL,
	PRIMARY KEY (courseID)
);

CREATE TABLE courseDetails (
	CRN int(11) NOT NULL AUTO_INCREMENT,
	courseID int(11) DEFAULT NULL,
    availableSeats int(11) DEFAULT NULL,
    courseTime varchar(255) DEFAULT NULL,
    courseDate varchar(255) DEFAULT NULL,
	courseInstructor varchar(255) DEFAULT NULL,
	PRIMARY KEY (CRN),
	FOREIGN KEY (courseID) REFERENCES courses(courseID)
);


CREATE TABLE enrollments (
	enrollmentID int(11) NOT NULL AUTO_INCREMENT,
    CRN int(11) DEFAULT NULL,
    studentID int(11) DEFAULT NULL,
	semester varchar(255) DEFAULT NULL,
    enrolledHours int(11) DEFAULT NULL,
	PRIMARY KEY (enrollmentID),
    FOREIGN KEY (studentID) REFERENCES students(studentID),
    FOREIGN KEY (CRN) REFERENCES courseDetails(CRN)
);

ALTER TABLE courseDetails AUTO_INCREMENT=1001;