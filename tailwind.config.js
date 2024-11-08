/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

module.exports = {
  content: ["./app/views/*.{html,php,js}"],
  theme: {
    extend: {
      colors:{
        primary : '#87A922',
        secondary : '#114232',
      },

    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}