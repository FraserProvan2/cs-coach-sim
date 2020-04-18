## Data Sync

##### Set up
1. Run `npm install` to install deps
2. Create `config.json` in root (DataSync dir) for the database you want to sync, like so: 
```json
{
  "provider": "mysql",
  "mysql": {
    "host": "127.0.0.1",
    "database": "cs_sim",
    "user": "root",
    "password": "root",
    "socket": "/Applications/MAMP/tmp/mysql/mysql.sock"
  }
}
```

##### Usage
1. First run `npm run getPlayerIds` to create a `players.json` to get desired player ids
2. Then run `npm run syncPlayers` to update the players stats (preferebly on a VPN)
NOTE: ensure the schema matches !!!