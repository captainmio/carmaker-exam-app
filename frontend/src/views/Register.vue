<template>
  <div class="row">
    <div class="col-lg-12">
      <div class="register_box">
        <h1 class="text-center">Register</h1>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="email" class="form-control" id="name" v-model="name" />
          <span
            class="text-danger text-end d-block fst-italic"
            v-if="errors && errors.name"
          >
            {{ errors.name }}
          </span>
        </div>
        <div class="mb-3">
          <label for="emailaddress" class="form-label">Email address</label>
          <input
            type="email"
            class="form-control"
            id="emailaddress"
            v-model="email"
          />
          <span
            class="text-danger text-end d-block fst-italic"
            v-if="errors && errors.email"
          >
            {{ errors.email }}
          </span>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            v-model="password"
          />
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
          <input
            type="password"
            class="form-control"
            id="confirmpassword"
            v-model="password_confirmation"
          />
        </div>
        <button class="btn btn-primary" @click="register()">Register</button>
      </div>
    </div>
  </div>
</template>

<script>
import authService from "../services/authService";

export default {
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      errors: {},
    };
  },

  methods: {
    register() {
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
  },
};
</script>

<style scoped lang="scss">
.register_box {
  max-width: 868px;
  margin: 0 auto;
}
</style>