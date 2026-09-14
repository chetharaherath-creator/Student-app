import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                navy: {
                    DEFAULT: '#2F4156',
                    dark: '#1e2b3a',
                    light: '#3d536d',
                },
                teal: {
                    DEFAULT: '#567C8D',
                    dark: '#416170',
                    light: '#6e96a8',
                },
                skyblue: {
                    DEFAULT: '#C8D9E6',
                    dark: '#a6c2d6',
                    light: '#e9f1f7',
                },
                beige: {
                    DEFAULT: '#F5EFEB',
                    dark: '#e8ded5',
                },
            },
        },
    },

    plugins: [forms],
};

