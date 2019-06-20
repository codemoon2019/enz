export default {

	filteredCourse: state => {


		// axios.get('/courses/search').then((response) => {

		// 	console.log(response.data);

		// 	// return response.data

		// 	// store.commit('updateCourse', response.data);

		// 	// state.courses = response.data;

  //           // context.commit('SET_USER_DEALS', { deals: response.data.data })
            
  //           // return true;
        
  //       }, (err) => {
        
  //           console.log(err)
        
  //           return false;
  //       })


		return []; 

		// if (state.course_name == '' && state.institution_name == null && state.area_name == null)  {

		// 	// return state.courses;

		// 	return [];

		// }else{

		// 	let courses = state.courses.filter(function(course){

		// 		let course_exist      = true;

		// 		let institution_exist = true;
				
		// 		let area_exist        = true;

		// 		if (state.course_name != null) {
					
		// 			let course_name = state.course_name.toLowerCase();

		// 			let title = course.title.toLowerCase();

		// 			course_exist = title.search(course_name) == -1 ? false : true;

		// 		}

		// 		if (state.institution_name != null) {

		// 			institution_exist = course.institution_id == state.institution_name.id ? true : false;
					
		// 		}

		// 		if (state.area_name != null) {

		// 			area_exist = course.area_of_study_id == state.area_name.id ? true : false;
					
		// 		}

		// 		return course_exist && institution_exist && area_exist ? true : false;

		// 	});

		// 	courses.sort(function(a, b) {
				
		// 		var titleA = a.title.toLowerCase();
				
		// 		var titleB = b.title.toLowerCase();
				
		// 		if (titleA < titleB) {
				
		// 			return -1;
				
		// 		}else if (titleA > titleB) {
				
		// 			return 1;
				
		// 		}else{

		// 			return 0;
					
		// 		}

		// 	});

		// 	return courses;
		
		// }

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

	suggestions: (state, getters) => {

		let suggestions = [];

		// getters.filteredCourse.forEach(function(el){

		// 	suggestions.push(el.title);

		// });

		// return Array.from(new Set(suggestions)).slice(0, 10);

	},

	showResult: state => {

		// return true;

		return ! (state.course_name == '' && state.institution_name == null && state.area_name == null);

	},

	courses: state => {

		return state.courses;

	}

}