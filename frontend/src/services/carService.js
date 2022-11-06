import axios from 'axios'

const services = {
    getColors: () => {
      return axios.get(`/car/color`)
    },
    addColor: (data) => {
      return axios.post(`/car/color`, data)
    },
    deleteColor: (id) => {
      return axios.delete(`/car/color/${id}`)
    },
    getTypes: () => {
      return axios.get(`/car/type`)
    },
    addType: (data) => {
      return axios.post(`/car/type`, data)
    },
    deleteType: (id) => {
      return axios.delete(`/car/type/${id}`)
    }
}

export default services;


