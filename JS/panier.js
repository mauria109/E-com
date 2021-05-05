jQuery(document).ready(function($){
    $('.add_panier').click(function (event){
        event.preventDefault();
        $.get(this.attr('href'), {}, function(data){

            if (data.error){
                alert(data.message)

            }else{
                if (confirm(data.message + ". Voulez vous consulter le panier ?")){
                    location.href = 'D:\\Workspace\\E-Handel-main\\E-Handel-main\\code\\PHP\\shop\\General\\paniers.php';
                }else {
                    $('#total').empty().append(data.total);
                    $('#count').empty().append(data.count);
                }
            }
        }, 'json')
        return false;
    });
});

document.querySelectorAll('.table-responsive').forEach(function (table) {
    let labels = Array.from(table.querySelectorAll('th')).map(function (th) {
        return th.innerText
    })
    table.querySelectorAll('td').forEach(function (td, i) {
        td.setAttribute('data-label', labels[i % labels.length])
    })
})
