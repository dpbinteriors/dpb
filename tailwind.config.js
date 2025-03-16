/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                green: {
                    500: "var(--color-green-1)",
                    450: "var(--color-green-3)",
                    400: "var(--color-green-2)",
                },
                dark: {
                    500: "var(--color-black-1)",
                    400: "var(--color-black-2)",
                    300: "var(--color-black-3)",
                    200: "var(--color-black-4)",
                    100: "var(--color-black-5)",
                    50: "var(--color-black-6)",
                    40: "var(--color-black-7)",
                    30: "var(--color-black-8)",
                },
                gray: {
                    500: "var(--color-gray-1)",
                    400: "var(--color-gray-2)",
                    300: "var(--color-gray-3)",
                    200: "var(--color-gray-4)",
                    100: "var(--color-white-1)",
                    50: "var(--color-white-2)",
                    40: "var(--color-white-3)",
                    30: "var(--color-white-4)",
                    20: "var(--color-white-5)",
                },
                blue: {
                    500: "var(--color-blue-1)",
                    400: "var(--color-blue-2)",
                    300: "var(--color-blue-3)",
                    200: "var(--color-blue-4)",
                },
                red: {
                    500: "var(--color-red-1)",
                    400: "var(--color-red-2)",
                    300: "var(--color-red-3)",
                },
            },
            fontSize: {
                "20px": "20px",
                "30px": "30px",
                "40px": "40px",
                "50px": "50px",
                "60px": "60px",
                "70px": "70px",
            },
            lineHeight: {
                "40px": "40px",
                "50px": "50px",
                "60px": "60px",
                "70px": "70px",
            },
            fontWeight: {
                400: "400",
                500: "500",
                600: "600",
                700: "700",
            },
            spacing: {
                '80': '80px',
                '100': '100px',
                '120': '120px',
                '140': '140px',
            },
            fontFamily: {
                sans: ['DM Sans', 'sans-serif'], // Tailwind'in varsayılan sans serif ailesine DM Sans ekleniyor.
                titillium: ['TitilliumWeb', 'sans-serif'], // TitilliumWeb için özel aile tanımı.
                justSans: ['JUST Sans', 'sans-serif'], // TitilliumWeb için özel aile tanımı.
            },
        },
    },
    plugins: [],
};
