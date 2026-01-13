import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.blade.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php", // Add Filament views
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Accent Networks Brand Colors
                "accent-blue": {
                    DEFAULT: "#003E7E",
                    light: "#5FA9DD",
                },
                "accent-gray": {
                    dark: "#3F3F3F",
                    medium: "#6E7173",
                },
            },
        },
    },

    plugins: [forms, typography],
};
