<template>
  <nav class=" w-full z-50">
    <app-header />
  </nav>
  <router-view />
  <footer>
    <app_footer />
  </footer>
</template>

<script>
import AppHeader from "@/components/AppHeader.vue";
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { MenuIcon, XIcon } from "@heroicons/vue/outline";
import AppFooter from "@/components/AppFooter.vue";

export default {
  name: "App",
  components: {
    AppHeader,
    AppFooter,
  },
};
</script>

<style lang="scss">
nav {
  max-width: 100vw;
  padding: 10px;
}
</style>
