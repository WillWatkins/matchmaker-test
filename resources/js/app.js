import "./bootstrap";
import { createApp, h } from "vue";

import DownloadComponent from "./components/DownloadComponent.vue";

const app = createApp({
    render: () => h(DownloadComponent),
});

app.mount("#app");
