/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                manrope: ["Manrope", "ui-sans-serif", "system-ui"],
            },

            colors: {
                primary: "#FA7E35",
                hover: "#dc6b2a",
                dark_ring: "#ff995f",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
