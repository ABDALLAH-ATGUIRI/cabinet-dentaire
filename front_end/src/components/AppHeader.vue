<template>
  <Popover>
    <div class="header bg-white relative lg:p-4 sm:p-4 px-4 sm:px-6 lg:px-12">
      <nav
        class="relative flex items-center justify-between sm:h-10"
        aria-label="Global"
      >
        <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
          <div class="flex items-center justify-between w-full md:w-auto">
            <a href="#" id="ref">
              <span class="sr-only">Workflow</span>
              <img
                class="h-20 sm:h-20"
                alt="Vue logo"
                src="../assets/logo.png"
              />
            </a>
            <div class="-mr-2 flex items-center md:hidden">
              <PopoverButton class="">
                <span class="sr-only">Open main menu</span>
                <MenuIcon class="h-6 w-6" aria-hidden="true" />
              </PopoverButton>
            </div>
          </div>
        </div>
        <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
          <router-link to="/">Accueil</router-link>
          <router-link v-if="this.compte == 'Se déconnecter'" to="/Contact">
            <span>Réservez</span>
          </router-link>
          <router-link v-if="this.compte == 'Se déconnecter'" to="/Profil">
            <span>Mes rendez-vous</span>
          </router-link>
          <!-- <router-link >Create</router-link> -->
          <router-link v-if="this.compte == 'Se déconnecter'" to="">
            <span @click="logout()">{{ this.compte }}</span>
          </router-link>

          <router-link v-else to="/Create">
            <span>{{ this.compte }}</span>
          </router-link>

          <!-- <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"
            >Log in</a
          > -->
        </div>
      </nav>
    </div>

    <transition>
      <PopoverPanel
        focus
        class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
      >
        <div
          class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden"
        >
          <div class="px-7 bg-white-500 flex items-center justify-between">
            <div>
              <img
                class="h-20 sm:h-20"
                alt="Vue logo"
                src="../assets/logo.png"
              />
            </div>
            <div class="-mr-2">
              <PopoverButton
                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
              >
                <span class="sr-only">Close main menu</span>
                <XIcon
                  class="h-6 w-6"
                  aria-hidden="true"
                  @click="showPopUp = false"
                />
              </PopoverButton>
            </div>
          </div>

          <div class="h-48 p-5 flex flex-col items-center justify-evenly">
            <router-link to="/">Accueil</router-link>
            <router-link to="/Contact">Réservez</router-link>
            <router-link v-if="this.compte == 'Se déconnecter'" to="/Profil">
              <span>Mes rendez-vous</span>
            </router-link>
            <router-link v-if="this.compte == 'Se déconnecter'" to="">
              <span @click="logout()">{{ this.compte }}</span>
            </router-link>
            <router-link v-else to="/Create">
              <span>{{ this.compte }}</span>
            </router-link>
          </div>

          <!-- <a
            id="ref"
            href="#"
            class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100"
          >
            Log in
          </a> -->
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
</template>

<style lang="scss" scoped>
.bg-white {
  background-color: white;
}
#nav {
  display: flex;
  justify-content: space-evenly;
  width: 50%;
}

a {
  text-decoration-line: none;
  font-size: 18px;
  font-weight: bold;
  color: #2c3e50;

  &.router-link-exact-active {
    color: #40bbdb;
  }
}
</style>

<script>
// @ is an alias to /src
// import HelloWorld from "@/components/HelloWorld.vue";
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { MenuIcon, XIcon } from "@heroicons/vue/outline";

export default {
  name: "AppHeader",
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    MenuIcon,
    XIcon,
  },
  data() {
    return {
      compte: "",
    };
  },
  created() {
    this.popupShow();
  },
  methods: {
    popupShow() {
      if (localStorage["user-info"]) {
        this.compte = "Se déconnecter";
      } else {
        this.compte = "Connexion";
      }
    },
    logout() {
      localStorage.clear();
      // history.back()
      this.$router.push("/");
    },
  },
};
</script>
