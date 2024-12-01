
<footer class="footer" role="contentinfo">
  <style>
    .footer #pie circle:first-of-type {
      stroke: #2ecc71;
    }

    .footer #pie circle:last-of-type {
      stroke: #2ecc71;
    }
  </style>

  <div class="container">
    <div class="footer__to-top">
      <span>Back to Top</span>
    </div>

    <div class="footer__logo">
      <img loading="lazy" class="footer__logo-image" src="{{ asset('images/logo2.jpg') }}" alt="CARE Logo" width="375" height="121">
      <img loading="lazy" class="footer__logo-image-md" src="{{ asset('images/logo2.jpg') }}" alt="CARE Logo" width="95" height="118">
      <p>{{ indro() != '' ? indro()->title : ''}}</p>
    </div>

    <div class="footer__stat-md">
      <div class="footer__stat-md-pie footer-pie" data-pct="0" data-target-pct="90%">
        <svg viewBox="0 0 95 95" id="pie">
          <circle cx="47.5" cy="47.5" r="43.25" fill="none" stroke="#2ecc71" />
          <circle cx="47.5" cy="47.5" r="43.25" fill="none" stroke="#2ecc71" stroke-dasharray="0 271.748"/>
        </svg>    </div>

        <div class="footer__stat-md-description">
          <p>90% of all our expenses go to program services.</p>

          <a href="#">Learn more</a>
        </div>
      </div>

      <div class="footer__menu-left">
        <ul>
          <li>
            <a href="{{ route('about') }}">Vision & Mision</a>
          </li>
          <li>
            <a href="{{ route('humanitarian_strtegy') }}">Humanitarian Strtegies</a>
          </li>
          <li>
            <a href="{{ route('ecdo_strtegy') }}">Ecdo Strtegies</a>
          </li>
          <li>
            <a href="{{ route('core_value') }}">Core Values</a>
          </li>
          <li>
            <a href="{{ route('objective') }}">Objectives</a>
          </li>
          <li>
            <a href="{{ route('targeted_group') }}">Targeted Groups</a>
          </li>
        </ul>
      </div>

      <div class="footer__menu-right">
        <ul>
            @if(branches()->count() > 0)
                @foreach(branches() as $branche)
                  <li>
                    <a href="#">{{ $branche->title }}</a>
                  </li>
                @endforeach
            @endif
        </ul>
      </div>

      <div class="footer__social-links">
        <a href="Https://Www.Facebook.Com/Reconstruction.Ecdo?Mibextid=zbwkwl">
          <svg>
            <use href="#facebook"/>
          </svg>
        </a>

        <a href="#">
          <svg>
            <use href="#twitter"/>
          </svg>
        </a>

        <a href="#">
          <svg>
            <use href="#instagram"/>
          </svg>
        </a>

        <a href="#">
          <svg>
            <use href="#youtube"/>
          </svg>
        </a>

        <a href="#">
          <svg>
            <use href="#linkedin"/>
          </svg>
        </a>
      </div>

      <div class="footer__stat">
        <div class="footer__stat-pie footer-pie" data-pct="0" data-target-pct="90%">
          <svg viewBox="0 0 95 95" id="pie">
            <circle cx="47.5" cy="47.5" r="43.25" fill="none" stroke="#2ecc71" />
            <circle cx="47.5" cy="47.5" r="43.25" fill="none" stroke="#2ecc71" stroke-dasharray="0 271.748"/>
          </svg>    </div>

          <div class="footer__stat-description">
            <p>90% of all our expenses go to program services.</p>

            <a href="financial-reports/index.html">Learn more</a>
          </div>
        </div>

        <div class="footer__legal">
            <p><strong>Bayan Software</strong> All Rights Reserved</p>

        </div>

        <div class="footer__social-links-md">
          <ul>
            <li>
              <a href="Https://Www.Facebook.Com/Reconstruction.Ecdo?Mibextid=zbwkwl">
                <svg class="footer__facebook">
                  <use href="#facebook"/>
                </svg>
              </a>
            </li>

            <li>
              <a href="#">
                <svg class="footer__twitter">
                  <use href="#twitter"/>
                </svg>
              </a>
            </li>

            <li>
              <a href="#">
                <svg class="footer__instagram">
                  <use href="#instagram"/>
                </svg>
              </a>
            </li>

            <li>
              <a href="#">
                <svg class="footer__youtube">
                  <use href="#youtube"/>
                </svg>
              </a>
            </li>

            <li>
              <a href="#">
                <svg class="footer__linkedin">
                  <use href="#linkedin"/>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
<script>
    // استدعاء العنصر الذي يحتوي على العدد النهائي
    const counter = document.getElementById('counter');

    // القيمة النهائية التي نريد الوصول إليها
    const target = parseInt(counter.getAttribute('data-target'), 10);

    // سرعة العد
    const speed = 50; // يمكنك ضبط السرعة هنا

    // دالة العد التزايدي
    function updateCounter() {
        const currentValue = parseInt(counter.innerText, 10);

        if (currentValue < target) {
            counter.innerText = currentValue + 1; // زيادة العدد بواحد
            setTimeout(updateCounter, speed); // استدعاء الدالة مرة أخرى بعد فترة زمنية معينة
        } else {
            counter.innerText = target; // التأكد من أن الرقم النهائي هو الهدف
        }
    }

    // تشغيل العد التزايدي
    updateCounter();

</script>
