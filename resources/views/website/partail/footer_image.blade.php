@if ($footer_image)
    <section class="donate-box">
        <div class="container">
            <div class="donate-box__wrapper">
                <div class="donate-box__image donate-box__image" style="background-image: url('{{ asset("images/footer_image/sm_image/".$footer_image->image) }}')" ></div>
                <div class="donate-box__image-md donate-box__image-md"  style="background-image:url('{{ asset("images/footer_image/".$footer_image->image) }}')"></div>

                <div class="donate-box__content donate-box__content">
                    <h2 class="donate-box__headline">{{ $footer_image->title }}</h2>
                    <p class="donate-box__description">{!! $footer_image->body !!}</p>

                </div>
            </div>
        </div>
    </section>
@endif
