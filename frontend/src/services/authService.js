import axios from 'axios'

const services = {
    Login: (data) => {
      return axios.post(`/login`, data)
    },
    Register: (data) => {
      return axios.post(`/register`, data)
    }
}

export default services;


