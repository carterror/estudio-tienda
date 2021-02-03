class MDSlider {
    constructor(){
        this.slider_active = 0;
        this.items = document.getElementsByClassName('md-slider-item');
        this.elements = this.items.length - 1;
        this.init();
    }
    init(){
        var prew = document.getElementById('md-slide-nav-prew');
        var next = document.getElementById('md-slide-nav-next');

        prew ? prew.addEventListener('click', function () {
            this.navegar('prew');
        }.bind(this)): null;

        next ? next.addEventListener('click', function () {
            this.navegar('next');
        }.bind(this)): null;
    }
    show(){
        var i;
        for (i = 0; i < this.items.length; i++) {
            var post = i*100;
            this.items[i].style.left = post+'%';
            this.items[i].style.display = 'flex';
        }
        // console.log(items.length);
        console.log('slider activo '+ this.slider_active);
        console.log('total slider activo '+ this.elements);
    }

    active(element){
        var i;
            for (i = 0; i < this.items.length; i++) {
                var pos = parseInt(this.items[i].style.left) + element * 100;
                this.items[i].style.left = pos+'%';
            }
        }

    navegar(accion){
        if (accion == "prew") {
            if (this.slider_active > 0) {
                this.slider_active = this.slider_active - 1;
                this.active(1);
            } else {
                this.slider_active = this.elements;
                this.active(-this.elements);
                }
        } else if(accion == "next") {
            if (this.slider_active < this.elements) {
                this.slider_active = this.slider_active + 1;
                this.active(-1);
            } else {
                this.slider_active = 0;
                this.active(this.elements);
                }
        }

        // this.active();

    }

}
