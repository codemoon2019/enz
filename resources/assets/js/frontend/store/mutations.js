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

	},

	areas(state, areas) {

		state.areas = Object.values(JSON.parse(areas));

		// state.areas.forEach(function(element) {

		// 	element.active_courses.forEach(function(course) {

		// 		state.courses.push(course);

		// 	});

		// });

	},

	updateCourse(state, courses) {

		// alert();

		state.courses = courses;

	}

}