<template>
  <div>
    <input hidden type="text" :id="`link${id}`" :value="asset" />
    <button
      type="button"
      id="linkBtn"
      data-toggle="tooltip"
      data-placement="top"
      title="Copiar"
      @click="copy"
      class="btn btn-dark"
    >
      Copiar enlace
    </button>

    <div
      
      aria-live="polite"
      aria-atomic="true"
      style="position: relative; min-height: 200px"
    >
      <div id="copiedToast" class="toast" style="position: absolute; top: 0; right: 0">
        <div class="toast-body">Enlace Copiado</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log(this.asset);
  },

  props: ["id", "url"],

  data() {
    return {
      asset: `${this.url}forms/${this.id}`,
    };
  },

  methods: {
    copy() {
      var copyText = document.getElementById(`link${this.id}`);

      navigator.clipboard.writeText(copyText.value);

      $('#copiedToast').toast('show')
    },
  },
};
</script>
