const path = require('path');
let mode = 'production';

if (process.env.NODE_ENV === 'development') {
  mode = 'development';
}

module.exports = {
  mode,
  entry: './js/main.js',
  output: {
    filename: 'scripts.min.js',
    path: path.resolve(__dirname, './'),
  },
};

