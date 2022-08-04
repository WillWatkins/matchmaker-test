import "./bootstrap";
import { createApp, h } from "vue";

import Comp from "./components/ex.vue";

const app = createApp({
    render: () => h(Comp),
});

app.mount("#app");
