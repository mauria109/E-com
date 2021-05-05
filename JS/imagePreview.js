function readURL(input){
    if (input.files && input.files[0]){
        let reader = new FileReader();

        reader.onload = function (ev){
            $('#blah').attr('src', ev.target.result)
        }
        reader.readAsDataURL(input.files[0]); //convertit en base 64 string
    }

}

$("img").change(function (){
    readURL(this);
});
