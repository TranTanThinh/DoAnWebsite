import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/sass/app.scss',// npm run build get a error with this file not found
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
