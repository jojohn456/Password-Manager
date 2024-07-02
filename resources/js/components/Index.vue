<template>
  <b-container>
    <b-row>
      <b-col id="index" cols="12">
        <b-row>
          <b-col cols="12" align="center">
            <img
              class="img-responsive"
              src="/images/logo.png"
              width="400px"
              height="auto"
              alt="logo"
            />
          </b-col>
          <b-col id="app-intro-text" cols="12" align="center">
            <h2>Eve Password Manager</h2>
          </b-col>
        </b-row>
      </b-col>
    </b-row>
    <b-row>
      <b-col cols="12" align="center">
        <br />
        <p>
          A password manager is an application that lets you store passwords
          securely on the web. So you don't have to memorized all your passwords
          across all your accounts.
        </p></b-col
      >
    </b-row>
  </b-container>
</template>

<style scoped>
  #index {
    margin: 100px 0px 0px 0px;
  }

  #app-intro-text {
    margin: 30px 0px 0px 0px;
  }
</style>

<script>
  export default {
    name: "Index",
    components: {},
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s",
    },
    data: function() {
      return {};
    },
    mounted() {},
    updated() {},
    computed: {},
    methods: {},
  };
</script>
