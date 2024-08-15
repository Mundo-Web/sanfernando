import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const plugin = require('tailwindcss/plugin');
const flowbite = require('flowbite/plugin');


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './node_modules/preline/dist/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.jsx',
        './node_modules/flowbite/**/*.js',
        './src/**/*.{js,jsx,ts,tsx}',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                'custom-gray': '#F8F8F8',
                'custom-white': '#FFFFFF',
                'custom-border': 'rgba(21, 41, 76, 0.4)', // Defin
            },
            // Añadir el gradiente personalizado
            backgroundImage: {
                'custom-gradient': 'linear-gradient(to bottom, #F8F8F8 100%, #FFFFFF 100%)',
            },

            fontFamily: {
                Inter_Bold: ["Inter_Bold"],
                Inter_ExtraBold: ["Inter_ExtraBold"],
                Inter_Light: ["Inter_Light"],
                Inter_Medium: ["Inter_Medium"],
                Inter_Regular: ["Inter_Regular"],
                Inter_SemiBold: ["Inter_SemiBold"],

                poppins_black: ["poppins_black"],
                poppins_bold: ["poppins_bold"],
                poppins_semibold: ["poppins_semibold"],
                poppins_light: ["poppins_light"],
                poppins_medium: ["poppins_medium"],
                poppins_thin: ["poppins_thin"],
                poppins_regular: ["poppins_regular"],

            },

            screens: {
                xs: '320px',
                "2xs": "420px",
                sm: "640px",
                md: "768px",
                "2md": "850px",
                lg: "1024px",
                xl: "1280px",
                "2xl": "1536px",
            },
            colors: {
                azulboost: '#006BF6',
            },
            keyframes: {
                'flip-down': {
                  '0%': { transform: 'rotateX(-90deg)', opacity: '0' },
                  '100%': { transform: 'rotateX(0deg)', opacity: '1' },
                },
            },
            animation: {
                'flip-down': 'flip-down 0.5s ease-out forwards',
            },


        },
    },
    variants: {
        extend: {
            opacity: ['focus-within'],
        },
    },
    plugins: [
        forms,
        typography,
        flowbite,
        // add custom variant for expanding sidebar
        plugin(({ addVariant, e }) => {
            addVariant('sidebar-expanded', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => `.sidebar-expanded .${e(`sidebar-expanded${separator}${className}`)}`);
            });
        }),
        
    ],
};
