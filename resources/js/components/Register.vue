<template>
    <div>
        <input hidden name="id" v-model="id" type="text" />

        <!-- <input hidden type="text" name="page" v-model="page" /> -->

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="control-label required" for="email-input"
                        >Correo electrónico</label
                    >
                    <input
                        @blur="getUser"
                        v-model="email"
                        id="email-input"
                        name="email"
                        class="form-control"
                        type="text"
                        :class="errors.email ? 'is-invalid' : ''"
                    />

                    <div v-if="errors.email != null" class="invalid-feedback">
                        {{ errors.email[0] }}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label class="control-label required" for="name-input"
                        >Nombre Completo</label
                    >
                    <input
                        :readonly="blocked == true"
                        v-model="name"
                        name="name"
                        id="name-input"
                        type="text"
                        class="form-control"
                        :class="errors.name ? 'is-invalid' : ''"
                    />

                    <div v-if="errors.name != null" class="invalid-feedback">
                        {{ errors.name[0] }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label required" for="phone-input"
                        >Teléfono</label
                    >
                    <input
                        :readonly="blocked == true"
                        v-model="phone"
                        id="phone-input"
                        name="phone"
                        class="form-control"
                        placeholder=""
                        type="text"
                        :class="errors.phone ? 'is-invalid' : ''"
                    />

                    <div v-if="errors.phone != null" class="invalid-feedback">
                        {{ errors.phone[0] }}
                    </div>
                </div>
            </div>

      <div class="col-6">
        <div class="form-group">
          <label class="control-label required" for="position-input"
            >Puesto</label
          >
            <select
              v-model="position_id"
              class="form-control"
              :class="errors.position_id ? 'is-invalid' : ''"
              :disabled="blocked == true"
            >
              <option value="" disabled>Seleccionar</option>
              <option
                v-for="(position, index) of positions"
                v-bind:key="index"
                v-bind:value="position.id"
              >
                {{ position.name }}
              </option>
            </select>
          <input hidden readonly type="text" v-model="position_id" name="position_id">

          <div v-if="errors.position_id != null" class="invalid-feedback">
            {{ errors.position_id[0] }}
          </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  props: ["page", "errors"],

  mounted() {
    this.getPositions();
  },

  data() {
    return {
      id: "",
      email: "",
      name: "",
      phone: "",
      position_id: "",
      blocked: false,
      positions: [],
    };
  },

  methods: {
    /**
     * Método que obtiene los datos de un usuario si existe mediante su correo y carga estos datos en los inputs.
     */
    async getUser() {
      return await axios
        .get(`/users/getUser/${this.email}`)
        .then(({ data }) => {
          if (data[0] != null) {
            this.id = data[0].id;
            this.name = data[0].name;
            this.phone = data[0].phone;
            this.position_id = data[0].position_id;
            this.blocked = true;
          } else {
            this.id = "";
            this.name = "";
            this.phone = "";
            this.position_id = "";
            this.blocked = false;
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },

    /**
     * Método que obtiene las posiciones.
     */
    async getPositions() {
      return await axios
        .get(`/users/getPositions`)
        .then(({ data }) => {
          this.positions = data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
