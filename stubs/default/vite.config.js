import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/stylesheet.scss', 'resources/js/scripts.js'],
            refresh: true,
        }),
    ],
});
