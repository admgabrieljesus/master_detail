import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    server: {
        host: 'localhost',
        port: 5173,
        // strictPort: true,
        cors: true, // Ativar CORS no Vite
        hmr: {
            host: 'localhost', // Host do HMR
            protocol: 'http', // Protocolo (http ou https, conforme necessário)
        },
    },
    plugins: [
        laravel({
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],
});