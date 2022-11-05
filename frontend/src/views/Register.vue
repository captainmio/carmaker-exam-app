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
            <!-- <button
              class="btn btn-primary btn-lg"
              @click="submit()"
              :disabled="loading"
            >
              Register
            </button> -->

            <btn
              :onClick="submit"
              :disable="loading"
              color="btn-success"
              type="button"
            >
              Register
            </btn>
          </div>

          <div class="login-links pt-5">
            <p class="text-center">
              Already have an account?
              <a class="txt-brand" href="/">Login</a>
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

export default {
  components: {
    textfield,
    btn,
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
    };
  },

  methods: {
    submit() {
      this.loading = true;
      let data = {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation,
      };

      authService
        .Register(data)
        .then((response) => {
          this.loading = false;
          let resp = response.data;

          if (resp.status === "success") {
            this.resetForm();
            this.$snackbar.add({
              type: "success",
              text: "You have successfully registered an account",
            });
            this.$router.push("/");
          }
        })
        .catch((err) => {
          this.resetErrors();
          this.loading = false;
          let errordata = err.response.data.errors;
          let thisvue = this;
          Object.keys(errordata).map(function (key, value) {
            thisvue.errors[key] = errordata[key][0];
          });

          this.$snackbar.add({
            type: "error",
            text: "Error process",
          });
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