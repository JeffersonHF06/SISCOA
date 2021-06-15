<template>
    <div>
        <div class="row mb-4">
            <!-- <div class="col">
        <a href="/forms" class="btn btn-link-dark ml-left">
          <i class="fas fa-arrow-left mx-2"></i>
          <i id="button-text">Regresar</i>
        </a>
      </div> -->

            <div class="col-md-4">
                <h5>Usuarios registrados: {{ noUsers }}</h5>
            </div>

            <div class="col d-flex flex-row">
                <input
                    id="search-input"
                    class="form-control mr-sm-4 p-2"
                    type="search"
                    placeholder="Buscar Usuario"
                    aria-label="Buscar"
                    name="search"
                    v-model="searchCriterion"
                />
            </div>

            <div class="col-md-4 d-flex align-items-end flex-column">
                <button @click="refresh" class="btn btn-success">
                    <i class="fas fa-sync-alt"></i> Refrescar
                </button>
            </div>
        </div>

        <div
            id="dsTable"
            class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl"
        >
            <table class="table table-hover table-fixed">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Puesto</th>
                        <th>Carrera</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(user, idx) in filteredUsers" :key="idx">
                        <td id="table-body-text">
                            {{ user.name }}
                        </td>

                        <td id="table-body-text">
                            {{ user.email }}
                        </td>

                        <td id="table-body-text">
                            {{ user.phone }}
                        </td>

                        <td id="table-body-text">
                            {{ user.position.name }}
                        </td>

                        <td id="table-body-text">
                            {{ user.career.name }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    async mounted() {
        await this.refresh();
    },

    props: ["form"],

    data() {
        return {
            noUsers: 0,
            users: [],
            searchCriterion: ""
        };
    },

    methods: {
        /**
         * Método que refresca el array de usuarios registrados en el form.
         */
        async refresh() {
            let data = await axios
                .get(`/forms/getUsersForm/${this.form.id}`)
                .then(({ data }) => data)
                .catch(err => {
                    console.log(err);
                });

            this.users = data.users;
            this.noUsers = data.noUsers;
        }
    },

    computed: {
        /**
         * Computed que filtra los usuarios que se muestran en la tabla por su nombre.
         */
        filteredUsers: function() {
            return this.users.filter(user => {
                return user.name
                    .toLowerCase()
                    .match(this.searchCriterion.toLowerCase());
            });
        }
    }
};
</script>
