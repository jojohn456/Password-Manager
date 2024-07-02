<template>
  <b-container>
    <b-row>
      <b-col id="eula" cols="12" align="center">
        <h2>End-User License Agreement ("Agreement")</h2>
      </b-col>
    </b-row>
    <b-row>
      <b-col id="eula-text" cols="12" align="left">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet
          nunc est. Phasellus aliquam accumsan nibh, et volutpat lorem dignissim
          sed. Aliquam pulvinar libero sit amet leo mollis porta. Aenean
          imperdiet ex vel ipsum consectetur, a interdum nisi sagittis. Aliquam
          imperdiet nunc erat, a congue mauris ultricies id. Donec dolor sapien,
          viverra nec feugiat id, placerat vitae metus. Ut ut interdum ante, et
          porttitor neque. Morbi fermentum, tortor ac volutpat tincidunt, magna
          massa rutrum velit, id dapibus ex odio sed quam. Morbi tristique nisl
          lacus, non euismod ligula tempus ut. Vestibulum varius, nisi dictum
          facilisis interdum, ligula velit imperdiet ante, at malesuada sem
          dolor sed quam. Aenean commodo leo in quam pellentesque, sit amet
          tincidunt lorem posuere. Pellentesque quam tortor, dapibus sit amet
          felis sit amet, aliquet bibendum neque. Etiam quis ornare eros. In non
          dolor vulputate, lobortis dolor at, pretium ex.
        </p>
        <p>
          Morbi venenatis pulvinar libero, vel placerat elit fringilla sed. Nunc
          fringilla gravida condimentum. Vivamus porta volutpat arcu, non
          sagittis quam dignissim vitae. Sed consequat felis leo, et gravida
          felis blandit non. Morbi molestie, sem ut fermentum imperdiet, sem
          magna elementum turpis, tincidunt malesuada augue orci eu dui.
          Vestibulum aliquet nulla quis finibus viverra. Nam non vestibulum
          lectus. Cras eget libero rhoncus, ultricies dui ac, sodales eros.
          Quisque vel mattis nisl. Integer tristique lobortis lorem, et
          sollicitudin ipsum interdum nec. In finibus turpis quis justo suscipit
          feugiat. Praesent neque lacus, semper ac mauris vel, faucibus rhoncus
          leo. Praesent eget magna pellentesque, mattis neque placerat, pretium
          magna. Maecenas at nunc faucibus, ullamcorper ipsum at, aliquet leo.
          Sed in tincidunt lacus, non auctor lorem. Vestibulum tincidunt turpis
          vel augue tristique luctus in a tortor.
        </p>
        <p>
          Donec ac tincidunt libero. Curabitur sit amet urna eget nulla lobortis
          iaculis. Praesent et quam vel turpis vulputate laoreet. Mauris mauris
          tellus, finibus id risus at, accumsan interdum urna. Praesent a
          euismod nunc. Vestibulum tempus, libero in interdum vulputate, lacus
          arcu aliquam nisi, eget scelerisque risus velit id turpis. Fusce non
          libero non sapien pulvinar efficitur. Pellentesque tincidunt fermentum
          ante, non semper odio pretium eu. Etiam non ornare risus, in semper
          massa. Vestibulum facilisis nisl urna, in porttitor nibh faucibus id.
          Orci varius natoque penatibus et magnis dis parturient montes,
          nascetur ridiculus mus. Donec id sagittis velit, in rutrum dolor.
          Vestibulum eu gravida nulla.
        </p>
        <p>
          Vivamus eu tincidunt felis. Sed condimentum nulla nec imperdiet
          facilisis. Duis efficitur dictum varius. Ut id commodo leo. Mauris
          fringilla ullamcorper nisl nec viverra. Donec euismod elit sit amet
          ante sagittis, et mollis odio tristique. Quisque suscipit dui justo, a
          sollicitudin erat placerat sit amet. Proin malesuada eros in varius
          eleifend. Class aptent taciti sociosqu ad litora torquent per conubia
          nostra, per inceptos himenaeos. Proin pretium consequat est, ut
          malesuada erat facilisis non. Sed ac ex ut est vehicula hendrerit in
          id ante. Aliquam bibendum tortor quis risus sagittis ornare at a enim.
          Aenean varius sed lectus feugiat sodales.
        </p>
        <p>
          Etiam suscipit accumsan pulvinar. Proin at dolor finibus, tincidunt
          tellus sit amet, porta magna. Aliquam egestas risus in felis tincidunt
          commodo. Mauris at libero libero. Cras id gravida erat. In luctus
          tortor eget dui faucibus, eget volutpat diam blandit. Curabitur rutrum
          leo lorem, eu fermentum ex ultrices a. Integer posuere massa et
          finibus dignissim. Vivamus augue mauris, consequat in aliquam eget,
          viverra ac tortor. Phasellus quis turpis eget massa tincidunt
          ultricies ut eget purus. Aliquam eu vestibulum nisl. Vestibulum
          ultrices ullamcorper pharetra. Ut finibus laoreet sapien, quis dictum
          lacus molestie et. Donec sed arcu et metus facilisis congue. Etiam
          fermentum vehicula leo quis aliquet.
        </p>
      </b-col>
    </b-row>
  </b-container>
</template>

<style scoped>
  #eula {
    margin: 100px 0px 0px 0px;
  }

  #eula-text {
    margin: 50px 0px 0px 0px;
  }
</style>

<script>
  export default {
    name: "Eula",
    components: {},
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s | EULA",
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
