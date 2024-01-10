/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.jsx",
  ],
  theme: {
    extend: {
      colors: {
        // primary: "#27005D",
        primary: {
          50: '#f4ebf7', 
          100: '#e8d8f0', 
          200: '#c3a1d6', 
          300: '#9f71bd', 
          400: '#5b2a8c', 
          500: '#27005d', 
          600: '#210052', 
          700: '#190045', 
          800: '#130038', 
          900: '#0c0029', 
          950: '#07001a'
        },
        secondary: "#9400FF",
        tertiary: "#E4F1FF",
      },
    },
  },
  plugins: [],
}

