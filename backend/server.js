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

app.post('/form', (req, res) => {
  var sql = `INSERT INTO tbuser(User_name, User_surname, User_email) VALUES (?, ?, ?)`;
  db.query(sql, [req.query.txtname, req.query.txtsurname, req.query.txtEmail], (err, data) => {
    if (!err) {
      ask_ = [
        "I am quick to see any advantage of new opportunities and take it",
        "I can work well with a wide range of people",
        "I am quick to see any advantage of new opportunities and take it",
        "I can work well with a wide range of people",
        "I am quick to see any advantage of new opportunities and take it",
        "I can work well with a wide range of people",
        "I am quick to see any advantage of new opportunities and take it",
        "I can work well with a wide range of people",
      ];

      var sql = `SELECT id FROM tbuser WHERE User_email = ?`;
      db.query(sql, [req.query.txtEmail], (err, data) => {
        if (!err) {
          let id_user = data[0].id
          var sql = `INSERT INTO tbTest(id_user, ask_01_RI, ID_01_RI, ask_02_TW, ID_02_TW, ask_03_PL, ID_03_PL, ask_04_CO, ID_04_CO, ask_05_CF, ID_05_CF, ask_06_SH, ID_06_SH, ask_07_IM, ID_07_IM, ask_08_ME, ID_08_ME) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;
          
          var values = [
            id_user, 
            ask_[0], 
            req.body.ID_01, 
            ask_[1], 
            req.body.ID_02, 
            ask_[2], 
            req.body.ID_03, 
            ask_[3], 
            req.body.ID_04, 
            ask_[4], 
            req.body.ID_05, 
            ask_[5], 
            req.body.ID_06, 
            ask_[6], 
            req.body.ID_07, 
            ask_[7], 
            req.body.ID_08
          ]

          db.query(sql, values, (err, data) => {
            if (!err) {
              res.status(200).send('[Congratulations]: data sended to the database')
            }else{
              res.status(500).send('[ERROR]: Error on send Test data to the database')
              return
            }
          })
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