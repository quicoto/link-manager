module.exports = {
  plugins: {
    '@fullhuman/postcss-purgecss': {
      content: [
        './*.php',
        './**/*.php',
      ],
    },
  },
};
