var base = location.protocol + '//' + location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function () {

    var btn_search = document.getElementById('btn_search');
    var form_search = document.getElementById('form_search');

    if(btn_search){
        btn_search.addEventListener('click', function (e) {
            if (form_search.style.display === "block") {
                form_search.style.display = 'none';
            } else {
                form_search.style.display = 'block';
            }
        });
    }

    if(route == "producto_edit"){
        var btn_product_file_image = document.getElementById('btn_product_file_image');
        var product_file_image = document.getElementById('product_file_image');
        btn_product_file_image.addEventListener('click', function () {
            product_file_image.click();
        }, false);

        product_file_image.addEventListener('change', function () {
            document.getElementById('form_product_gallery').submit();
        });
    }

    document.getElementsByClassName('lk-'+route)[0].classList.add('active');

    var btn_delete = document.getElementsByClassName("btn-delete");

    for (i = 0; i < btn_delete.length; i++) {
        btn_delete[i].addEventListener('click', deleted_object);   
    }

});

if(route == "producto_edit" || route == "producto_add" || route == "slider"){
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link' , '|', 'numberedList', 'bulletedList', '|', 'undo', 'redo', '|', 'insertTable', 'blockQuote']
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
}


function deleted_object(e) {
    e.preventDefault();
    var objeto = this.getAttribute('data-object');
    var accion = this.getAttribute('data-action');
    var path = this.getAttribute('data-path');
    var url = base + '/' + path + '/' + objeto + '/' + accion;
    var title, text, icon;

    if (accion=="delete") {
        title= "¿Estás seguro de que desea eliminar?";
        text= "Recuerde que lo enviará a la papelera";
        icon= "warning";
    }
    else if(accion=="restaurar") {
        title= "¿Estás seguro de que desea restaurarlo?";
        text= "Recuerde que lo restaurara de la papelera, y estará activo";
        icon= "info";
    }
    else{
        title= "¿Estás seguro de que desea eliminar?";
        text= "Recuerde que se eliminara de forma permanente";
        icon= "warning";
    }

    swal({
        title: title,
        text: text,
        icon: icon,
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = url;
        } else {
          swal("¡Todo está a salvo!", {
            icon: "success",
          });
        }
      });
}


if(route == "categoria" || route == "categoria_edit"){

    var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')
            var cerrar = document.getElementById('close');
            
                
            
            myInput.addEventListener('click', function () {
            myModal.style.display = "block";
            });
            cerrar.addEventListener('click', function () {
            myModal.style.display = "none";
            });


            var icono = document.getElementsByClassName('icomer');

            for (i = 0; i < icono.length; i++) {
                icono[i].addEventListener('click', select_icon);   
                }
            function select_icon() {
                
            var icon = document.getElementById('icon');
            var ver = document.getElementById('ca');
            var color = document.getElementById('color');
            var objeto = this.getAttribute('data-object'); 
            var code = this.getAttribute('data-code'); 

            icon.value = '<i style="color: '+color.value+';" class="'+code+'"></i>';
            ver.innerHTML = icon.value;
            cerrar.click();

        }
}