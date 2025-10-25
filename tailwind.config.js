import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./src/**/*.{html,js}",
    ],
    theme: {
        extend: {
             fontFamily: {
              outfit: ["Outfit", "ui-sans-serif", "system-ui", "sans-serif"],
            },
            colors: {
              primary: "#E50914",
              primaryHover: "#D30000",
              textPrimary: "#252525",
              textSecondary: "#999999",
              borderDefault: "#E0E0E0",
              bgWarm: "#E8DDDC",
              bgPrimary: "#FFFFFF",
            },
        },
    },
    plugins: [],
};
