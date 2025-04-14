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

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

main {
    display: block;
    padding: 0 15px;
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
    background-size: cover;
    background-position: center;
    padding: 20px;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    border-radius: 8px;
}

.secondText {
    color: white;
    text-align: center;
    font-family: Lexend;
    margin-top: 30px;
    font-size: 12px;
    line-height: 1.6;
}

label {
    color: white;
    margin-bottom: 8px;
    display: block;
}

.contactForm {
    width: 100%;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    margin-top: 40px;
    font-family: "Lexend";
    padding: 0 15px;
}

.supportInfo {
    margin-bottom: 2rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.mainText {
    color: white;
    text-align: center;
    font-family: Lexend;
    font-size: 26px;
    line-height: 1.4;
    margin-bottom: 20px;
}

.formGroup {
    margin-bottom: 1.5rem;
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
    background-size: cover;
    background-position: center;
    text-decoration: none;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    margin: 20px auto;
    cursor: pointer;
    max-width: 300px;
    font-size: 16px;
    transition: transform 0.2s;
}

.submitButton:hover {
    transform: scale(1.02);
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
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23FFFFFF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
}

.customSelect option {
    color: rgba(0, 0, 0, 0.8);
    background: white;
}

.customSelect option:disabled {
    color: rgba(255, 255, 255, 0.5);
}

/* Адаптивные стили */
@media (max-width: 768px) {
    .mainText {
        font-size: 22px;
    }
    
    .secondText {
        font-size: 11px;
    }
    
    .contactFormMain {
        padding: 15px;
    }
    
    .submitButton {
        padding: 10px 20px;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .mainText {
        font-size: 20px;
    }
    
    .secondText {
        font-size: 10px;
    }
    
    .contactForm {
        margin-top: 20px;
    }
    
    .formGroup {
        margin-bottom: 1rem;
    }
    
    .customInput,
    .customTextarea,
    .customSelect {
        padding: 10px;
        font-size: 14px;
    }
    
    .submitButton {
        max-width: 100%;
    }
}

@media (min-width: 1200px) {
    .contactFormMain {
        width: 70%;
    }
}
</style>