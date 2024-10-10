let mysql = require("mysql");
let config = require("./config.json");

let con = mysql.createConnection({
  host: config.DB_HOST,
  user: config.DB_USERNAME,
  password: config.DB_PASSWORD,
  database: config.DB_NAME,
});

con.connect(function (err) {
  if (err) throw err;
  console.log("Successfully connected to the database");
  const sql = "INSERT INTO frangipute (amandes, quantity) VALUES ?";
  const values = [
    ["Plein", 200],
    ["Partout", 199],
    ["Nope", 20],
    ["Là", 2],
    ["Peut être", 666],
  ];
  con.query(sql, [values], function (err, result) {
    if (err) throw err;
    console.log("Successfully inserted : " + result.affectedRows);
  });
});
