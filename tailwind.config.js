/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.css",
    ],
    theme: {
        container: {
            center: true,
            screens: {
                sm: '100%',
                md: '100%',
                lg: '1024px',
                xl: '1680px',
            },
        },
    },
    plugins: [],
}
