<!-- REGISTER FORM SECTION -->
<section id="register_form_section" class="section-1">

    <div id="register_form_container">
        <img id="uTute_logo" src="/img/Assets/Icons/logo.png" alt="Logo">


          <?=$this->Form->create(null, ['class' => 'form-signin', 'style' => 'margin-top:80px;'])?>

              <?= $this->Flash->render() ?>
            <!-- Full Name (Input) -->
            <div class="input_container">
                <div class="input_heading">
                    <label for="email_input">Full Name</label>
                </div>

                <input class="single_line_input" v-model="emailInput" placeholder="Enter full name" name="full_name">
            </div>

            <!-- Phone Number (Input) -->
            <div class="input_container">
                <div class="input_heading">
                    <label for="email_input">Phone Number</label>
                </div>

                <input class="single_line_input" v-model="emailInput" placeholder="Enter number" name="mobile">
            </div>

            <!-- Password (Input) -->
            <div class="input_container">
                <div class="input_heading">
                    <label for="email_input">Password</label>
                </div>

                <input class="single_line_input" type="password" v-model="emailInput" name="password"
                    placeholder="***********">
            </div>

            <p id="password_information_text">Password should contain a mix of upper and lowercase letters,
                numbers, <br> and at least one
                non-alphanumeric character (.!*)</p>

            <!-- Confirm Password Number (Input) -->
            <div class="input_container">
                <div class="input_heading">
                    <label for="email_input">Confirm Password</label>
                </div>

                <input class="single_line_input" type="password" v-model="emailInput" name="confirm_password"
                    placeholder="***********">
            </div>

            <div id="register_button_container">
                <button id="register_button" type="submit">Register</button>
            </div>
            <?=$this->Form->end()?>

    </div>
</section>
