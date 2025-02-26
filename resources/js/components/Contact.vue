<template>
    <div class="contactForm">
        <div class="supportInfo">
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
        </div>

        <form @submit.prevent="handleSubmit" class="contactFormMain">
            <div class="formGroup">
                <label>Name</label>
                <input
                    type="text"
                    v-model="formData.name"
                    placeholder="Type your name"
                    class="customInput"
                    required
                />
            </div>

            <div class="formGroup">
                <label>Your email</label>
                <input
                    type="email"
                    v-model="formData.email"
                    placeholder="Type your email"
                    class="customInput"
                    required
                />
            </div>

            <div class="formGroup">
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
            </div>

            <div class="formGroup">
                <label>Message</label>
                <textarea
                    v-model="formData.message"
                    placeholder="Type your message"
                    class="customTextarea"
                    rows="5"
                    required
                ></textarea>
            </div>

            <button type="submit" class="submitButton">
                SEND YOUR MESSAGE
            </button>
        </form>

        <!-- Status message -->
        <div v-if="statusMessage" :class="statusClass" class="statusMessage">
            {{ statusMessage }}
        </div>

        <footer class="mainFooter">
            <div class="footerContent">
                <div class="footerColumn leftColumn">
                    <h3 class="footerLogo">TEDRED GAMES</h3>
                    <div class="copyright">
                        © 2025 Tedred Games. All rights reserved.
                    </div>
                </div>

                <div class="footerColumn rightColumn forRight">
                    <div class="navigationConnect">
                        <div class="footerColumn">
                            <h4 class="footerTitle">NAVIGATION</h4>
                            <ul class="footerLinks">
                                <li><a href="#">news</a></li>
                                <li><a href="#">about us</a></li>
                                <li><a href="#">team</a></li>
                                <li><a href="#">contact</a></li>
                            </ul>
                        </div>

                        <div class="footerColumn">
                            <h4 class="footerTitle">CONNECT</h4>
                            <div class="socialLinks">
                                <a href="#" class="socialIcon"
                                    ><img
                                        src="@assets/images/instagram.svg"
                                        alt="Instagram"
                                /></a>
                                <a href="#" class="socialIcon"
                                    ><img
                                        src="@assets/images/discord.svg"
                                        alt="Discord"
                                /></a>
                                <a href="#" class="socialIcon"
                                    ><img
                                        src="@assets/images/steam.svg"
                                        alt="Steam"
                                /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
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

@font-face {
    font-family: Lexend;
    src: url("@assets/fonts/LexendExa-Regular.ttf");
}
@font-face {
    font-family: Molot;
    src: url("@assets/fonts/Molot.otf");
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

.mainFooter {
    background: #0a0a0a;
    padding: 60px 0 30px;
    margin-top: 80px;
    border-top: 2px solid #ffc851;
    width: 100%;
}

.footerContent {
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    gap: 40px;
    padding: 0 20px;
}

.footerColumn {
    flex: 1;
    min-width: 200px;
}

.footerLogo {
    font-family: "Molot";
    color: #ffc851;
    font-size: 32px;
    line-height: 1;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.copyright {
    color: rgba(255, 255, 255, 0.6);
    font-family: "Lexend";
    font-size: 12px;
    line-height: 1.4;
}

.footerTitle {
    color: #fff;
    font-family: "Molot";
    font-size: 18px;
    margin-bottom: 15px;
    text-transform: uppercase;
}

.footerLinks {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.footerLinks li {
    margin-bottom: 12px;
}

.footerLinks a {
    color: rgba(255, 255, 255, 0.8);
    font-family: "Lexend";
    font-size: 14px;
    text-decoration: none;
    transition: color 0.3s;
}

.footerLinks a:hover {
    color: #ffc851;
}

.socialLinks {
    display: flex;
    gap: 15px;
}

.socialIcon img {
    width: 24px;
    height: 24px;
    filter: brightness(0.8);
    transition: filter 0.3s;
}

.socialIcon img:hover {
    filter: brightness(1);
}
</style>
