export default {

	updateCourseName(state, course_name) {

		state.course_name = course_name;

	},

	updateInstitutionName(state, institution_name) {

		state.institution_name = institution_name;

	},

	updateAreaName(state, area_name) {

		state.area_name = area_name;

	},

	institutions(state, institutions) {

		state.institutions = Object.values(JSON.parse(institutions));

		state.institutions.forEach(function(element) {


			element.courses.forEach(function(course) {

				course.country = element.country.title;
			
				state.courses.push(course);

			});

		});

	},

	areas(state, areas) {

		state.areas = Object.values(JSON.parse(areas));

	},

}