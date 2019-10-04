const path = require('path');

module.exports = {
  entry: './webpack_index.js',
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: 'bundle.js',
  },
};
