import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundColor: {
                ground: '#dbdbdb',
                light: '#f2efeb',
                green: '#202d10',
                orange: '#bc9c22',
                sidebar:'#32620e',
                hover:'#314528'
            },
            textColor: {
                orange: '#bc9c22',
                lightGreen: '#e0f19c',
                green: '#32620e'
            } 

        },
    },

    plugins: [forms,require('preline/plugin')],
};
