import { defineConfig } from "vite";

export default defineConfig({
  base: "/build/",
  build: {
    manifest: true,
    outDir: "build",
    emptyOutDir: true,
    rollupOptions: {
      input: {
        app: "src/main.ts",
      },
      output: {
        // keep it neat: assets/build/assets/...
        entryFileNames: "assets/[name].[hash].js",
        chunkFileNames: "assets/[name].[hash].js",
        assetFileNames: "assets/[name].[hash].[ext]",
      },
    },
  },
  server: {
    strictPort: true,
    port: 5173,
  },
});
