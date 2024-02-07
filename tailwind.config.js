import forms from '@tailwindcss/forms';
const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            '2xsm': '375px',
            xsm: '425px',
            '3xl': '2000px',
            ...defaultTheme.screens,
        },
        extend: {},
    },
    plugins: [forms],
};
