<template>
  <b-container fluid>
    <b-row>
      <b-col id="verified" cols="12" align="center">
        <b-col id="box-shadow" cols="6" align="center">
          <h2>Account Verified</h2>
          <b-button variant="primary" v-on:click="SigninNavigateBtnClick"
            >Signin</b-button
          >
        </b-col>
      </b-col>
    </b-row>
  </b-container>
</template>

<style scoped>
  #verified {
    margin: 260px 0px 0px 0px;
  }
  #box-shadow {
    padding: 20px;
  }
</style>

<script>
  export default {
    name: "Verified",
    components: {},
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s |Verified",
    },
    data: function() {
      return {};
    },
    mounted() {},
    updated() {},
    computed: {},
    methods: {
      SigninNavigateBtnClick: function() {
        this.$router.push("/signin");
      },
    },
  };
</script>
