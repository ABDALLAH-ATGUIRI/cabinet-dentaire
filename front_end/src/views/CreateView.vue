<template>

  <div class="flex font-mono" >

    <div class="self-end mx-auto">
      <div class="flex justify-center px-6 my-12">

        <div class="w-full xl:w-5/4 lg:w-11/12 flex">

          <div
            class="w-full hidden lg:block lg:w-3/5 bg-cover shadow-lg rounded-l-lx"
          >
            <img
              src="../assets/AdobeStock_195180997.jpeg"
              class="rounded-l-2xl lg:h-full"
              alt=""
            />
          </div>
          <!-- Col -->
          <div
            class="w-full flex snap-always lg:w-2/5 bg-white rounded-lg lg:rounded-l-none"
          >
            <!-- <div id="form">
             <div v-html="log"></div>
            </div> -->

            <div class="w-full">
              <Connexion />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Connexion from "@/components/Connexion.vue";


export default {
  name: "App",
   ShowDiv: 1,
  components: {
    Connexion,

  },
  data() {
    return {
     
    };
  },
  methods: {
    
  },
};
</script>
