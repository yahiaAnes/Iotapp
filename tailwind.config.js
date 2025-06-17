import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.tsx',
        './resources/js/**/*.ts',
        './resources/js/**/*.jsx',
        './resources/js/**/*.js',
    ],
    safelist: [
        {
            pattern: /bg-(green|yellow|gray|red)-(100|200|300|400|500|600|700|800|900)/,
        },
        {
            pattern: /text-(white|black|gray)-(100|200|300|400|500|600|700|800|900)/,
        },
       
  'bg-green-600',
  'bg-yellow-500',
  'bg-gray-500',
  'bg-red-500',
  'hover:bg-gray-100',
  'text-white',

    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [forms],
}


// import defaultTheme from 'tailwindcss/defaultTheme';
// import forms from '@tailwindcss/forms';

// /** @type {import('tailwindcss').Config} */
// export default {
//     content: [
//         './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
//         './storage/framework/views/*.php',
//         './resources/views/**/*.blade.php',
//         './resources/js/**/*.tsx',
//     ],
//     safelist: [
//     'bg-green-600',
//     'bg-yellow-500',
//     'bg-gray-500',
//     'bg-red-500',
//     'hover:bg-gray-100',
//     'text-white',
// ],


//     theme: {
//         extend: {
//             fontFamily: {
//                 sans: ['Figtree', ...defaultTheme.fontFamily.sans],
//             },
//         },
//     },

//     plugins: [forms],
// };
