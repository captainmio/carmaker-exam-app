<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form_box">
          <h1 class="text-center">Log into your account</h1>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <textfield type="text" v-model="email" />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <textfield type="password" v-model="password" />
          </div>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button
              class="btn btn-primary btn-lg"
              @click="submit()"
              :disabled="loading"
            >
              Login
            </button>
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
    <snackbar
      v-if="snackbar.show"
      :message="snackbar.message"
      :type="snackbar.type"
    ></snackbar>
  </div>
</template>

<script>
import authService from "../services/authService";
import snackbar from "../components/snackbar.vue";
import textfield from "../components/textfield.vue";

export default {
  components: {
    snackbar,
    textfield,
  },
  data() {
    return {
      email: "",
      password: "",
      loading: false,
      snackbar: {
        show: false,
        message: "",
        type: "",
      },
    };
  },
  methods: {
    submit() {
      let thisvue = this;
      this.loading = true;
      let data = {
        email: this.email,
        password: this.password,
      };

      authService
        .Login(data)
        .then((response) => {
          if (response.data.user) {
            // add data from backend to localStorage
            localStorage.setItem(
              "remoteph_access_token",
              response.data.access_token
            );
            localStorage.setItem(
              "remoteph_user_email",
              response.data.user.email
            );
            localStorage.setItem(
              "remoteph_user_email_id",
              response.data.user.id
            );
            localStorage.setItem("remoteph_user_name", response.data.user.name);

            // display snackbar
            this.snackbar = {
              show: true,
              message: "You have successfully login",
            };

            // added timeout, I didn't implement state management so I just did a something like a hacky way and add a delay for the snackbar to display and be able to see by the users
            setTimeout(function () {
              thisvue.$router.push("/home");
            }, 1500);
          }
        })
        .catch((err) => {
          this.loading = false;

          this.snackbar = {
            show: true,
            message: "Error while logging in",
            type: "error",
          };
        });
    },
  },
};
</script>

<style>
</style>