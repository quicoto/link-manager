module.exports = {
  plugins: {
    '@fullhuman/postcss-purgecss': {
      content: [
        './*.php',
        './**/*.php',
      ],
      safelist: ['tag-cloud-link'],
    },
  },
};
