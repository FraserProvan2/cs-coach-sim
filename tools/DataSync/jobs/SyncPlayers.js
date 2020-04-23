const { HLTV } = require('hltv');
const fs = require('fs');
const axios = require('axios');
const config = require('../config.json');

getPlayerStats();

function getPlayerStats() {
  let id = getNextId();

  HLTV.getPlayerStats({id: id})
    .then(res => {
      let team = "";
      if (typeof res.team !== "undefined" && typeof res.team.name !== "undefined") {
        team = res.team.name;
      }

      axios.post(config.apiUrl + '/player/add-or-update', {
        id: id,
        name: res.ign,
        type: "normal",
        team: team,
        age: res.age,
        nationality: res.country.code,
        rating: res.statistics.rating,
        headshots: res.statistics.headshots,
        kd_ratio: res.statistics.kdRatio,
        kpr: res.statistics.killsPerRound,
        dpr: res.statistics.damagePerRound,
      })
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.log(error);
      });

      getPlayerStats();
    });
}

function getNextId() {
  let players = JSON.parse(fs.readFileSync('players.json'));
  let thisJobPlayer = players.slice(0, 1);

  // remove from array and update json
  players.splice(0, 1);
  fs.unlinkSync('players.json');
  fs.appendFileSync('players.json', JSON.stringify(players), function (err) {
    if (err) throw err;
  });

  return thisJobPlayer[0].id;
}