<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import { onMounted, ref } from "vue";
import { supabase } from "../supabase";

const newItems = ref([]);
const isLoading = ref(true);
const error = ref(null);

onMounted(async () => {
    try {
        const { data, error: supabaseError } = await supabase
            .from("news")
            .select("*")
            .order("created_at", { ascending: false });
        if (supabaseError) throw supabaseError;

        newItems.value = data.map((item) => ({
            ...item,
            image: item.image_url
                ? `/storage/${item.image_url}`
                : "/resources/assets/images/main/gameimg.png",
            subtitle: item.subtitle || "Dear Cult Leaders,",
            description: item.description_first || "",
        }));
    } catch (err) {
        error.value = err.message;
        console.error("Error loading news:", err);
    } finally {
        isLoading.value = false;
    }
});

const handlePlayClick = () => {
    console.log("Redirect to news page...");
};
</script>

<template>
    <header>
        <Header />
    </header>
    <main>
        <section class="news">
            <div v-if="isLoading" class="loading-state">Loading news...</div>
            <div v-else-if="error" class="error-state">
                Error loading news: {{ error }}
            </div>
            <div
                class="new-item"
                v-for="(news, index) in newItems"
                :key="index"
                v-else
            >
                <section class="new-content">
                    <section class="highPartNew">
                        <div class="new-image">
                            <div class="image-container">
                                <img :src="news.image" :alt="news.title" />
                            </div>
                        </div>
                        <div class="new-text">
                            <h3 class="newsTitle">{{ news.title }}</h3>
                            <p class="subtitle" v-if="news.subtitle">
                                {{ news.subtitle }}
                            </p>
                            <p class="newsDescription">
                                {{ news.description }}
                            </p>
                            <div class="button-container">
                                <router-link :to="`/newspage/${news.id}`">
                                    <button
                                        class="cta-button"
                                        @click="handlePlayClick"
                                    >
                                        See all
                                    </button>
                                </router-link>
                            </div>
                        </div>
                    </section>
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
    font-family: Molot;
    src: url("@assets/fonts/Molot.woff");
}
@font-face {
    font-family: Lexend;
    src: url("@assets/fonts/LexendExa-Regular.woff");
}

.loading-state,
.error-state {
    color: white;
    font-family: Lexend;
    font-size: 18px;
    text-align: center;
    padding: 40px;
}

.error-state {
    color: #ff6b6b;
}

.news {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 50px;
    margin-top: 100px;
    padding: 0 20px;
    width: 100%;
    box-sizing: border-box;
}

.new-item {
    background-color: #ccc;
    padding: 20px;
    border-radius: 5px;
    width: 100%;
    max-width: 70%;
    min-height: 400px;
    display: flex;
    flex-direction: column;
    position: relative;
    background: #1a1a1a;
    background-image: url("@assets/images/news/cardback.jpg");
    background-size: cover;
    background-position: center;
    box-shadow: 0px 10px 15px 0px rgba(0, 0, 0, 0.616);
}

.new-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.685);
    z-index: 1;
}

.new-item > * {
    position: relative;
    z-index: 2;
}

.new-content {
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;
}

.highPartNew {
    display: flex;
    gap: 30px;
    flex: 1;
    width: 100%;
}

.new-image {
    width: 255px;
    height: 350px;
    flex-shrink: 0;
}

.image-container {
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: relative;
    border-radius: 5px;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.new-text {
    flex: 1;
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.newsTitle {
    font-family: Molot;
    font-size: 36px;
    letter-spacing: 0.1rem;
    margin: 0;
    color: white;
    padding: 0;
    word-wrap: break-word;
    margin-top: 30px;
}

.newsDescription {
    font-size: 15px;
    color: #bab8b8;
    margin: 20px 0;
    font-family: Lexend;
    width: 100%;
    max-width: 100%;
    word-wrap: break-word;
}

.button-container {
    display: flex;
    justify-content: flex-end;
    margin-top: auto;
    padding: 10px 0;
}

.cta-button {
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
}

.cta-button:hover {
    transform: scale(1.05);
}

.subtitle {
    color: white;
    font-family: Lexend;
    margin: 10px 0;
}

/* Адаптивные стили */
@media (max-width: 1250px) {
    .new-item {
        max-width: 80%;
    }
}
@media (max-width: 992px) {
    .news {
        margin-top: 80px;
        gap: 40px;
    }

    .new-item {
        min-height: auto;
    }

    .highPartNew {
        flex-direction: column;
        gap: 20px;
    }

    .new-image {
        width: 100%;
        max-width: 400px;
        height: 250px;
        margin: 0 auto;
    }

    .new-text {
        text-align: center;
    }

    .button-container {
        justify-content: center;
    }

    .newsTitle {
        font-size: 28px;
        text-align: center;
    }

    .subtitle {
        text-align: center;
    }

    .newsDescription {
        text-align: center;
    }
}

@media (max-width: 768px) {
    .news {
        margin-top: 60px;
        gap: 30px;
    }

    .newsTitle {
        font-size: 24px;
    }

    .newsDescription {
        font-size: 14px;
    }

    .cta-button {
        width: 140px;
        height: 35px;
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .news {
        margin-top: 50px;
        gap: 25px;
        padding: 0 15px;
    }

    .new-item {
        padding: 15px;
    }

    .new-image {
        height: 200px;
    }

    .newsTitle {
        font-size: 22px;
    }

    .subtitle {
        font-size: 15px;
    }

    .cta-button {
        width: 130px;
        height: 32px;
        font-size: 15px;
    }
}

@media (max-width: 400px) {
    .newsTitle {
        font-size: 20px;
    }

    .newsDescription {
        font-size: 13px;
    }

    .cta-button {
        width: 120px;
        height: 30px;
        font-size: 14px;
    }
}
</style>
