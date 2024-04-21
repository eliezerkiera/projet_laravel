import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/styles/style.scss', 'resources/scripts/script.js'],
            refresh: true,
        }),
    ],
});
