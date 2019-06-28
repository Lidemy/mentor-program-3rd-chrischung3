const request = require('request');

const options = {
  url: 'https://api.twitch.tv/helix/games/top',
  headers: {
    'client-id': '91tz6hdf7g56vb679rjimd9lcwcxay',
  },
};

function callback(error, response, body) {
  const info = JSON.parse(body);
  for (let i = 0; i <= info.data.length - 1; i += 1) {
    console.log(info.data[i].id, info.data[i].name);
  }
}

request(options, callback);
