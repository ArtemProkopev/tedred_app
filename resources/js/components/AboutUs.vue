<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";

import gif from "/resources/assets/images/end.gif";
</script>

<template>
    <header>
        <Header />
    </header>

    <main>
        <h2>TedRed is a small developer with big ambitions</h2>
        <h1>About us</h1>
        <section class="information">
            <p>TedRed — Creating games that you want to play over and over again

                We are TedRed, an independent game development studio with a passion for game design, narrative, and non—standard mechanics. Our team consists of passionate creators who believe that games are not just entertainment, but whole worlds filled with emotions, challenges and memorable moments.

                Our philosophy
                We love games that:
                Bring people together — whether it's a hilarious chaos in local multiplayer or a deep detective story that you want to discuss.
                Surprise with mechanics — unexpected turns, tricky maps and non-obvious solutions make each round unique.
                Tell stories — through dialogues, atmosphere, and game situations, we immerse players in new universes.</p>
            <img :src="gif" class="content-image">
            <p>Our projects
            Feed The Gods
            Casual card battler for 2-6 players
            Challenge your friends in a crazy competition where strategy and luck decide who will fall victim to the Hungry Deity. Use powerful cards, disrupt the plans of your opponents and try not to end up on his dining table!

            The Secret Ties of Strandcliff
            A detective story with elements of social manipulation
            You are the owner of a bar in a mysterious town where everyone is hiding something. Eavesdrop, collect dirt, bargain with visitors, and uncover dark secrets before they reveal yours.

            Why TedRed?
            ✔ Original concepts — we are not afraid to experiment.
            ✔ Lively, charismatic worlds — our games breathe atmosphere.
            The players are part of the story — your decisions really affect the outcome.

            We are just starting our journey, but we are already creating projects that we put our hearts into. Do you want to be a part of our game universes? Follow us — there's still a lot of interesting things ahead!</p>
        </section>
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

h2 {
    font-family: Molot;
    color: white;
    font-size: 36px;
    text-align: center;
    margin: 0;
    margin-top: 80px;
}

h1 {
    font-family: Molot;
    color: #FFC851;
    font-size: 58px;
    text-align: center;
    margin: 0;
}

p {
    font-family: Lexend;
    color: #B7B7B7;
    font-size: 13px;
    text-align: center;
    line-height: 1.6;
    margin: 15px 0;
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

.content-image {
    max-width: 100%;
    height: auto;
    margin: 20px 0;
    border-radius: 8px;
}

/* Медиазапросы для адаптивности */
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