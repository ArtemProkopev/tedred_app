<script setup>
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import { supabase } from "../supabase";
import Footer from "./Footer.vue";
import Header from "./Header.vue";

const route = useRoute();
const newsItem = ref(null);
const isLoading = ref(true);
const error = ref(null);

const formatDate = (dateString) => {
    if (!dateString) return "";
    const options = { year: "numeric", month: "long", day: "numeric" };
    const date = new Date(dateString);
    return date.toLocaleDateString("en-US", options);
};

const getImageUrl = (imagePath) => {
    if (!imagePath) return "/resources/assets/images/news/newsimage.png";
    return imagePath.startsWith("http") ? imagePath : `/storage/${imagePath}`;
};

onMounted(async () => {
    try {
        const id = route.params.id;
        const { data, error: supabaseError } = await supabase
            .from("news")
            .select("*")
            .eq("id", id)
            .single();

        if (supabaseError) throw supabaseError;

        newsItem.value = {
            ...data,
            image: getImageUrl(data.image_url),
            formattedDate: formatDate(data.date),
            subtitle: data.subtitle || "Уважаемые лидеры культов,",
        };
    } catch (err) {
        error.value = err.message;
        console.error("Ошибка загрузки новости:", err);
    } finally {
        isLoading.value = false;
    }
});
</script>

<template>
    <header>
        <Header />
    </header>
    <section class="news">
        <template v-if="isLoading">
            <div class="loading">Loading news...</div>
        </template>
        <template v-else-if="error">
            <div class="error-message">{{ error }}</div>
        </template>
        <template v-else-if="newsItem">
            <div class="new-item">
                <section class="new-content">
                    <section class="highPartNew">
                        <div class="new-image">
                            <h3 class="newsTitle">{{ newsItem.title }}</h3>
                            <p id="date">
                                Publication date: {{ newsItem.formattedDate }}
                            </p>
                            <div class="information">
                                <p>{{ newsItem.subtitle }}</p>
                                <p>{{ newsItem.description_first }}</p>
                                <div
                                    class="image-container"
                                    v-if="newsItem.image"
                                >
                                    <img
                                        :src="newsItem.image"
                                        :alt="newsItem.title"
                                    />
                                </div>
                                <p>{{ newsItem.description_second }}</p>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </template>
        <template v-else>
            <div class="error-message">News not found.</div>
        </template>
    </section>
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

#date {
    color: #6d6d6d;
}

p {
    font-family: Lexend;
    color: #b7b7b7;
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

.loading,
.error-message {
    font-family: Lexend;
    color: #b7b7b7;
    text-align: center;
    padding: 40px;
    font-size: 18px;
}

.error-message {
    color: #ff6b6b;
}

@media (max-width: 1200px) {
    .information {
        max-width: 70%;
    }
}

@media (max-width: 992px) {
    .information {
        max-width: 80%;
    }

    .image-container img {
        padding: 0;
    }
}

@media (max-width: 768px) {
    .information {
        max-width: 90%;
    }

    p {
        font-size: 12px;
    }
}

@media (max-width: 576px) {
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
    p {
        font-size: 10px;
    }
}
</style>
