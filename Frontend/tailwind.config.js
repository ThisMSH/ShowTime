/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin');

module.exports = {
    darkMode: 'class',
    mode: 'jit',
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            dropShadow: {
                'red-600': [
                    '0 0px 10px rgb(224 36 36)',
                    '0 0px 60px rgb(224 36 36)'
                ],
            },
            borderWidth: {
                '9': '9px',
                '10': '10px'
            }
        },
    },
    plugins: [
        require('flowbite/plugin'),
        plugin(function({ addVariant }) {
            addVariant('child', '&>*');
            addVariant('child-hover', '&>*:hover');
        })
    ],
}

