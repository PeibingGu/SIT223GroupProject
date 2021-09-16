// ================== Section: Header ===================================

//Vue instance for User Initials
var app = new Vue({
    el: '#user_initials_container',
    data: {
        user_initials: 'EG',
  }
});

// ================== Container: Tutuor ====================================

// Custom Component: Tutor
Vue.component("tutor-component", {
  // Declare props
    props: ['image_src', 'name', 'degree_type', 'degree', 'university', 'year_of_graduation', 'rating_value', 'rating_icon_src', 'number_of_ratings', 'total_price_per_hour'],

  // Define template
    template:

    '<div class="tutor_container">' +
        '<img class="tutor_image" v-bind:src="image_src">' +

        '<div class="tutor_title_container">' +
            '<span class="tutor_name">{{name}}</span> ' +
            '<span class="tutor_degree_type">{{degree_type}}</span> ' +
        '</div> ' +

        '<div class="tutor_degrees_container"> ' +
            '<p class="tutor_degrees">' +
                '<span>{{degree}} </span>' +
                '<span>{{university}}, </span>' +
                '<span>{{year_of_graduation}}</span>' +
            '</p>' +
        '</div> ' +

        '<div class="tutor_ratings_container"> ' +
            '<span class="tutor_rating_value">{{rating_value}}</span> ' +
            '<img class="tutor_rating_icon" v-bind:src="rating_icon_src" alt=""> ' +
            '<span id="tutor_number_of_ratings">({{number_of_ratings}})</span> ' +
        '</div> ' +

        '<div class="tutor_price_per_hour_container"> ' +
            'A$<span class="tutor_price_per_hour">{{total_price_per_hour}}</span>/hour ' +
        '</div> ' +
    '</div>'

})

//Vue object: Countries Container
var tutor_container = new Vue({
	el: "#search_results_container",
    data: {
      // Array containing the following properties of each Tutor:
      tutors: [
            { name: 'Jane Citizen', image_src: '../Assets/Tutor_Search/tutor_1.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'John Doe', image_src: '../Assets/Tutor_Search/tutor_2.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'Jill Smith', image_src: '../Assets/Tutor_Search/tutor_3.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'Robert Power', image_src: '../Assets/Tutor_Search/tutor_4.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'James Toretto', image_src: '../Assets/Tutor_Search/tutor_5.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'Margaret Curie', image_src: '../Assets/Tutor_Search/tutor_6.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'Jane Citizen', image_src: '../Assets/Tutor_Search/tutor_1.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'John Doe', image_src: '../Assets/Tutor_Search/tutor_2.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'Jill Smith', image_src: '../Assets/Tutor_Search/tutor_3.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'Robert Power', image_src: '../Assets/Tutor_Search/tutor_4.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'James Toretto', image_src: '../Assets/Tutor_Search/tutor_5.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },

            { name: 'Margaret Curie', image_src: '../Assets/Tutor_Search/tutor_6.png', degree_type: 'Bsc, Msc', degree: 'Bachelor of Computer Science, Master of AI', university: 'Deakin University', year_of_graduation: '2022', rating_value: '4.7', rating_icon_src: '../Assets/Icons/4_point_5_stars.png', number_of_ratings: '2,789', total_price_per_hour: '16.99' },
		],
	}
})