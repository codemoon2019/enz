export default {

	filteredCourse: state => {

		if (state.key == null)  {

			return state.courses;

		}else{

			return state.courses.filter(function(course){

				let key = state.key.toLowerCase();

				let title = course.title.toLowerCase();

				return title.search(key) == -1 ? false : true;

			});
		
		}

	},

	

}