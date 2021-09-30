
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

                    <?=$this->Form->create(null, ['class' => 'form-signin', 'method' => 'post','style' => 'margin-top:80px;'])?>

                        <!-- 1ST QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Sign_Up_As_A_Tutor/number_1_image.png"
                                    alt="">
                                <div class="question_text">Firstly, what is your educational qualification?</div>
                            </div>

                            <?php foreach (array('0','1','2') as $qIndex): ?>
                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="1st_question_body_container-<?=$qIndex?>"
                               style="<?=(empty($data['q'][$qIndex]['qualification_type_id']))&&$qIndex>0? 'display:none':'' ?>">

                                <br>

                                <!-- Degree Level (Input) -->
                                <div id="degree_level_input_container">

                                    <label class="input_label" for="degree_level_dropdown">Degree Level</label>
                                    <br>
                                    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                    <div class="custom-select" id="degree_level_dropdown" style="width:200px;">
                                        <select  name="data[q][<?=$qIndex?>][qualification_type_id]">
                                          <option value=""></option>
                                          <?php foreach ($qualificationTypeList as $qL): ?>
                                            <option value="<?=$qL['qualification_type_id']?>" <?=$data['q'][$qIndex]['qualification_type_id'] == $qL['qualification_type_id']?" selected":""?>><?=$qL['qualification_type_name']?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>

                                <!-- Year of Graduation (Input) -->
                                <div id="year_of_graduation_container">
                                    <label class="input_label" for="year_of_graduation">Year of Graduation</label>
                                    <br>
                                    <input class="single_line_input" id="year_of_graduation" min-length="4" max-length="4" name="data[q][<?=$qIndex?>][complete_year]" value="<?=$data['q'][$qIndex]['complete_year']?>" type="text"
                                        placeholder="YYYY">
                                </div>

                                <!-- University (Input) -->
                                <div id="university_container">
                                    <label class="input_label" for="university_input">University</label>
                                    <br>
                                    <div class="custom-select" id="degree_level_dropdown" style="width:200px;">
                                        <select name="data[q][<?=$qIndex?>][university_id]">
                                          <option value=""></option>
                                          <?php foreach ($universityList as $qL): ?>
                                            <option value="<?=$qL['university_id']?>" <?=$data['q'][$qIndex]['university_id'] == $qL['university_id']?" selected":""?>><?=$qL['university_name']?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- GPA (Input) -->
                                <div id="gpa_container">
                                    <label class="input_label" for="gpa_input">GPA</label>
                                    <br>
                                    <input class="single_line_input" id="gpa_input" name="data[q][<?=$qIndex?>][gpa]" type="text" placeholder="Enter GPA">
                                </div>

                                <br><br>
                                <hr>

                            </div>
                          <?php endforeach;  ?>
                        </div>

                        <div class="add_more_question_body_container" id="add_more_1st_question_body_container">
                        </div>

                        <!-- "+ Add More" -->
                        <?php if (empty($data['q'][2]['qualification_type_id'])): ?>
                        <a class="add_more_question_body_container_link" href="#" id="qAddMore"
                            onClick="addMore('1st_question_body_container', 'qAddMore');">+
                            Add
                            more</a>

                          <?php endif; ?>



                        <!-- 2ND QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Sign_Up_As_A_Tutor/number_2_image.png"
                                    alt="">
                                <div class="question_text">Secondly, what units would be you be interested in teaching?
                                </div>
                            </div>

                            <?php foreach (array('0','1','2') as $uIndex): ?>
                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="2nd_question_body_container-<?=$uIndex?>"
                               style="<?=(empty($data['u'][$uIndex]['unit_code']))&&$uIndex>0? 'display:none':'' ?>">

                                <br>

                                <!-- Unit Code (Input) -->
                                <div id="unit_code_container">
                                    <label class="input_label" for="unit_code_input">Unit Code</label>
                                    <br>
                                    <input class="single_line_input" id="unit_code_input" name="data[u][<?=$uIndex?>][unit_code]" type="text"
                                        placeholder="SIT123">
                                </div>


                                <!-- Unit Code (Input) -->
                                <div id="unit_code_container">
                                    <label class="input_label" for="unit_code_input">Charge $</label>
                                    <br>
                                    <input class="single_line_input" id="unit_code_input" name="data[u][<?=$uIndex?>][fees]" type="text"
                                        placeholder="$60.0">
                                </div>

                                <br><br>
                                <!-- Unit Name (Input) -->
                                <div id="unit_name_container">
                                    <label class="input_label" for="unit_name_input">Unit Name</label>
                                    <br>
                                    <input class="single_line_input" id="unit_name_input" name="data[u][<?=$uIndex?>][unit_name]" type="text"
                                        placeholder="Data Capture Technologies">
                                </div>

                                <br><br>
                                <hr>

                            </div>
                          <?php endforeach;?>
                        </div>

                        <div class="add_more_question_body_container" id="add_more_2nd_question_body_container">
                        </div>

                        <!-- "+ Add More" -->
                        <a class="add_more_question_body_container_link" href="#" id="uAddMore"
                            onClick="addMore('2nd_question_body_container', 'uAddMore');">+
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
                            <?php foreach (array('0','1','2') as $sIndex): ?>
                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="3rd_question_body_container-<?=$sIndex?>"
                            style="<?=(empty($data['s'][$sIndex]['qualification_type_id']))&&$sIndex>0? 'display:none':'' ?>">

                                <br>

                                <!-- Specialization (Input) -->
                                <div id="specialisation_input_container">

                                    <label class="input_label" for="specialisation_dropdown">Specialisation</label>

                                    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                    <div class="custom-select" id="specialisation_dropdown" style="width:200px;">
                                        <select name="data[s][<?=$sIndex?>][specialisation_id]" >
                                          <option value=""></option>
                                          <?php foreach ($specialisationList as $sL): ?>
                                            <option value="<?=$sL['specialisation_id']?>"  <?=$data['s'][$sIndex]['specialisation_id'] == $sL['specialisation_id']?" selected":""?>><?=$sL['specialisation_name']?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <br><br>
                                <hr>

                            </div>
                          <?php endforeach; ?>
                        </div>

                        <div class="add_more_question_body_container" id="add_more_3rd_question_body_container">
                        </div>

                        <!-- "+ Add More" -->
                        <a class="add_more_question_body_container_link" href="#" id="sAddMore"
                            onClick="addMore('3rd_question_body_container', 'sAddMore');">+
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
                            <?php foreach (array('0','1','2') as $hIndex): ?>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="4th_question_body_container-<?=$hIndex?>"

                              style="<?=(empty($data['h'][$hIndex]['hobby_id']))&&$hIndex>0? 'display:none':'' ?>">
                                <br>
                                <!-- Degree Level (Input) -->
                                <div id="hobby_container">

                                    <label class="input_label" for="hobby_dropdown">Hobby</label>

                                    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                    <div class="custom-select"  name="data[h][<?=$hIndex?>][hobby_id]" id="hobby_dropdown" style="width:200px;">
                                        <select name="data[h][<?=$hIndex?>][hobby_id]">
                                          <option value=""></option>
                                          <?php foreach ($hobbyList as $hL): ?>
                                            <option value="<?=$hL['hobby_id']?>" <?=$data['h'][$hIndex]['hobby_id'] == $hL['hobby_id']?" selected":""?>><?=$hL['hobby_name']?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <hr>

                            </div>
                          <?php endforeach; ?>
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
                                    <textarea class="textarea_input" name="data[p][profile_introduction]" id="profile_textarea_input" cols="55"
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
                                    <textarea class="textarea_input" name="data[p][tutoring_strategies]" id="strategy_textarea_input"
                                        cols="55" rows="10" placeholder="Write something here..."></textarea>
                                </div>

                            </div>

                        </div>

                        <div id="register_button_container">
                            <button id="register_button" class="btn" type="submit">Register</button>
                        </div>
                    </form>
                    <?=$this->Form->end()?>

                </div>
            </section>
