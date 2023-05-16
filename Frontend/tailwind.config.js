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
                'red-sm': [
                    '0 0 4px rgb(255 0 0)'
                ],
                'blue': [
                    '0 0px 10px rgb(0 0 255)',
                    '0 0px 60px rgb(0 0 255)'
                ],
                'gray': [
                    '0 0px 10px rgb(128 128 128)',
                    '0 0px 60px rgb(128 128 128)'
                ],
                'yellow': [
                    '0 0px 10px rgb(255, 215, 0)',
                    '0 0px 60px rgb(255, 215, 0)'
                ],
                'orange': [
                    '0 0px 10px rgb(255, 95, 21)',
                    '0 0px 60px rgb(255, 95, 21)'
                ],
                'orange-sm': [
                    '0 0 4px rgb(255, 95, 21)'
                ],
                'green': [
                    '0 0px 10px rgb(80, 200, 120)',
                    '0 0px 60px rgb(80, 200, 120)'
                ],
                'violet': [
                    '0 0px 10px rgb(148, 0, 211)',
                    '0 0px 60px rgb(148, 0, 211)'
                ],
                'violet-sm': [
                    '0 0 4px rgb(148, 0, 211)'
                ],
                'pink': [
                    '0 0px 10px rgb(255, 20, 147)',
                    '0 0px 60px rgb(255, 20, 147)'
                ],
                'pink-sm': [
                    '0 0 4px rgb(255, 20, 147)'
                ],
                'sky-sm': [
                    '0 0 4px rgb(135, 206, 235)'
                ],
                'lime-sm': [
                    '0 0 4px rgb(191, 255, 0)'
                ],
                'amber-sm': [
                    '0 0 4px rgb(255, 191, 0)'
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
                'saira-stencil-one': '"Saira Stencil One", cursive',
                'coiny': '"Coiny", cursive',
                'logo': '"Saira Stencil One", "Coiny", cursive',
            },
            height: {
                'home-desktop': 'calc(100vh - 111px)',
                'home-tablet': 'calc(100vh - 87px)',
            },
            textStroke: {
                'white-1': '1px rgb(255 255 255)',
                'white-2': '2px rgb(255 255 255)',
                'black-1': '1px rgb(0 0 0)',
                'black-2': '2px rgb(0 0 0)',
                'orange-1': '1px rgb(255 165 0)',
                'orange-2': '2px rgb(255 165 0)',
                'amber-1': '1px rgb(245 158 11)',
                'amber-2': '2px rgb(245 158 11)',
                'orange-600-0\.5': '.5px rgb(234 88 12)',
                'orange-500-0\.5': '.5px rgb(249 115 22)',
                'orange-400-0\.5': '.5px rgb(251 146 60)',
                'orange-300-0\.5': '.5px rgb(253 186 116)',
                'orange-600-1': '1px rgb(234 88 12)',
                'orange-500-1': '1px rgb(249 115 22)',
                'orange-400-1': '1px rgb(251 146 60)',
                'orange-300-1': '1px rgb(253 186 116)',
                'orange-600-2': '2px rgb(234 88 12)',
                'orange-500-2': '2px rgb(249 115 22)',
                'orange-400-2': '2px rgb(251 146 60)',
                'orange-300-2': '2px rgb(253 186 116)',
            },
            textShadow: {
                'slate-950-5': '0 0 5px rgb(2 6 23)',
                'slate-950-10': '0 0 10px rgb(2 6 23)',
                'slate-950-15': '0 0 15px rgb(2 6 23)',
                'slate-950-20': '0 0 20px rgb(2 6 23)',
                'slate-950-25': '0 0 25px rgb(2 6 23)',
                'slate-950-30': '0 0 30px rgb(2 6 23)',
                'slate-100-5': '0 0 5px rgb(241 245 249)',
                'slate-100-10': '0 0 10px rgb(241 245 249)',
                'slate-100-15': '0 0 15px rgb(241 245 249)',
                'slate-100-20': '0 0 20px rgb(241 245 249)',
                'slate-100-25': '0 0 25px rgb(241 245 249)',
                'slate-100-30': '0 0 30px rgb(241 245 249)',
            }
        },
    },
    plugins: [
        require('flowbite/plugin'),
        require('tailwindcss-3d'),
        plugin(function({ addVariant }) {
            addVariant('child', '&>*');
            addVariant('child-hover', '&>*:hover');
        }),
        plugin(function ({matchUtilities, theme}) {
            matchUtilities(
                {
                    'text-stroke': (value) => ({
                        '-webkit-text-stroke': value,
                    })
                },
                { values:
                    theme('textStroke')
                }
            )
        }),
        plugin(function ({matchUtilities, theme}) {
            matchUtilities(
                {
                    'text-shadow': (value) => ({
                        textShadow: value,
                    })
                },
                { values:
                    theme('textShadow')
                }
            )
        })
    ],
}

