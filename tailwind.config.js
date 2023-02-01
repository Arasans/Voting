/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: "5px",
        },
        extend: {
            colors: {
                primary: "#BB8AC2",
                secondary: "#F8E2FB",
                button: "#614865",
            },
            screens: {
                "2xl": "1320px",
            },
        },
    },
    plugins: [],
};
