<script setup>
import Header from "./Header.vue";
import { RouterView } from "vue-router";
</script>

<template>
    <div>
        <Header />
        <main>
            <RouterView />
        </main>
    </div>
</template>

<style scoped>
main {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: black;
    background-image: url("@assets/images/back.png");
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>
