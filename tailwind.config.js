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
            mainText: "#262626",
            mainBackground: "#f5f5f5",
            hi1Text:"#fdba74"
        },
    },
    screens: {
      sm: "640px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      '2xl': "1536px",
    },
  },
  plugins: [
      require('@tailwindcss/container-queries')
  ],
}

