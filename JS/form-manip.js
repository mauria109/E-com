function debounce(callback, delay){
    let timer;
    return function(){
        let args = arguments;
        let context = this;
        clearTimeout(timer);
        timer = setTimeout(function(){
            callback.apply(context, args);
        }, delay)
    }
}

class Autogrow extends HTMLTextAreaElement{

    constructor () {
        super ();

        this.onFocus = this.onFocus.bind(this);
        this.autogrow = this.autogrow.bind(this);
        this.onResize =  debounce(this.onResize.bind(this), 300)  ;
    }

    connectedCallback () {
        this.addEventListener('focus', this.onFocus)
        this.addEventListener('input',  this.autogrow)
    }


    disconnectedCallback () {
        window.removeEventListener('resize', this.onResize);
    }

    onFocus () {
        console.log('onFocus');
        this.style.overflow = 'hidden';
        this.style.resize = 'none';
        this.style.boxSizing = 'border-box';
        this.autogrow()
        window.addEventListener('resize', this.onResize);
        this.addEventListener('input', this.autogrow)
        this.removeEventListener('focus',  this.onFocus)
    }

    onResize () {
        console.log('onResize');
        this.autogrow()

    }

    autogrow () {
        console.log('autogrow')
        this.style.height = 'auto'
        this.style.height = this.scrollHeight + 'px';
    }

}


customElements.define('textarea-autogrow', Autogrow, { extends: 'textarea' })


