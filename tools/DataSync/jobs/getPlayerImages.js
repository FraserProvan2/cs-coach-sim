
const fs = require('fs');
const request = require('request')

let players = JSON.parse(fs.readFileSync('players.json'));

players.forEach(player => {
  let image_exists_already = fs.existsSync('../../storage/app/public/images/players/' + player.id + '.png');
  
  if (!image_exists_already) {
    downloadImage(`https://static.hltv.org//images/playerprofile/bodyshot/compressed/${player.id}.png`, `${player.id}.png`, function() {

      var oldPath = player.id + '.png'
      var newPath = '../../storage/app/public/images/players/' + player.id + '.png';

      fs.rename(oldPath, newPath, function () {
        console.log('downloaded and moved: ' + player.id + '.png');
      });
    });
  } else {
    console.log('Already have image for: ' + player.id);
  }
});

function downloadImage(uri, filename, callback){
  request.head(uri, function(err, res, body){

    if (typeof res.headers['content-length'] === "undefined") {
      fs.copyFile('placeholder.png', filename, (err) => {
        let oldPath = filename;
        let newPath = '../../storage/app/public/images/players/' + filename;

        fs.rename(oldPath, newPath, function () {});
        console.log('copied: ' + filename);
      });
    } else {
      request(uri).pipe(fs.createWriteStream(filename)).on('close', callback);
      console.log('downloaded: ' + filename);
    }
  });
};