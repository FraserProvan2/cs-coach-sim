
const { HLTV } = require('hltv');
const moment = require('moment');
const fs = require('fs');

const filename = 'players.json';

if (fs.existsSync(filename)) {
  fs.unlinkSync(filename);
}

HLTV.getPlayerRanking({
  startDate: moment().subtract(3, 'months').format(), 
  endDate: moment().format()
}).then(res => {
  fs.appendFile(filename, JSON.stringify(res), function (err) {
    if (err) throw err;
  });
});

console.log("Complete");
