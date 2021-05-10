<template>
  <td id="table-body-text">
    

 </td>
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
