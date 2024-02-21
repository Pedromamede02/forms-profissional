CREATE DATABASE IF NOT EXISTS project;

USE project;

CREATE TABLE IF NOT EXISTS tbuser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    User_name VARCHAR(255) NOT NULL,
    User_surname VARCHAR(255) NOT NULL,
    User_email VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS tbTest(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,

    ask_01_RI TEXT,
    ID_01_RI INT,

    ask_02_TW TEXT,
    ID_02_TW INT,

    ask_03_PL TEXT,
    ID_03_PL INT,

    ask_04_CO TEXT,
    ID_04_CO INT,

    ask_05_CF TEXT,
    ID_05_CF INT,

    ask_06_SH TEXT,
    ID_06_SH INT,

    ask_07_IM TEXT,
    ID_07_IM INT,

    ask_08_ME TEXT,
    ID_08_ME INT,
    
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbAnswers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    test1 INT CHECK (test1 BETWEEN 0 AND 10),
    test2 INT CHECK (test2 BETWEEN 0 AND 10),
    test3 INT CHECK (test3 BETWEEN 0 AND 10),
    test4 INT CHECK (test4 BETWEEN 0 AND 10),
    test5 INT CHECK (test5 BETWEEN 0 AND 10),
    test6 INT CHECK (test6 BETWEEN 0 AND 10),
    test7 INT CHECK (test7 BETWEEN 0 AND 10),
    test8 INT CHECK (test8 BETWEEN 0 AND 10),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbQuestions (
    tbQuestions_id INT AUTO_INCREMENT PRIMARY KEY,
    tbQuestions_text VARCHAR(255) NOT NULL
);