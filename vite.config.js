import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  build: {
    cssCodeSplit: true,
    lib: {
      entry: 'src/main.js',
      name: 'Voyager Dashboard Manager',
      formats: ['umd'],
      fileName: 'voyager-dashboard-manager'
    },
    rollupOptions: {
      external: ['vue'],
      output: {
        globals: {
          vue: 'Vue'
        }
      }
    }
  }
})
