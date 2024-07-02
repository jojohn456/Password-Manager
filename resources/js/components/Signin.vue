<template>
  <b-container fluid>
    <b-row>
      <b-col id="signin" cols="12" align="center">
        <b-col id="box-shadow" cols="3" align="center">
          <h4>Signin</h4>
          <hr />
          <ValidationObserver v-slot="{ handleSubmit }" ref="form">
            <b-form
              id="signin-form"
              v-on:submit.prevent="handleSubmit(signinFormSubmit)"
            >
              <ValidationProvider
                rules="required|min:1|max:255"
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
                    v-model="Password"
                    v-bind:type="PasswordType"
                    placeholder=""
                    style="font-size:20px;"
                  ></b-form-input>
                  <b-input-group-append>
                    <b-button
                      variant="outline-primary"
                      v-on:click="revealPasswordBtnClick"
                      ><b-icon v-bind:icon="Eye"></b-icon
                    ></b-button>
                  </b-input-group-append>
                </b-input-group>
                <small id="errors">{{ errors[0] }}</small>
              </ValidationProvider>
              <br />
              <b-button
                id="wide-btn"
                v-bind:disabled="SubmitBtnDisabled"
                type="submit"
                variant="primary"
                >Sign In</b-button
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
  #signin {
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
    name: "Signin",
    components: {
      ValidationProvider,
      ValidationObserver,
    },
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s | Signin",
    },
    data: function() {
      return {
        Username: "",
        Password: "",
        messages: "",
        Eye: "eye-fill",
        PasswordType: "password",
        SubmitBtnDisabled: false,
        SuccessMessage: "",
        ErrorMessage: "",
      };
    },
    mounted() {},
    updated() {},
    computed: {},
    methods: {
      handleSubmit: function() {},
      revealPasswordBtnClick: function() {
        var self = this;
        var password_type = self.PasswordType;
        if (password_type == "password") {
          self.PasswordType = "text";
          self.Eye = "eye-slash-fill";
        } else if (password_type == "text") {
          self.PasswordType = "password";
          self.Eye = "eye-fill";
        }
      },
      signinFormSubmit: function() {
        var self = this;
        self.SubmitBtnDisabled = true;
        axios
          .post("/signin/user", {
            username: self.Username,
            password: self.Password,
          })
          .then(function(response) {
            /*console.log(response.data);*/
            if (response.data.role_id == "1") {
              self.$router.push("/user/index");
            } else if (response.data.role_id == "0") {
              self.$router.push("/verification");
            } else if (response.data.error == "passnotmatch") {
              self.SubmitBtnDisabled = false;
              self.$refs.form.reset();
              self.ErrorMessage = "Wrong username or password";
            } else if (response.data.error == "invalid") {
              self.SubmitBtnDisabled = false;
              self.$refs.form.reset();
              self.ErrorMessage = "<small id='errors' align='center'></small>";
              self.ErrorMessage = "Invalid Inputs";
            }
          })
          .catch(function(error) {
            /*console.log(error);*/
            self.SubmitBtnDisabled = false;
            self.$refs.form.reset();
            self.ErrorMessage = "Something went wrong. Try again!";
          });
      },
    },
  };
</script>
