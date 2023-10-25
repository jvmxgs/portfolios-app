const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito Sans', ...defaultTheme.fontFamily.sans],
                'tilt-neon': 'Tilt Neon'
            },
        },
        colors: {
            'white': '#FFFFFF',
            'black': '#000000',
            'light-blue': '#A4D8F7',
            'dark-blue': '#0C1E5B',
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
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
