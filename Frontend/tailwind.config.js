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
                'white-sm': [
                    '0 2px 4px rgb(255 255 255)'
                ],
                'black-sm': [
                    '0 2px 4px rgb(0 0 0)'
                ],
                'white': [
                    '0 0px 10px rgb(255 255 255)',
                    '0 0px 60px rgb(255 255 255)'
                ],
                'black': [
                    '0 0px 10px rgb(0 0 0)',
                    '0 0px 60px rgb(0 0 0)'
                ],
                'red': [
                    '0 0px 10px rgb(255 0 0)',
                    '0 0px 60px rgb(255 0 0)'
                ],
            },
            boxShadow: {
                'header-icons-inner-orange': [
                    'inset 2px 2px 6px #b36135',
                    'inset -2px -2px 6px #ffb363'
                ],
                'header-icons-orange': [
                    '1px 1px 3px #cc6e3d',
                    '-1px -1px 3px #cc6e3d'
                ],
                'header-icons-inner-slate': [
                    'inset 2px 2px 6px #0b101d',
                    'inset -2px -2px 6px #141e37'
                ],
                'header-icons-slate': [
                    '1px 1px 3px #0c1222',
                    '-1px -1px 3px #121c32'
                ],
            },
            borderWidth: {
                '9': '9px',
                '10': '10px'
            },
            fontFamily: {
                'lobster': '"Lobster Two", cursive'
            },
            height: {
                'home-desktop': 'calc(100vh - 92px)',
                'home-tablet': 'calc(100vh - 70px)',
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

