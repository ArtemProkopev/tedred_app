<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";

import gameimg from "/resources/assets/images/main/gameimg.png";
import gamegif from "/resources/assets/images/gamepage/gamegif.gif";
</script>

<template>
    <header>
        <Header />
    </header>

    <main>
        <section class="container">
            <section class="firstInfo">
                <img :src="gameimg" alt="Game Image" class="game-image" />
                <div class="game-description">
                    <h1 class="title">About <span>game</span></h1>
                    <p class="textDescription">
                        Feed The Gods is a casual card battler for 2-6 players. In this chaotic game, you and your friends will use powerful cards to win. 
                        Try not to be eaten by the Hungry Ancient Deity and feed him with your.
                    </p>
                    <h2 class="subtitle">BECOME A TERRIFYING CULT LEADER!</h2>
                    <p class="textDescription">
                        Today the following are the Water Followers of the Knights of Hedon... It doesn't matter! 
                        Your figurative cultivation The main thing is to be above everyone else! But be vigilant, you are not the only one so smart - there are other leaders.
                    </p>
                </div>
            </section>
            <section class="secondInfo">
                <img :src="gamegif" alt="Game Gif" />
                <p class="quote quote-left">“</p>
                <div class="content">
                    <h2 class="subtitle">DIVE INTO THE DARKNESS OF<br>THE TOWER OF BLACK FATE</h2>
                    <p class="textDescription">
                        Use the cards to help your devoted servant survive. And the rest - send their stupid accomplices to the very bottom of the pit!
                    </p>
                </div>
                <p class="quote quote-right">”</p>
                <h2 class="title">WELL, MOST IMPORTANTLY... <span>FEED THE GODS!</span></h2>
            </section>
        </section>

        <section class="gallery">
            <h3 class="galleryTitle">Game picture gallery</h3>
                <div class="slider-wrapper">
                    <div class="slider-container">
                    <div class="slider-inner" :style="sliderInnerStyle">
                        <div 
                        v-for="(slide, index) in chunkedSlides" 
                        :key="index" 
                        class="slide"
                        >
                        <img
                            v-for="(image, imgIndex) in slide"
                            :key="imgIndex"
                            :src="image.src"
                            class="slide-image"
                            @click="openModal(image)"
                        >
                        </div>
                    </div>
                    </div>

                    <button 
                    class="slider-button prev"
                    @click="prevSlide"
                    :disabled="currentSlide === 0"
                    >
                    <img :src="prevarrow" alt="" />
                    </button>
                    <button
                    class="slider-button next"
                    @click="nextSlide"
                    :disabled="currentSlide >= chunkedSlides.length - 1"
                    >
                    <img :src="nextarrow" alt="" />
                    </button>

                    <div v-if="isModalOpen" class="modal-overlay" @click.self="closeModal">
                    <div class="modal-content">
                        <button class="modal-close" @click="closeModal">×</button>
                        <img :src="selectedImage.src" class="modal-image">
                    </div>
                    </div>
                </div>
        </section>

        <h2 class="subtitle" id="reviews">Reviews from people</h2>

        <section class="allReviews">
            <section class="reviewsSection">
                <div class="left-section">
                <div class="avatar-circle"></div>
                <p class="name">Name TwoName</p>
                </div>
                <div class="right-section">
                <p class="review-text">
                    I recently dove into the enchanting world of "Elysium Chronicles," and I must say, 
                    it has been an unforgettable experience! From the moment I launched the game, 
                    I was greeted with breathtaking visuals that transported me to a vibrant realm 
                    filled with lush forests, towering mountains, and shimmering lakes. 
                    The attention to detail is astounding; every leaf rustling in the wind feels alive!
                </p>
                </div>
            </section>

            <section class="reviewsSection">
                <div class="left-section">
                <div class="avatar-circle"></div>
                <p class="name">Name TwoName</p>
                </div>
                <div class="right-section">
                <p class="review-text">
                    I recently dove into the enchanting world of "Elysium Chronicles," and I must say, 
                    it has been an unforgettable experience! From the moment I launched the game, 
                    I was greeted with breathtaking visuals that transported me to a vibrant realm 
                    filled with lush forests, towering mountains, and shimmering lakes. 
                    The attention to detail is astounding; every leaf rustling in the wind feels alive!
                </p>
                </div>
            </section>

        </section>

        <section class="steam">
            <h2 class="subtitle">You can purchase it now on Steam!</h2>
            <img :src="steam">
        </section>
    </main>

    <footer>
        <Footer />
    </footer>  
</template>

<script>
import steam from "/resources/assets/images/gamepage/steam.png";
import gallery1 from "/resources/assets/images/gamepage/gallery1.jpg";
import gallery3 from "/resources/assets/images/gamepage/gallery3.jpg";
import gallery2 from "/resources/assets/images/gamepage/gallery2.jpg";
import gallery4 from "/resources/assets/images/gamepage/gallery4.jpg";
import gallery5 from "/resources/assets/images/gamepage/gallery5.png";
import gallery6 from "/resources/assets/images/gamepage/gallery6.gif";
import gallery7 from "/resources/assets/images/gamepage/gallery7.png";
import gallery8 from "/resources/assets/images/gamepage/gallery8.png";
import galleryback from "/resources/assets/images/gamepage/galleryback.png";
import nextarrow from "/resources/assets/images/main/nextarrow.svg";
import prevarrow from "/resources/assets/images/main/prevarrow.svg";

export default {
  data() {
    return {
      images: [
        { src: gallery1 },
        { src: gallery3 },
        { src: gallery2 },
        { src: gallery4 },
        { src: gallery5 },
        { src: gallery6 },
        { src: gallery7 },
        { src: gallery8 },
      ],
      currentSlide: 0,
      isModalOpen: false,
      selectedImage: null
    };
  },
  computed: {
    chunkedSlides() {
      const chunkSize = 6;
      return Array.from(
        { length: Math.ceil(this.images.length / chunkSize) },
        (_, i) => this.images.slice(i * chunkSize, i * chunkSize + chunkSize)
      );
    },
    sliderInnerStyle() {
      return {
        transform: `translateX(-${this.currentSlide * 100}%)`,
        transition: 'transform 0.3s ease'
      };
    }
  },
  methods: {
    prevSlide() {
      if (this.currentSlide > 0) this.currentSlide--;
    },
    nextSlide() {
      if (this.currentSlide < this.chunkedSlides.length - 1) this.currentSlide++;
    },
    openModal(image) {
      this.selectedImage = image;
      this.isModalOpen = true;
    },
    closeModal() {
      this.isModalOpen = false;
      this.selectedImage = null;
    }
  }
};
</script>

<style scoped>
@font-face {
    font-family: Lexend;
    src: url("@assets/fonts/LexendExa-Regular.woff");
}
@font-face {
    font-family: Molot;
    src: url("@assets/fonts/Molot.woff");
}

.container {
  color: #fff;
  font-family: Lexend;
  padding: 20px;
  text-align: center;
  margin-top: 50px;
}

.title {
  font-size: 40px;
  color: rgb(255, 255, 255);
  font-family: Molot;
  letter-spacing: 0.1rem;
}

.subtitle {
  font-size: 32px;
  font-family: Molot;
  color: white;
  text-align: center;
}

#reviews {
    margin-top: 100px;
}

.gallery {
    background-image: url("/resources/assets/images/gamepage/galleryback.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 10px 0;
}

.galleryTitle {
    font-size: 28px;
    font-family: Molot;
    color: white;
    text-align: center;
    letter-spacing: 0.1rem;
}

.textDescription {
    color: #8f8f8f;
}

.game-image {
  height: auto;
  margin: 20px 0;
}

.firstInfo {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center; 
    margin: 0 auto;
    max-width: 55%;
}

span {
    color: #ffc851;
}

.game-description {
    text-align: left; 
    margin-left: 20px; 
}

.secondInfo {
    position: relative;
    max-width: 60%;
    margin: 0 auto;
    padding: 40px 0;
}

.quote {
    font-size: 128px;
    color: #5a5a5a;
    line-height: 1;
    margin: 0;
    position: absolute;
}

.quote-left {
    left: -60px;
    top: 50%;
    transform: translateY(-48%);
}

.quote-right {
    right: -60px;
    top: 40%;
}

.slider-wrapper {
    z-index: 2;
    position: relative;
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 40px;
}

.slider-container {
  overflow: hidden;
  border-radius: 8px;
}

.slider-inner {
  display: flex;
}

.slide {
  flex-shrink: 0;
  width: 100%;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
  padding: 10px;
  box-sizing: border-box;
}

.slide-image {
  width: 100%;
  object-fit: cover;
  border-radius: 4px;
  cursor: pointer;
  transition: transform 0.2s;
}

.slide-image:hover {
  transform: scale(1.02);
}

.slider-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    height: 40px;
    border: none;
    font-size: 20px;
    cursor: pointer;
    background: rgba(255, 200, 81, 0);
    border: none;
    color: white;
    transition: all 0.3s ease;
}


.slider-button.prev {
  left: 0;
}

.slider-button.next {
  right: 0;
}

.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.9);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal-content {
  position: relative;
  max-width: 90%;
  max-height: 90%;
}

.modal-image {
  max-width: 100%;
  max-height: 80vh;
  border-radius: 8px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}

.modal-close {
  position: absolute;
  top: -40px;
  right: -40px;
  background: none;
  border: none;
  color: white;
  font-size: 40px;
  cursor: pointer;
  transition: color 0.2s;
}

.modal-close:hover {
  color: #ccc;
}

.steam {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    flex-direction: column;
    margin-top: 50px;
}

.steam img {
    cursor: pointer;
}

.reviewsSection {
  width: 1000px;
  height: 200px;
  display: flex;
  align-items: center;
  margin: 0 auto;
  gap: 30px;
  padding: 20px;
  background-image: url("@assets/images/gamepage/reviewsback.png");
  background-size: cover;
  background-position: center;
  color: white;
  font-family: Lexend;
}

.left-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  min-width: 120px;
}

.avatar-circle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background-color: #e0e0e0;
  margin-bottom: 10px;
  background-image: url("@assets/images/logo.png");
  background-position: center;
}

.name {
  margin: 0;
  font-size: 14px;
  text-align: center;
  font-weight: 500;
}

.right-section {
  flex-grow: 1;
}

.review-text {
  margin: 0;
  font-size: 14px;
  line-height: 1.5;
  text-align: left;
  overflow-wrap: break-word;
}

.allReviews {
    display: flex;
    flex-direction: column;
    gap: 30px;
}
</style>
