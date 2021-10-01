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
                <?=$this->Form->create(null, ['class' => 'form-signin', 'url'=> '/booking/'.$tutorIdCode,
                          'method' => 'post','style' => 'margin-top:80px;'])?>

                              <?= $this->Flash->render() ?>

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

                                <div id="starting_time_input_container">


                                    <div class="custom-select" id="starting_time_dropdown" style="width:160px;">
                                        <select id="time_dropdown" name="hours">
                                          <option value=""></option>
                                            <option value="1">1 Hour</option>
                                              <option value="2">2 Hours</option>
                                                <option value="3">3 Hours</option>
                                                  <option value="4">4 Hours</option>
                                                    <option value="5">5 Hours</option>

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
                                    <input class="single_line_input" id="date_input" name="date" type="date" placeholder="SIT123">
                                </div>




                                <!-- Time Slot (Input) -->
                                <div id="starting_time_input_container">

                                    <label class="input_label" for="starting_time_dropdown">Starting Time</label>

                                    <div class="custom-select" id="starting_time_dropdown" style="width:160px;">
                                        <select id="time_dropdown" name="start_time">
                                          <option value=""></option>
                                          <?php foreach ($slots as $slot): ?>
                                            <option value="<?=intval(substr($slot['time_start'], 0, 2))?>"><?=substr($slot['time_start'],0,4). (intval($slot['time_start']) < 1200 ? ' AM' : ' PM')?></option>
                                          <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>


                                <br>
                                <br>
                                <!-- Time Slot (Input) -->
                                <div id="starting_time_input_container">

                                    <label class="input_label" for="starting_time_dropdown">Unit</label><br>

                                    <div class="custom-select unit-select" id="starting_time_dropdown" style="width:360px;">
                                        <select id="time_dropdown" name="tutor_teaching_id">
                                          <option value=""></option>
                                          <?php foreach ($tutorTeachings as $unit): ?>
                                            <option value="<?=$unit['tutor_teaching_id']?>"><?=$unit['unit_code'].' '. $unit['unit_name']. ' AU$'.number_format($unit['fees'])?></option>
                                          <?php endforeach; ?>

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
                                    <textarea class="textarea_input" name="content" id="notes_for_tutor_textarea_input"
                                        cols="55" rows="10"
                                        placeholder="E.g., I need help with task 2.1P for SIT102, which is Introduction to Programming with Splashkit library. I couldn’t get my code to work and I have no idea how to debug."></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="send_request_button_container">
                            <button id="send_request_button" type="submit" title="Request the session">Send
                                Request</button>
                        </div>
              <?php echo $this->Form->end();?>

                </div>
            </section>
