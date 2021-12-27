<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Websit;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $lastProjects = Project::latest()->paginate(3);
        $sliders = Slider::paginate();

        return view('frontend.index',[
            'lastProjects' => $lastProjects,
            'sliders' => $sliders,
        ]);
    }

    public function viewProjects()
    {
        $projects = Project::paginate();

        return view('frontend.projects',[
            'projects' => $projects
        ]);
    }

    public function viewServices()
    {
        $lastProjects = Project::latest()->paginate(2);
        $services = Service::paginate();

        return view('frontend.services',[
            'lastProjects' => $lastProjects,
            'services' => $services,
        ]);
    }

    public function viewBlogs()
    {
        $blogs = Blog::paginate();

        return view('frontend.blogs',[
            'blogs' => $blogs
        ]);
    }

    public function viewSingleBlog(Blog $blog)
    {
        return view('frontend.single-blog',[
            'blog' => $blog,
        ]);
    }

    public function viewSingleProject(Project $project)
    {
        return view('frontend.single-project',[
            'project' => $project,
        ]);
    }

    public function viewAbout(Page $page)
    {
        $teams = Team::paginate();
        return view('frontend.about',[
            'about' => $page,
            'teams' => $teams,
        ]);
    }



}
