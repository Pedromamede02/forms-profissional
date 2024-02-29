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

/* terceira parte */

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