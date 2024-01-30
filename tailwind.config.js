/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      animation: {
        blob: "blob 7s  linear infinite",
        blobb: "blobb 7s linear  infinite",
      },
      colors: {
        'customBlue': '#2984ff',
      },
      keyframes: {
        blob: {
          '0%': {
            transform: 'translate(0px, 0px) scale(1)'
          },
          '25%': {
            transform: 'translate(50px, -50px) scale(1.2)'
          },
          '50%': {
            transform: 'translate(100px, 0px) scale(1)'
          },
          '75%': {
            transform: 'translate(50px, 50px) scale(1.2)'
          },
          '100%': {
            transform: 'translate(0px, 0px) scale(1)'
          },
        },
        blobb: {
          '0%': {
            transform: 'translate(0px, 0px) scale(1)'
          },
          '25%': {
            transform: 'translate(-50px, 50px) scale(1.2)'
          },
          '50%': {
            transform: 'translate(0px, -100px) scale(1)'
          },
          '75%': {
            transform: 'translate(50px, -50px) scale(1.2)'
          },
          '100%': {
            transform: 'translate(0px, 0px) scale(1)'
          },
        }
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

