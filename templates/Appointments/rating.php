/img/Assets/
            <!-- REGISTER FORM SECTION -->
            <section id="request_session_section" class="section-1">


                <div id="request_session_form_container">

                    <div id="banner_container">

                        <!-- "SIGN UP A TUTOR" HEADING -->
                        <div id="request_session_heading_container">
                            <p id="request_session_heading" style="margin-top:-10px;margin-bottom:0;">Rating & Review </p>
                            <p id="request_session_description" style="margin-bottom:0;margin-top:0;">
                                <br>

                            </p>
                        </div>

                        <!-- BANNER RIBBON -->
                        <img id="banner_ribbon_image" src="/img/Assets/Request_A_Session/banner_ribbon_image.png" alt="">
                    </div>

                    <!-- FORM -->
                <?=$this->Form->create(null, ['class' => 'form-signin', 'url'=> '/appointments/rating/'.$apptIdCode,
                          'method' => 'post','style' => 'margin-top:10px'])?>

                              <?= $this->Flash->render() ?>

                        <!-- 1ST QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Request_A_Session/number_1_image.png"
                                    alt="">
                                <div class="question_text">First, how do you satisfy the experience?</div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="1st_question_body_container">

                                <br>

                                <div id="starting_time_input_container">


                                    <div class="custom-select" id="starting_time_dropdown" style="width:160px;">
                                        <select id="time_dropdown" name="stars">
                                          <option value=""></option>
                                            <option value="1">1 Star</option>
                                              <option value="2">2 Stars</option>
                                                <option value="3">3 Stars</option>
                                                  <option value="4">4 Stars</option>
                                                    <option value="5">5 Stars</option>

                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <!-- 2ND QUESTION -->
                        <div class="question_container">

                            <!-- QUESTION PROMPT -->
                            <div class="question_prompt_container">
                                <img class="question_number_image" src="/img/Assets/Request_A_Session/number_2_image.png"
                                    alt="">
                                <div class="question_text">Second, anything you would like to say to the tutor?
                                </div>
                            </div>

                            <!-- QUESTION BODY -->
                            <div class="question_body_container" id="2nd_question_body_container">

                                                          <!-- QUESTION BODY -->
                                                          <div class="question_body_container" id="3rd_question_body_container">

                                                              <br>

                                                              <!-- Notes for Tutor (Input) -->
                                                              <div id="notes_for_tutor_textarea_container">
                                                                  <textarea class="textarea_input" name="review_content" id="notes_for_tutor_textarea_input"
                                                                      cols="55" rows="10"
                                                                      placeholder=""></textarea>
                                                              </div>
                                                          </div>
                            </div>
                        </div>



                        <div id="send_request_button_container">
                            <button id="send_request_button" type="submit" title="Request the session">Submit</button>
                        </div>
              <?php echo $this->Form->end();?>

                </div>
            </section>
