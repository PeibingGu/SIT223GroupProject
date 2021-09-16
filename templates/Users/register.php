

            <!-- REGISTER SECTION -->
            <section id="register_section" class="section-1">

                <div id="register_container">
                    <img id="uTute_logo" src="/img/Assets/Icons/logo.png" alt="Logo">

                    <?=$this->Form->create(null, ['class' => 'form-signin'])?>

                        <?= $this->Flash->render() ?>
                        <!-- Register (Input) -->
                        <div class="input_container">
                            <div class="input_heading">
                                <label for="email_input">Email</label>
                            </div>

                            <input class="single_line_input" v-model="emailInput" name="email" placeholder="example@uni.edu.au">
                        </div>

                        <div id="register_button_container">
                            <button id="register_button" type="submit">Next</button>
                        </div>
                    <?=$this->Form->end()?>

                </div>
            </section>
