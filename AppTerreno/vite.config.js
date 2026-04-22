import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< Updated upstream
            input: ['resources/css/app.css', 'resources/js/app.js'],
=======
            input: [
                'resources/css/homePage.css',
                'resources/css/login.css',
                'resources/css/registro.css',
                'resources/js/tailwind-config.js',
                'resources/css/app.css',
                'resources/js/app.js'
            ],
>>>>>>> Stashed changes
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
