// console.log('detalles.js')
document.addEventListener("DOMContentLoaded", function() {
    document.getElementsByTagName('BODY')[0].addEventListener('click',function(e){
        console.log(e.target);
    if(e.target.closest('.productCat')){
        let id = e.target.closest('.productCat').id;  //
        window.location.href =`producto/${id}` ;
    }

    })//Donde haces click,devuelve el elemento, filtramos en qué hemos hecho clic, y cuando
    //hagamos clic en el controlador de productos, aplicamos la función.
});
