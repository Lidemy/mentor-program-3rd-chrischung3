const request = require('request');
const process = require('process');


if (process.argv[2] === 'list') {
  request(
    'https://lidemy-book-store.herokuapp.com/books/',
    (error, response, body) => {
      console.log(response.statusCode);
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
      console.log(response.statusCode);
      const json = JSON.parse(body);
      console.log(json.id, json.name);
    },
  );
} else if (process.argv[2] === 'delete') {
  request.delete(
    `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
    (error, response, body) => {
      console.log(response.statusCode);
      console.log(body);
    },
  );
} else if (process.argv[2] === 'create') {
  request.post(
    {
      url: 'https://lidemy-book-store.herokuapp.com/books/',
      form: {
        name: process.argv[3],
      },
    },
    (error, response, body) => {
      console.log(response.statusCode);
      console.log(body);
    },
  );
} else if (process.argv[2] === 'update') {
  request.patch(
    {
      url: `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
      form: {
        name: process.argv[4],
      },
    },
    (error, response, body) => {
      console.log(response.statusCode);
      console.log(body);
    },
  );
}
