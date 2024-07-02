<template>
  <b-container fluid>
    <b-row>
      <b-col id="signup" cols="12" align="center">
        <b-col id="box-shadow" cols="4" align="center">
          <h4>Signup</h4>
          <hr />
          <ValidationObserver v-slot="{ handleSubmit }" ref="form">
            <b-form
              id="signup-form"
              v-on:submit.prevent="handleSubmit(signupFormSubmit)"
            >
              <ValidationProvider
                rules="required|min:1|max:50"
                v-slot="{ errors }"
              >
                <b-input-group class="sm-2">
                  <b-input-group-prepend is-text>
                    <b-icon icon="person-fill"></b-icon>&nbsp;<span
                      >First Name</span
                    >
                  </b-input-group-prepend>
                  <b-form-input
                    type="text"
                    v-model="Firstname"
                    placeholder=""
                    style="font-size:20px;"
                  ></b-form-input>
                </b-input-group>
                <small id="errors">{{ errors[0] }}</small>
              </ValidationProvider>
              <br />
              <ValidationProvider
                rules="required|min:1|max:50"
                v-slot="{ errors }"
              >
                <b-input-group class="sm-2">
                  <b-input-group-prepend is-text>
                    <b-icon icon="person-fill"></b-icon>&nbsp;<span
                      >Last Name</span
                    >
                  </b-input-group-prepend>
                  <b-form-input
                    type="text"
                    v-model="Lastname"
                    placeholder=""
                    style="font-size:20px;"
                  ></b-form-input>
                </b-input-group>
                <small id="errors">{{ errors[0] }}</small>
              </ValidationProvider>
              <br />
              <ValidationProvider
                rules="required|email|min:1|max:70"
                v-slot="{ errors }"
              >
                <b-input-group class="sm-2">
                  <b-input-group-prepend is-text>
                    <b-icon icon="envelope"></b-icon>&nbsp;<span>Email</span>
                  </b-input-group-prepend>
                  <b-form-input
                    type="text"
                    v-model="Email"
                    placeholder=""
                    style="font-size:20px;"
                  ></b-form-input>
                </b-input-group>
                <small id="errors">{{ errors[0] }}</small>
              </ValidationProvider>
              <br />
              <ValidationProvider
                rules="required|alpha_num|min:1|max:50"
                v-slot="{ errors }"
              >
                <b-input-group class="sm-2">
                  <b-input-group-prepend is-text>
                    <b-icon icon="person-circle"></b-icon>&nbsp;<span
                      >Username</span
                    >
                  </b-input-group-prepend>
                  <b-form-input
                    type="text"
                    v-model="Username"
                    placeholder=""
                    style="font-size:20px;"
                  ></b-form-input>
                </b-input-group>
                <small id="errors">{{ errors[0] }}</small>
              </ValidationProvider>
              <br />
              <ValidationProvider
                rules="required|alpha_num|min:1|max:255"
                v-slot="{ errors }"
              >
                <b-input-group class="sm-2">
                  <b-input-group-prepend is-text>
                    <b-icon icon="lock-fill"></b-icon>&nbsp;<span
                      >Password</span
                    >
                  </b-input-group-prepend>
                  <b-form-input
                    type="password"
                    v-model="Password"
                    placeholder=""
                    style="font-size:20px;"
                  ></b-form-input>
                </b-input-group>
                <small id="errors">{{ errors[0] }}</small>
              </ValidationProvider>
              <br />
              <ValidationProvider
                rules="required|alpha_num|min:1|max:255"
                v-slot="{ errors }"
              >
                <b-input-group class="sm-2">
                  <b-input-group-prepend is-text>
                    <b-icon icon="lock-fill"></b-icon>&nbsp;<span
                      >Re-Type Password</span
                    >
                  </b-input-group-prepend>
                  <b-form-input
                    type="password"
                    v-model="RePassword"
                    placeholder=""
                    style="font-size:20px;"
                  ></b-form-input>
                </b-input-group>
                <small id="errors">{{ errors[0] }}</small>
              </ValidationProvider>
              <br />
              <b-button
                id="widebtn"
                v-bind:disabled="SignupBtnDisabled"
                type="submit"
                variant="primary"
                >Submit</b-button
              >
            </b-form>
          </ValidationObserver>
          <br />
          <small id="errors" align="center">{{ ErrorMessage }}</small>
          <small id="success" align="center">{{ SuccessMessage }}</small>
        </b-col>
      </b-col>
    </b-row>
  </b-container>
</template>

<style scoped>
  #signup {
    margin: 100px 0px 0px 0px;
  }
  #box-shadow {
    padding: 20px;
    min-width: 400px;
  }
</style>

<script>
  import {
    ValidationObserver,
    ValidationProvider,
    extend,
    configure,
  } from "vee-validate";

  configure({
    events: "",
  });

  import {
    required,
    email,
    alpha_num,
    min,
    max,
  } from "vee-validate/dist/rules";

  extend("required", {
    ...required,
    message: "This field is required",
  });

  extend("min", {
    ...min,
    message: "Characters should be greater than {length}",
  });

  extend("max", {
    ...max,
    message: "Characters should be lesser than {length}",
  });

  extend("alpha_num", {
    ...alpha_num,
    message: "Only Characters and numbers with no spaces are allowed",
  });

  extend("email", {
    ...email,
    message: "This is not an email",
  });

  export default {
    name: "Signup",
    components: {
      ValidationProvider,
      ValidationObserver,
    },
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s | Signup",
    },
    data: function() {
      return {
        Firstname: "",
        Lastname: "",
        Email: "",
        Username: "",
        Password: "",
        RePassword: "",
        SignupBtnDisabled: false,
        SuccessMessage: "",
        ErrorMessage: "",
      };
    },
    mounted() {},
    updated() {},
    computed: {},
    methods: {
      handleSubmit: function() {},
      signupFormSubmit: function() {
        var self = this;
        self.SignupBtnDisabled = true;
        axios
          .post("/signup/user/create", {
            firstname: self.Firstname,
            lastname: self.Lastname,
            email: self.Email,
            username: self.Username,
            password: self.Password,
            repassword: self.RePassword,
          })
          .then(function(response) {
            /*console.log(response.data);*/
            if (response.data.message == "success") {
              self.Firstname = "";
              self.Lastname = "";
              self.Email = "";
              self.Username = "";
              self.Password = "";
              self.Repassword = "";
              self.SignupBtnDisabled = false;
              self.SuccessMessage = "User registered Successfully";
              self.$refs.form.reset();
            } else if (response.data.message == "passnotmatch") {
              self.Password = "";
              self.RePassword = "";
              self.SignupBtnDisabled = false;
              self.ErrorMessage = "Password does not match";
            } else if (response.data.message == "userexist") {
              self.SignupBtnDisabled = false;
              self.$refs.form.reset();
              self.ErrorMessage = "User already Exist";
            } else if (response.data.message == "invalid") {
              self.SignupBtnDisabled = false;
              self.$refs.form.reset();
              self.ErrorMessage = "Invalid Input/s";
            } else if (response.data.message == "error") {
              self.SignupBtnDisabled = false;
              self.$refs.form.reset();
              self.ErrorMessage = "Something went wrong. Try again!";
            }
          })
          .catch(function(error) {
            /*console.log(error);*/
            self.SignupBtnDisabled = false;
            self.$refs.form.reset();
            self.ErrorMessage = "Something went wrong. Try again!";
          });
      },
    },
  };
</script>
