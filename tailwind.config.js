const { colors } = require('tailwindcss/defaultTheme');
module.exports = {
    purge: {
        layers: ['utilities'],
        content: ['./resources/views/**/*.blade.php'],
        options: {
            safelist: ['bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'bg-gray-100', 'text-gray-800'],
        }
    },
    theme: {
        fontFamily: {
            display: ['"Arcade Normal"'],
        },
        extend: {
            padding: {
                'full': '100%',
                '2/1': '50%',
                '3/1': '33.333%',
                '2/3': '150%',
                '3/4': '133.3333%',
                '4/5': '125%',
                '16/9': '56.25%',
                '0.5': '0.125rem',
                '2.5': '0.625rem'
            },
            minHeight: {
                '450px': '450px',
                '600px': '600px',
            },
            maxWidth: {
                '7xl': '80rem'
            },
            zIndex: {
                '-1': '-1'
            }
        }
    },
    variants: {},
    plugins: [
        require('@tailwindcss/typography'),
    ],
}