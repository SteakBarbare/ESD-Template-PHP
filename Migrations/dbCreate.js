let mysql = require("mysql");
let config = require("./config.json");

let con = mysql.createConnection({
  host: config.DB_HOST,
  user: config.DB_USERNAME,
  password: config.DB_PASSWORD,
});

con.connect(function (err) {
  if (err) throw err;
  console.log("Connected");
  con.query(
    "CREATE DATABASE IF NOT EXISTS migrationTest",
    function (err, result) {
      if (err) throw err;
      console.log("Database created !");
    }
  );
});
