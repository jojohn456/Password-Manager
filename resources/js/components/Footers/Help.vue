<template>
  <b-container>
    <b-row>
      <b-col id="help" cols="12" align="center">
        <h2>Help</h2>
      </b-col>
    </b-row>
    <b-row>
      <b-col id="help-text" cols="12" align="left">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
          at rhoncus tellus. In hac habitasse platea dictumst. Nam nec sodales
          ligula, in suscipit purus. Aenean tempor mollis eros, eu malesuada
          arcu maximus quis. Quisque a eros eget lorem suscipit pulvinar sit
          amet vel urna. Nullam posuere eget metus ut semper. Phasellus eu
          sollicitudin enim. Vivamus vulputate porta gravida. Sed eu tellus
          nisi.
        </p>
        <p>
          Etiam vel sodales nisi. Morbi dui neque, venenatis vel ligula quis,
          dignissim fermentum nunc. Cras purus arcu, aliquet sed orci vel,
          sagittis elementum tellus. Phasellus non lobortis lorem. Duis
          malesuada nibh nibh, eget euismod magna interdum ornare. Integer neque
          urna, malesuada id mattis auctor, auctor in erat. Fusce et neque et
          purus fermentum rutrum. Vestibulum pellentesque efficitur feugiat.
          Nunc dictum risus ante, eu scelerisque massa porta ac. Nullam at magna
          quis nibh varius ultricies. Nullam ultrices elit lectus, eget
          fermentum nulla rutrum quis.
        </p>
        <p>
          Nullam mattis urna et est maximus, sed gravida sem iaculis. Cras
          finibus suscipit nulla, ut commodo neque porttitor sit amet. Sed ac
          eros non orci imperdiet convallis posuere sit amet mi. Quisque
          eleifend purus non sem dapibus dignissim. Vestibulum lobortis lacus a
          diam placerat, vel laoreet metus fringilla. Aliquam viverra nibh quis
          magna commodo pulvinar. Sed hendrerit arcu nunc, id ullamcorper nunc
          dignissim et. Aliquam vitae turpis vitae enim ultricies sollicitudin
          non et leo.
        </p>
      </b-col>
    </b-row>
  </b-container>
</template>

<style scoped>
  #help {
    margin: 100px 0px 0px 0px;
  }

  #help-text {
    margin: 50px 0px 0px 0px;
  }
</style>

<script>
  export default {
    name: "Help",
    components: {},
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s |Help",
    },
    data: function() {
      return {};
    },
    mounted() {
      window.scrollTo(0, 0);
    },
    updated() {},
    computed: {},
    methods: {},
  };
</script>
