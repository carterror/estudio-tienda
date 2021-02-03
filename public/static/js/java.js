const base = location.protocol + '//' + location.host;
const route = document.getElementsByName('routeName')[0].getAttribute('content');
const http = new XMLHttpRequest();
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content');
const moneda = document.getElementsByName('currency')[0].getAttribute('content');
var page = 1;
var page_section = ";"

document.addEventListener('DOMContentLoaded', function () {

    var btn_avatar_edit = document.getElementById('btn_avatar_edit');
    var image_avatar_edit = document.getElementById('image_avatar_edit');
    var form_avatar = document.getElementById('form_avatar');
    var overlay_avatar = document.getElementById('overlay_avatar');
    var load_more_product = document.getElementById('load_more_product');

    if (btn_avatar_edit) {
        btn_avatar_edit.addEventListener('click', function (e) {
            e.preventDefault();
            image_avatar_edit.click();
        });
    }

    if (load_more_product) {
        load_more_product.addEventListener('click', function (e) {
            e.preventDefault();
            load_product(page_section);
        });
    }

    if (image_avatar_edit) {
        image_avatar_edit.addEventListener('change', function () {
            var load_img = '<div class="spinner-grow text-info" role="status"><span class="sr-only">Loading...</span></div>';
            overlay_avatar.innerHTML = load_img;
            overlay_avatar.style.background = 'rgba(0, 0, 0, .6)';
            form_avatar.submit();
        })
    }

    if (route == "home") {
        load_product('home')
    }
    
});

function load_product(section) {
    page_section = section;
    var url = base+'/md/api/load/product/'+page_section+'?page='+page;
    
    http.open('GET', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            page++;
            var data = this.responseText;
            data = JSON.parse(data);
            if (data.data.length == 0) {
                load_more_product.style.display = "none";
            }
            var Productos = document.getElementById("productos");
            data.data.forEach(product => {
                var div = "";
                div +=  '<div class="product shadow">';
                div +=          '<div class="img">';
                div +=              '<div class="overlay"><div class="btns"><a href="'+base+'/product/'+product.id+'/'+product.slug+'"><i class="fas fa-eye"></i></a><a href="#"><i class="fas fa-cart-plus"></i></a><a href="#" onclick="add_to_favorites('+product.id+',1); return false;"><i class="fas fa-heart"></i></a></div></div>';
                div +=              '<div class="img"><img src="'+base+'/uploads/'+product.file_path+'/t_'+product.image+'"></div>';
                div +=          '</div>';
                div +=      '<a href="'+base+'/product/'+product.id+'/'+product.slug+'" class="paste">';
                div +=          '<div class="title">'+product.name+'</div>';
                div +=          '<div class="precio">'+moneda+product.precio+'</div>';
                div +=          '<div class="opcion"></div>';
                div +=      '</a>';
                div +=  '</div>';

                Productos.innerHTML += div;

            });

        }else{
            //error
        }
    }
}

function add_to_favorites(object, module) {
    url = base+'/md/api/favorites/add/'+object+'/'+module;
    console.log(url);
}