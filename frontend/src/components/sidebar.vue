<template>
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100">
    <span class="fs-4">Hi {{ full_name }}</span>
    <hr />
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <RouterLink to="/home" class="nav-link text-white" aria-current="page">
          Car Maker
        </RouterLink>
      </li>
      <li>
        <RouterLink to="/attributes" class="nav-link text-white">
          Car Attribute
        </RouterLink>
      </li>
    </ul>
    <hr />
    <div class="dropdown">
      <a
        href="#"
        class="
          d-flex
          align-items-center
          text-white text-decoration-none
          dropdown-toggle
        "
        id="dropdownUser1"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <img
          src="https://github.com/mdo.png"
          alt=""
          width="32"
          height="32"
          class="rounded-circle me-2"
        />
        <strong>{{ full_name }}</strong>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-dark text-small shadow"
        aria-labelledby="dropdownUser1"
      >
        <li>
          <button class="dropdown-item" @click="logoutxFunc()">Sign out</button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from "@/stores/useAuthStore";
import authService from "../services/authService";

export default {
  props: {
    active: {
      type: String,
      default: "home",
    },
  },
  data() {
    return {
      full_name: "",
    };
  },
  methods: {
    logoutxFunc() {
      setTimeout(function () {
        localStorage.removeItem("access_token");
      }, 3000);
      authService.Logout().then((response) => {
        useAuthStore().LoginUser({}, false);
        this.$router.push("/");
      });
    },
  },
  created() {
    this.full_name = useAuthStore().getUser.name;
  },
};
</script>

<style>
</style>