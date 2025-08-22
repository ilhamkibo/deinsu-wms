/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                blue: {
                    ...colors.blue, // ambil semua default dari Tailwind
                    750: "#163b56", // ganti sesuai kode warna yang kamu mau
                },
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
