<template>
  <div id="app">
    <b-container>
      <b-row>
        <b-col col lg="12">
          <keep-alive>
            <component v-bind:is="getNavbar"></component>
          </keep-alive>
        </b-col>
      </b-row>
    </b-container>
    <router-view />
    <div id="footer">
      <b-container>
        <b-row>
          <b-col col lg="12">
            <hr />
            <b-row>
              <b-col lg="2" offset-lg="12"></b-col>
              <b-col col lg="2" align="center">
                <router-link to="/about">About</router-link>
              </b-col>
              <b-col col lg="2" align="center">
                <router-link to="/help">Help</router-link>
              </b-col>
              <b-col col lg="2" align="center">
                <router-link to="/eula">Eula</router-link>
              </b-col>
              <b-col col lg="2" align="center">
                <router-link to="/privacypolicy">Privacy Policy</router-link>
              </b-col>
              <b-col lg="2" offset-lg="12"></b-col>
            </b-row>
            <b-row>
              <b-col col lg="12" align="center">
                <small>Eve Password Manager</small>
              </b-col>
            </b-row>
          </b-col>
        </b-row>
      </b-container>
    </div>
  </div>
</template>

<style>
  :root {
    --primaryColor: #849bee;
    --secondaryColor: #627fea;
  }

  .theme-light {
    --primaryBackground: #ffffff;
    --secondaryBackground: #000;
    --fontColor: #000;
    --hr: #d9d9d9;
    --icon: #000;
    --box-shadow_border_color: #5e5e5e;
    --box-shadow_border_width: 0px;
  }

  .theme-dark {
    --primaryBackground: #000;
    --secondaryBackground: #ffffff;
    --fontColor: #ffffff;
    --hr: #ffffff;
    --icon: #ffffff;
    --box-shadow_border: none;
    --box-shadow_border_width: 3px;
  }

  html,
  body {
    width: 100%;
    height: auto;
    margin: 0px;
    padding: 0px;
  }

  #app {
    background-color: var(--primaryBackground);
  }

  /*FOOTER*/

  #footer {
    padding: 40px;
    margin: 400px 0px 0px 0px;
  }

  /*ICONS*/

  .b-icon.bi {
    color: var(--icon);
    padding: 0px;
    margin: 0px;
  }

  /*FONTS*/

  @font-face {
    font-family: CustomFontNormal;
    src: url("/font/roboto/woff2/Roboto-Regular.woff2") format("woff2"),
      url("/font/roboto/ttf/Roboto-Regular.ttf") format("truetype");
  }

  @font-face {
    font-family: CustomFontBold;
    src: url("/fonts/roboto/woff2/Roboto-Bold.woff2") format("woff2"),
      url("/fonts/roboto/ttf/Roboto-Bold.ttf") format("truetype");
  }

  @font-face {
    font-family: CustomFontItalic;
    src: url("/fonts/roboto/woff2/Roboto-Italic.woff2") format("woff2"),
      url("/fonts/roboto/woff2/Roboto-Italic.ttf") format("truetype");
  }

  @font-face {
    font-family: CustomFontLight;
    src: url("/fonts/roboto/woff2/Roboto-Light.woff2") format("woff2"),
      url("/fonts/roboto/ttf/Roboto-Light.ttf") format("truetype");
  }

  /*TEXT*/

  hr {
    background-color: var(--hr);
    color: var(--hr);
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: CustomFontBold, sans-serif;
    color: var(--primaryColor);
    word-wrap: break-word;
  }

  strong {
    font-family: CustomFontBold, sans-serif;
    font-size: 20px;
    color: var(--primaryColor);
    word-wrap: break-word;
  }

  label,
  p {
    font-family: CustomFontNormal, sans-serif;
    font-size: 20px;
    color: var(--fontColor);
    word-wrap: break-word;
  }

  span {
    font-family: CustomFontNormal, sans-serif;
    color: var(--fontColor);
  }

  #errors {
    color: #ff8080 !important;
  }

  #success {
    color: #009933 !important;
  }

  small {
    font-family: CustomFontNormal, sans-serif;
    color: var(--fontColor);
    word-wrap: break-word;
  }

  i {
    font-family: CustomFontItalic, sans-serif;
    font-size: 20px;
    color: var(--fontColor);
    word-wrap: break-word;
  }

  .dropdown-toggle::after {
    color: var(--fontColor);
  }

  button.close {
    color: var(--fontColor);
  }

  button.close:hover {
    color: var(--fontColor);
  }

  .navbar-nav .dropdown-menu {
    background-color: var(--primaryBackground);
    color: var(--fontColor);
  }

  .dropdown-item {
    color: var(--primaryColor);
  }

  .dropdown-item:hover {
    color: var(--secondaryColor);
  }

  /*LINKS*/

  a {
    font-family: CustomFontNormal, sans-serif;
    color: var(--primaryColor);
    text-decoration: none;
    font-size: 17px;
  }

  a:focus,
  a:hover {
    font-family: CustomFontNormal, sans-serif;
    color: var(--secondaryColor);
    text-decoration: none;
    text-decoration: underline;
  }

  /*ELLIPSIS*/

  .ellipsis {
    display: inline;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  /*ASSETS*/

  .img-responsive {
    max-width: 100%;
    height: auto;
  }

  .vid-responsive {
    max-width: 100%;
    height: auto;
  }

  /*INPUTS*/

  textarea {
    font-family: CustomFontNormal, sans-serif;
    font-size: 20px;
    color: var(--fontColor);
    background-color: var(--primaryBackground);
    resize: none;
    max-width: 100%;
  }

  textarea.form-control {
    background-color: var(--primaryBackground);
    color: var(--fontColor);
  }

  .form-control:disabled,
  .form-control[readonly] {
    background-color: var(--primaryBackground);
    color: var(--fontColor);
  }

  .form-control:focus {
    background-color: var(--primaryBackground);
    color: var(--fontColor);
  }

  .input-group > .form-control:not(:first-child),
  .input-group > .custom-select:not(:first-child) {
    background-color: var(--primaryBackground);
    color: var(--fontColor);
  }

  .input-group > .input-group-prepend > .btn,
  .input-group > .input-group-prepend > .input-group-text,
  .input-group:not(.has-validation)
    > .input-group-append:not(:last-child)
    > .btn,
  .input-group:not(.has-validation)
    > .input-group-append:not(:last-child)
    > .input-group-text,
  .input-group.has-validation
    > .input-group-append:nth-last-child(n + 3)
    > .btn,
  .input-group.has-validation
    > .input-group-append:nth-last-child(n + 3)
    > .input-group-text,
  .input-group
    > .input-group-append:last-child
    > .btn:not(:last-child):not(.dropdown-toggle),
  .input-group
    > .input-group-append:last-child
    > .input-group-text:not(:last-child) {
    background-color: var(--primaryBackground);
  }

  /*BUTTON*/

  #wide-btn {
    width: 100%;
  }

  /*TABLE*/

  table {
    width: 100%;
    empty-cells: show;
  }

  table th {
    font-family: CustomFontBold, sans-serif;
    color: var(--fontColor);
    font-size: 20px;
  }

  table td {
    font-family: CustomFontNormal, sans-serif;
    color: var(--fontColor);
    font-size: 20px;
    word-wrap: break-word;
  }

  /*MODAL*/

  .modal-content {
    background-color: var(--primaryBackground);
    border-color: var(--secondaryBackground);
  }

  /*BOX*/

  #box-shadow {
    background-color: var(--primaryBackground);
    border-color: var(--secondaryBackground);
    border-width: var(--box-shadow_border_width);
    border-style: solid;
    -webkit-box-shadow: 1px 1px 5px 2px var(--box-shadow_border_color);
    -moz-box-shadow: 1px 1px 5px 2px var(--box-shadow_border_color);
    box-shadow: 1px 1px 5px 2px var(--box-shadow_border_color);
  }

  /*OTHER COMPONENTS*/

  #nprogress .bar {
    background-color: var(--primaryColor) !important;
  }
</style>

<script>
  import Navbar from "./Navbars/Navbar.vue";
  import NavbarUser from "./Navbars/NavbarUser.vue";
  import NavbarNotUser from "./Navbars/NavbarNotUser.vue";

  export default {
    name: "App",
    components: {
      Navbar,
      NavbarUser,
      NavbarNotUser,
    },
    data: function() {
      return {};
    },
    mounted() {},
    updated() {},
    computed: {
      getNavbar() {
        if (this.$route.fullPath.includes("/user/")) {
          return NavbarUser;
        } else if (this.$route.fullPath.includes("/verification")) {
          return NavbarNotUser;
        } else {
          return Navbar;
        }
      },
    },
    methods: {},
  };
</script>
