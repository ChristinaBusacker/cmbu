import { defineConfig } from "vite";

export default defineConfig({
  base: "build/",
  build: {
    manifest: true,
    outDir: "build",
    emptyOutDir: true,
    rollupOptions: {
      input: {
        app: "src/main.ts",
      },
      output: {
        entryFileNames: "[name].[hash].js",
        chunkFileNames: "[name].[hash].js",
        assetFileNames: "[name].[hash].[ext]",
      },
    },
  },
  server: {
    strictPort: true,
    port: 5173,
  },
});
