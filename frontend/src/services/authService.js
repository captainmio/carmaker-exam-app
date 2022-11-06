import axios from 'axios'

const services = {
    Login: (data) => {
      return axios.post(`/login`, data)
    },
    Register: (data) => {
      return axios.post(`/register`, data)
    },
    CurrentUser: () => {
      return axios.get(`/me`)
    },
    Logout: () => {
      return axios.get(`/logout`)
    }
}

export default services;


