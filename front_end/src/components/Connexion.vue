<template>
  <div v-if="showDiv == 0">
    <h3 class="text-3xl text-center font-semibold">Create an Account!</h3>

    <div
      class="bg-white p-6 min-w-1xl flex flex-col h-fit justify-between lg:rounded-r-xl shadow-lg"
    >
      <hr class="mb-4 border-t text-blue" />
      <form class="lg:px-8 bg-white rounded">
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label
              class="block pl-2 mb-2 text-sm font-bold text-gray"
              for="grid-password"
            >
              Voter Prénome
            </label>
            <input
              v-model="prenom"
              class="w-full p-3 text-sm leading-tight text-gray border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="grid-first-name"
              type="text"
              placeholder="Voter Prénome"
              required
            />
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label
              class="block pl-2 mb-2 text-sm font-bold text-gray"
              for="grid-password"
            >
              Voter Nome
            </label>
            <input
              v-model="nome"
              class="w-full p-3 text-sm leading-tight text-gray border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="grid-last-name"
              type="text"
              placeholder="Votre Nom"
              required
            />
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label
              class="block pl-2 mb-2 text-sm font-bold text-gray"
              for="grid-password"
            >
              Voter number de Téléphone
            </label>
            <input
              v-model="phone"
              class="w-full p-3 text-sm leading-tight text-gray border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="grid-password"
              type="number"
              placeholder="Voter number de Téléphone"
              pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
              min="0"
              required
            />
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label
              class="block pl-2 mb-2 text-sm font-bold text-gray"
              for="grid-password"
            >
              Voter E-mail
            </label>
            <input
              v-model="email"
              class="w-full p-3 text-sm leading-tight text-gray border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="grid-password"
              type="email"
              placeholder="Voter email"
              required
            />
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label
              class="block pl-2 mb-2 text-sm font-bold text-gray"
              for="grid-password"
            >
              Voter date de naissance
            </label>
            <input
              v-model="naissance"
              class="w-full p-3 text-sm leading-tight text-gray border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="grid-password"
              type="date"
              placeholder="Voter email"
              required="required"
            />
          </div>
        </div>

        <div class="mb-6 text-center">
          <button
            v-on:click="signUp"
            name="send"
            class="w-full py-2 text-bold text-white bg-blue text-lg bg-gradient-to-r from-purple to-blue rounded-xl"
          >
            Register Account
          </button>
        </div>
        <hr class="mb-6 border-t" />

        <div class="text-center">
          <span class="inline-block text-sm align-baseline">
            Already have an account?
            <span
              class="text-blue cursor-pointer text-bold cover"
              @click="showDiv = 1"
              >Connexion !</span
            >
          </span>
        </div>
      </form>
    </div>
  </div>
  <div v-else>
    <v-dialog class="w-full h-2xl" id="login">
      <!-- <v-btn flat slot="activator" class="success"> hi</v-btn> -->
      <v-card>
        <v-card-title>
          <div class="flex flex-col justify-center h-full">
            <div class="sm:max-w-xl">
              <div
                class="bg-white min-w-1xl flex flex-col h-fit justify-between lg:rounded-r-xl shadow-lg"
              >
                <div class="px-12 py-7">
                  <h3 class="text-3xl text-center font-semibold">
                    Connexion à compte!
                  </h3>
                  <hr class="mt-5 border-t text-blue" />
                </div>
                <div class="w-full flex flex-col items-center">
                  <div class="flex flex-col items-center py-10 space-y-3">
                    <span class="text-lg"> Entrez votre code de compte !</span>
                  </div>
                  <div class="w-3/4 flex flex-col">
                    <input
                      v-model="id"
                      class="w-full p-3 text-sm leading-tight border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                      type="text"
                      placeholder="Votre code"
                      required
                    />
                    <!-- <textarea rows="3" class="p-4 text-gray-500 rounded-xl resize-none">Leave a message, if you want</textarea> -->
                    <button
                      v-on:click="Login"
                      class="w-full my-10 py-2 font-bold text-white bg-blue text-lg bg-gradient-to-r from-purple to-blue rounded-xl text-white hover"
                    >
                      Connexion
                    </button>
                  </div>
                  <div
                    class="h-36 text-center flex-column items-center justify-between"
                  >
                    <br />
                    <span class=""
                      >Vous n'avez pas de compte ?
                      <a v-on:click="showDiv = 0" class=" cursor-pointer text-blue text-bold">
                        Inscrivez-vous</a
                      >
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </v-card-title>
      </v-card>
    </v-dialog>
  </div>
</template>
<style scoped>
.text-white {
  color: white;
  background-color: white;
}
</style>
<script>
// import { assertLiteral } from "@babel/types"
import axios from "axios";
import emailjs from "emailjs-com";
export default {
  data() {
    return {
      showDiv: 1,
      id: "",
      nome: "",
      prenom: "",
      phone: "",
      email: "",
      naissance: "",
    };
  },
  methods: {
    async signUp(e) {
      e.preventDefault();

      await axios({
        method: "post",
        url: "http://dentaire.local/user/create",
        data: {
          nome: this.nome,
          prenom: this.prenom,
          phone: this.phone,
          email: this.email,
          naissance: this.naissance,
        },
        headers: { "Content-Type": "multipart/raw" },
      })
        .then((response) => {
          if (response.status == 200) {
            console.log('fffffffffffff');
            // localStorage.stItem("user-info", JSN.stringify(result.data));
            emailjs
              .send(
                "service_ooessga",
                "template_wruyi7l",
                {
                  from_name: "Clinique Dentaire",
                  to_nome: this.nome,
                  nome: "Clinique Dentaire",
                  message: response.data["id"],
                  email: this.email,
                },
                "5TGgse7uHoj1Ux2el"
              )
              .then(
                () => {
                  this.showDiv = 1;
                  alert(" Vérifiez votre email !")
                  // this.$router.push('/')
                },
                (error) => {
                  alert("Message not sent", error);
                }
              );
          }
        })
        .catch((error) => {
          if (error.status == 201) {
            alert("error");
          }
        });
    },
    async Login(e) {
      e.preventDefault();

      const formData = new FormData();
      formData.append("id", this.id);
      axios
        .post("http://dentaire.local/user/read_single", formData)
        .then((Response) => {
          if (Response.status == 200) {
            localStorage.setItem("user-info", JSON.stringify(Response.data));
            localStorage.setItem("Id_user", Response.data["Id_user"]);

            this.$router.push('/');
          }
        });
    },
  },
};
</script>
