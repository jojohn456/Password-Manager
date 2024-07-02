<template>
  <b-navbar id="navbar" toggleable="lg" type="light" variant="light">
    <b-navbar-brand href="/"
      ><img src="/images/logo.png" width="50px" height="auto" alt="logo" />
      <strong>Eve Password Manager</strong></b-navbar-brand
    >
    <b-navbar-toggle
      target="nav-collapse"
      style="background-color:#ffffff;"
    ></b-navbar-toggle>
    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item align="center"
          ><router-link to="/verification"
            ><b-button id="navbtn" variant="primary"
              >Home
            </b-button></router-link
          ></b-nav-item
        >
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown v-bind:text="fullname" align="center">
          <b-dropdown-item
            style="text-align:center;"
            v-on:click="SignoutBtnClick"
            >Log-out</b-dropdown-item
          >
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<style scoped>
  #navbar {
    background-color: transparent !important;
    padding: 20px;
    margin: 0px;
  }

  .navbar-light .navbar-brand:hover,
  .navbar-light .navbar-brand:focus {
    text-decoration: none;
  }

  #navbtn {
    width: 100%;
    color: white;
  }
</style>

<script>
  export default {
    name: "NavbarUser",
    components: {},
    data: function() {
      return {
        fullname: "",
      };
    },
    mounted() {
      var self = this;
      axios
        .get("/verification/name", {})
        .then(function(response) {
          /*console.log(response.data);*/
          var firstname = response.data.firstname;
          var lastname = response.data.lastname;
          self.fullname = firstname + " " + lastname;
        })
        .catch(function(error) {
          /*console.log(error);*/
        });
    },
    updated() {},
    computed: {},
    methods: {
      SignoutBtnClick: function() {
        var self = this;
        axios
          .get("/signout/user", {})
          .then(function(response) {
            /*console.log(response.data);*/
            self.$router.push("/");
          })
          .catch(function(error) {
            /*console.log(error);*/
          });
      },
    },
  };
</script>
