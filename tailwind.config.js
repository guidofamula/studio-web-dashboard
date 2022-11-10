/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      colors: {
        primary: "#6366f1", // Warna indigo-500
        secondary: "#64748b", // Warna slate-500
        dark: "#0f172a", // Warna slate-900
      },
      screens: {
        "2xl": "1320px",
      },
    },
  },
  plugins: [],
};
