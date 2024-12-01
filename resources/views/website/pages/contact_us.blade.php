@extends('website.layouts.app')

@section('title','Contact')

@push('style')
    <style>
        a.button--secondary {
            border-color: #2ecc71
        }

        a.button--secondary:hover {
            background: #2ecc71;
            border-color: #2ecc71;
        }

        .body-text__content ul li::before {
            background: #2ecc71;
            border-color: #2ecc71;
        }

        .body-text__content ol a, .body-text__content p a, .body-text__content ul a{
            box-shadow: inset 0 -2px 0 #2ecc71;
        }

        .body-text__content ol a:hover, .body-text__content p a:hover, .body-text__content ul a:hover{
            box-shadow: inset 0 -8px 0  #2ecc71;
        }

        .embed-form form p input:focus, .embed-form form p select:focus, .embed-form form p textarea:focus{
            border-color: #2ecc71;
            caret-color: #2ecc71;
        }

        .embed-form form p input[type=submit]{
            background: #2ecc71;
        }

        .embed-form form p input[type=submit]:hover{
            background: #66e69c
        ;
        }
    </style>
@endpush

@section('content')
    <div class="salesforce-page">
        <section class="interior-hero">

            <div class="container " style="margin-top: 60px">

                <div class="interior-hero__content no-image">
                    <div class="interior-hero__backdrop no-image" role="presentation" style="background-color: #55efc430">
                        <div class="interior-hero__pattern" role="presentation"></div>
                    </div>

                    <h1 class="interior-hero__heading">
                        Contact ECDO
                    </h1>


                </div>

            </div>
        </section>


        <style>
            a.button--secondary {
                border-color: #2ecc71
            }

            a.button--secondary:hover {
                background: #2ecc71;
                border-color: #2ecc71;
            }

            .body-text__content ul li::before {
                background: #2ecc71;
                border-color: #2ecc71;
            }
        </style>



        <section class="body-text ">
            <div class="container">

                <div class="body-text__content">

                    <h3>ECDO locations</h3>
                    <p>ECDO Sudan headquarters are located at:<br />
                        HQ- Mamora.(60) St. Khartoum – Sudan</p>
                    <p>For more information, view a list of our <a href="Maecdo44@gmail.Com">Maecdo44@gmail.Com</a>
                        and <a href="Info@ecdo.Org.Sd">Info@ecdo.Org.Sd</a>.</p>
                    <p>Tell : +249123070768- +29915593170</p>

                </div>
            </div>
        </section>

        <section class="embed-form">
            <div class="container">
                <div class="embed-form__content">
                    <form id="myForm">
                        @csrf
                        <p>
                            <label for="Name">Contact Name</label><br />
                            <input id="Name" maxlength="80" name="name" size="20" type="text" />
                            <span id="name-error" style="color: red"></span>
                        </p>
                        <p>
                            <label for="Email">Email</label><br />
                            <input id="Email" maxlength="80" name="email" size="20" type="text" />
                            <span id="email-error" style="color: red"></span>
                        </p>
                        <p>
                            <label for="mobile">Phone</label><br />
                            <input id="mobile" maxlength="40" name="mobile" size="20" type="text" />
                            <span id="mobile-error" style="color: red"></span>
                        </p>
                        <p>
                            <label for="subject">Subject</label><br />
                            <input id="subject" maxlength="40" name="subject" size="20" type="text" />
                            <span id="subject-error" style="color: red" ></span>
                        </p>
                        <p><label for="message">Description/Additional Info Box</label></p>
                        <p><textarea id="message" name="message"></textarea></p>
                        <span id="message-error" style="color: red"></span>
                        <p><input id="btn-save" class="button button--primary" name="submit" type="submit" value="Submit" /></p>
                    </form>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#myForm').submit(function(e) {
                e.preventDefault(); // منع إرسال النموذج بالطريقة العادية

                // تنظيف الرسائل السابقة
                $('#name-error').text('');
                $('#email-error').text('');
                $('#mobile-error').text('');
                $('#subject-error').text('');
                $('#message-error').text('');

                // جلب البيانات من النموذج
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('contact.store') }}", // استبدلها بالـ route المناسبة
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            // إظهار SweetAlert عند النجاح
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });

                            $('#Name').val('');
                            $('#Email').val('');
                            $('#mobile').val('');
                            $('#subject').val('');
                            $('#message').val('');
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;

                        if (errors.name) {
                            $('#name-error').text(errors.name[0]);
                        }
                        if (errors.mobile) {
                            $('#mobile-error').text(errors.mobile[0]);
                        }
                        if (errors.subject) {
                            $('#subject-error').text(errors.subject[0]);
                        }
                        if (errors.email) {
                            $('#email-error').text(errors.email[0]);
                        }
                        if (errors.message) {
                            $('#message-error').text(errors.message[0]);
                        }
                    }
                });
            });
        });

        function addArrow() {
            var link = document.getElementById("daf_link"); // Get the link element
            var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg"); // Create SVG element
            svg.setAttribute("class", "arrow-svg");
            var use = document.createElementNS("http://www.w3.org/2000/svg", "use"); // Create <use> element
            use.setAttribute("href", "#arrow-white"); // Set href attribute
            svg.appendChild(use); // Append <use> to SVG
            link.appendChild(svg); // Append SVG to the link
        }

        // Call the function to add arrow after text
        addArrow();
    </script>

@endpush
