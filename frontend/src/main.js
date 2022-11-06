import { createApp } from 'vue'
import { createPinia } from 'pinia'
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


// TODO auto logout when session expires
  // axios.interceptors.request.use(function (config) {
  //   // Do something before request is sent
  //   const token = localStorage.getItem('token');
  //   if (token) {
  //       config.headers['Authorization'] = 'Bearer ' + token;
  //   }
  //   return config;
  // }, function (error) {
  //   return Promise.reject(error);
  // });

//   axios.interceptors.response.use(function (response) {
//     return response;
//   }, function (error) {
//     if (error.response.status === 403) {

//         this.$snackbar.add({
//             type: "error",
//             text: "Session expired",
//         });

//         this.$route.push('/');
//     }
//     return Promise.reject(error);
    
//   });

const app = createApp(App)

app.use(router)
app.use(createPinia())
app.use(SnackbarService);
app.component("vue3-snackbar", Vue3Snackbar);
app.mount('#app')
