/img/Assets/
            <!-- REGISTER FORM SECTION -->
            <section id="request_session_section" class="section-1">


                <div id="request_session_form_container">

                    <div id="banner_container">

                        <!-- "SIGN UP A TUTOR" HEADING -->
                        <div id="request_session_heading_container">
                            <p id="request_session_heading" style="margin-top:-10px;margin-bottom:0;">Request a session</p>
                            <p id="request_session_description" style="margin-bottom:0;margin-top:0;">Make sure to fill in the form as complete as possible,
                                <br>
                                as tutors get to accept or decline your booking request!
                            </p>
                        </div>

                        <!-- BANNER RIBBON -->
                        <img id="banner_ribbon_image" src="/img/Assets/Request_A_Session/banner_ribbon_image.png" alt="">
                    </div>

                    <!-- FORM -->
                    <form action="">


                        <!-- 1ST QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Request_A_Session/number_1_image.png"
                                    alt="">
                                <div class="question_text">First, how long do you need the session to be?</div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="1st_question_body_container">

                                <br>

                                <!-- Hours (Input) -->
                                <div id="hours_input_container">

                                    <input type="number" id="hours_input" name="num_hours" min="1" max="5"
                                        placeholder="1" v-model="hour_selected"
                                        v-on:change="handleSelectedTimeRequired">

                                    <span id="hours_text">hr</span>
                                </div>
                            </div>
                        </div>


                        <!-- 2ND QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Request_A_Session/number_2_image.png"
                                    alt="">
                                <div class="question_text">Second, when would you like the session to be conducted?
                                </div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="2nd_question_body_container">

                                <br>

                                <!-- Date (Input) -->
                                <div id="date_input_container">
                                    <label class="input_label" for="date_input">Date</label>
                                    <br>
                                    <input class="single_line_input" id="date_input" type="date" placeholder="SIT123">
                                </div>

                                <!-- Time Slot (Input) -->
                                <div id="starting_time_input_container">

                                    <label class="input_label" for="starting_time_dropdown">Starting Time</label>

                                    <div class="custom-select" id="starting_time_dropdown" style="width:120px;">
                                        <select id="time_dropdown">
                                            <option value="1">6am</option>
                                            <option value="2">7am</option>
                                            <option value="3">9am</option>
                                            <option value="4">10am</option>
                                            <option value="5">11am</option>
                                            <option value="6">12pm</option>
                                            <option value="7">1pm</option>
                                            <option value="8">2pm</option>
                                            <option value="9">3pm</option>
                                            <option value="10">4pm</option>
                                            <option value="11">5pm</option>
                                            <option value="12">6pm</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- 3RD QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Request_A_Session/number_3_image.png"
                                    alt="">
                                <div class="question_text">Any notes for tutor?</div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="3rd_question_body_container">

                                <br>

                                <!-- Notes for Tutor (Input) -->
                                <div id="notes_for_tutor_textarea_container">
                                    <textarea class="textarea_input" name="" id="notes_for_tutor_textarea_input"
                                        cols="55" rows="10"
                                        placeholder="E.g., I need help with task 2.1P for SIT102, which is Introduction to Programming with Splashkit library. I couldn’t get my code to work and I have no idea how to debug."></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="send_request_button_container">
                            <button id="send_request_button" type="submit" title="Request the session">Send
                                Request</button>
                        </div>
                    </form>

                </div>
            </section>
