<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="form_box">
          <h1 class="text-center">Register</h1>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <textfield type="text" v-model="name" />
            <span
              class="text-danger text-end d-block fst-italic"
              v-if="errors && errors.name"
            >
              {{ errors.name }}
            </span>
          </div>
          <div class="mb-3">
            <label for="emailaddress" class="form-label">Email address</label>
            <textfield type="text" v-model="email" />
            <span
              class="text-danger text-end d-block fst-italic"
              v-if="errors && errors.email"
            >
              {{ errors.email }}
            </span>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <textfield type="password" v-model="password" />
            <span
              class="text-danger text-end d-block fst-italic"
              v-if="errors && errors.password"
            >
              {{ errors.password }}
            </span>
          </div>
          <div class="mb-3">
            <label for="confirmpassword" class="form-label"
              >Confirm Password</label
            >
            <textfield type="password" v-model="password_confirmation" />
          </div>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-lg" @click="submit()">
              Register
            </button>
          </div>

          <div class="login-links pt-5">
            <p class="text-center">
              Already have an account?
              <a class="txt-brand" href="/">Login</a>
            </p>
          </div>
        </div>
      </div>
      <snackbar
        v-if="snackbar.show"
        :message="snackbar.message"
        :type="snackbar.type"
      ></snackbar>
    </div>
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
      user: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      errors: {},
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
      this.resetErrors();
      let data = {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation,
      };

      authService
        .Register(data)
        .then((response) => {
          let resp = response.data;

          if (resp.status === "success") {
            this.resetForm();
            this.$router.push("/");
          }
        })
        .catch((err) => {
          let errordata = err.response.data.errors;
          let thisvue = this;
          Object.keys(errordata).map(function (key, value) {
            thisvue.errors[key] = errordata[key][0];
          });

          console.log(this.errors);
        });
    },
    resetErrors() {
      this.errors = {};
    },
    resetForm() {
      this.user.name = "";
      this.user.email = "";
      this.user.password = "";
      this.user.password_confirmation = "";
    },
  },
};
</script>

<style scoped lang="scss">
span {
  margin-top: 10px;
}
</style>