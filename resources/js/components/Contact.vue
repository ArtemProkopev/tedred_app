<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
</script>

<template>
    <header>
        <Header />
    </header>
    <main>
        <article class="contactForm">
            <section class="supportInfo">
                <p class="mainText">
                    You can write to us if<br />
                    you have problems<br />
                    related to our games,<br />
                    or contact us
                </p>

                <p class="secondText">
                    Technical Support: We have a self-service Knowledge Base with
                    solutions to most types of issues reported by players.<br />
                    If you don't find a solution there, when emailing, please
                    include any relevant info about your system.<br />
                    Video, Music, and Streaming: We have a Policy on Let's Play
                    Videos that should answer most questions about using<br />
                    gameplay footage or music from our games in videos or
                    streams.<br />
                    Fan Merchandise: We have a Policy on Fan Merchandise that should
                    answer most questions.<br />
                    Career Opportunities: We sometimes get questions about job
                    opportunities or internships.<br />
                    At the moment we have no positions open. We'll update here if
                    this changes.
                </p>
            </section>

            <form @submit.prevent="handleSubmit" class="contactFormMain">
                <section class="formGroup">
                    <label>Name</label>
                    <input
                        type="text"
                        v-model="formData.name"
                        placeholder="Type your name"
                        class="customInput"
                        required
                    />
                </section>

                <section class="formGroup">
                    <label>Your email</label>
                    <input
                        type="email"
                        v-model="formData.email"
                        placeholder="Type your email"
                        class="customInput"
                        required
                    />
                </section>

                <section class="formGroup">
                    <label>Subject</label>
                    <select
                        v-model="formData.subject"
                        class="customSelect"
                        required
                    >
                        <option value="" disabled selected hidden>
                            Select a subject
                        </option>
                        <option value="game 1">Game 1</option>
                        <option value="game 2">Game 2</option>
                        <option value="game 3">Game 3</option>
                    </select>
                </section>

                <section class="formGroup">
                    <label>Message</label>
                    <textarea
                        v-model="formData.message"
                        placeholder="Type your message"
                        class="customTextarea"
                        rows="5"
                        required
                    ></textarea>
                </section>

                <button type="submit" class="submitButton">
                    SEND YOUR MESSAGE
                </button>
            </form>

            <!-- Status message -->
            <div v-if="statusMessage" :class="statusClass" class="statusMessage">
                {{ statusMessage }}
            </div>

            </article>
    </main>

    <footer>
        <Footer />
    </footer>  
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            formData: {
                name: "",
                email: "",
                subject: "",
                message: "",
            },
            statusMessage: "",
            statusClass: "",
        };
    },
    methods: {
        handleSubmit() {
            // Display loading status
            this.statusMessage = "Sending your message...";
            this.statusClass = "loading";

            axios
                .post("/contact", this.formData)
                .then((response) => {
                    this.statusMessage =
                        response.data.message || "Message sent successfully!";
                    this.statusClass = "success";
                    this.resetForm();
                })
                .catch((error) => {
                    this.statusMessage =
                        "Something went wrong. Please try again later.";
                    this.statusClass = "error";
                });
        },
        resetForm() {
            this.formData = {
                name: "",
                email: "",
                subject: "",
                message: "",
            };
        },
    },
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
main {
    display: block;
}

.statusMessage {
    margin-top: 20px;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    font-size: 16px;
}

.loading {
    background-color: #f3e5ab;
    color: #9e9d24;
}

.success {
    background-color: #c8e6c9;
    color: #388e3c;
}

.error {
    background-color: #ffebee;
    color: #d32f2f;
}

.contactFormMain {
    background-image: url("@assets/images/image (2).png");
    padding: 20px;
    width: 60%;
    margin: 0 auto;
}

.secondText {
    color: white;
    text-align: center;
    font-family: Lexend;
    margin-top: 30px;
    font-size: 12px;
}

label {
    color: white;
}

.contactForm {
    width: 100%;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    margin-top: 80px;
    font-family: "Lexend";
}

.supportInfo {
    margin-bottom: 2rem;
}

.mainText {
    color: white;
    text-align: center;
    font-family: Lexend;
    font-size: 26px;
}

.formGroup {
    margin-bottom: 1.5rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

input,
textarea,
select {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

.submitButton {
    font-family: Molot;
    background-image: url("@assets/images/image3.png");
    text-decoration: none;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 4px;
    margin: 20px auto;
}

.customInput,
.customTextarea {
    width: 100%;
    padding: 12px;
    background: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 4px;
    color: #fff;
    font-family: "Lexend";
}

.customInput::placeholder,
.customTextarea::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.customSelect {
    width: 100%;
    padding: 12px;
    background: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 4px;
    color: #fff;
    font-family: "Lexend";
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.5);
}

.customSelect option {
    color: rgba(0, 0, 0, 0.5);
}

.customSelect option:disabled {
    color: rgba(255, 255, 255, 0.5);
}

*, *::before, *::after {
    box-sizing: border-box;
}
</style>
