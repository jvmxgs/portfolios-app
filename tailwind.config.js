const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito Sans', ...defaultTheme.fontFamily.sans],
                'tilt-neon': 'Tilt Neon'
            },
            colors: {
                primary: {
                    DEFAULT: '#FF6966',
                    50: '#FFE1E0',
                    100: '#FFE1E0',
                    200: '#FFE1E0',
                    300: '#FFB9B8',
                    400: '#FF918F',
                    500: '#FF6966',
                    600: '#FF504D',
                    700: '#FF3733',
                    800: '#FF1E1A',
                    900: '#FF0500',
                    950: '#F20500'
                },
                secondary: {
                    DEFAULT: '#888FA7',
                    50: '#F2F2F5',
                    100: '#E6E7EC',
                    200: '#CED1DB',
                    300: '#B7BBCA',
                    400: '#9FA5B8',
                    500: '#888FA7',
                    600: '#69718E',
                    700: '#51586E',
                    800: '#393E4D',
                    900: '#21242D',
                    950: '#15171D'
                },
                positive: colors.emerald,
                negative: colors.red,
                warning: colors.amber,
                info: colors.blue
            }
        },
        colors: {
            'white': '#FFFFFF',
            'black': '#000000',
            'sail': '#A4D8F7',
            'downriver': '#0C1E5B',
            'bittersweet': '#FF6966',
            'manatee': '#888FA7',
            'azureish-white': '#D3DDEC'
        }
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
}
