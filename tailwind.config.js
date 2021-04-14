module.exports = {
  purge: [
    './app/**/*.php',
    './resources/**/*.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {
        opacity: ['disabled'],
        cursor: ['disabled'],
        backgroundColor: ['disabled'],
    },
  },
  plugins: [],
}
