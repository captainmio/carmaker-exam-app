import { defineStore } from "pinia";

export const useAuthStore = defineStore('auth', {
    state: () => ({ 
      user: {}, 
      isAuthenticated: false, 
      access_token: localStorage.getItem('access_token') 
    }),
    getters: {
      getUser: (state) => state.user,
      getUserIsAuthenticated: (state) => state.isAuthenticated,
      getUserAccessToken: (state) => state.access_token,
    },
    actions: {
      LoginUser(payload, isAuthenticate) {
        this.user = payload;
        this.isAuthenticated = isAuthenticate;
      },
    },
  })