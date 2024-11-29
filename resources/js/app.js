import './bootstrap';

import Swal from 'sweetalert2';
            
if (window.sessionName) {
    Swal.fire({
        title:'success!',
        text: window.sessionName,
        icon: 'success',
        confirmButtonText: 'نعم',
    });
}
document.querySelectorAll('.btn-delete').forEach(button => {button.addEventListener('click',function(){
    const dataId = this.getAttribute('data-id');
    const url = this.getAttribute('data-url');
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    Swal.fire({
        title: 'هل انت متاكد ؟',
        text: 'لن  تتمكن من التراجع عن هذا !',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#59ceb5',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم احذفه',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers : {
                    'Content-type' : 'application/json',
                    'X-CSRF-TOKEN' :token
                },
                url: url,
                type: "DELETE",
                contentType: "application/json charset=utf-8",
                dataType: "json",
                success: function (response) {
                    if (response.status == true) {
                        Swal.fire({
                            title:'success!',
                            text: 'تم حذف البيانات بنجاح',
                            icon: 'success',
                            confirmButtonText: 'نعم',
                        });
                       location.reload(); 
                    }
                    else {
                        Swal.fire({
                            title:'Error!',
                            text: 'خطا ما',
                            icon: 'error',
                            confirmButtonText: 'نعم',
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        title:'Error!',
                        text: 'حدث خطا ما',
                        icon: 'error',
                        confirmButtonText: 'نعم',
                    });
                }
            });
        }
    });    
});
});

const imageInput = document.getElementById('myFile');
const imagePreviw = document.getElementById('imagePreview');

imageInput.addEventListener('change',function(event){
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            imagePreviw.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
})


