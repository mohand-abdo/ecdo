<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AdvocacyController;
use App\Http\Controllers\CaseStudiesController;
use App\Http\Controllers\CoreValueController;
use App\Http\Controllers\EcdoStrtegyController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\HumanitarianStrtegyController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MottoController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TargetedGroupController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\Website\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FooterImageController;
use App\Http\Controllers\IndroController;
use App\Http\Controllers\SaveLiveController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HumanitarianController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\InnovateController;
use App\Http\Controllers\WhoIamController;
use Illuminate\Support\Facades\Route;




        Auth::routes(['register' => false]);

        // Admin web
        Route::group(['prefix' => 'admin','as' => 'admin.', 'middleware' => ['auth']],function(){
            Route::get('/home',[HomeController::class,'home'])->name('home');
            Route::resource('user',UserController::class);
            Route::resource('save_live',SaveLiveController::class);
            Route::resource('indro',IndroController::class);
            Route::resource('footer_image',FooterImageController::class);
            Route::resource('story',StoryController::class);
            Route::resource('help',HelpController::class);
            Route::resource('humanitarian',HumanitarianController::class);
            Route::resource('section',SectionController::class);
            Route::resource('case_studies',CaseStudiesController::class);
            Route::resource('vision',VisionController::class);
            Route::resource('mission',MissionController::class);
            Route::resource('motto',MottoController::class);
            Route::resource('who_iam',WhoIamController::class);
            Route::resource('humanitarian_strtegy',HumanitarianStrtegyController::class);
            Route::resource('ecdo_strtegy',EcdoStrtegyController::class);
            Route::resource('core_value',CoreValueController::class);
            Route::resource('objective',ObjectiveController::class);
            Route::resource('targeted_group',TargetedGroupController::class);
            Route::resource('environment',EnvironmentController::class);
            Route::resource('program',ProgramController::class);
            Route::resource('partner',PartnerController::class);
            Route::resource('project',ProjectController::class);
            Route::resource('impact',ImpactController::class);
            Route::resource('advocacy',AdvocacyController::class);
            Route::resource('innovate',InnovateController::class);
            Route::get('contact',[ContactController::class,'index'])->name('contact.index');
            Route::get('contact/{contact}',[ContactController::class,'show'])->name('contact.show');
        });

        // Website
        Route::get('/',[WelcomeController::class,'index'])->name('welcome');
        Route::get('contact',[WelcomeController::class,'contact'])->name('contact.index');
        Route::post('contact/store',[ContactController::class,'store'])->name('contact.store');
        Route::get('story/{story}/',[WelcomeController::class,'show_story'])->name('story.show');
        Route::get('resource/{resource}/',[WelcomeController::class,'show_resource'])->name('resource.show');
        Route::get('all_stories',[WelcomeController::class,'all_story'])->name('story.index');
        Route::get('section/{section}/stories',[WelcomeController::class,'section_story'])->name('section.story');
        Route::get('advocacy',[WelcomeController::class,'advocacy'])->name('advocacy.index');
        Route::get('story/section/{section}',[WelcomeController::class,'story_section'])->name('story.section');
        Route::get('our_impact',[WelcomeController::class,'our_impact'])->name('our_impact');
        Route::get('innovation',[WelcomeController::class,'innovation'])->name('innovation');
        Route::get('case_studies',[WelcomeController::class,'case_studies'])->name('case_studies');
        Route::get('about_us',[WelcomeController::class,'about'])->name('about');
        Route::get('humanitarian_strtegy',[WelcomeController::class,'humanitarian_strtegy'])->name('humanitarian_strtegy');
        Route::get('ecdo_strtegy',[WelcomeController::class,'ecdo_strtegy'])->name('ecdo_strtegy');
        Route::get('core_value',[WelcomeController::class,'core_value'])->name('core_value');
        Route::get('objective',[WelcomeController::class,'objective'])->name('objective');
        Route::get('targeted_group',[WelcomeController::class,'targeted_group'])->name('targeted_group');
        Route::get('environment',[WelcomeController::class,'environment'])->name('environment');
        Route::get('program',[WelcomeController::class,'program'])->name('program');
        Route::get('project',[WelcomeController::class,'project'])->name('project');



