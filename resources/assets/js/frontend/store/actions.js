export default {

	getCourses ({state, commit}) {

		let area_id = 0;

		if (state.area_name) {

			area_id = state.area_name.id;

		}

		let institution_id = 0;
		
		if (state.institution_name) {

			institution_id = state.institution_name.id;

		}

		let course_name = 'empty_course_name';

		if (state.course_name) {

			course_name = state.course_name;
		}

		axios.get('/courses/search/' + area_id + '/' + institution_id + '/' + course_name).then((response) => {

			commit('updateCourse', response.data);

        }, (err) => {
        
            console.log(err)
        
            return false;
        })

	}

}