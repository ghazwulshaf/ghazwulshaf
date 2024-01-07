/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#27005D",
        secondary: "#9400FF",
        tertiary: "#E4F1FF",
      },
    },
  },
  plugins: [],
}

