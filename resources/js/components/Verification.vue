<template>
  <b-container>
    <b-row>
      <b-col cols="12" align="center">
        <b-col id="box-shadow" cols="8" align="center">
          <p>Send token to Email for Verification</p>
          <b-button
            variant="primary"
            v-bind:disabled="isSubmitBtnDisabled"
            v-on:click="SendSignupVerificationBtnClick"
            >Send</b-button
          >
          <small id="errors" align="center">{{ ErrorMessage }}</small>
          <small id="success" align="center">{{ SuccessMessage }}</small>
        </b-col>
      </b-col>
    </b-row>
  </b-container>
</template>

<style scoped>
  #box-shadow {
    margin: 200px 0px 0px 0px;
    padding: 30px;
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
    name: "Verification",
    components: {
      ValidationProvider,
      ValidationObserver,
    },
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s |Verification",
    },
    data: function() {
      return {
        isSubmitBtnDisabled: false,
        SuccessMessage: "",
        ErrorMessage: "",
      };
    },
    mounted() {},
    updated() {},
    computed: {},
    methods: {
      SendSignupVerificationBtnClick: function() {
        this.isSubmitBtnDisabled = true;
        var self = this;
        axios
          .post("/verification/signup/send", {})
          .then(function(response) {
            /*console.log(response.data);*/

            if (response.data.message == "success") {
              self.SuccessMessage = "Check your email to get the token";
              self.VerificationFormShow = true;
            } else if (response.data.message == "error") {
              self.$refs.form.reset();
              self.ErrorMessage = "Something went wrong. Try again!";
            }
          })
          .catch(function(error) {
            /*console.log(error);*/
            self.isSubmitBtnDisabled = false;
            self.ErrorMessage = "Something went wrong. Try again!";
          });
      },
    },
  };
</script>
