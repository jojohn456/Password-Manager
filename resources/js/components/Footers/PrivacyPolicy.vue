<template>
  <b-container>
    <b-row>
      <b-col id="privacy-policy" cols="12" align="center">
        <h2>Privacy Policy</h2>
      </b-col>
    </b-row>
    <b-row>
      <b-col id="privacy-policy-text" cols="12" align="left">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac
          metus eget mi vestibulum bibendum non posuere turpis. Vivamus
          venenatis, est sed consectetur mollis, eros lectus dapibus purus, non
          cursus neque elit et arcu. Pellentesque iaculis ante ut efficitur
          luctus. Aenean quis lobortis purus, sed eleifend purus. Nullam sit
          amet ipsum gravida, ornare lorem ut, tincidunt ligula. Praesent tempor
          nunc leo, et ultricies felis finibus nec. Nam nec vulputate lectus.
          Nam et enim at diam sagittis volutpat. Curabitur at neque non mi
          semper gravida id id nibh. Pellentesque eros ante, molestie id tellus
          at, congue hendrerit ipsum. Fusce ac sapien convallis, convallis massa
          quis, ultricies sem. Vestibulum at justo in nulla scelerisque
          malesuada. Aliquam et condimentum magna. Donec commodo tellus id dui
          mattis, sed consectetur libero convallis. Nunc nec laoreet leo.
        </p>
        <p>
          Nunc vel eros feugiat, convallis augue vel, vehicula risus. Nullam sed
          fringilla metus. Aliquam erat volutpat. Etiam ut arcu mi. In interdum,
          dolor id pharetra imperdiet, leo velit pulvinar diam, nec convallis
          urna erat euismod metus. Nam ac ornare dui. Quisque finibus enim id
          condimentum luctus. Suspendisse blandit vitae sem eget porta.
          Phasellus dapibus quam sagittis odio pharetra, sit amet eleifend risus
          lobortis. Aenean nunc elit, eleifend vitae nisi quis, efficitur
          eleifend sapien. Orci varius natoque penatibus et magnis dis
          parturient montes, nascetur ridiculus mus. Nulla sapien odio, aliquam
          in semper at, vulputate et tortor. Aenean dictum metus sollicitudin
          sapien hendrerit semper.
        </p>
        <p>
          Proin tempus, arcu eu auctor suscipit, nunc eros consequat tellus, ut
          consectetur magna tellus molestie ante. Pellentesque volutpat volutpat
          augue quis fringilla. Nunc mattis nulla a tellus accumsan porttitor.
          Sed pellentesque fermentum leo et sodales. Lorem ipsum dolor sit amet,
          consectetur adipiscing elit. Nulla vel dolor felis. Mauris egestas
          iaculis blandit. Nunc tincidunt tortor tincidunt quam maximus
          ultrices.
        </p>
        <p>
          Cras rhoncus convallis orci sit amet rutrum. Sed massa purus, lobortis
          vitae ipsum vel, ultrices tincidunt odio. Aenean eget auctor sapien.
          In justo mauris, interdum a pharetra at, iaculis vel lectus. Fusce sed
          odio metus. Proin ultrices at ligula eget volutpat. Integer sed justo
          condimentum, facilisis libero id, auctor felis. Nulla viverra, dolor
          dictum tincidunt cursus, velit nunc maximus felis, ac egestas elit
          mauris vitae erat. Ut gravida, odio ullamcorper mattis blandit, risus
          neque ullamcorper est, et commodo nulla est et purus. Etiam eleifend
          sem quis egestas consequat. Fusce risus lacus, molestie non lorem
          viverra, aliquam posuere neque. Maecenas eget neque arcu.
        </p>
        <p>
          Vivamus malesuada ultrices quam, vitae pharetra tortor. Nulla lobortis
          massa non erat aliquam eleifend. Duis eget erat vitae dolor commodo
          mollis. Sed ornare dolor non imperdiet eleifend. Aliquam risus purus,
          ullamcorper in eros et, interdum ullamcorper erat. Aenean posuere erat
          vel ipsum porttitor, rutrum fringilla nisl volutpat. Nulla a lobortis
          sem. Maecenas arcu ligula, suscipit et maximus ut, imperdiet ac ante.
          Fusce neque lorem, condimentum ut lorem sit amet, tempus tristique
          erat.
        </p>
      </b-col>
    </b-row>
  </b-container>
</template>

<style scoped>
  #privacy-policy {
    margin: 100px 0px 0px 0px;
  }

  #privacy-policy-text {
    margin: 50px 0px 0px 0px;
  }
</style>

<script>
  export default {
    name: "PrivacyPolicy",
    components: {},
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s | Privacy Policy",
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
