<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <main>
    <section class="relative flex height sm:h-screen overflow-hidden">
      <div
        class="absolute flex justify-center items-center w-full h-full bg-black"
      >
        <div class="lg:w-3/4 px-4">
          <div class="text-center">
            <h1
              class="text-3xl tracking-tight font-extrabold sm:text-3xl md:text-6xl"
            >
              <span class="block text-sky xl:inline"
                >Votre Clinique Dentaire pour un Beau Sourire</span
              >
            </h1>
            <p
              class="mt-3 text-center white font-bold md:text-2xl sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5"
            >
              Prenez votre servicce d'orthodontie Chez Clinique Dentaire la
              colline
            </p>
            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center">
              <div class="rounded-md shadow">
                <router-link to="/Contact">
                  <button
                    @click="rdv"
                    class="w-full flex items-center justify-center px-8 py-3 text-base font-bold rounded-md text-white bg-indigo hover:bg-indigo md:py-4 md:text-lg md:px-10"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-6 mr-3"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path fill-rule="evenodd" clip-rule="evenodd" />
                    </svg>

                    <span> Prenez Rendez-Vous</span>
                  </button>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="h-screen">
      <div
        class="grid gap-4 w-5/6 mt-12 mx-auto lg:grid-cols-3 left-0 right-0 lg:absolute -bottom-64"
      >
        <div
          class="w-full justify-self-center drop-shadow-lg p-4 rounded-lg bg-white"
        >
          <div class="grid grid-cols-4">
            <p
              class="col-span-3 text-lg lg:text-sm p-2 font-semibold self-center"
            >
              Consultation vidéo : un accès rapide à votre médecin et un
              remboursement comme au cabinet
            </p>
            <img
              class="self-center"
              src="../assets/FR_eprescription.png"
              alt=""
            />
          </div>
          <button class="w-full bg-indigo p-3 mt-5 rounded-md">
            PRENDRE RENDEZ-VOUS
          </button>
        </div>
        <div
          class="w-full justify-self-center drop-shadow-lg p-4 rounded-lg bg-white"
        >
          <div class="grid grid-cols-4">
            <p
              class="col-span-3 text-lg lg:text-sm p-2 font-semibold self-center"
            >
              Partagez vos ordonnances simplement en pharmacie avec
              l’application Doctolib
            </p>
            <img class="self-center" src="../assets/FR_How.png" alt="" />
          </div>

          <button class="w-full bg-indigo p-3 mt-5 rounded-md">
            PRENDRE RENDEZ-VOUS
          </button>
        </div>
        <div
          class="w-full justify-self-center drop-shadow-md p-4 rounded-lg bg-white"
        >
          <div class="grid grid-cols-4">
            <p
              class="col-span-3 text-sm lg:text-sm p-2 font-semibold self-center"
            >
              Ne perdez plus jamais vos documents médicaux grâce à l’app
              Doctolib
            </p>
            <img class="self-center" src="../assets/FR_TLH.png" alt="" />
          </div>

          <button class="w-full bg-indigo p-3 mt-5 rounded-md">
            PRENDRE RENDEZ-VOUS
          </button>
        </div>
      </div>
      <div class="lg:h-64 h-24"></div>
      <div class="">
        <div>
          <h1 class="font-extrabold text-center pb-16 text-3xl">
            au service de votre santé :
          </h1>
        </div>
        <div
          class="md:flex bg-black white w-5/6 justify-center align-center rounded-lg mx-auto p-10"
        >
          <div class="md:w-2/5 flex align-center">
            <img
              class="w-full"
              src="../assets/3713f422bb9dbe5213c2.png"
              alt=""
            />
          </div>
          <div class="lg:w-3/5">
            <div class="py-5 font-semibold">
              <h1 class="text-lg">Vous êtes professionnel de santé ?</h1>
              <h3 class="text-sm">
                Équipez-vous du logiciel Doctolib pour gagner en confort de
                travail.
              </h3>
            </div>
            <div class="text-sm">
              <span
                >Libérez du temps médical grâce à la prise de rendez-vous en
                ligne et un logiciel moderne</span
              >
              <span
                >Développez l'activité de votre cabinet selon vos besoins grâce
                à une meilleure visibilité en ligne</span
              >
              <span
                >Gagnez en confort de travail au quotidien en réduisant les
                appels téléphoniques à votre cabinet</span
              >
              <span
                >Améliorez l'accès aux soins pour vos patients en leur proposant
                la meilleure des expériences</span
              >
            </div>
            <div>
              <button class="p-2 w-48 mt-10 bg-white text-sky">
                Vos données.
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="lg:h-24 h-10"></div>
    <section>
      <!-- <div class="lg:inset-y-0 lg:right-0 lg:w-full">
        <img
          class="w-full h-full object-cover"
          src="../assets/dentiste-scenes1-office.png"
          alt=""
        />
      </div> -->
    </section>
  </main>
</template>
<style scoped>
.white {
  color: white;
}
.bg-indigo {
  color: white;
  background: #4f46e5;
}
.bg-indigo:hover {
  background: rgb(255, 255, 255);
  color: #4f46e5;
}
.bg-white {
  background: white;
}
.text-indigo {
  color: rgb(0, 0, 0);
  background: rgb(59 130 246 / 0.5);
}
.text-indigo:hover {
  color: aliceblue;
  background: rgb(59 130 246 / 1);
}
.text-sky {
  color: #79dcff;
}
.bg-black {
  background-color: #107aca;
}
@media screen and (max-width: 600px) {
  .bg {
    height: 450px;
  }
  .height {
    height: 80vh;
  }
}
</style>
<script>
// import rendezVous from "@/components/rendezVous.vue";
// import axios from "axios";
// import emailjs from "emailjs-com";
// import { homedir } from "os";
export default {
  // name: Accueil,
  components: {},
  methods: {
    rdv() {
      if (localStorage.length > 0) {
        console.log("exist");
      } else {
        this.$router.push({ name: "Create" });
      }
    },
  },
};
</script>
