<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form_box">
          <h1 class="text-center">Log into your account</h1>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <textfield type="text" v-model="email" @keyup.enter="submit" />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <textfield
              type="password"
              v-model="password"
              @keyup.enter="submit"
            />
          </div>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <btn
              :onClick="submit"
              :disable="loading"
              color="btn-success"
              type="button"
            >
              Submit
            </btn>
          </div>

          <div class="login-links pt-5">
            <p class="text-center">
              You dont have account?
              <a class="txt-brand" href="/register">Register</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import authService from "../services/authService";
import textfield from "../components/textfield.vue";
import btn from "../components/button.vue";

import { useAuthStore } from "@/stores/useAuthStore";

export default {
  components: {
    textfield,
    btn,
  },
  data() {
    return {
      email: "",
      password: "",
      loading: false,
    };
  },
  methods: {
    submit() {
      this.loading = true;

      let thisvue = this;

      let data = {
        email: this.email,
        password: this.password,
      };

      authService
        .Login(data)
        .then((response) => {
          this.loading = false;
          if (response.data.user) {
            // add data from backend to localStorage
            useAuthStore().LoginUser(response.data.user, true);

            localStorage.setItem("access_token", response.data.access_token);

            // display snackbar
            this.$snackbar.add({
              type: "success",
              text: "You have successfully login",
            });

            // added timeout, I didn't implement state management so I just did a something like a hacky way and add a delay for the snackbar to display and be able to see by the users
            thisvue.$router.push("/home");
          }
        })
        .catch((err) => {
          this.loading = false;

          this.$snackbar.add({
            type: "error",
            text: "Error while logging in",
          });
        });
    },
  },
};
</script>

<style>
</style>