## Data Sync

##### Set up
1. Run `npm install` to install deps
2. Create `config.json` in root (DataSync dir): 
```json
{
  "apiUrl": "http://cs.test:8888/api"
}
```

##### Usage
1. First run `npm run getPlayerIds` to create a `players.json` to get desired player ids
2. Then run `npm run syncPlayers` to update the players stats (preferebly on a VPN)
This command gets the HLTV data and adds or updates the player using the API url in config

1. `npm run getPlayerImages` to update all images, failed downloads will use placeholder.png