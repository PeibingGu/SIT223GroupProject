
            <!-- MAIN SECTION -->
            <section id="section_1" class="section-1">

                <!-- HEADING CONTAINER -->
                <div id="heading_container">
                    <h1>TUTORS</h1>
                </div>

                <!-- INFORMATION CONTAINER -->
                <div id="information_container">
                    <img id="information_icon" src="/img/Assets/Icons/information_icon.png" alt="">
                    <p id="information_text">Not sure? Money back if study session not conducted properly</p>
                </div>

                <!-- SELECTIONS CONTAINER -->
                <div id="selections_container">

                    <!-- FILTER BUTTON -->
                    <button id="filter_button">
                        <img id="filter_button_img" src="/img/Assets/Tutor_Search/filter_button_img.png" />
                    </button>

                    <!-- MOST POPULAR DROPDOWN BUTTON -->
                    <div class="dropdown">
                        <button class="dropbtn">
                            <img id="most_popular_dropdown_button_img"
                                src="/img/Assets/Tutor_Search/most_popular_dropdown_button_img.png" alt=""></button>
                        <div class="dropdown-content">
                            <a href="#">Design</a>
                            <a href="#">Engineering</a>
                            <a href="#">Life Sciences</a>
                            <a href="#">Literature</a>
                            <a href="#">Mathematics</a>
                            <a href="#">Pyschology</a>
                            <a href="#">Programming</a>
                        </div>
                    </div>

                    <!-- RESULTS COUNT CONTAINER -->
                    <div id="results_count_container">
                        <p id="results_count">10,000 <span>results</span></p>
                    </div>

                </div>



                <!-- MAIN BODY CONTAINER -->
                <div id="main_body_container">

                    <!-- SIDE PANEL CONTAINER -->
                    <div id="side_panel_container">
                        <hr>



                        <!-- STUDY AREA CONTAINER-->
                        <div id="study_area_container">

                            <p class="side_panel_heading">Study Area</p>

                            <!-- EXPAND -->
                            <div>
                                <div class="panel-wrapper">
                                    <a href="#show_study_areas" class="show btn" id="show_study_areas">Show More
                                        ˅</a>
                                    <a href="#hide_study_areas" class="hide btn" id="hide_study_areas">Show Less
                                        ˄</a>
                                    <div class="panel">
                                        <label class="checkbox_container">Arts & Humanities
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Building & Planning
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Business & Management
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Computing and IT
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Design
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Education, Childhood & Youth
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Environment & Development
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Health & Social Care
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Languages
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Law
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Mathematics & Statistics
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Medical Sciences
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Nursing & Healthcare Practice
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Psychology & Counselling
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Science
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Social Sciences
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="checkbox_container">Technology
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                    </div><!-- end panel -->
                                    <div class="fade"></div>
                                </div><!-- end panel-wrapper -->
                            </div>
                        </div>


                        <br>
                        <hr>

                        <!-- UNIT CODE/UNIT NAME CONTAINER-->
                        <div id="unit_code_unit_name_container">

                            <label for="unit_code_unit_name_input">
                                <p class="side_panel_heading">Unit Code/Unit Name</p>
                            </label>
                            <input id="unit_code_unit_name_input" class="single_line_input" name="unit_code_unit_name"
                                type="text" placeholder="Enter keyword" tabindex="1">
                        </div>

                        <br>
                        <hr>


                        <!-- UNIVERSITIES CONTAINER-->
                        <div id="university_container">

                            <p class="side_panel_heading">University</p>

                            <!-- EXPAND -->
                            <div>
                                <div class="panel-wrapper">
                                    <a href="#show_universities" class="show btn" id="show_universities">Show More ˅</a>
                                    <a href="#hide_universities" class="hide btn" id="hide_universities">Show Less ˄</a>
                                    <div class="panel">
                                      <?php foreach ($universityList as $uni): ?>

                                        <label class="checkbox_container"><?=ucwords($uni['university_name'])?>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                      <?php endforeach; ?>

                                    </div><!-- end panel -->
                                    <div class="fade"></div>
                                </div><!-- end panel-wrapper -->
                            </div>
                        </div>


                        <br>
                        <hr>

                        <!-- AVAILABILITY CONTAINER-->
                        <div id="availability_container">
                            <label for="availability_input">
                                <p class="side_panel_heading">Availability</p>
                            </label>
                                <input id="availability_input" class="single_line_input" data-provide="datepicker">
                        </div>


                        <br>
                        <hr>

                        <!-- RATINGS CONTAINER-->
                        <div id="ratings_container">
                            <p class="side_panel_heading">Ratings</p>

                            <!-- EXPAND -->
                            <div>
                                <div class="panel-wrapper">
                                    <a href="#show_ratings" class="show btn" id="show_ratings">Show More
                                        ˅</a>
                                    <a href="#hide_ratings" class="hide btn" id="hide_ratings">Show Less
                                        ˄</a>
                                    <div class="panel">

                                        <label class="checkbox_container ratings_checkbox_container"><img
                                                class="stars_icon" src="/img/Assets/Icons/4_point_5_stars.png" alt="">
                                            <p>4.5
                                                & up</p>
                                            <input type="checkbox">
                                            <span class="checkmark ratings_checkbox"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container"><img
                                                class="stars_icon" src="/img/Assets/Icons/4_stars.png" alt="">
                                            <p>4
                                                & up</p>
                                            <input type="checkbox">
                                            <span class="checkmark ratings_checkbox"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container"><img
                                                class="stars_icon" src="/img/Assets/Icons/3_point_5_stars.png" alt="">
                                            <p>3.5
                                                & up</p>
                                            <input type="checkbox">
                                            <span class="checkmark ratings_checkbox"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container"><img
                                                class="stars_icon" src="/img/Assets/Icons/3_stars.png" alt="">
                                            <p>3
                                                & up</p>
                                            <input type="checkbox">
                                            <span class="checkmark ratings_checkbox"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container"><img
                                                class="stars_icon" src="/img/Assets/Icons/2_point_5_stars.png" alt="">
                                            <p>2.5
                                                & up</p>
                                            <input type="checkbox">
                                            <span class="checkmark ratings_checkbox"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container"><img
                                                class="stars_icon" src="/img/Assets/Icons/2_stars.png" alt="">
                                            <p>2
                                                & up</p>
                                            <input type="checkbox">
                                            <span class="checkmark ratings_checkbox"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container"><img
                                                class="stars_icon" src="/img/Assets/Icons/1_point_5_stars.png" alt="">
                                            <p>1.5
                                                & up</p>
                                            <input type="checkbox">
                                            <span class="checkmark ratings_checkbox"></span>
                                        </label>
                                    </div><!-- end panel -->
                                    <div class="fade"></div>
                                </div><!-- end panel-wrapper -->

                            </div>
                        </div>

                        <br>
                        <hr>


                        <!-- QUALIFICATIONS CONTAINER-->
                        <div id="qualifications_container">
                            <p class="side_panel_heading">Qualifications</p>

                            <!-- EXPAND -->
                            <div>
                                <div class="panel-wrapper">
                                    <a href="#show_qualifications" class="show btn" id="show_qualifications">Show More
                                        ˅</a>
                                    <a href="#hide_qualifications" class="hide btn" id="hide_qualifications">Show Less
                                        ˄</a>
                                    <div class="panel">

                                        <label class="checkbox_container ratings_checkbox_container">
                                            Doctorate
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container">
                                            MBA
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container">
                                            Masters
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container">
                                            Graduate Diploma
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container">
                                            Graduate Certificate
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container">
                                            Bachelors
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container">
                                            Diploma
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="checkbox_container ratings_checkbox_container">
                                            Certificate
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>

                                    </div><!-- end panel -->
                                    <div class="fade"></div>
                                </div><!-- end panel-wrapper -->

                            </div>
                        </div>

                        <br>
                        <hr>

                        <!-- PRICE PER HOUR CONTAINER-->
                        <div id="price_per_hour_container">

                            <p class="side_panel_heading">Price Per Hour</p>
                            <p id="price_per_hour_description">Select the Maximum Price Per Hour</p>

                            <input type="range" value="50" min="15" max="150"
                                oninput="this.nextElementSibling.value = this.value"> $
                            <output id="price_per_hour_output">50</output>

                        </div>

                    </div>



                    <!-- SEARCH RESULTS CONTAINER -->
                    <div id="search_results_container">

                        <br>

                        <!-- <div class="tutor_container">
                            <img class="tutor_image" src="/img/Assets/Tutor_Search/tutor_1.png" alt="">

                            <div class="tutor_title_container">
                                <span class="tutor_name">Lalala Lalala Lala</span>
                                <span class="tutor_degree_type"> Bsc, Msc</span>
                            </div>

                            <div class="tutor_degrees_container">
                                <p class="tutor_degrees">
                                    <span>Bachelor of Computer Science, Master of AI</span>
                                    <span>Deakin University, </span>
                                    <span>2022</span>
                                </p>
                            </div>

                            <div class="tutor_ratings_container">
                                <span class="tutor_rating_value">4.7</span>
                                <img class="tutor_rating_icon" src="/img/Assets/Icons/4_point_5_stars.png" alt="">
                                <span id="tutor_number_of_ratings">(2,789)</span>
                            </div>

                            <div class="tutor_price_per_hour_container">
                                A$<span class="tutor_price_per_hour">16.99</span>/hour
                            </div>
                        </div> -->




                        <tutor-component id="tutor_component" v-for="tutor in tutors" v-bind:image_src="tutor.image_src"
                            v-bind:name="tutor.name" v-bind:degree_type="tutor.degree_type" v-bind:degree="tutor.degree"
                            v-bind:university="tutor.university" v-bind:year_of_graduation="tutor.year_of_graduation"
                            v-bind:rating_value="tutor.rating_value" v-bind:rating_icon_src="tutor.rating_icon_src"
                            v-bind:number_of_ratings="tutor.number_of_ratings"
                            v-bind:total_price_per_hour="tutor.total_price_per_hour" v-bind:title="tutor.name">
                        </tutor-component>

                    </div>

            </section>
<script>

$(document).ready(function() {
    //var container=$('#ratings_container').length>0 ? $('#ratings_container'): "body";
    var options={
      format: 'dd/mm/yyyy',
      //container: container,
      startDate: 0,
      maxViewMode: 360,
      todayHighlight: true,
      autoclose: true,
      todayBtn: true
    };

  $('.datepicker').datepicker(options);
});
</script>
