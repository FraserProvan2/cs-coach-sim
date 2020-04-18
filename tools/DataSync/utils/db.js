
const mysql = require('mysql');
const config = require('../config.json');

module.exports = {
  db() {
    if (config.provider === 'mysql') {
      return mysql.createConnection({
        host: config.mysql.host,
        database: config.mysql.database,
        user: config.mysql.user,
        password: config.mysql.password,
        socketPath : config.mysql.socket,
      });
    }
    // can add others, RDS example
  }
}