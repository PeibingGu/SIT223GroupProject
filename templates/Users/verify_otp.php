
            <!-- REGISTER SECTION -->
            <section id="verify_otp_section" class="section-1">


                <div id="verify_otp_container">
                    <img id="uTute_logo" src="/img/Assets/Icons/logo.png" alt="Logo">

                    <?=$this->Form->create(null, ['class' => 'form-signin', 'style' => 'margin-top:80px;'])?>

                        <?= $this->Flash->render() ?>

                        <p id="verifying_otp_text">Verifying OTP</p>

                        <p id="description_text">Please enter the 6 digit OTP code <br> we have sent to
                            <?=!empty($email) ? $email : 'your email'?></p>

                        <!-- OTP input boxes -->
                        <div id="otp_input_container">
                            <input id="codeBox1" type="number" maxlength="1" name="code[0]" onkeyup="onKeyUpEvent(1, event)"
                                onfocus="onFocusEvent(1)" />
                            <input id="codeBox2" type="number" maxlength="1" name="code[1]" onkeyup="onKeyUpEvent(2, event)"
                                onfocus="onFocusEvent(2)" />
                            <input id="codeBox3" type="number" maxlength="1" name="code[2]" onkeyup="onKeyUpEvent(3, event)"
                                onfocus="onFocusEvent(3)" />
                            <input id="codeBox4" type="number" maxlength="1" name="code[3]" onkeyup="onKeyUpEvent(4, event)"
                                onfocus="onFocusEvent(4)" />
                            <input id="codeBox4" type="number" maxlength="1" name="code[4]" onkeyup="onKeyUpEvent(4, event)"
                                onfocus="onFocusEvent(5)" />
                            <input id="codeBox4" type="number" maxlength="1" name="code[5]" onkeyup="onKeyUpEvent(4, event)"
                                onfocus="onFocusEvent(6)" />
                        </div>

                        <div id="verify_button_container">
                            <button id="verify_button" type="submit">Verify</button>
                        </div>
                  <?=$this->Form->end();?>

                    <div id="bottom_text_container">
                        <a href="" id="resend_otp_text">Resend OTP</a>
                        <p id="wrong_email_text">You entered the wrong email? <a href="" id="change_email_text">Change
                                email</a></p>
                    </div>


                </div>
            </section>
