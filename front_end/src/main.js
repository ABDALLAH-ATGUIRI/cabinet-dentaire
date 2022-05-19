import { createApp } from "vue";
import { createStore } from "vuex";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./scss/main.scss";

// createStore(App).use(vuex);
createApp(App).use(store).use(router).mount("#app");

new Vue({
  store: store,
  render: (h) => h(App),
}).$mount("#app");
