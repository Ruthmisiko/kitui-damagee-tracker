import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/css/styles.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
