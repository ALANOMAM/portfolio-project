import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    base: "/build/", // 👈 this is important for production asset URLs (WILL BE IGNORED IN DEVELOPMENT)
    server: {
        host: "0.0.0.0",
        port: 5173,
        strictPort: true,
        hmr: {
            host: "localhost", // or your local IP (like 192.168.x.x) if needed
            port: 5173,
        },
    },
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
