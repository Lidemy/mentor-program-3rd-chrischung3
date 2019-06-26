const request = require('request');
const process = require('process');

if (process.argv[2] === 'list') {
  request(
    'https://lidemy-book-store.herokuapp.com/books/',
    (error, response, body) => {
      const json = JSON.parse(body);
      for (let i = 0; i < json.length; i += 1) {
        console.log(json[i].id, json[i].name);
      }
    },
  );
} else if (process.argv[2] === 'read') {
  request(
    `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
    (error, response, body) => {
      const json = JSON.parse(body);
      console.log(json.id, json.name);
    },
  );
}
