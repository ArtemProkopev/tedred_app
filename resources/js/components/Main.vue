<script setup>
import { Splide } from "@splidejs/splide";
import "@splidejs/splide/dist/css/splide.min.css";
import { onMounted, ref } from "vue";
import Footer from "./Footer.vue";
import Header from "./Header.vue";

import gameimg from "../../assets/images/main/gamescard/gameimg.png";
import title1 from "../../assets/images/main/gamescard/title1.png";
import steam from "../../assets/images/steam.svg";

const newsItems = ref([
    {
        title: "Feed The Gods out now!",
        description:
            "This day has finally come. Rise to greatness in Feed The G...",
        image: title1,
    },
    {
        title: "Feed The Gods Release Date",
        description: "The Ancient One stir, hungry for devotion and sacrifi...",
        image: title1,
    },
    {
        title: "Dev Diary #4 - Release Date and future plans!",
        description: "Wow, Its been a long time since we have been in tou...",
        image: title1,
    },
    {
        title: "The Playtests starts!",
        description:
            "Visit the Feed The Gods Steam store page starting today...",
        image: title1,
    },
    {
        title: "Play FEED THE GODS on Steam Next Fest!",
        description:
            "The demo version of our chaotic party card battler Feed The Gods...",
        image: title1,
    },
]);

const gameItems = ref([
    {
        title: "Feed The Gods",
        description:
            "Feed The Gods is a casual card battler for 2-6 players. In this chaotic game, you and your friends will use powerful cards to win.",
        image: gameimg,
    },
    {
        title: "The Secret Ties of Strandcliff",
        description:
            "A detective game where you have to play with information while being a successful ram. Communicate with visitors to your establishment, eavesdrop on their conversations, collect information.",
        image: gameimg,
    },
    {
        title: "Feed The Gods",
        description:
            "Feed The Gods is a casual card battler for 2-6 players. In this chaotic game, you and your friends will use powerful cards to win.",
        image: gameimg,
    },
]);

onMounted(() => {
    const splideElement = document.querySelector(".splide");
    if (splideElement) {
        new Splide(splideElement, {
            type: "loop",
            height: "9rem",
            trimSpace: "move",
            perPage: 3,
            start: 0,
            pagination: false,
            classes: {
                arrows: "splide__arrows custom-arrows",
                arrow: "splide__arrow custom-arrow",
                prev: "splide__arrow--prev custom-prev",
                next: "splide__arrow--next custom-next",
            },
            breakpoints: {
                640: {
                    height: "6rem",
                },
            },
        }).mount();
    }
});
</script>

<template>
    <header>
        <Header />
    </header>
    <main>
        <section class="mainTitleBlock">
            <section class="title-wrapper">
                <p class="quote quote-left">"</p>
                <div class="title-content">
                    <p class="mainTitleText">
                        <span>TedRed</span> is a small developer with big
                        ambitions
                    </p>
                    <p class="supportMainTitleText">
                        We make games that spark your imagination like the games
                        you played as a kid.
                    </p>
                </div>
                <p class="quote quote-right">"</p>
            </section>
        </section>

        <p class="titleText">News</p>
        <section class="splide" aria-label="Slide Container Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li
                        class="splide__slide"
                        v-for="(item, index) in newsItems"
                        :key="index"
                    >
                        <div class="splide__slide__container">
                            <img :src="item.image" :alt="item.title" />
                        </div>
                        <h3 class="splideTitle">{{ item.title }}</h3>
                        <p class="splideDescription">{{ item.description }}</p>
                    </li>
                </ul>
            </div>
        </section>

        <section class="games">
            <h2 class="titleText">Our <span>games</span></h2>
            <div
                class="game-item"
                v-for="(game, index) in gameItems"
                :key="index"
            >
                <div class="game-content">
                    <div class="game-image">
                        <img :src="game.image" :alt="game.title" />
                    </div>
                    <div class="game-text">
                        <h3 class="gamesTitle">{{ game.title }}</h3>
                        <p class="gamesDescription">{{ game.description }}</p>
                        <p class="available">Available on</p>
                        <img :src="steam" alt="Steam" class="steam-logo" />
                    </div>
                </div>
                <button @click="viewGame(index)" class="pageButton">
                    Game page
                </button>
            </div>
        </section>
    </main>

    <footer>
        <Footer />
    </footer>
</template>

<style scoped>
@font-face {
    font-family: Lexend;
    src: url("@assets/fonts/LexendExa-Regular.woff");
}
@font-face {
    font-family: Molot;
    src: url("@assets/fonts/Molot.woff");
}

main {
    display: block;
    font-family: Lexend;
    color: white;
    background-color: #1a1a1a;
    padding: 20px;
}

.mainTitleBlock {
    text-align: center;
    margin-top: 8%;
    position: relative;
}

.title-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.mainTitleBlock .mainTitleText {
    font-size: 2.7rem;
    font-family: Molot;
    margin: 0;
    line-height: 1.2;
}

.mainTitleBlock .mainTitleText span {
    color: #ffc851;
}

.mainTitleBlock .supportMainTitleText {
    font-size: 1.2rem;
    color: #8f8f8f;
    margin-top: 1rem;
}

.quote {
    font-size: 128px;
    color: #afafaf;
    line-height: 0.5;
    margin: 0;
}

.quote-left {
    margin-right: 10px;
    margin-bottom: 50px;
}

.quote-right {
    margin-left: 10px;
    margin-top: 100px;
}

.titleText {
    font-family: Molot;
    font-size: 64px;
    text-align: center;
    margin: 40px 0;
}

.titleText span {
    color: #ffc851;
}

.game-item {
    background-color: #2a2a2a;
    margin: 20px auto;
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 1000px;
    display: flex;
    flex-direction: column;
    position: relative;
}

.game-content {
    display: flex;
    flex: 1;
    gap: 30px;
}

.game-image {
    width: 240px;
    min-width: 240px;
    height: 320px;
    background-color: #3a3a3a;
    border-radius: 8px;
    overflow: hidden;
}

.game-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.game-text {
    flex: 1;
    text-align: left;
}

.pageButton {
    position: absolute;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #ffc851;
    color: #1a1a1a;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}

.games {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 50px;
    margin: 100px 0;
}

.gamesTitle {
    font-family: Molot;
    font-size: 36px;
    letter-spacing: 0.1rem;
    margin-bottom: 15px;
}

.gamesDescription {
    font-size: 15px;
    color: #bab8b8;
    margin-bottom: 20px;
    line-height: 1.6;
}

.available {
    font-size: 24px;
    margin-bottom: 10px;
}

.steam-logo {
    height: 40px;
    width: auto;
}

.splide {
    position: relative;
    margin: 20px auto;
    max-width: 1200px;
    margin-top: 60px;
}

.splide__slide {
    background: rgba(0, 0, 0, 0.8);
    padding: 20px;
    color: white;
    text-align: center;
    transition: transform 0.3s;
    max-width: 380px;
    border-radius: 10px;
    margin: 0 10px;
}

.splide__slide:hover {
    transform: scale(1.05);
}

.splide__slide img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
}

.custom-arrow {
    background: transparent;
    border: none;
    transform: translateY(-50%);
}

.custom-prev {
    left: -50px !important;
}

.custom-next {
    right: -50px !important;
}

.splideTitle {
    font-family: Molot;
    font-size: 20px;
    letter-spacing: 0.1rem;
    margin-bottom: 10px;
}

.splideDescription {
    font-size: 14px;
    color: #8e8e8e;
    line-height: 1.5;
}

@media (max-width: 768px) {
    .quote {
        font-size: 64px;
    }

    .title-wrapper {
        gap: 10px;
        flex-direction: column;
    }

    .game-content {
        flex-direction: column;
    }

    .game-image {
        width: 100%;
        height: 200px;
    }

    .splide__slide {
        max-width: 280px;
    }
}

@media (max-width: 480px) {
    .mainTitleBlock .mainTitleText {
        font-size: 2rem;
    }

    .titleText {
        font-size: 48px;
    }

    .gamesTitle {
        font-size: 28px;
    }
}
</style>
