<header class="header header--active">
  <div class="container navigation-contain">
    <a class="header__logo-link" href="{{ route('welcome') }}">
      <img loading="lazy" class="header__branding--xs" src="{{ asset('images/logo.jpg') }}" alt="ECDO.org" width="158" height="51">
    </a>
    <a class="header__logo-link header__logo-link--mobile" href="{{ route('welcome') }}">
      <img loading="lazy" class="header__branding" src="{{ asset('images/logo2.jpg') }}" alt="Care.org" width="375" height="121">
    </a>


    <nav>
      <div class="header__top">
        <div class="g-translate-widget">
          <div class="gtranslate_wrapper" id="gt-wrapper-38635505"></div>
        </div>
      </div>

      <div class="header__bottom">
        <div class="header__hamburger">
          <div class="header__hamburger-menu"></div>
        </div>

        <ul class="header__navigation">
          <li class="header__nav-item">
            <a class="header__menu-link" href="#">
              Our Work
            </a>
            <div class="header__submenu">
              <ul class="header__navigation--children">
                <div class="header__navigation-wrap">
                    @foreach(sections() as $section)
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('story.section',$section->id) }}">{{ $section->title }}
                    </a>
                  </li>
                    @endforeach
                  <div class="header__break"></div>
                  {{--<li class="header__navigation-wrap-item">
                    <a href="our-work/where-we-work/index.html">Where We Work
                    </a>
                  </li>--}}
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('our_impact') }}">Our Impact
                    </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('advocacy.index') }}">Advocacy
                    </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('innovation') }}">Innovation
                    </a>
                  </li>
                  <ul>
                  </ul>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('case_studies') }}">Case Studies
                    </a>
                  </li>
                  <ul>
                  </ul>
                </div>

              </ul>
            </div>
          </li>
          <li class="header__nav-item">
            <a class="header__menu-link" href="#">
              Programs & Projects
            </a>
            <div class="header__submenu">
              <ul class="header__navigation--children">
                <div class="header__navigation-wrap">
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('program') }}">Programs
                    </a>
                  </li>

                   <li class="header__navigation-wrap-item">
                        <a href="{{ route('project') }}">Projects
                        </a>
                   </li>
                </div>

              </ul>
            </div>
          </li>
          <li class="header__nav-item">
            <a class="header__menu-link" href="#">
              News & Stories
            </a>
            <div class="header__submenu">
              <ul class="header__navigation--children">
                <div class="header__navigation-wrap">
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('story.index') }}">Latest Stories
                    </a>
                  </li>
                  <ul>
                      @foreach(sections() as $section)
                        <li class="header__tertiary-item">
                          <a href="{{ route('section.story',$section->id) }}">{{$section->title}}</a>
                        </li>
                      @endforeach
                  </ul>
                </div>

              </ul>
            </div>
          </li>
          <li class="header__nav-item">
            <a class="header__menu-link" href="#">
              About Us
            </a>
            <div class="header__submenu">
              <ul class="header__navigation--children">
                <div class="header__navigation-wrap">
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('about') }}">Mission & Vision
                    </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('humanitarian_strtegy') }}">Humanitarian Strtegy </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('ecdo_strtegy') }}">Ecdo Strtegies
                    </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('core_value') }}">Core values
                    </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('objective') }}">Objective
                    </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('targeted_group') }}">Targeted Groups
                    </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('environment') }}">EHS
                    </a>
                  </li>
                  <li class="header__navigation-wrap-item">
                    <a href="{{ route('contact.index') }}">Contact Us
                    </a>
                  </li>
                </div>
              </ul>
            </div>
          </li>

        </ul>

        <div class="header__donate">

          <svg class="header__donate-link-close">
            <use href="#close"></svg>
            </div>

          </div>
        </nav>
      </div>

      <div class="header__mobile">
        <div class="container">
          <ul class="header__navigation header__navigation--mobile">
            <li class="header__nav-item header__nav-item--mobile">
              <a href="#">
                Our Work
              </a>
              <i class="icon icon--plus"></i>
            </li>
            <ul class="header__navigation--children-m">
                @foreach(sections() as $section)
                  <li class="header__navigation--children-m-item">
                    <a href="{{ route('story.section',$section->id) }}">
                        {{ $section->title }}
                    </a>
                  </li>
                @endforeach
              <li class="header__navigation--children-m-item">
                <a href="{{ route('our_impact') }}">
                  Our Impact
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('advocacy.index') }}">
                  Advocacy
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('innovation') }}">
                    Innovation
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('case_studies') }}">
                  Case Studies
                </a>
              </li>

              </ul>

            </ul>
            <li class="header__nav-item header__nav-item--mobile">
              <a href="#">
                Programs & Projects
              </a>
              <i class="icon icon--plus"></i>
            </li>
            <ul class="header__navigation--children-m">
              <li class="header__navigation--children-m-item">
                <a href="{{ route('program') }}">
                  Programs
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('project') }}">
                    Projects
                </a>
              </li>

            </ul>

            <li class="header__nav-item header__nav-item--mobile">
              <a href="#">
                News & Stories
              </a>
              <i class="icon icon--plus"></i>
            </li>
            <ul class="header__navigation--children-m">
              <li class="header__navigation--children-m-item">
                <a href="{{ route('story.index') }}">
                  Latest Stories
                </a>
              </li>
              <ul>
                  @foreach(sections() as $section)
                    <li class="header__tertiary-item">
                        <a href="{{ route('section.story',$section->id) }}">{{ $section->title }}</a>
                    </li>
                  @endforeach
              </ul>
            </ul>
            <li class="header__nav-item header__nav-item--mobile">
              <a href="#">
                About Us
              </a>
              <i class="icon icon--plus"></i>
            </li>
            <ul class="header__navigation--children-m">
              <li class="header__navigation--children-m-item">
                <a href="{{ route('about') }}">
                  Mission & Vision
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('humanitarian_strtegy') }}">
                    Humanitarian Strtegy
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('ecdo_strtegy') }}">
                    Ecdo Strtegies
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('core_value') }}">
                  Core Values
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('objective') }}">
                  Objectives
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('targeted_group') }}">
                  Targeted Groups
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="{{ route('environment') }}">
                  EHS
                </a>
              </li>
              <li class="header__navigation--children-m-item">
                <a href="about-us/contact-us/index.html">
                  Contact Us
                </a>
              </li>
            </ul>
          </ul>

          <div class="g-translate-widget">
            <div class="gtranslate_wrapper" id="gt-wrapper-38635505"></div>
          </div>
        </div>
      </div>

      <div class="preload">
        <img loading="lazy" src="wp-content/themes/careorg/assets/img/icons/arrow-right--orange.svg" width="15" height="15" alt="icon">
        <img loading="lazy" src="wp-content/themes/careorg/assets/img/icons/arrow-right--white.svg" width="15" height="15" alt="icon">
        <img loading="lazy" src="wp-content/themes/careorg/assets/img/icons/arrow-fingerprint.svg" width="15" height="15" alt="icon">
        <img loading="lazy" src="wp-content/themes/careorg/assets/img/icons/search--orange.svg" width="15" height="15" alt="icon">
        <img loading="lazy" src="wp-content/themes/careorg/assets/img/icons/close--orange.svg" width="15" height="15" alt="icon">
        <img loading="lazy" src="wp-content/themes/careorg/assets/img/icons/arrow-down-black.svg" width="15" height="15" alt="icon">
        <img loading="lazy" src="wp-content/themes/careorg/assets/img/icons/arrow-down.svg" width="15" height="15" alt="icon">
      </div>

    </header>
