import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'; // <- добавьте эту строку

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Добавьте этот блок:
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});