
            <!-- LOGIN SECTION -->
            <section id="login_section" class="section-1">

                <div id="login_container">
                    <img id="uTute_logo" src="/img/Assets/Icons/logo.png" alt="Logo">

                    <?=$this->Form->create(null, ['class' => 'form-signin', 'url' => '/login'])?>

                        <?= $this->Flash->render() ?>
                        <!-- Email (Input) -->
                        <div class="input_container">
                            <div class="input_heading">
                                <label for="email_input">Email</label>
                            </div>

                            <input class="single_line_input" v-model="emailInput" name="email" placeholder="example@uni.edu.au" autocomplete="off">
                        </div>


                        <!-- Password (Input) -->
                        <div class="input_container">
                            <div class="input_heading">
                                <label for="password_input">Password</label>
                            </div>

                            <input class="single_line_input" type="password" name="password" v-model="passwordInput" placeholder="***********">
                        </div>

                        <div id="sign_in_button_container">
                            <button id="sign_in_button" type="submit">Sign In</button>
                        </div>

                        <div id="bottom_links_container">
                            <a class="bottom_text" href="">Forgot Password?</a>
                            <p class="bottom_text">Don't have an account? <a class="bottom_link" href="/register">Create One</a>
                            </p>
                        </div>

                  <?=$this->Form->end()?>

                </div>

            </section>
