<template>
  <div id="app">
    <div class="container">
      <nav class="navbar navbar-light bg-light mb-2">
        <div class="container-fluid ">
          <span class="mb-2 h1">Carros</span>
        </div>
      </nav>
      <ul class="list-group mb-2">
        <li
          v-for="(msg, index) of msg"
          :key="index"
          class="list-group-item list-group-item-success"
        >
          {{ msg.toString() }}
        </li>
      </ul>
      <ul class="list-group">
        <li
          v-for="(erro, index) of erros"
          :key="index"
          class="list-group-item list-group-item-danger"
        >
          {{ erro.toString() }}
        </li>
      </ul>
      <div class="row">
        <div class="col-md-12">
          <form @submit.prevent="salvar">
            <div class="mb-3">
              <label for="marca" class="form-label">Marca</label>
              <select
                class="form-select"
                name="marca"
                id="marca"
                v-model="carro.marca"
              >
                <option
                  v-for="marca in marcas"
                  :key="marca.index"
                  :value="marca.marca"
                  >{{ marca.marca }}</option
                >
              </select>
            </div>

            <div class="mb-3">
              <label for="modelo" class="form-label">Modelo</label>
              <input
                type="text"
                class="form-control"
                id="modelo"
                placeholder="Digite o modelo do carro"
                name="modelo"
                v-model="carro.modelo"
              />
            </div>
            <div class="mb-3">
              <label for="ano" class="form-label">Ano</label>
              <input
                type="number"
                class="form-control"
                id="ano"
                placeholder="Digite o ano do carro"
                name="ano"
                v-model="carro.ano"
              />
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">
                Salvar <i class="far fa-save"></i>
              </button>
            </div>
          </form>
        </div>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="carro of carros" :key="carro.id">
            <td>{{ carro.id }}</td>
            <td>{{ carro.marca }}</td>
            <td>{{ carro.modelo }}</td>
            <td>{{ carro.ano }}</td>
            <td>
              <button @click="editar(carro)" class="btn btn-primary">
                <i class="far fa-edit"></i>
              </button>
              <button @click="remover(carro)" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Carro from "./services/carros";

export default {
  data() {
    return {
      carro: {
        id: "",
        marca: "",
        modelo: "",
        ano: ""
      },
      marcas: [],
      carros: [],
      erros: [],
      msg: []
    };
  },
  mounted() {
    this.listar();
    this.carregaMarcas();
  },
  methods: {
    listar() {
      Carro.listar().then(resposta => {
        this.carros = resposta.data;
      });
    },

    carregaMarcas() {
      this.marcas.push({ index: 1, marca: "FIAT" });
      this.marcas.push({ index: 2, marca: "FORD" });
      this.marcas.push({ index: 3, marca: "JEEP" });
    },

    salvar() {
      this.erros = [];
      this.msg = [];
      if (!this.carro.id) {
        Carro.salvar(this.carro)
          .then(resposta => {
            this.carro = {};
            this.msg = { message: "Salvo com sucesso!" };
            this.erros = [];
            this.listar();
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      } else {
        Carro.atualizar(this.carro)
          .then(resposta => {
            this.carro = {};
            this.msg = { message: "Atualizado com sucesso!" };
            this.erros = [];
            this.listar();
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      }
    },

    editar(carro) {
      this.carro = carro;
      this.erros = [];
      this.msg = [];
    },

    remover(carro) {
      if (confirm("Deseja excluir o carro?")) {
        Carro.deletar(carro)
          .then(resposta => {
            this.listar();
            this.erros = [];
            this.carro = [];
            this.msg = { message: "Carro removido com sucesso!" };
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      }
    }
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
