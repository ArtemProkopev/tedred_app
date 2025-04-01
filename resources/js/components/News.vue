<script setup>
import NewsHeader from "./NewsHeader.vue";
import Footer from "./Footer.vue";
</script>

<template>
    <header>
        <NewsHeader />
    </header>

    <main>
        <article class="allCards">
            <section class="card">
                <div class="image">
                    <img src="@assets/images/news/new1.jpg" alt="News Image">
                </div>
                <div class="content">
                    <p class="main-title"><span>PLAY</span> FEED THE GODS <span>ON STEAM NEXT FEST!</span></p>
                    <p class="subtitle">Dear Cult Leaders!</p>
                    <p class="description">The demo version of our chaotic party card battler Feed The Gods is out and available right now!</p>    
                    <button class="cta-button" @click="handlePlayClick">SEE ALL</button>
                </div>
            </section>
            <section class="card">
                <div class="image">
                    <img src="@assets/images/news/new2.jpg" alt="News Image">
                </div>

                <div class="content">
                    <p class="main-title">FEED THE GODS <span>OUT NOW!</span></p>                    
                    <p class="subtitle">Dear Cultists!</p>
                    <p class="description">This day has finally come. Rise to greatness in Feed The Gods! Become a chosen mortal, a daring card-battler who braves the dark halls of forgotten dungeons, faces impossible odds, and earns divine favor by offering their spoils to the ever-hungry gods.</p>
                    <button class="cta-button" @click="handlePlayClick">SEE ALL</button>
                </div>
            </section>

            <section class="card">
                <div class="image">
                    <img src="@assets/images/news/new3.jpg" alt="News Image">
                </div>
                <div class="content">
                    <p class="main-title">FEED THE GODS <span>RELEASE DATE</span></p>
                    <p class="subtitle">Dear Cultists,</p>
                    <p class="description">The Ancient One stir, hungry for devotion and sacrifice. Feed The Gods emerges from the shadows, summoning you to prove your worth. On Friday The 13, the ritual begins—an easy-to-learn, yet unforgiving card battle experience steeped in the dread of dark dungeons and the echo of haunting chants.</p>
                    <button class="cta-button" @click="handlePlayClick">SEE ALL</button>
                </div>
            </section>

            <section class="card">
                <div class="image">
                    <img src="@assets/images/news/new4.jpg" alt="News Image">
                </div>
                <div class="content">
                    <p class="main-title">DEV DIARY #4 <span>- RELEASE DATE AND FUTURE PLANS!</span></p>
                    <p class="subtitle">Hello, Cult Leaders!</p>
                    <p class="description">The playtest has begun! You can conquer the dungeon now until Monday...</p>
                    <button class="cta-button" @click="handlePlayClick">SEE ALL</button>
                </div>
            </section>

            <section class="card">
                <div class="image">
                    <img src="@assets/images/news/new5.jpg" alt="News Image">
                </div>
                <div class="content">
                    <p class="main-title">THE PLAYTESTS <span>STARTS!</span></p> 
                    <p class="subtitle">Dear Cult Leaders!</p>
                    <p class="description">The demo version of our chaotic party card battler Feed The Gods is out and available right now!</p>
                    <button class="cta-button" @click="handlePlayClick">SEE ALL</button>
                </div>
            </section>
        </article>
    </main>

    <footer>
        <Footer />
    </footer>  
</template>

<script>
export default {
  methods: {
    handlePlayClick() {
      console.log('Redirect to Steam...')
    }
  }
}
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

.allCards {
    display: flex;
    flex-direction: column;
    margin-top: 70px;
    gap: 50px;
}

.card {
    position: relative; 
    display: flex;
    align-items: flex-start;
    height: 400px;
    padding: 32px;
    background: #1a1a1a;
    color: white;
    margin: 0 auto;
    font-family: 'Arial', sans-serif;
    width: 70%;
    background-image: url('@assets/images/news/cardback.jpg');
    background-size: cover; 
    background-position: center;
    box-shadow: 0px 10px 15px 0px rgba(0, 0, 0, 0.616); 
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.685); 
    z-index: 1; 
}

.card > * {
    position: relative; 
    z-index: 2; 
}

.main-title {
  font-size: 45px;
  margin-bottom: 24px;
  line-height: 1.3;
  font-family: Molot;
  text-transform: uppercase;
}

.content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 20px;
    text-align: left;
    height: 100%; 
}

.subtitle {
  font-size: 16px;
  margin: 0;
  font-family: Lexend;
}

span {
    color: #FFC851;
}

.description {
  font-size: 12px;
  line-height: 1.5;
  width: 70%;
  margin: 0;
  font-family: Lexend;
}

.cta-button {
    align-self: flex-end; 
    background-image: url('@assets/images/news/button.jpg');
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
}

.cta-button:hover {
  transform: scale(1.05);
}

.image {
    width: 300px;
    height: 300px;
    overflow: hidden;
    position: relative;
    margin-right: 32px;
    box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.616);
}

.image img {
    width: 100%; 
    height: auto; 
    position: absolute; 
    top: 50%; 
    left: 50%; 
    transform: translate(-50%, -50%);
}
</style>
