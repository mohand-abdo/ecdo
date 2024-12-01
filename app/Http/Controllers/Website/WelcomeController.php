<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Advocacy;
use App\Models\CoreValue;
use App\Models\EcdoStrtegy;
use App\Models\Environment;
use App\Models\FooterImage;
use App\Models\HumanitarianStrtegy;
use App\Models\Indro;
use App\Models\Mission;
use App\Models\Motto;
use App\Models\Objective;
use App\Models\Program;
use App\Models\Project;
use App\Models\Resource;
use App\Models\SaveLive;
use App\Models\Section;
use App\Models\Story;
use App\Models\Help;
use App\Models\Impact;
use App\Models\Innovate;
use App\Models\TargetedGroup;
use App\Models\Vision;

class WelcomeController extends Controller
{
    public function index()
    {
        $data['indro'] = Indro::whereType(0)->latest()->first();
        $data['footer_image'] = FooterImage::latest()->first();
        $data['save_lives'] = SaveLive::latest()->take(4)->get();
        $data['stories'] = Story::latest()->take(3)->get();
        $data['helps'] = Help::latest()->take(3)->get();
        $data['humanitarians'] = Story::whereHumanitarian(1)->latest()->get();

        return view('website.pages.welcome',$data);
    }

    public function show_story(Story $story)
    {
        $stories = Story::whereSection_id($story->section_id)->whereNotIn('id',[$story->id])->latest()->get();
        $resources = Resource::whereStory_id($story->id)->latest()->get();
        return view('website.pages.show_story',compact('story','stories','resources'));
    }

    public function all_story()
    {
        $story = Story::first();
        if ($story)
        {
            $stories = Story::latest()->whereNotIn('id',[$story->id])->take(2)->get();
        }
        else{
            $stories = null;
        }
        $p_stories = Story::latest()->paginate(10);
        $sections = Section::get();
        return view('website.pages.all_stories',compact('story','stories','p_stories','sections'));
    }

    public function show_resource(Resource $resource)
    {
        $resources = Story::whereSection_id($resource->section_id)->whereNotIn('id',[$resource->id])->latest()->get();
        return view('website.pages.show_resource',compact('resources','resources'));
    }

    public function section_story(Section $section)
    {
        $stories = Story::whereSection_id($section->id)->latest()->paginate(10);
        $sections = Section::get();
        return view('website.pages.section_story',compact('stories','sections','section'));
    }

    public function advocacy()
    {
        $advocacy = Advocacy::latest()->first();
        return view('website.pages.advocacy',compact('advocacy'));
    }

    public function story_section(Section $section)
    {
        $stories = $section->stories->shuffle();
        $story_php = $stories->first();
        $footer_image = FooterImage::latest()->first();
        return view('website.pages.story_section',compact('section','stories','story_php','footer_image'));
    }

    public function our_impact()
    {
        $our_impact = Impact::latest()->first();
        return view('website.pages.our-impact',compact('our_impact'));
    }

    public function innovation()
    {
        $innovate = Innovate::latest()->first();
        $sections = Section::with('stories')->take(6)->get();
        return view('website.pages.innovation',compact('sections','innovate'));
    }

    public function case_studies()
    {
        $story = Story::whereCase_studies(1)->latest()->first();
        if ($story){
            $stories = Story::whereCase_studies(1)->latest()->whereNotIn('id',[$story->id])->take(2)->get();
        }
        else{
            $stories = null;
        }
        $p_stories = Story::whereCase_studies(1)->paginate(10);
        $sections = Section::get();
        return view('website.pages.case_studies',compact('story','stories','p_stories','sections'));
    }

    public function about()
    {
        $missions = Mission::get();
        $visions = Vision::get();
        $mottos = Motto::get();
        $indros = Indro::whereType(1)->get();

        return view('website.pages.mission_vision',compact('missions','visions','mottos','indros'));
    }

    public function humanitarian_strtegy()
    {
        $humanitarian_strtegies = HumanitarianStrtegy::get();
        return view('website.pages.humanitarian_strtegy',compact('humanitarian_strtegies'));
    }

    public function ecdo_strtegy()
    {
        $ecdo_strtegies = EcdoStrtegy::latest()->get();
        return view('website.pages.ecdo_strtegy',compact('ecdo_strtegies'));
    }

    public function core_value()
    {
        $core_values = CoreValue::latest()->get();
        return view('website.pages.core_values',compact('core_values'));
    }

    public function objective()
    {
        $objectives = Objective::latest()->get();
        return view('website.pages.objective',compact('objectives'));
    }

    public function targeted_group()
    {
        $targeted_groups = TargetedGroup::latest()->get();
        return view('website.pages.targeted_group',compact('targeted_groups'));
    }

    public function environment()
    {
        $environments = Environment::latest()->get();
        return view('website.pages.environment',compact('environments'));
    }

    public function program()
    {
        $programs = Program::latest()->get();
        return view('website.pages.program',compact('programs'));
    }

    public function project()
    {
        $projects = Project::with('images')->get();
        return view('website.pages.project',compact('projects'));
    }

    public function contact()
    {
        return view('website.pages.contact_us');
    }
}
