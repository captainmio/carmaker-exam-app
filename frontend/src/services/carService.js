import axios from 'axios'

const services = {
    getAllCarAttributes: () => {
      return axios.get(`/car/attributes`)
    },
    createCar: (data) => {
      return axios.post(`/car`, data)
    },
    getCars: () => {
      return axios.get(`/car`)
    },
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
    },
    getManufacturers: () => {
      return axios.get(`/car/manufacturer`)
    },
    addManufacturer: (data) => {
      return axios.post(`/car/manufacturer`, data)
    },
    deleteManufacturer: (id) => {
      return axios.delete(`/car/manufacturer/${id}`)
    }
}

export default services;


