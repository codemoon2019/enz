export default {

	filteredCourse: state => {

		if (state.course_name == null && state.institution_name == null && state.area_name == null)  {

			return state.courses;

		}else{

			return state.courses.filter(function(course){

				let course_exist      = true;

				let institution_exist = true;
				
				let area_exist        = true;

				if (state.course_name != null) {
					
					let course_name = state.course_name.toLowerCase();

					let title = course.title.toLowerCase();

					course_exist = title.search(course_name) == -1 ? false : true;

				}

				if (state.institution_name != null) {

					institution_exist = course.institution_id == state.institution_name.id ? true : false;
					
				}

				if (state.area_name != null) {

					area_exist = course.area_of_study_id == state.area_name.id ? true : false;
					
				}

				return course_exist && institution_exist && area_exist ? true : false;

			});
		
		}

	},

	institutionsList: state => {

		let institutions = [];

		state.institutions.forEach(function(element) {

			institutions.push({id: element.id, title: element.title});

		});

		return institutions;

	},

	areasList: state => {

		let areas = [];

		state.areas.forEach(function(element) {

			areas.push({id: element.id, title: element.title});

		});

		return areas;

	},

	

}