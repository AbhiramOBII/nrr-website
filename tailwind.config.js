/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'bg-cream': '#ffebcf',
        'dark-shade': '#f6d1b3',
        'primary': '#2b104f',
        'header-orange': '#e98432'
      },
      fontFamily: {
        'satoshi': ['Satoshi', 'sans-serif']
      }
    },
  },
  plugins: [],
}

