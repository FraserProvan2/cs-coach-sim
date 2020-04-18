const { HLTV } = require("hltv");
const moment = require("moment");
const utils = require("../utils/db");
const config = require('../config.json');

/**
 * These tests are to ensure everything is in place before 
 * running the data sync
 */

test("HLTV api can get player ranking", () => {
    return HLTV.getPlayerRanking({
        startDate: moment()
            .subtract(3, "months")
            .format(),
        endDate: moment().format()
    }).then(res => {
        expect(res[0]).toEqual({
            id: expect.any(Number),
            name: expect.any(String),
            rating: expect.any(Number)
        });
    });
});

test("HLTV api can get player stats", () => {
    return HLTV.getPlayerStats({ id: 7998 }).then(res => {
        expect(res).toEqual({
            name: "Aleksandr Kostyliev",
            ign: "s1mple",
            image: expect.any(String),
            age: expect.any(Number),
            country: { name: expect.any(String), code: expect.any(String) },
            team: { name: expect.any(String), id: expect.any(Number) },
            statistics: {
                kills: expect.any(String),
                headshots: expect.any(String),
                deaths: expect.any(String),
                kdRatio: expect.any(String),
                damagePerRound: expect.any(String),
                grenadeDamagePerRound: expect.any(String),
                mapsPlayed: expect.any(String),
                roundsPlayed: expect.any(String),
                killsPerRound: expect.any(String),
                assistsPerRound: expect.any(String),
                deathsPerRound: expect.any(String),
                savedByTeammatePerRound: expect.any(String),
                savedTeammatesPerRound: expect.any(String),
                rating: expect.any(String)
            }
        });
    });
});

test("Chosen DB works", () => {
  if (config.provider === 'mysql') {
    const conn = utils.db();
    expect(conn._protocol.writable).toBe(true);
  }
});