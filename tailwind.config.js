const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'sans': ['"Segoe UI"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                danger: colors.rose,
                // primary: colors.amber,
                // success: colors.green,
                warning: colors.amber,

                primary: {
                    50: '#FDF3EC',
                    100: '#FCE7D9',
                    200: '#FADBC6',
                    300: '#F9CFB4',
                    400: '#F7C3A1',
                    500: '#F6B78E',
                    600: '#F4AB7B',
                    700: '#F3A068',
                    800: '#F19455',
                    900: '#F08842',
                },
                success: {
                    50: '#F5FBEE',
                    100: '#ECF7DE',
                    200: '#E2F3CD',
                    300: '#D9EFBD',
                    400: '#C8E9A0',
                    500: '#C6E89C',
                    600: '#BCE48B',
                    700: '#B2E07B',
                    800: '#A9DC6A',
                    900: '#9FD85A',
                },
                dark: {
                    50: '#58799D',
                    100: '#516F90',
                    200: '#496583',
                    300: '#425B76',
                    400: '#3B5168',
                    500: '#33475B',
                    600: '#2C3D4E',
                    700: '#202C39',
                    800: '#1D2834',
                    900: '#161E27',
                }
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
