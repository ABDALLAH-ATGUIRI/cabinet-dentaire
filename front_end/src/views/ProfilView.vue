<template>
  <div
    id="component"
    class="flex h-screen flex-col items-center w-full lg:mt-24"
  >
    <Crenus v-bind:date='dates' v-for='dates in dates'  :key='dates.id' > </Crenus>
  </div>
</template>
<style>
.botts {
  color: white;
}

#Annuler {
  background-color: red;
}
#Annuler:hover {
  background-color: rgb(222, 20, 20);
}
#Modifier {
  background-color: rgb(46, 172, 255);
}
#Modifier:hover {
  background-color: rgb(17, 142, 225);
}
</style>
<script>
import axios from "axios";
import Crenus from "@/components/Crenus.vue";

export default {
  name: "",
  components: {
    Crenus,
  },
  data() {
    return {
      dates: [],
      date: {},
      cop: true,
      sujet: "",
    };
  },
beforeMount()
{

},
  mounted() {
   
    
    this.getAll();
  },

  methods: {
    getAll() {
      axios
        .post("http://dentaire.local/Reserve/getAll", {
          id: localStorage["Id_user"],
        })
        .then((response) => (this.dates = response.data))
        .catch((error) => console.log(error));
    },
  },
};
</script>
