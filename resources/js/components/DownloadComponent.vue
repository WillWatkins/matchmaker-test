<template>
    <div>
        <h1>MatchMaker task</h1>
        <div class="cont_flex">
            <h2>Post data</h2>
            <button @click="addData(data1)">Add Data 1</button>
            <button @click="addData(data2)">Add Data 2</button>
        </div>
        <div class="cont_flex">
            <h2>Daily download data</h2>
            <button @click="getDailyDownloadsByEpisodeId(1)">
                Daily download data for episode 1
            </button>
            <button @click="getDailyDownloadsByEpisodeId(2)">
                Daily download data for episode 2
            </button>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            data1: {
                type: "episode.downloaded",
                event_id: "1234",
                occurred_at: "2022-08-04 15:00:00",
                data: {
                    episode_id: "1",
                    podcast_id: "1",
                },
            },
            data2: {
                type: "episode.downloaded",
                event_id: "5678",
                occurred_at: "2022-08-04 15:00:00",
                data: {
                    episode_id: "2",
                    podcast_id: "2",
                },
            },
        };
    },
    methods: {
        addData(data) {
            axios.get(route("storeData", data)).then(({ data }) => {
                console.log(data);
            });
        },
        getDailyDownloadsByEpisodeId(episode_id) {
            axios
                .get(route("dailyDownloads", { episode_id }))
                .then(({ data }) => {
                    console.log(data);
                });
        },
    },
};
</script>
<style>
.cont_flex {
    display: flex;
    flex-direction: column;
}

button {
    width: 5rem;
    margin: 1rem;
}
</style>
