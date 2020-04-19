const { HLTV } = require('hltv');
const fs = require('fs');
const utils = require("../utils/db");

const conn = utils.db();

conn.connect((err) => {
  getPlayerStats();
});

function getNextId() {
  let players = JSON.parse(fs.readFileSync('players.json'));
  let thisJobPlayers = players.slice(0, 1);

  // remove from array and update json
  players.splice(0, 1);
  fs.unlinkSync('players.json');
  fs.appendFile('players.json', JSON.stringify(players), function (err) {
    if (err) throw err;
  });

  let ids = [];
  thisJobPlayers.forEach(player => {
    ids.push(player.id);
  }); 

  return ids;
}

function getPlayerStats() {
  let id = getNextId();

  HLTV.getPlayerStats({id: id})
    .then(res => {
      let team = "";
      if (typeof res.team !== "undefined" && typeof res.team.name !== "undefined") {
        team = res.team.name;
      }

      // ENSURE THIS MATCHES SCHEMA !!!!
      let records = [[
        id,
        res.ign,
        team,
        res.age,
        res.country.code,
        res.statistics.rating,
        res.statistics.headshots,
        res.statistics.kdRatio,
        res.statistics.killsPerRound,
        res.statistics.damagePerRound,
      ]];

      const query = "REPLACE INTO players (id, name, team, age, nationality, rating, headshots, kd_ratio, kpr, dpr) VALUES ?";
      conn.query(query, [records], function (err, result, fields) {
        if (err) {
          console.log("Failed: " + res.ign);
          console.log(err);
        } else {
          console.log("Added: " + res.ign);
        }
      });
    })
    .then(res => {
      getPlayerStats();
    });
}