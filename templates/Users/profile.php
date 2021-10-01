

<!-- BANNER SECTION -->
<section class="section-1">
    <div id="tutor_profile_picture_container">
        <img id="tutor_profile_picture" src="<?=$tutor['Tutor']['profile_image']?>"
            alt="Tutor Profile Picture">
    </div>

</section>


<!-- TUTOR SUMMARY SECTION -->
<section class="section-2">

    <div id="tutor_excerpt_container">

        <div id="tutor_name_and_degree_type_container">
            <h1 class="tutor_name_and_degree_type"><?=$tutor['Tutor']['first_name'].' '.$tutor['Tutor']['last_name']?></h1>
            <h1 class="tutor_name_and_degree_type"> </h1>
            <h1 class="tutor_name_and_degree_type"></h1>
        </div>

        <div id="degree_name_and_university_container">
            <p id="degree_name"> <?php
            $quals = [];
            foreach ($tutor['TutorQualifications'] as $t):
              if (!in_array($t['qualification_type_name'], $quals))
              {
                $quals[] = $t['qualification_type_name'];
              }
            endforeach;
            echo implode(', ', $quals);
            ?></p>
            <p id="university"><?=$tutor['TutorQualifications'][0]['university_name'].', '.$tutor['TutorQualifications'][0]['complete_year']?></p>
        </div>

        <div id="ratings_container">
            <p id="ratings_value"><?=number_format($tutor['Tutor']['average_rating'], 1)?></p>
            <?php if ($tutor['Tutor']['average_rating'] <= 1.5): ?>
            <img id="ratings_image" src="/img/Assets/Icons/1_point_5_stars.png" alt="">
          <?php elseif ($tutor['Tutor']['average_rating'] < 2.5): ?>
            <img id="ratings_image" src="/img/Assets/Icons/2_stars.png" alt="">
          <?php elseif ($tutor['Tutor']['average_rating'] < 3): ?>
            <img id="ratings_image" src="/img/Assets/Icons/2_point_5_stars.png" alt="">
          <?php elseif ($tutor['Tutor']['average_rating'] < 3.5): ?>
            <img id="ratings_image" src="/img/Assets/Icons/3_stars.png" alt="">
          <?php elseif ($tutor['Tutor']['average_rating'] < 4): ?>
            <img id="ratings_image" src="/img/Assets/Icons/3_point_5_stars.png" alt="">
          <?php elseif ($tutor['Tutor']['average_rating'] < 4.5): ?>
            <img id="ratings_image" src="/img/Assets/Icons/4_stars.png" alt="">
          <?php else: ?>
            <img id="ratings_image" src="/img/Assets/Icons/4_point_5_stars.png" alt="">
          <?php endif; ?>
            <p id="number_of_ratings">(<?=number_format($tutor['Tutor']['ratings'])?>)</p>
        </div>
    </div>

    <div id="tutor_buttons_container">
        <button id="book_button"
            onclick="window.location.href='/booking/<?=base64_encode($tutor['Tutor']['tutor_id'])?>'"
            title="Request a session with this tutor">Book</button>

        <div>
            <img id="chat_with_tutor_button" src="/img/Assets/Tutor_Profile/message_tutor_icon.png" alt=""
                title="Message this tutor">
        </div>
    </div>

</section>


<!-- TUTOR PROFILE SECTION #1 SECTION -->
<section class="section-3">

    <?= $this->Flash->render() ?>
    <div class="bubble_content_container" id="profile_container">
        <h1 class="bubble_heading">Profile</h1>
        <p class="bubble_text" id="profile_text"><?=$tutor['Tutor']['profile_introduction']?>
        </p>
    </div>

    <div class="bubble_content_container" id="tutoring_methodologies_container">
        <h1 class="bubble_heading">Tutoring Methodologies</h1>
        <p class="bubble_text">
          <?=$tutor['Tutor']['tutoring_strategies']?>
        </p>
    </div>

</section>


<!-- TUTOR PROFILE ROW #2 SECTION -->
<section class="section-4">

    <div id="tutor_profile_row_2_section_column_1">

        <div class="bubble_content_container" id="unit_information_container">
            <h1 class="bubble_heading">Unit Codes</h1>
            <p class="bubble_text" id="profile_text"><?php
            $uCodes = [];
            $uNames = [];
            foreach ($tutor['TutorTeachings'] as $tR):
              if (!in_array($tR['unit_code'], $uCodes))
              {
                $uCodes[] = $tR['unit_code'];
                $uNames[] = $tR['unit_name'];
              }
            endforeach;
            echo implode(', ', $uCodes);
            ?>
            </p>

            <h1 class="bubble_heading">Unit Names</h1>
            <p class="bubble_text" id="profile_text">
              <?php
              echo implode('<br> ', $uNames);?>
            </p>
        </div>

    </div>

    <div id="tutor_profile_row_2_section_column_2">

        <div class="bubble_content_container" id="specialisations_container">
            <h1 class="bubble_heading">Specialisations</h1>
            <p class="bubble_text" id="profile_text">
              <?php
              $uSpecials = [];
              foreach($tutor['TutorSpecialisations'] as $tS):
                if (!in_array($tS['specialisation_name'], $uSpecials))
                {
                  $uSpecials[] = $tS['specialisation_name'];
                }
              endforeach;
              echo implode(', ', $uSpecials);
              ?>
            </p>
        </div>

        <div class="bubble_content_container" id="hobbies_container">
            <h1 class="bubble_heading">Hobbies</h1>
            <p class="bubble_text" id="profile_text">
              <?php
              $uSpecials = [];
              foreach($tutor['TutorHobbies'] as $tS):
                if (!in_array($tS['hobby_name'], $uSpecials))
                {
                  $uSpecials[] = $tS['hobby_name'];
                }
              endforeach;
              echo implode(', ', $uSpecials);
              ?>
            </p>
        </div>

    </div>

    <div id="tutor_profile_row_2_section_column_3">

        <div class="bubble_content_container" id="qualifications_container">
            <h1 class="bubble_heading">Qualifications</h1>
            <p class="bubble_text" id="profile_text">
              <?php
            $uSpecials = [];
            foreach($tutor['TutorQualifications'] as $tS):
              echo $tS['university_name'].'<br>';
              echo !empty($tS['gpa'])? 'GPA: '. $tS['gpa']:'';
              echo '<br>';
            endforeach;
            ?>
        </div>
    </div>

</section>


<!-- TUTOR RATINGS SUMMARY SECTION -->
<section class="section-5">

    <h1 id="student_feedback_heading">Student Feedback</h1>

    <div id="tutor_ratings_column_1_container">

        <p id="average_rating_value"><?=number_format($tutor['Tutor']['average_rating'], 1)?></p>
        <img id="average_rating_stars_icon" src="../Assets/Tutor_Profile/5_stars_tutor_rating.png" alt="">
        <p id="tutor_rating_text">Tutor Rating</p>

    </div>

    <div id="tutor_ratings_column_2_container">

        <div class="bar_dark"></div>
        <div class="bar_light"></div>
        <div class="bar_light"></div>
        <div class="bar_light"></div>
        <div class="bar_light"></div>
    </div>

    <div id="tutor_ratings_column_3_container">

        <div class="stars_icons_and_percentage_container">
            <img class="tutor_rating_stars_icon" src="/img/Assets/Tutor_Profile/5_stars_tutor_rating.png"
                alt="">
            <p class="tutor_rating_percentage"><?=number_format($tutor['Tutor']['5_star'] / 100) * 100?>%</p>
        </div>


        <div class="stars_icons_and_percentage_container">
            <img class="tutor_rating_stars_icon" src="/img/Assets/Tutor_Profile/4_stars_tutor_rating.png"
                alt="">
            <p class="tutor_rating_percentage"><?=number_format($tutor['Tutor']['4_star'] / 100) * 100?>%</p>
        </div>

        <div class="stars_icons_and_percentage_container">
            <img class="tutor_rating_stars_icon" src="/img/Assets/Tutor_Profile/3_stars_tutor_rating.png"
                alt="">
            <p class="tutor_rating_percentage"><?=number_format($tutor['Tutor']['3_star'] / 100) * 100?>%</p>
        </div>

        <div class="stars_icons_and_percentage_container">
            <img class="tutor_rating_stars_icon" src="/img/Assets/Tutor_Profile/2_stars_tutor_rating.png"
                alt="">
            <p class="tutor_rating_percentage"><?=number_format($tutor['Tutor']['2_star'] / 100) * 100?>%</p>
        </div>

        <div class="stars_icons_and_percentage_container">
            <img class="tutor_rating_stars_icon" src="/img/Assets/Tutor_Profile/1_star_tutor_rating.png"
                alt="">
            <p class="tutor_rating_percentage"><?=number_format($tutor['Tutor']['1_star'] / 100) * 100?>%</p>
        </div>

    </div>

</section>


<!-- STUDENT FEEDBACK SECTION -->
<section class="section-6">

  <?php if (empty($tutor['Tutor']['reviews'])):

  else:
    foreach ($tutor['Tutor']['reviews'] as $rev):
  ?>
    <div class="student_rating_entry">
        <div class="student_initials_container"> <br>
          <?=!empty($rev['first_name']) ? substr($rev['first_name'], 0,1): ''?>
          <?=!empty($rev['last_name']) ? substr($rev['last_name'], 0,1): ''?>
          </div>

        <div class="student_rating_description_container">
            <p class="student_name" style="margin-bottom:0"><?=$rev['first_name'].' '.$rev['last_name']?></p>

            <?php if ($rev['stars'] <= 1.5): ?>
              <img class="student_rating_stars_icon" src="/img/Assets/Tutor_Profile/1_star_tutor_rating.png">
          <?php elseif ($rev['stars'] <= 2.5): ?>
            <img class="student_rating_stars_icon" src="/img/Assets/Tutor_Profile/2_stars_tutor_rating.png">
          <?php elseif ($rev['stars'] <= 3.5): ?>
            <img class="student_rating_stars_icon" src="/img/Assets/Tutor_Profile/3_stars_tutor_rating.png">
          <?php elseif ($rev['stars'] <= 4.5): ?>
            <img class="student_rating_stars_icon" src="/img/Assets/Tutor_Profile/4_stars_tutor_rating.png">
          <?php else: ?>
            <img class="student_rating_stars_icon" src="/img/Assets/Tutor_Profile/5_stars_tutor_rating.png">
          <?php endif; ?>

            <p class="student_rating_time_elapsed">
              <?php
              echo time_elapsed_string($rev['created_time']);
              ?>
            </p>
            <p class="student_feedback_text"><?=$rev['review_content']?></p>
        </div>

        <hr>
    </div>
  <?php endforeach; ?>
  <?php endif; ?>

</section>
