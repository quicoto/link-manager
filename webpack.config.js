const path = require('path');

let mode = 'production';

if (process.env.NODE_ENV === 'development') {
  mode = 'development';
}

module.exports = {
  mode,
  entry: {
    admin: './js/admin.js',
  },
  output: {
    filename: '[name].min.js',
    path: path.resolve(__dirname, './'),
  },
};
