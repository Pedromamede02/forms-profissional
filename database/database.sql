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

/* segundo parte */

CREATE TABLE IF NOT EXISTS tbTest2(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,

    ask_09_IM TEXT,
    ID_09_IM INT,

    ask_10_CO TEXT,
    ID_10_CO INT,

    ask_11_RI TEXT,
    ID_11_RI INT,

    ask_12_ME TEXT,
    ID_12_ME INT,

    ask_13_SH TEXT,
    ID_13_SH INT,

    ask_14_TW TEXT,
    ID_14_TW INT,

    ask_15_PL TEXT,
    ID_15_PL INT,

    ask_16_CF TEXT,
    ID_16_CF INT,
    
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbAnswers2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    test9 INT CHECK (test9 BETWEEN 0 AND 10),
    test10 INT CHECK (test10 BETWEEN 0 AND 10),
    test11 INT CHECK (test11 BETWEEN 0 AND 10),
    test12 INT CHECK (test12 BETWEEN 0 AND 10),
    test13 INT CHECK (test13 BETWEEN 0 AND 10),
    test14 INT CHECK (test14 BETWEEN 0 AND 10),
    test15 INT CHECK (test15 BETWEEN 0 AND 10),
    test16 INT CHECK (test16 BETWEEN 0 AND 10),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbQuestions2 (
    tbQuestions_id2 INT AUTO_INCREMENT PRIMARY KEY,
    tbQuestions_text2 VARCHAR(255) NOT NULL
);

/* terceira parte 

CREATE TABLE IF NOT EXISTS tbTest3(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,

    ask_17_CO TEXT,
    ID_17_CO INT,

    ask_18_CF TEXT,
    ID_18_CF INT,

    ask_19_SH TEXT,
    ID_19_SH INT,

    ask_20_PL TEXT,
    ID_20_PL INT,

    ask_21_TW TEXT,
    ID_21_TW INT,

    ask_22_RI TEXT,
    ID_22_RI INT,

    ask_23_ME TEXT,
    ID_23_ME INT,

    ask_24_IM TEXT,
    ID_24_IM INT,
    
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbAnswers2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    test17 INT CHECK (test17 BETWEEN 0 AND 10),
    test18 INT CHECK (test18 BETWEEN 0 AND 10),
    test19 INT CHECK (test19 BETWEEN 0 AND 10),
    test20 INT CHECK (test20 BETWEEN 0 AND 10),
    test21 INT CHECK (test21 BETWEEN 0 AND 10),
    test22 INT CHECK (test22 BETWEEN 0 AND 10),
    test23 INT CHECK (test23 BETWEEN 0 AND 10),
    test24 INT CHECK (test24 BETWEEN 0 AND 10),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbQuestions3 (
    tbQuestions_id3 INT AUTO_INCREMENT PRIMARY KEY,
    tbQuestions_text3 VARCHAR(255) NOT NULL
);



/* quarta parte */

CREATE TABLE IF NOT EXISTS tbTest4(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,

    ask_25_TW TEXT,
    ID_25_TW INT,

    ask_26_SH TEXT,
    ID_26_SH INT,

    ask_27_ME TEXT,
    ID_27_ME INT,

    ask_28_IM TEXT,
    ID_28_IM INT,

    ask_29_PL TEXT,
    ID_29_PL INT,

    ask_30_CF TEXT,
    ID_30_CF INT,

    ask_31_RI TEXT,
    ID_31_RI INT,

    ask_32_CO TEXT,
    ID_32_CO INT,
    
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbAnswers4 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    test25 INT CHECK (test25 BETWEEN 0 AND 10),
    test26 INT CHECK (test26 BETWEEN 0 AND 10),
    test27 INT CHECK (test27 BETWEEN 0 AND 10),
    test28 INT CHECK (test28 BETWEEN 0 AND 10),
    test29 INT CHECK (test29 BETWEEN 0 AND 10),
    test30 INT CHECK (test30 BETWEEN 0 AND 10),
    test31 INT CHECK (test31 BETWEEN 0 AND 10),
    test32 INT CHECK (test32 BETWEEN 0 AND 10),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbQuestions4 (
    tbQuestions_id4 INT AUTO_INCREMENT PRIMARY KEY,
    tbQuestions_text4 VARCHAR(255) NOT NULL
);

/* quinta parte */

CREATE TABLE IF NOT EXISTS tbTest5(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,

    ask_33_ME TEXT,
    ID_33_ME INT,

    ask_34_IM TEXT,
    ID_34_IM INT,

    ask_35_TW TEXT,
    ID_35_TW INT,

    ask_36_SH TEXT,
    ID_36_SH INT,

    ask_37_CO TEXT,
    ID_37_CO INT,

    ask_38_CF TEXT,
    ID_38_CF INT,

    ask_39_PL TEXT,
    ID_39_PL INT,

    ask_40_PL TEXT,
    ID_40_PL INT,
    
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbAnswers5 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    test33 INT CHECK (tes33 BETWEEN 0 AND 10),
    test34 INT CHECK (test34 BETWEEN 0 AND 10),
    test35 INT CHECK (test35 BETWEEN 0 AND 10),
    test36 INT CHECK (test36 BETWEEN 0 AND 10),
    test37 INT CHECK (test37 BETWEEN 0 AND 10),
    test38 INT CHECK (test38 BETWEEN 0 AND 10),
    test39 INT CHECK (test39 BETWEEN 0 AND 10),
    test40 INT CHECK (test40 BETWEEN 0 AND 10),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbQuestions5 (
    tbQuestions_id5 INT AUTO_INCREMENT PRIMARY KEY,
    tbQuestions_text5 VARCHAR(255) NOT NULL
);

/* sexta parte */

CREATE TABLE IF NOT EXISTS tbTest6(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,

    ask_41_TW TEXT,
    ID_41_TW INT,

    ask_42_CO TEXT,
    ID_42_CO INT,

    ask_43_CF TEXT,
    ID_43_CF INT,

    ask_44_ME TEXT,
    ID_44_ME INT,

    ask_45_IM TEXT,
    ID_45_IM INT,

    ask_46_SH TEXT,
    ID_46_SH INT,

    ask_47_RI TEXT,
    ID_47_RI INT,

    ask_48_SH TEXT,
    ID_48_SH INT,
    
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbAnswers6 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    test41 INT CHECK (test41 BETWEEN 0 AND 10),
    test42 INT CHECK (test42 BETWEEN 0 AND 10),
    test43 INT CHECK (test43 BETWEEN 0 AND 10),
    test44 INT CHECK (test44 BETWEEN 0 AND 10),
    test45 INT CHECK (test45 BETWEEN 0 AND 10),
    test46 INT CHECK (test46 BETWEEN 0 AND 10),
    test47 INT CHECK (test47 BETWEEN 0 AND 10),
    test48 INT CHECK (test48 BETWEEN 0 AND 10),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbQuestions6 (
    tbQuestions_id6 INT AUTO_INCREMENT PRIMARY KEY,
    tbQuestions_text6 VARCHAR(255) NOT NULL
);


/* setima parte */

CREATE TABLE IF NOT EXISTS tbTest7(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,

    ask_49_ME TEXT,
    ID_49_ME INT,

    ask_50_CF TEXT,
    ID_50_CF INT,

    ask_51_RI TEXT,
    ID_51_RI INT,

    ask_52_IM TEXT,
    ID_52_IM INT,

    ask_53_PL TEXT,
    ID_53_PL INT,

    ask_54_CO TEXT,
    ID_54_CO INT,

    ask_55_TW TEXT,
    ID_55_TW INT,

    ask_56_CF TEXT,
    ID_56_CF INT,
    
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbAnswers2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    test49 INT CHECK (test49 BETWEEN 0 AND 10),
    test50 INT CHECK (test50 BETWEEN 0 AND 10),
    test51 INT CHECK (test51 BETWEEN 0 AND 10),
    test52 INT CHECK (test52 BETWEEN 0 AND 10),
    test53 INT CHECK (test53 BETWEEN 0 AND 10),
    test54 INT CHECK (test54 BETWEEN 0 AND 10),
    test55 INT CHECK (test55 BETWEEN 0 AND 10),
    test56 INT CHECK (test56 BETWEEN 0 AND 10),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tbuser(id)
);

CREATE TABLE IF NOT EXISTS tbQuestions7 (
    tbQuestions_id7 INT AUTO_INCREMENT PRIMARY KEY,
    tbQuestions_text7 VARCHAR(255) NOT NULL
);

*/