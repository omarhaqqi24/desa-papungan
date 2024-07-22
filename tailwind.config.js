/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'false',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        jakarta: ["'Plus Jakarta Sans'", 'sans-serif'],
      },
      colors: {
        lightText: "#f3f4f6",
        darkText: "#111827",
      },
    },
  },
  daisyui: {
    themes: [
      {
        mytheme: {
          
"primary": "#1d4ed8",
          
"secondary": "#2563eb",
          
"accent": "#D5E1FE",
          
"neutral": "#9ca3af",
          
"base-100": "#f3f4f6",
          
"info": "#9ca3af",
          
"success": "#008a3c",
          
"warning": "#c11d00",
          
"error": "#e40036",
          },
        },
      ],
    },
  plugins: [
    require('daisyui'),
  ],
}

