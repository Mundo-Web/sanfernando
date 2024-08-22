// vite.config.js
import { defineConfig } from "file:///C:/xampp/htdocs/gestionpublica/node_modules/vite/dist/node/index.js";
import laravel from "file:///C:/xampp/htdocs/gestionpublica/node_modules/laravel-vite-plugin/dist/index.js";
import * as glob from "file:///C:/xampp/htdocs/gestionpublica/node_modules/glob/dist/esm/index.js";
var vite_config_default = defineConfig({
  server: {
    watch: {
      ignored: ["!**/node_modules/your-package-name/**"]
    }
  },
  plugins: [
    // react(),
    laravel({
      input: [
        ...glob.sync("resources/js/**/*.jsx"),
        "resources/css/app.css",
        "resources/js/app.js"
      ],
      refresh: true
    })
  ],
  resolve: (name) => {
    const pages = import.meta.glob("./Pages/**/*.jsx", { eager: true });
    return pages[`./Pages/${name}.jsx`];
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJDOlxcXFx4YW1wcFxcXFxodGRvY3NcXFxcZ2VzdGlvbnB1YmxpY2FcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfZmlsZW5hbWUgPSBcIkM6XFxcXHhhbXBwXFxcXGh0ZG9jc1xcXFxnZXN0aW9ucHVibGljYVxcXFx2aXRlLmNvbmZpZy5qc1wiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9pbXBvcnRfbWV0YV91cmwgPSBcImZpbGU6Ly8vQzoveGFtcHAvaHRkb2NzL2dlc3Rpb25wdWJsaWNhL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XG5pbXBvcnQgbGFyYXZlbCBmcm9tICdsYXJhdmVsLXZpdGUtcGx1Z2luJztcbi8vIGltcG9ydCByZWFjdCBmcm9tICdAdml0ZWpzL3BsdWdpbi1yZWFjdCc7XG5pbXBvcnQgKiBhcyBnbG9iIGZyb20gJ2dsb2InO1xuXG5cbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XG4gICAgc2VydmVyOiB7XG4gICAgICAgIHdhdGNoOiB7XG4gICAgICAgICAgICBpZ25vcmVkOiBbJyEqKi9ub2RlX21vZHVsZXMveW91ci1wYWNrYWdlLW5hbWUvKionXSxcbiAgICAgICAgfVxuICAgIH0sXG4gICAgcGx1Z2luczogW1xuICAgICAgICAvLyByZWFjdCgpLFxuICAgICAgICBsYXJhdmVsKHtcbiAgICAgICAgICAgIGlucHV0OiBbXG4gICAgICAgICAgICAgICAgLi4uZ2xvYi5zeW5jKCdyZXNvdXJjZXMvanMvKiovKi5qc3gnKSxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9hcHAuY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2FwcC5qcycsXG4gICAgICAgICAgICBdLFxuICAgICAgICAgICAgcmVmcmVzaDogdHJ1ZSxcbiAgICAgICAgfSksXG4gICAgXSxcbiAgICByZXNvbHZlOiBuYW1lID0+IHtcbiAgICAgICAgY29uc3QgcGFnZXMgPSBpbXBvcnQubWV0YS5nbG9iKCcuL1BhZ2VzLyoqLyouanN4JywgeyBlYWdlcjogdHJ1ZSB9KVxuICAgICAgICByZXR1cm4gcGFnZXNbYC4vUGFnZXMvJHtuYW1lfS5qc3hgXVxuICAgIH1cbn0pO1xuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUFvUixTQUFTLG9CQUFvQjtBQUNqVCxPQUFPLGFBQWE7QUFFcEIsWUFBWSxVQUFVO0FBR3RCLElBQU8sc0JBQVEsYUFBYTtBQUFBLEVBQ3hCLFFBQVE7QUFBQSxJQUNKLE9BQU87QUFBQSxNQUNILFNBQVMsQ0FBQyx1Q0FBdUM7QUFBQSxJQUNyRDtBQUFBLEVBQ0o7QUFBQSxFQUNBLFNBQVM7QUFBQTtBQUFBLElBRUwsUUFBUTtBQUFBLE1BQ0osT0FBTztBQUFBLFFBQ0gsR0FBUSxVQUFLLHVCQUF1QjtBQUFBLFFBQ3BDO0FBQUEsUUFDQTtBQUFBLE1BQ0o7QUFBQSxNQUNBLFNBQVM7QUFBQSxJQUNiLENBQUM7QUFBQSxFQUNMO0FBQUEsRUFDQSxTQUFTLFVBQVE7QUFDYixVQUFNLFFBQVEsWUFBWSxLQUFLLG9CQUFvQixFQUFFLE9BQU8sS0FBSyxDQUFDO0FBQ2xFLFdBQU8sTUFBTSxXQUFXLElBQUksTUFBTTtBQUFBLEVBQ3RDO0FBQ0osQ0FBQzsiLAogICJuYW1lcyI6IFtdCn0K
