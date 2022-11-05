import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

import './assets/main.scss'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'


axios.defaults.baseURL = 'http://localhost:8000/api/';
axios.defaults.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

const app = createApp(App)

app.use(router)

app.mount('#app')
