import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
// import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true,
            },
            zIndex: {
                '1': '1',
            },
            padding: {
                'full' : '100%',
                '1/2' : '50%',
            },
            boxShadow: {
                sm: 'rgba(0,0,0,0.12) 0 1px 3px, rgba(0,0,0,0.24) 0 1px 2px',
                DEFAULT: 'rgba(0,0,0,0.16) 0 3px 6px, rgba(0,0,0,0.23) 0 3px 6px',
                md: 'rgba(0,0,0,0.19) 0 10px 20px, rgba(0,0,0,0.23) 0 6px 6px',
                lg: 'rgba(0,0,0,0.25) 0 14px 28px, rgba(0,0,0,0.22) 0 10px 10px'
            },
            colors: {
                primary: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    DEFAULT: '#1565c0',
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                    950: '#172554',
                },
            },
        },
    },

    plugins: [
        forms,
        // typography
    ],
};
