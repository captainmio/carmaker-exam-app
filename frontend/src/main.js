import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import axios from 'axios'

import './assets/main.scss'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'

import { SnackbarService, Vue3Snackbar } from "vue3-snackbar";
import { useAuthStore } from "./stores/useAuthStore";
import "vue3-snackbar/dist/style.css";


axios.defaults.baseURL = 'http://localhost:8001/api/';
axios.interceptors.request.use(function (config) {
  // Do something before request is sent
  const token = useAuthStore().getUserAccessToken;
  if (token) {
      config.headers['Authorization'] = 'Bearer ' + token;
  }
  return config;
}, function (error) {
  return Promise.reject(error);
});


const app = createApp(App)

app.use(router)
app.use(createPinia())
app.use(SnackbarService);
app.component("vue3-snackbar", Vue3Snackbar);
app.mount('#app')
