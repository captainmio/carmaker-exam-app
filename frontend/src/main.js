import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

import './assets/main.scss'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'

import { SnackbarService, Vue3Snackbar } from "vue3-snackbar";
import "vue3-snackbar/dist/style.css";


axios.defaults.baseURL = 'http://localhost:8000/api/';
axios.defaults.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

const app = createApp(App)

app.use(router)
app.use(SnackbarService);
app.component("vue3-snackbar", Vue3Snackbar);
app.mount('#app')
