<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Course\CourseRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use App\Models\Course\Course;

/**
 * Class CourseController
 *
 * @package App\Http\Controllers\Frontend\Course
 */
class CourseController extends Controller
{
    /**
     * @var \App\Repositories\Course\CourseRepository
     */
    private $coursesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * CourseController constructor.
     *
     * @param \App\Repositories\Course\CourseRepository $coursesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CourseRepository $coursesRepository, PageRepository $pageRepository)
    {
        $model = $coursesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->coursesRepository = $coursesRepository;
        $this->pageRepository = $pageRepository;
        $this->viewFrontendPath = $model::VIEW_FRONTEND_PATH;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        $page = $this->pageRepository->indexPage($this->repository()->model());

        MetaTag::setEntity($page);

        // $institutions = ActiveInstitution()->load(['country']);

        // $areas = AreaOfStudy()->load(['activeCourses']);

        $institutions = ActiveInstitution();

        $areas = AreaOfStudy();

        return view("{$this->viewFrontendPath}.index", compact('page', 'institutions', 'areas'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->coursesRepository;
    }

    /**
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show(string $routeKeyName)
    {
        $page = $model = $this->getModel($routeKeyName, false);

        MetaTag::setEntity($model);

        return view("{$this->viewFrontendPath}.show", compact('model', 'page'));
    }

    public function search($area_id, $institution_id, $course_name)
    {

        if ($area_id && $institution_id && $course_name != 'empty_course_name') {

            $courses = Course::whereStatus('enable')
                              ->where('institution_id', $institution_id)
                              ->where('area_of_study_id', $area_id)
                              ->where('title', 'like', '%' . $course_name . '%')
                              ->get();

        }else if ($area_id && $institution_id) {

            $courses = Course::whereStatus('enable')
                              ->where('institution_id', $institution_id)
                              ->where('area_of_study_id', $area_id)
                              ->get();

        }else if ($area_id && $course_name != 'empty_course_name') {

            $courses = Course::whereStatus('enable')
                              ->where('area_of_study_id', $area_id)
                              ->where('title', 'like', '%' . $course_name . '%')
                              ->get();

        }else if ($institution_id && $course_name != 'empty_course_name') {

            $courses = Course::whereStatus('enable')
                              ->where('institution_id', $institution_id)
                              ->where('title', 'like', '%' . $course_name . '%')
                              ->get();

        }else if ($area_id){

            $courses = Course::whereStatus('enable')
                              ->where('area_of_study_id', $area_id)
                              ->get();

        }else if ($institution_id){

            $courses = Course::whereStatus('enable')
                              ->where('institution_id', $institution_id)
                              ->get();

        }else{

            $courses = Course::whereStatus('enable')
                              ->where('title', 'like', '%' . $course_name . '%')
                              ->get();
        
        }

        return $courses;

    }
}
