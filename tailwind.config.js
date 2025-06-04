/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{php,html,js}"
  ],
  theme: {
    extend: {
      fontFamily:{
        line: ['LINESeedSansTH', 'sans-serif'],
      },
    },
  },
  plugins: [require("daisyui")],
}
