<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import { onMounted, ref } from "vue";

import newsimg from "/resources/assets/images/news/newsimage.png";

const newItems = ref([
    {
        title: "Feed The Gods out now!",
        date: "18 december, 2024",
        subtitle: "Dear Cult Leaders,",
        descriptionFirst:
            "Dead Cultists! This day has finally come. Rise to greatness in Feed The Gods! Become a chosen mortal, a daring card-battler who braves the dark halls of forgotten dungeons, faces impossible odds, and earns divine favor by offering their spoils to the ever-hungry gods. This time, you'll be joining this epic clans to get your victory: Children of Growth - forest dwellers, whose masks and rituals reflect a connection to ancient spirits. Chained Brotherhood - treacherous monks cursed by their deity for their unquenchable bloodlust. Seaweed Bloaters - benevolent fishmen, who want to return to the shore and become human again. Knights of Hedone - fearless knights, nobly defending people from the evil gods. Mistresses of Inner Sight - a coven of witches bravely rising up against oppression and injustice. Witnesses of Rock - stone spirits imbued with the mysterious magic of unknown worlds. The Ancient - the ravenous hungry Ancient Deity. Dangerous and deadly.",
        image: newsimg,
        descriptionSecond: "With a team of heroes ready to rise to the challenge, Feed The Gods combines: A fast and accessible card-battling system that rewards bold strategies. A rich, hand-painted art style inspired by shadowy dungeons and forgotten relics. Atmospheric soundscapes and immersive audio, crafted to draw you deeper into the gods' world. What are you waiting for? Answer the call of the divine! Master your deck, defeat other challengers, and deliver the ultimate tribute to appease the gods themselves. PS: Offerings are non-refundable. May the gods favor you… or consume you. PPS: if you encounter any bugs/typos or want to share you feedback - don't hesitate to join our Discord or ping us in Discussions!"
    }
]);
</script>

<template>
    <header>
        <Header />
    </header>

    <section class="news">
            <div
                class="new-item"
                v-for="(game, index) in newItems"
                :key="index"
            >
                <section class="new-content">
                    <section class="highPartNew">
                        <div class="new-image">
                            <h3 class="newsTitle">{{ game.title }}</h3>
                            <p id="date">Date of publiction: {{ game.date }}</p>
                            <div class="information">
                                <p>{{ game.descriptionFirst }}</p>
                                <div class="image-container">
                                    <img :src="game.image" :alt="game.title" />
                                </div>
                                <p>{{ game.descriptionSecond }}</p>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </section>

    <main>

    </main>

    <footer>
        <Footer />
    </footer>  
</template>

<script>
</script>

<style scoped>
@font-face {
    font-family: Molot;
    src: url("@assets/fonts/Molot.woff");
}
@font-face {
    font-family: Lexend;
    src: url("@assets/fonts/LexendExa-Regular.woff");
}

#date {
    color: #6D6D6D;
}

p {
    font-family: Lexend;
    color: #B7B7B7;
    font-size: 13px;
    text-align: center;
    line-height: 1.6;
    margin: 15px 0;
}

.image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}

.image-container img {
    width: 75%;
    margin: 0;
    padding: 40px;
}

.information {
    max-width: 60%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    padding: 20px 0;
}

.newsTitle {
    font-family: Molot;
    font-size: 40px;
    letter-spacing: 0.1rem;
    margin: 0;
    color: white;
    padding: 0;
    word-wrap: break-word;
    margin-top: 30px;
    text-align: center;
}

@media (max-width: 1200px) {
    .information {
        max-width: 70%;
    }
}

@media (max-width: 992px) {
    h1 {
        font-size: 48px;
    }
    
    h2 {
        font-size: 32px;
    }
    
    .information {
        max-width: 80%;
    }

    .image-container img {
        padding: 0;
    }
}

@media (max-width: 768px) {
    h1 {
        font-size: 40px;
    }
    
    h2 {
        font-size: 28px;
        margin-top: 60px;
    }
    
    .information {
        max-width: 90%;
    }
    
    p {
        font-size: 12px;
    }
}

@media (max-width: 576px) {
    h1 {
        font-size: 32px;
    }
    
    h2 {
        font-size: 24px;
        margin-top: 40px;
    }
    
    .information {
        max-width: 95%;
    }
    
    p {
        font-size: 11px;
        text-align: left;
    }

    #date {
        text-align: center;
    }
}

@media (max-width: 400px) {
    h1 {
        font-size: 28px;
    }
    
    h2 {
        font-size: 20px;
    }
    
    p {
        font-size: 10px;
    }
}
</style>