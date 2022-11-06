import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from "@/stores/useAuthStore";
import authService from "../services/authService";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: () => import('../views/Login.vue'),
      meta: { guest: true },
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/Register.vue'),
      meta: { guest: true },
    },
    {
      path: '/home',
      name: 'home',
      component: () => import('../views/Home.vue'),
      meta: { requiresAuth: true },
    },
    {
      path: '/attributes',
      name: 'car-attributes',
      component: () => import('../views/CarAttributes.vue'),
      meta: { requiresAuth: true },
    },
  ]
})


router.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.requiresAuth)) {
    let isAuthenticated = useAuthStore().getUserIsAuthenticated;
    if (isAuthenticated == true) {
      next()
      return
    } else {
      // login using access_token save
      authService.CurrentUser().then(response => {
        useAuthStore().LoginUser(response.data, true);
        next()
        return
      }).catch(() => {
        next('/')
      })
    }
  } else {
    next()
  }
})

export default router
