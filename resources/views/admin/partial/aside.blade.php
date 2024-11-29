<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/user/'.auth()->user()->image) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->is('admin/indro') || request()->is('admin/indro/*') ? 'active' : '' }}"><a href="{{ route('admin.indro.index') }}"><i class="fa fa-th"></i><span>Introudtion</span></a></li>
            <li class="{{ request()->is('admin/footer_image') || request()->is('admin/footer_image/*') ? 'active' : '' }}"><a href="{{ route('admin.footer_image.index') }}"><i class="fa fa-th"></i><span>Footer Image</span></a></li>
            <li class="{{ request()->is('admin/section') || request()->is('admin/section/*') ? 'active' : '' }}"><a href="{{ route('admin.section.index') }}"><i class="fa fa-th"></i><span>Sections</span></a></li>
            <li class="{{ request()->is('admin/vision') || request()->is('admin/vision/*') ? 'active' : '' }}"><a href="{{ route('admin.vision.index') }}"><i class="fa fa-th"></i><span>Vision</span></a></li>
            <li class="{{ request()->is('admin/mission') || request()->is('admin/mission/*') ? 'active' : '' }}"><a href="{{ route('admin.mission.index') }}"><i class="fa fa-th"></i><span>Mission</span></a></li>
            <li class="{{ request()->is('admin/motto') || request()->is('admin/motto/*') ? 'active' : '' }}"><a href="{{ route('admin.motto.index') }}"><i class="fa fa-th"></i><span>Motto</span></a></li>
            <li class="{{ request()->is('admin/who_iam') || request()->is('admin/who_iam/*') ? 'active' : '' }}"><a href="{{ route('admin.who_iam.index') }}"><i class="fa fa-th"></i><span>Who Iam</span></a></li>
            <li class="{{ request()->is('admin/humanitarian_strtegy') || request()->is('admin/humanitarian_strtegy/*') ? 'active' : '' }}"><a href="{{ route('admin.humanitarian_strtegy.index') }}"><i class="fa fa-th"></i><span>Humanitarian Strtegy</span></a></li>
            <li class="{{ request()->is('admin/ecdo_strtegy') || request()->is('admin/ecdo_strtegy/*') ? 'active' : '' }}"><a href="{{ route('admin.ecdo_strtegy.index') }}"><i class="fa fa-th"></i><span>Ecdo Strtegies</span></a></li>
            <li class="{{ request()->is('admin/core_value') || request()->is('admin/core_value/*') ? 'active' : '' }}"><a href="{{ route('admin.core_value.index') }}"><i class="fa fa-th"></i><span>Core Values</span></a></li>
            <li class="{{ request()->is('admin/objective') || request()->is('admin/objective/*') ? 'active' : '' }}"><a href="{{ route('admin.objective.index') }}"><i class="fa fa-th"></i><span>Objective</span></a></li>
            <li class="{{ request()->is('admin/targeted_group') || request()->is('admin/targeted_group/*') ? 'active' : '' }}"><a href="{{ route('admin.targeted_group.index') }}"><i class="fa fa-th"></i><span>Targeted Group</span></a></li>
            <li class="{{ request()->is('admin/environment') || request()->is('admin/environment/*') ? 'active' : '' }}"><a href="{{ route('admin.environment.index') }}"><i class="fa fa-th"></i><span>EHS</span></a></li>
            <li class="{{ request()->is('admin/program') || request()->is('admin/program/*') ? 'active' : '' }}"><a href="{{ route('admin.program.index') }}"><i class="fa fa-th"></i><span>Program</span></a></li>
            <li class="{{ request()->is('admin/partner') || request()->is('admin/partner/*') ? 'active' : '' }}"><a href="{{ route('admin.partner.index') }}"><i class="fa fa-th"></i><span>Partner</span></a></li>
            <li class="{{ request()->is('admin/project') || request()->is('admin/project/*') ? 'active' : '' }}"><a href="{{ route('admin.project.index') }}"><i class="fa fa-th"></i><span>Project</span></a></li>
            <li class="{{ request()->is('admin/save_live') || request()->is('admin/save_live/*') ? 'active' : '' }}"><a href="{{ route('admin.save_live.index') }}"><i class="fa fa-th"></i><span>Save Live</span></a></li>
            <li class="{{ request()->is('admin/story' ) || request()->is('admin/story/*')? 'active' : '' }}"><a href="{{ route('admin.story.index') }}"><i class="fa fa-th"></i><span>Story</span></a></li>
            <li class="{{ request()->is('admin/help' ) || request()->is('admin/help/*')? 'active' : '' }}"><a href="{{ route('admin.help.index') }}"><i class="fa fa-th"></i><span>Help</span></a></li>
            <li class="{{ request()->is('admin/humanitarian' ) || request()->is('admin/humanitarian/*')? 'active' : '' }}"><a href="{{ route('admin.humanitarian.index') }}"><i class="fa fa-th"></i><span>Humanitarian</span></a></li>
            <li class="{{ request()->is('admin/impact' ) || request()->is('admin/impact/*')? 'active' : '' }}"><a href="{{ route('admin.impact.index') }}"><i class="fa fa-th"></i><span>Impact</span></a></li>
            <li class="{{ request()->is('admin/advocacy' ) || request()->is('admin/advocacy/*')? 'active' : '' }}"><a href="{{ route('admin.advocacy.index') }}"><i class="fa fa-th"></i><span>Advocacy</span></a></li>
            <li class="{{ request()->is('admin/innovate' ) || request()->is('admin/innovate/*')? 'active' : '' }}"><a href="{{ route('admin.innovate.index') }}"><i class="fa fa-th"></i><span>Innovate</span></a></li>
            <li class="{{ request()->is('admin/case_studies') || request()->is('admin/case_studies/*') ? 'active' : '' }}"><a href="{{ route('admin.case_studies.index') }}"><i class="fa fa-th"></i><span>Case Studies</span></a></li>
            <li class="{{ request()->is('admin/user') || request()->is('admin/user/*') ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}"><i class="fa fa-th"></i><span>Users</span></a></li>

        </ul>

    </section>

</aside>

