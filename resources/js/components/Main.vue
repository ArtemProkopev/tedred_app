<script setup>
import { Splide } from "@splidejs/splide";
import "@splidejs/splide/dist/css/splide.min.css";
import { onMounted, ref } from "vue";
import Footer from "./Footer.vue";
import Header from "./Header.vue";

import gameimg from "/resources/assets/images/main/gameimg.png";
import nextarrow from "/resources/assets/images/main/nextarrow.svg";
import prevarrow from "/resources/assets/images/main/prevarrow.svg";
import steam from "/resources/assets/images/main/steam.png";
import title1 from "/resources/assets/images/main/title1.png";
import title2 from "/resources/assets/images/main/title2.png";
import title3 from "/resources/assets/images/main/title3.png";

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
        image: title2,
    },
    {
        title: "Dev Diary #4 - Release Date and future plans!",
        description: "Wow, Its been a long time since we have been in tou...",
        image: title3,
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
        const splide = new Splide(splideElement, {
            type: "loop",
            height: "9rem",
            trimSpace: "move",
            perPage: 3,
            start: 0,
            pagination: false,
            arrows: false,
            breakpoints: {
                640: {
                    height: "6rem",
                },
            },
        }).mount();

        document
            .querySelector(".custom-prev")
            ?.addEventListener("click", () => splide.go("<"));
        document
            .querySelector(".custom-next")
            ?.addEventListener("click", () => splide.go(">"));
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

        <div class="slider-container">
            <button class="custom-arrow custom-prev">
                <img :src="prevarrow" alt="" />
            </button>

            <section class="splide" aria-label="News slider">
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
                            <p class="splideDescription">
                                {{ item.description }}
                            </p>
                        </li>
                    </ul>
                </div>
            </section>

            <button class="custom-arrow custom-next">
                <img :src="nextarrow" alt="" />
            </button>
        </div>

        <section class="games">
            <h2 class="titleText">Our <span>games</span></h2>
            <div
                class="game-item"
                v-for="(game, index) in gameItems"
                :key="index"
            >
                <section class="game-content">
                    <section class="highPartGame">
                        <div class="game-image">
                            <img :src="game.image" :alt="game.title" />
                        </div>
                        <div class="game-text">
                            <h3 class="gamesTitle">{{ game.title }}</h3>
                            <p class="gamesDescription">
                                {{ game.description }}
                            </p>
                            <p class="available">Available on</p>
                            <img :src="steam" alt="Steam" class="steam-logo" />
                        </div>
                    </section>
                    <router-link to="/gamepage"><button class="cta-button" @click="handlePlayClick">
                      Game page
                    </button></router-link>
                </section>
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
}

.mainTitleBlock .mainTitleText {
    font-size: 2.7rem;
    font-family: Molot;
    margin: 0;
}

.mainTitleBlock .mainTitleText span {
    color: #ffc851;
}

.mainTitleBlock .supportMainTitleText {
    font-size: 1.2rem;
    color: #8f8f8f;
}

.quote {
    font-size: 128px;
    color: #afafaf;
    line-height: 0.5;
    margin: 0;
}

.quote-left {
    float: left;
    margin-right: 10px;
    margin-bottom: 50px;
}

.quote-right {
    float: right;
    margin-left: 10px;
    margin-top: 100px;
}

.titleText {
    font-family: Molot;
    font-size: 64px;
    text-align: center;
}

.games {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 50px;
    margin-top: 100px;
}

.games span {
    color: #ffc851;
}

.game-item {
    background-color: #ccc;
    margin: 0 10px;
    padding: 10px;
    border-radius: 5px;
    width: 60%;
    height: 400px;
    display: flex;
    flex-direction: column;
    position: relative;
    background: #1a1a1a;
    background-image: url("@assets/images/news/cardback.jpg");
    background-size: cover;
    background-position: center;
    box-shadow: 0px 10px 15px 0px rgba(0, 0, 0, 0.616);
}

.game-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.685);
    z-index: 1;
}

.game-item > * {
    position: relative;
    z-index: 2;
}

.game-content {
    display: flex;
    align-items: center;
    flex: 1;
}

.highPartGame {
    display: flex;
    gap: 20px;
}

.game-image {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
}

.game-text {
    flex: 1;
}

.gamesTitle {
    font-family: Molot;
    font-size: 36px;
    letter-spacing: 0.1rem;
}

.gamesDescription {
    font-size: 15px;
    color: #bab8b8;
    width: 400px;
}

.available {
    font-size: 24px;
}

.cta-button {
    align-self: flex-end;
    background-image: url("@assets/images/news/button.jpg");
    background-size: cover;
    color: white;
    border: none;
    width: 150px;
    height: 37px;
    font-size: 18px;
    cursor: pointer;
    transition: transform 0.2s;
    font-family: Molot;
    text-align: center;
    margin-bottom: 10px;
    margin-right: 10px;
}

.cta-button:hover {
    transform: scale(1.05);
}

/* Стили для слайдера */
.slider-container {
    position: relative;
    max-width: 1000px;
    margin: 100px auto;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.splide {
    width: 100%;
    flex: 1;
    margin: 0 auto;
}

.splide__slide {
    background: rgba(0, 0, 0, 0.8);
    padding: 20px;
    color: white;
    text-align: center;
    transition: transform 0.3s;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.splide__slide img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 10px;
}

.splideTitle {
    font-family: Molot;
    letter-spacing: 0.1rem;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    margin-top: 40px;
}

.splideDescription {
    font-size: 0.9rem;
    color: #ccc;
}

.custom-arrow {
    background: rgba(255, 200, 81, 0);
    border: none;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    flex-shrink: 0;
    padding: 0;
}

.custom-arrow:hover {
    transform: scale(1.5);
}

.custom-arrow svg {
    width: 24px;
    height: 24px;
}

/* Адаптивные стили */
@media (max-width: 1100px) {
    .slider-container {
        max-width: 90%;
    }
}

@media (max-width: 768px) {
    .slider-container {
        margin: 50px auto;
    }

    .custom-arrow {
        width: 40px;
        height: 40px;
    }

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
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .custom-arrow {
        width: 35px;
        height: 35px;
    }

    .mainTitleBlock .mainTitleText {
        font-size: 2rem;
    }

    .titleText {
        font-size: 48px;
    }

    .gamesTitle {
        font-size: 28px;
    }

    .custom-arrow svg {
        width: 20px;
        height: 20px;
    }
}
</style>
