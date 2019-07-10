export default {

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

	showResult: state => {

		return ! (state.course_name == '' && state.institution_name == null && state.area_name == null);

	},

	courses: state => {

		return state.courses;

	}

}