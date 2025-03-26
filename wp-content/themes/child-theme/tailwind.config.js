module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./wp-content/plugins/elementor/**/*.php",
    "./wp-content/themes/tu-tema-hijo/**/*.php",
    "./wp-content/themes/tu-tema-hijo/**/*.js",
  ],
  safelist: [
    /^elementor-/,
    /^e-/,
    /^wp-/,
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
