<template >
  <div class="flex w-11/12 mx-auto flex-col lg:rounded-xl shadow-lg">
    <div
      class="md:flex lg:item-center md-text-center bg px-6 justify-around self-center align-center"
    >
      <div class="lg:w-1/3 mx-auto p-6 white">
        <h1 class="font-bold pb-4 text-2xl">Addresse</h1>
        <span class="pb-4 text-md"
          >441, 2ème Etage Lot La Colline Californie ( en face siège Inwi ),
          Casablanca</span
        >
      </div>

      <div class="lg:w-1/3 mx-auto p-6 white">
        <h1 class="font-bold pb-4 text-2xl">Téléphone</h1>
        <span class="pb-4 text-md">0623779270</span>
      </div>
      <div class="lg:w-1/3 mx-auto p-6 white">
        <h1 class="font-bold pb-4 text-2xl">Horaire</h1>
        <span class="pb-4 text-md"
          >Notre clinique vous informe que l'horaire de travail est de 9h à 19h
          sauf Samedi de 9h à 15h</span
        >
      </div>
    </div>
    <hr class="mb-2 self-center" />
    <h1 class="py-5 pb-10 text-center text-3xl font-bold">
      Réservez votre Rendez-vous
    </h1>
    <div class="lg:flex px-10 justify-between w-full">
      <div class="flex flex-col">
        <div
          class="flex lg:w-80 h-80 ml-5 rounded-xl overflow-y-hidden overflow-x-auto shadow-lg"
          id="fgfg"
        >
          <table class="w-98">
            <thead class="flex bg-yellow rounded-t-xl">
              <tr
                class="flex pt-5 flex-col"
                v-for="(day, ind) in date"
                :key="ind.id"
              >
                <th class="pb-6 w-20 text-sm" id="day">
                  {{ day[0] }}<br /><span class="font-normal">{{
                    day[1]
                  }}</span>
                </th>
              </tr>
            </thead>
            <tbody class="flex" id="fuck">
              <tr
                class="flex flex-col"
                v-for="(day, ind) in date"
                :key="ind.id"
              >
                <td v-for="(crenu, index) in crenus" :key="index.id">
                  <div class="py-4 w-20 text-center">
                    <label
                     v-on:click="checked()"
                      v-bind:id="'c' + ind + 'a' + index"
                      class="bg-blue w-full p-2 rounded-md hover:bg-yellow"
                      v-bind:for="ind + 'a' + index"
                      >{{ crenu }}</label
                    >
                    <input
                      v-bind:Id="ind + 'a' + index"
                      type="radio"
                      name="check"
                      v-bind:value="[day[2] + ' ' + crenu]"
                      hidden
                    />
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <span
          class="font-bold cursor-pointer text-gray text-center my-5 pl-10"
          v-on:click="aficher()"
        >
          voir plus crenus >>
        </span>
      </div>

      <div
        class="flex flex-wrap ml-8 justify-end lg:mt-4 mt-14 w-full shadow-lg lg:w-2/3"
      >
        <div class="w-full flex flex-col px-3">
          <label for="sujet" class="pb-5 red"
            >Ècrivez d'abord le message *</label
          >
          <textarea
            v-model="sujet"
            id="sujet"
            class="w-full h-48 p-3 text-sm leading-tight text-gray border rounded shadow appearance-none focus:outline-blue"
            type="text"
            placeholder="Voter Message"
            required
          />
        </div>
        <button
          v-on:click="onlyOne()"
          class="bg-blue font-bold my-5 white p-1 h-12 mr-10 rounded-lg w-64"
        >
          PRENDRE RENDEZ-VOUS
        </button>
      </div>
    </div>
  </div>
  <div class="flex w-11/12 my-20 mx-auto flex-col lg:rounded-xl shadow-lg">
    <h1 class="py-5 pb-10 text-center text-3xl font-bold">
      Comment Nous Trouver
    </h1>
    <div class="mapouter w-full flex text-right">
      <div class="gmap_canvas">
        <iframe
          class="gmap_iframe h-full"
          width="100%"
          frameborder="0"
          scrolling="no"
          marginheight="0"
          marginwidth="0"
          src="https://maps.google.com/maps?width=500&amp;height=600&amp;hl=en&amp;q=youcode safi&amp;t=k&amp;z=20&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
        >
        </iframe>
      </div>
      <div class="w-full flex flex-col p-5">
        <img
          class="w-80 mx-auto"
          src="../assets/PAT-Family_Landscape.png"
          alt=""
        />
        <div>
          <h1 class="p-5 text-center text-xl font-semibold">
            Rendre l'accès aux soins rapide et égalitaire pour tous.
          </h1>
        </div>
        <button
          class="bg-blue font-bold white p-1 h-12 mx-auto self-center rounded-lg w-64"
        >
          Afficher Sur Google Map
        </button>
      </div>
    </div>
    <div>
      <div></div>
    </div>
  </div>
</template>
<style lang="css" scoped>
.bg {
  background-color: #107aca;
}
.red {
  color: rgb(245, 8, 8);
}
.white {
  color: white;
}
.gmap_canvas {
  overflow: hidden;
  background: none !important;
  width: 100%;
}
</style>
<script>
import axios from "axios";
export default {
  el: "",
  data: {
    sujet: "",
    dates: "",
    crenus: "",
  },
  data() {
    const weekday = [
      "Dimanche",
      "Lundi",
      "Mardi",
      "Mercredi",
      "Jeudi",
      "Vendredi",
      "Samedi",
    ];
    const month = [
      "Jan.",
      "Fév.",
      "Mars",
      "Avril",
      "Mai",
      "Juin",
      "Jui.",
      "Aout",
      "Sep.",
      "Oct.",
      "Nov.",
      "Dec.",
    ];
    const crenu = [
      "09:00",
      "10:00",
      "11:00",
      "12:00",
      "13:00",
      "14:00",
      "15:00",
      "16:00",
      "17:00",
    ];
    let today = new Date();
    let dd = today.getDay();
    let date;
    let date_S;
    let dates = [];

    for (let i = 0; i < 7; i++) {
      date = today.getDate() + i + "-" + month[today.getMonth()];
      date_S =
        today.getFullYear() +
        "-" +
        "0" +
        (today.getMonth() + 1) +
        "-" +
        (today.getDate() + i);
      dates[i] = [weekday[dd], date, date_S];
      dd == 6 ? (dd = 0) : (dd += 1);
    }

    this.date = dates;
    this.crenus = crenu;


    let checkboxes = document.getElementsByName("check");

   
  },
  beforeMount() {
     
  },
  mounted() {
    let checkboxes = document.getElementsByName("check");

    checkboxes.forEach(function (ele) {
      if (ele.checked === true) {
        document
          .getElementById("c" + item.id)
          .setAttribute("style", "background-color: yellow;");
      }
      axios.post("http://dentaire.local/reserve/crenus").then((Response) => {
        if (Response.status == 200) {
          Response.data.forEach(function (index) {
            if (
              index.date === ele.value.split(" ")[0] &&
              index.time === ele.value.split(" ")[1]
            ) {
              document
                .getElementById("c" + ele.id)
                .setAttribute("style", "background-color:grey;");
              document.getElementById(ele.id).disabled = true;
            }
          });
        }
      });
    });
  },
  el: "",
  methods: {
   checked()
    {
      
      const checkboxes = document.getElementsByName("check");
      checkboxes.forEach(function (ele) {
        if (document.getElementById(ele.id).disabled === false) {
          document
            .getElementById("c" + ele.id)
            .setAttribute("style", "background-color: sky;");
        }
      if (ele.checked === true) {
        document
          .getElementById("c" + ele.id)
          .setAttribute("style", "background-color: yellow;");
          return true ;
      }
    });
    },
    onlyOne() {
      let data;
      const checkboxes = document.getElementsByName("check");
      this.sujet = document.getElementById("sujet").value;
      checkboxes.forEach((item) => {
        if (item.checked === true) {
          data = {
            sujet: this.sujet,
            date: item.value,
            id_user: localStorage["Id_user"],
          };
          axios
            .post("http://dentaire.local/reserve/ajouter", data)
            .then((response) => {
              if (response.status == 200) {
                this.$router.push('/Profil');
              }
            });
        }
      });
    },
    aficher() {
      let el = document.getElementById("fgfg");

      console.log(el.style !== "height:auto;");
      if (el.style.height !== "auto") {
        el.setAttribute("style", "height:auto;");
      } else {
        el.setAttribute("style", "height:20rem;");
      }
    },
  },
};
</script>
