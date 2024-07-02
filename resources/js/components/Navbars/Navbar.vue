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
          ><router-link to="/"
            ><b-button id="navbtn" variant="primary"
              >Home
            </b-button></router-link
          ></b-nav-item
        >
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <b-nav-item align="center">
          <b-dropdown id="navbtn" text="Theme" variant="success">
            <b-dropdown-item v-on:click="switchThemeLight"
              >Light</b-dropdown-item
            >
            <b-dropdown-item v-on:click="switchThemeDark">Dark</b-dropdown-item>
          </b-dropdown>
        </b-nav-item>
        <b-nav-item align="center"
          ><router-link to="/signup"
            ><b-button id="navbtn" variant="primary"
              >Signup
            </b-button></router-link
          ></b-nav-item
        >
        <b-nav-item align="center"
          ><router-link to="/signin"
            ><b-button id="navbtn" variant="warning"
              >Login</b-button
            ></router-link
          ></b-nav-item
        >
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
    color: #fff;
  }
</style>

<script>
  export default {
    name: "Navbar",
    components: {},
    data: function() {
      return {};
    },
    mounted() {
      if (
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
      ) {
        document.body.style.backgroundColor = "#000";
        var root = document.getElementsByTagName("html")[0];
        root.setAttribute("class", "theme-dark");
        var app = document.getElementById("app");
        app.setAttribute("class", "theme-dark");
      } else {
        document.body.style.backgroundColor = "#ffffff";
        var root = document.getElementsByTagName("html")[0];
        root.setAttribute("class", "theme-light");
        var app = document.getElementById("app");
        app.setAttribute("class", "theme-light");
      }
    },
    updated() {},
    computed: {},
    methods: {
      switchThemeLight: function() {
        document.body.style.backgroundColor = "#ffffff";
        var root = document.getElementsByTagName("html")[0];
        root.setAttribute("class", "theme-light");
        var app = document.getElementById("app");
        app.setAttribute("class", "theme-light");
      },
      switchThemeDark: function() {
        document.body.style.backgroundColor = "#000";
        var root = document.getElementsByTagName("html")[0];
        root.setAttribute("class", "theme-dark");
        var app = document.getElementById("app");
        app.setAttribute("class", "theme-dark");
      },
    },
  };
</script>
