const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            gridTemplateColumns: {
                '1': 'repeat(1, minmax(0, 1fr))',
                '2': 'repeat(2, minmax(0, 1fr))',
                '3': 'repeat(3, minmax(0, 1fr))',
                '4': 'repeat(4, minmax(0, 1fr))',
                '5': 'repeat(5, minmax(0, 1fr))',
                '6': 'repeat(6, minmax(0, 1fr))',
                '7': 'repeat(7, minmax(0, 1fr))',
                '8': 'repeat(8, minmax(0, 1fr))',
                '9': 'repeat(9, minmax(0, 1fr))',
                '10': 'repeat(10, minmax(0, 1fr))',
                '11': 'repeat(11, minmax(0, 1fr))',
                '12': 'repeat(12, minmax(0, 1fr))',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
