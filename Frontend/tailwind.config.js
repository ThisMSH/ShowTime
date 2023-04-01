/** @type {import('tailwindcss').Config} */
module.exports = {
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
            }
        },
    },
    plugins: [
        require('flowbite/plugin'),
    ],
}

