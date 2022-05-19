<template>
  <div class="mb-16 w-full md:w-2/3">
    <div
      class="px-4 md:px-16 md:left-auto align-center md-right-auto lg:max-w-full lg:flex"
    >
      <div
        class="w-48 mx-auto flex bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
        title="Woman holding a mug"
      >
        <img src="../assets/FR_How.png" alt="Woman holding a mug" />
      </div>

      <div
        class="w-full border-x border-y border-gray lg:border-l-0 lg:border-t lg:border-gray bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal"
      >
        <div class="mb-8">
          <div class="text-gray font-bold text-xl mb-2">Message</div>
          <textarea
            id="message"
            class="w-full h-24 p-3 text-start text-sm leading-tight text-gray border rounded shadow appearance-none focus:outline-blue"
            type="text"
            v-model="sujet"
            placeholder="Voter Message"
            required
            readonly
          ></textarea>
        </div>
        <div class="flex text-xs justify-between w-full align-center">
          <div
            class="bg-blue font-semibold px-5 w-auto p-2 cursor-pointer rounded-md hover:bg-yellow"
            style="color: white"
          >
            <span> {{ date["date"] }}</span>
            <span>&nbsp;.&nbsp;{{ date["time"] }}</span>
          </div>

          <div v-if="cop" class="flex w-1/6 justify-around">
            <button v-on:click="del(date['Id_rdv'])" class="w-6 hover:w-8">
              <svg
                fill="#D53D1C"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 128 128"
              >
                <path
                  d="M 49 1 C 47.34 1 46 2.34 46 4 C 46 5.66 47.34 7 49 7 L 79 7 C 80.66 7 82 5.66 82 4 C 82 2.34 80.66 1 79 1 L 49 1 z M 24 15 C 16.83 15 11 20.83 11 28 C 11 35.17 16.83 41 24 41 L 101 41 L 101 104 C 101 113.37 93.37 121 84 121 L 44 121 C 34.63 121 27 113.37 27 104 L 27 52 C 27 50.34 25.66 49 24 49 C 22.34 49 21 50.34 21 52 L 21 104 C 21 116.68 31.32 127 44 127 L 84 127 C 96.68 127 107 116.68 107 104 L 107 40.640625 C 112.72 39.280625 117 34.14 117 28 C 117 20.83 111.17 15 104 15 L 24 15 z M 24 21 L 104 21 C 107.86 21 111 24.14 111 28 C 111 31.86 107.86 35 104 35 L 24 35 C 20.14 35 17 31.86 17 28 C 17 24.14 20.14 21 24 21 z M 50 55 C 48.34 55 47 56.34 47 58 L 47 104 C 47 105.66 48.34 107 50 107 C 51.66 107 53 105.66 53 104 L 53 58 C 53 56.34 51.66 55 50 55 z M 78 55 C 76.34 55 75 56.34 75 58 L 75 104 C 75 105.66 76.34 107 78 107 C 79.66 107 81 105.66 81 104 L 81 58 C 81 56.34 79.66 55 78 55 z"
                />
              </svg>
            </button>
            <button class="w-5 hover:w-8" v-on:click="btnChange()">
              <img src="../assets/edit.png" alt="" />
            </button>
          </div>
          <div
            v-else
            class="botts md :w-1/3 flex justify-evenly md:justify-between"
          >
            <button
              id="Annuler"
              class="bg-yellow max-w-24 font-semibold md:px-5 md:w-auto p-2 cursor-pointer rounded-md"
              v-on:click="btnChange()"
            >
              Annuler
            </button>
            <button
              id="Modifier"
              class="bg-green max-w-24 font-semibold md:px-5 w-auto p-2 cursor-pointer rounded-md"
              v-on:click="edit()"
            >
              Modifier
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
// import { response } from "express";
// import { arrayBuffer } from "stream/consumers";

export default {
  name: "",
  props: ["date"],
  data() {
    return {
      cop: true,
      id: this.date['Id_rdv'],

      sujet: this.date["sujet"],
    };
  },

  methods: {
    del() {
      axios
        .post("http://dentaire.local/Reserve/DELETE", {
          id: this.id,
        })
        .then((response) => this.getAll())
        .catch((error) => console.log(error));
    },
    btnChange() {
      let area = document.getElementById("message");
      if (area.readOnly == true) {
        area.readOnly = false;
        area.style = ":Active{border:blue;}";
      } else {
        area.readOnly = true;
      }
      this.cop = !this.cop;
    },
    edit() {
      axios
        .post("http://dentaire.local/Reserve/EDIT", {
          id: this.id,
          sujet: this.sujet,
        })
        .then((response) => this.btnChange())
        .catch((error) => console.log(error));
    },
  },
};
</script>
