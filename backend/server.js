const express = require('express');
const mysql = require('mysql');
const cors = require('cors');

const app = express();
const port = 3000;

const dbConfig = {
  host: 'web-mysql',
  user: 'root',
  password: 'root',
  database: 'project'
};

const corsOptions = {
  origin: '*',
  optionsSuccessStatus: 200 
};

const db = mysql.createConnection(dbConfig);

db.connect((err) => {
  if (err) {
    console.error('Error connecting to database:', err);
    throw err;
  }
  console.log('Database connection established.');
});

app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});
app.use(cors(corsOptions));

let forms = [0]
let forms2 = [0]
let forms3 = [0]
let forms4 = [0]
let forms5 = [0]
let forms6 = [0]

app.post('/RamData', (req, res) => {
  forms = [
    0, 
    req.body.ASK_ID_01, 
    req.body.ID_01, 
    req.body.ASK_ID_02, 
    req.body.ID_02, 
    req.body.ASK_ID_03, 
    req.body.ID_03, 
    req.body.ASK_ID_04, 
    req.body.ID_04, 
    req.body.ASK_ID_05, 
    req.body.ID_05, 
    req.body.ASK_ID_06, 
    req.body.ID_06, 
    req.body.ASK_ID_07, 
    req.body.ID_07, 
    req.body.ASK_ID_08, 
    req.body.ID_08
  ]
  res.status(200).send('[INFO]: Data saved in ram')
})

app.post('/RamData2', (req, res) => {
  forms2 = [
    0, 
    req.body.ASK_ID_09, 
    req.body.ID_09, 
    req.body.ASK_ID_10, 
    req.body.ID_10, 
    req.body.ASK_ID_11, 
    req.body.ID_11, 
    req.body.ASK_ID_12, 
    req.body.ID_12, 
    req.body.ASK_ID_13, 
    req.body.ID_13, 
    req.body.ASK_ID_14, 
    req.body.ID_14, 
    req.body.ASK_ID_15, 
    req.body.ID_15, 
    req.body.ASK_ID_16, 
    req.body.ID_16
  ]
  res.status(200).send('[INFO]: Data saved in ram')
})

app.post('/RamData3', (req, res) => {
  forms3 = [
    0, 
    req.body.ASK_ID_17, 
    req.body.ID_17, 
    req.body.ASK_ID_18, 
    req.body.ID_18, 
    req.body.ASK_ID_19, 
    req.body.ID_19, 
    req.body.ASK_ID_20, 
    req.body.ID_20, 
    req.body.ASK_ID_21, 
    req.body.ID_21, 
    req.body.ASK_ID_22, 
    req.body.ID_22, 
    req.body.ASK_ID_23, 
    req.body.ID_23, 
    req.body.ASK_ID_24, 
    req.body.ID_24
  ]
  res.status(200).send('[INFO]: Data saved in ram')
})

app.post('/RamData4', (req, res) => {
  forms4 = [
    0, 
    req.body.ASK_ID_25, 
    req.body.ID_25, 
    req.body.ASK_ID_26, 
    req.body.ID_26, 
    req.body.ASK_ID_27, 
    req.body.ID_27, 
    req.body.ASK_ID_28, 
    req.body.ID_28, 
    req.body.ASK_ID_29, 
    req.body.ID_29, 
    req.body.ASK_ID_30, 
    req.body.ID_30, 
    req.body.ASK_ID_31, 
    req.body.ID_31, 
    req.body.ASK_ID_32, 
    req.body.ID_32
  ]
  res.status(200).send('[INFO]: Data saved in ram')
})

app.post('/RamData5', (req, res) => {
  forms5 = [
    0, 
    req.body.ASK_ID_33, 
    req.body.ID_33, 
    req.body.ASK_ID_34, 
    req.body.ID_34, 
    req.body.ASK_ID_35, 
    req.body.ID_35, 
    req.body.ASK_ID_36, 
    req.body.ID_36, 
    req.body.ASK_ID_37, 
    req.body.ID_37, 
    req.body.ASK_ID_38, 
    req.body.ID_38, 
    req.body.ASK_ID_39, 
    req.body.ID_39, 
    req.body.ASK_ID_40, 
    req.body.ID_40
  ]
  res.status(200).send('[INFO]: Data saved in ram')
})

app.post('/RamData6', (req, res) => {
  forms6 = [
    0, 
    req.body.ASK_ID_41, 
    req.body.ID_41, 
    req.body.ASK_ID_42, 
    req.body.ID_42, 
    req.body.ASK_ID_43, 
    req.body.ID_43, 
    req.body.ASK_ID_44, 
    req.body.ID_44, 
    req.body.ASK_ID_45, 
    req.body.ID_45, 
    req.body.ASK_ID_46, 
    req.body.ID_46, 
    req.body.ASK_ID_47, 
    req.body.ID_47, 
    req.body.ASK_ID_48, 
    req.body.ID_48
  ]
  res.status(200).send('[INFO]: Data saved in ram')
})

app.post('/form', (req, res) => {
  let sql = `INSERT INTO tbuser(User_name, User_surname, User_email) VALUES (?, ?, ?)`;
  db.query(sql, [req.query.txtname, req.query.txtsurname, req.query.txtEmail], (err, data) => {
    if (!err) {
      sql = `SELECT id FROM tbuser WHERE User_email = ?`;
      db.query(sql, [req.query.txtEmail], (err, data) => {
        if (!err) {
          forms[0] = data[0].id
          forms2[0] = data[0].id
          forms3[0] = data[0].id
          forms4[0] = data[0].id
          forms5[0] = data[0].id
          forms6[0] = data[0].id
          let userId = data[0].id

          sql = `INSERT INTO tbTest(id_user, ask_01_RI, ID_01_RI, ask_02_TW, ID_02_TW, ask_03_PL, ID_03_PL, ask_04_CO, ID_04_CO, ask_05_CF, ID_05_CF, ask_06_SH, ID_06_SH, ask_07_IM, ID_07_IM, ask_08_ME, ID_08_ME) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;       
          
          db.query(sql, forms, (err, data) => {
            if (!err) {
              sql = `INSERT INTO tbTest2(id_user, ask_09_IM, ID_09_IM, ask_10_CO, ID_10_CO, ask_11_RI, ID_11_RI, ask_12_ME, ID_12_ME, ask_13_SH, ID_13_SH, ask_14_TW, ID_14_TW, ask_15_PL, ID_15_PL, ask_16_CF, ID_16_CF) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);`;       
          
              db.query(sql, forms2, (err, data) => {
                if (!err) {
                  sql = `INSERT INTO tbTest3(id_user, ask_17_CO, ID_17_CO, ask_18_CF, ID_18_CF, ask_19_SH, ID_19_SH, ask_20_PL, ID_20_PL, ask_21_TW, ID_21_TW, ask_22_RI, ID_22_RI, ask_23_ME, ID_23_ME, ask_24_IM, ID_24_IM) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);`;       

                  db.query(sql, forms3, (err, data) => {
                    if (!err) {
                      sql = `INSERT INTO tbTest4(id_user, ask_25_TW, ID_25_TW, ask_26_SH, ID_26_SH, ask_27_ME, ID_27_ME, ask_28_IM, ID_28_IM, ask_29_PL, ID_29_PL, ask_30_CF, ID_30_CF, ask_31_RI, ID_31_RI, ask_32_CO, ID_32_CO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);`;       

                      db.query(sql, forms4, (err, data) => {
                        if (!err) {
                          sql = `INSERT INTO tbTest5(id_user, ask_33_ME, ID_33_ME, ask_34_IM, ID_34_IM, ask_35_TW, ID_35_TW, ask_36_SH, ID_36_SH, ask_37_CO, ID_37_CO, ask_38_CF, ID_38_CF, ask_39_PL, ID_39_PL, ask_40_PL, ID_40_PL) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);`

                          db.query(sql, forms5, (err, data) => {
                            if (!err) {
                              sql = `INSERT INTO tbTest6(id_user, ask_41_TW, ID_41_TW, ask_42_CO, ID_42_CO, ask_43_CF, ID_43_CF, ask_44_ME, ID_44_ME, ask_45_IM, ID_45_IM, ask_46_SH, ID_46_SH, ask_47_RI, ID_47_RI, ask_48_SH, ID_48_SH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);`

                              db.query(sql, forms6, (err, data) => {
                                if (!err) {
                                  sql = `INSERT INTO tbTest7(id_user, ask_49_ME, ID_49_ME, ask_50_CF, ID_50_CF, ask_51_RI, ID_51_RI, ask_52_IM, ID_52_IM, ask_53_PL, ID_53_PL, ask_54_CO, ID_54_CO, ask_55_TW, ID_55_TW, ask_56_CF, ID_56_CF) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);`

                                  let forms7 = [
                                    userId, 
                                    req.body.ASK_ID_49, 
                                    req.body.ID_49, 
                                    req.body.ASK_ID_50, 
                                    req.body.ID_50, 
                                    req.body.ASK_ID_51, 
                                    req.body.ID_51, 
                                    req.body.ASK_ID_52, 
                                    req.body.ID_52, 
                                    req.body.ASK_ID_53, 
                                    req.body.ID_53, 
                                    req.body.ASK_ID_54, 
                                    req.body.ID_54, 
                                    req.body.ASK_ID_55, 
                                    req.body.ID_55, 
                                    req.body.ASK_ID_56, 
                                    req.body.ID_56
                                  ]

                                  db.query(sql, forms7, (err, data) => {
                                    if (!err) {
                                      res.status(200).send('[CONGRATS]: Data sended to the database')
                                    }else{
                                      res.status(500).send('[ERROR]: Error on get User Id from the database')
                                      return
                                    }
                                  })
                                }else{
                                  res.status(500).send('[ERROR]: Error on get User Id from the database')
                                  return
                                }
                              })
                            }else{
                              res.status(500).send('[ERROR]: Error on get User Id from the database')
                              return
                            }
                          })
                        }else{
                          res.status(500).send('[ERROR]: Error on get User Id from the database')
                          return
                        }
                      })
                    }else{
                      res.status(500).send('[ERROR]: Error on get User Id from the database')
                      return
                    }
                  })
                }else{
                  res.status(500).send('[ERROR]: Error on get User Id from the database')
                  return
                }
              })
            }else{
              res.status(500).send('[ERROR]: Error on get User Id from the database')
              return
            }
          })

          res.send(forms)
        }else{
          res.status(500).send('[ERROR]: Error on get User Id from the database')
          return
        }
      })
    }else{
      res.status(500).send('[ERROR]: Error on send user data to the database')
      return
    }
  })
});

app.listen(port, () => {
  console.log(`Server running on the port ${port}`);
});