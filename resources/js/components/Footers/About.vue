<template>
  <b-container>
    <b-row>
      <b-col id="about" cols="12" align="center">
        <h2>About</h2>
      </b-col>
    </b-row>
    <b-row>
      <b-col id="about-text" cols="12" align="left">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper
          dui id feugiat sodales. Duis eu erat velit. Etiam condimentum risus
          nec libero fringilla scelerisque. Duis neque mauris, venenatis non
          ornare vitae, suscipit ut metus. Cras non volutpat nunc. Aenean tellus
          leo, posuere ac volutpat at, gravida efficitur orci. In a fringilla
          ligula. Nam ultricies iaculis elit. Nulla eget blandit lacus. Lorem
          ipsum dolor sit amet, consectetur adipiscing elit. Fusce accumsan dui
          mi, a fringilla lacus lobortis in.
        </p>
        <p>
          Sed vestibulum purus non pretium scelerisque. Curabitur a nisi mattis,
          hendrerit ex ac, feugiat neque. Proin scelerisque, dolor non luctus
          commodo, massa metus porta nisi, nec scelerisque nunc risus quis mi.
          Praesent placerat lorem non mi ullamcorper pellentesque. Vestibulum ut
          arcu quis augue pretium congue. Etiam consequat condimentum rhoncus.
          Interdum et malesuada fames ac ante ipsum primis in faucibus.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta
          nunc quis dictum pellentesque. Praesent massa est, egestas pulvinar
          justo vitae, suscipit malesuada quam. Morbi vehicula lacus quis
          convallis rutrum. Suspendisse ut iaculis quam, sit amet dictum est.
          Nulla accumsan ipsum sapien, nec fringilla justo pulvinar et. Aliquam
          luctus nunc vel massa consequat, in dapibus massa fringilla. Aenean
          laoreet consequat erat, vitae rhoncus arcu ornare sit amet. Donec sit
          amet eros nec mi vestibulum malesuada. Nunc placerat sapien a lacus
          efficitur, sed tempor dolor fringilla. Donec non vestibulum ex. Donec
          sollicitudin sapien eget felis sodales, eu consequat elit lacinia.
          Integer non feugiat turpis, non luctus massa. Maecenas et faucibus
          dui. Vivamus in ultrices leo. Aenean tristique risus molestie lacus
          pretium posuere.
        </p>
        <p>
          Donec interdum lacus vitae laoreet dapibus. Lorem ipsum dolor sit
          amet, consectetur adipiscing elit. Maecenas lectus nibh, malesuada ac
          vulputate vitae, suscipit non urna. Suspendisse ornare pretium risus,
          at accumsan mi elementum vel. Suspendisse velit mauris, hendrerit quis
          elementum et, lacinia nec urna. Proin mauris nisl, luctus in posuere
          molestie, suscipit ac massa. Nulla eget fringilla neque, sit amet
          finibus metus. Fusce finibus scelerisque lobortis. In vitae justo
          rutrum, egestas nunc auctor, maximus dui. Aenean scelerisque ex in
          nisl gravida, sed eleifend massa egestas. Curabitur quis mi nec justo
          sagittis aliquam. Aliquam erat volutpat. Sed nibh sapien, vehicula et
          mauris nec, eleifend interdum velit.
        </p>
        <p>
          Class aptent taciti sociosqu ad litora torquent per conubia nostra,
          per inceptos himenaeos. Etiam lobortis ligula ac neque maximus luctus.
          Nulla auctor, sem scelerisque ultricies semper, mauris turpis
          ullamcorper risus, id mollis enim ipsum in magna. Cras non ligula
          arcu. Phasellus feugiat leo mauris, quis malesuada sapien blandit
          varius. Pellentesque et massa sit amet sem molestie sagittis quis id
          tellus. Sed fermentum tincidunt ligula, non ultricies risus pulvinar
          vitae. Mauris id tincidunt est, non pulvinar velit. Integer bibendum
          tortor sit amet nunc laoreet gravida. Quisque ultricies tortor in
          lectus fermentum ullamcorper ac eget sem. Fusce lacinia nisi bibendum
          lacus dignissim condimentum.
        </p>
      </b-col>
    </b-row>
  </b-container>
</template>

<style scoped>
  #about {
    margin: 100px 0px 0px 0px;
  }
  #about-text {
    margin: 100px 0px 0px 0px;
  }
</style>

<script>
  export default {
    name: "About",
    components: {},
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s | About",
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
