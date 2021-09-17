
            <!-- REGISTER FORM SECTION -->
            <section id="register_form_section" class="section-1">


                <div id="register_form_container">

                    <div id="banner_container">

                        <!-- "SIGN UP A TUTOR" HEADING -->
                        <div id="sign_up_as_tutor_heading_container">
                            <p id="sign_up_as_tutor_heading">Sign up as tutor</p>
                            <p id="sign_up_as_tutor_description mt-0 text-white">Be a tutor, we'd love to work with you.</p>
                        </div>

                        <!-- BANNER RIBBON -->
                        <img id="banner_ribbon_image" src="/img/Assets/Sign_Up_As_A_Tutor/banner_ribbon_image.png" alt="">
                    </div>

                    <!-- FORM -->
                    <form action="">


                        <!-- 1ST QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Sign_Up_As_A_Tutor/number_1_image.png"
                                    alt="">
                                <div class="question_text">Firstly, what is your educational qualification?</div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="1st_question_body_container">

                                <br>

                                <!-- Degree Level (Input) -->
                                <div id="degree_level_input_container">

                                    <label class="input_label" for="degree_level_dropdown">Degree Level</label>

                                    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                    <div class="custom-select" id="degree_level_dropdown" style="width:200px;">
                                        <select>
                                          <?php foreach ($qualificationTypeList as $qL): ?>
                                            <option value="<?=$qL['qualification_type_id']?>"><?=$qL['qualification_type_name']?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>

                                <!-- Year of Graduation (Input) -->
                                <div id="year_of_graduation_container">
                                    <label class="input_label" for="year_of_graduation">Year of Graduation</label>
                                    <br>
                                    <input class="single_line_input" id="year_of_graduation" type="text"
                                        placeholder="MM/YYYY">
                                </div>

                                <!-- University (Input) -->
                                <div id="university_container">
                                    <label class="input_label" for="university_input">University</label>
                                    <br>
                                    <input class="single_line_input" id="university_input" type="text"
                                        placeholder="Enter university">
                                </div>

                                <!-- GPA (Input) -->
                                <div id="gpa_container">
                                    <label class="input_label" for="gpa_input">GPA</label>
                                    <br>
                                    <input class="single_line_input" id="gpa_input" type="text" placeholder="Enter GPA">
                                </div>

                                <br><br>
                                <hr>

                            </div>
                        </div>

                        <div class="add_more_question_body_container" id="add_more_1st_question_body_container">
                        </div>

                        <!-- "+ Add More" -->
                        <a class="add_more_question_body_container_link" href="#"
                            onClick="addMore('1st_question_body_container', 'add_more_1st_question_body_container');">+
                            Add
                            more</a>





                        <!-- 2ND QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Sign_Up_As_A_Tutor/number_2_image.png"
                                    alt="">
                                <div class="question_text">Secondly, what units would be you be interested in teaching?
                                </div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="2nd_question_body_container">

                                <br>

                                <!-- Unit Code (Input) -->
                                <div id="unit_code_container">
                                    <label class="input_label" for="unit_code_input">Unit Code</label>
                                    <br>
                                    <input class="single_line_input" id="unit_code_input" type="text"
                                        placeholder="SIT123">
                                </div>

                                <!-- Unit Name (Input) -->
                                <div id="unit_name_container">
                                    <label class="input_label" for="unit_name_input">Unit Name</label>
                                    <br>
                                    <input class="single_line_input" id="unit_name_input" type="text"
                                        placeholder="Data Capture Technologies">
                                </div>
                                <br><br>
                                <hr>

                            </div>
                        </div>

                        <div class="add_more_question_body_container" id="add_more_2nd_question_body_container">
                        </div>

                        <!-- "+ Add More" -->
                        <a class="add_more_question_body_container_link" href="#"
                            onClick="addMore('2nd_question_body_container', 'add_more_2nd_question_body_container');">+
                            Add
                            more</a>



                        <!-- 3RD QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Sign_Up_As_A_Tutor/number_3_image.png"
                                    alt="">
                                <div class="question_text">Thirdly, what are your specialisations?
                                </div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="3rd_question_body_container">

                                <br>

                                <!-- Specialization (Input) -->
                                <div id="specialisation_input_container">

                                    <label class="input_label" for="specialisation_dropdown">Specialisation</label>

                                    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                    <div class="custom-select" id="specialisation_dropdown" style="width:200px;">
                                        <select>
                                            <option value="0">Accounting</option>
                                            <option value="3">Astrophysics</option>
                                            <option value="5">Biology</option>
                                            <option value="6">Business</option>
                                            <option value="10">Chemistry</option>
                                            <option value="13">Criminology</option>
                                            <option value="16">Economics</option>
                                            <option value="17">Finance</option>
                                            <option value="21">History</option>
                                            <option value="22">IT</option>
                                            <option value="23">International Studies</option>
                                            <option value="24">Journalism</option>
                                            <option value="25">Linguistics</option>
                                            <option value="26">Marketing</option>
                                            <option value="27">Mathematics</option>
                                            <option value="30">Music</option>
                                            <option value="31">Philosophy</option>
                                            <option value="32">Physics</option>
                                            <option value="33">Physiology</option>
                                            <option value="34">Politics</option>
                                            <option value="35">Pyschology</option>
                                            <option value="36">Sociology</option>
                                        </select>
                                    </div>

                                </div>
                                <br><br>
                                <hr>

                            </div>
                        </div>

                        <div class="add_more_question_body_container" id="add_more_3rd_question_body_container">
                        </div>

                        <!-- "+ Add More" -->
                        <a class="add_more_question_body_container_link" href="#"
                            onClick="addMore('3rd_question_body_container', 'add_more_3rd_question_body_container');">+
                            Add
                            more</a>




                        <!-- 4TH QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Sign_Up_As_A_Tutor/number_4_image.png"
                                    alt="">
                                <div class="question_text">Students would love to know more about you,
                                    what are your hobbies?
                                </div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="4th_question_body_container">

                                <br>

                                <!-- Degree Level (Input) -->
                                <div id="hobby_container">

                                    <label class="input_label" for="hobby_dropdown">Hobby</label>

                                    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                    <div class="custom-select" id="hobby_dropdown" style="width:200px;">
                                        <select>
                                            <option value="0">Hiking</option>
                                            <option value="1">Cooking</option>
                                            <option value="2">Painting</option>
                                            <option value="3">Writing</option>
                                            <option value="4">Dancing</option>
                                            <option value="5">Programming</option>
                                            <option value="6">Reading</option>
                                            <option value="7">Knitting</option>
                                            <option value="8">Gardening</option>
                                            <option value="9">Acting</option>
                                            <option value="10">Swimming</option>
                                            <option value="11">Meditating</option>
                                            <option value="12">Knitting</option>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <hr>

                            </div>
                        </div>

                        <div class="add_more_question_body_container" id="add_more_4th_question_body_container">
                        </div>

                        <!-- "+ Add More" -->
                        <a class="add_more_question_body_container_link" href="#"
                            onClick="addMore('4th_question_body_container', 'add_more_4th_question_body_container');">+
                            Add
                            more</a>


                        <!-- 5TH QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Sign_Up_As_A_Tutor/number_5_image.png"
                                    alt="">
                                <div class="question_text">Write a profile to let students find you easily!
                                </div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="5th_question_body_container">

                                <br>

                                <!-- University (Input) -->
                                <div id="profile_textarea_container">
                                    <textarea class="textarea_input" name="sdfsdf" id="profile_textarea_input" cols="55"
                                        rows="10" placeholder="Write something here..."></textarea>
                                </div>

                            </div>

                        </div>


                        <!-- 6TH QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Sign_Up_As_A_Tutor/number_6_image.png"
                                    alt="">
                                <div class="question_text">Lastly, share about your tutoring strategies!
                                </div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="6h_question_body_container">

                                <br>

                                <!-- University (Input) -->
                                <div id="strategy_textarea_container">
                                    <textarea class="textarea_input" name="sdfsdf" id="strategy_textarea_input"
                                        cols="55" rows="10" placeholder="Write something here..."></textarea>
                                </div>

                            </div>

                        </div>

                        <div id="register_button_container">
                            <button id="register_button" type="submit">Register</button>
                        </div>
                    </form>

                </div>
            </section>
