const { HLTV } = require('hltv');

/**
 * 
 * Unused
 */

HLTV.getTeamRanking()
  .then(response => {
    let teams = [];
    response.forEach(team_data => {
      HLTV.getTeam({id: team_data.team.id})
        .then(res => {
          teams.push({
            name: res.name,
            location: res.location
          });
        })
      });
      console.log(teams);
  });