import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/style.css', 'resources/js/app.js'], // Add your CSS and JS files here
            refresh: true,
        }),
    ],
});
