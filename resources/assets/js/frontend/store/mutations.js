export default {

	courses(state, courses) {

		let category = Object.values(JSON.parse(courses));

		category.forEach(function(element) {

			element.sub_courses.forEach(function(course) {
			
				state.courses.push(course);

			});

		});

	},

	updateKey(state, key) {

		state.key = key;

	},

}