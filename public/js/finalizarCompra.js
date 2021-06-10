document.addEventListener('DOMContentLoaded',function(){
   const btnFin = document.getElementById('btnFinalizar')

   btnFin.addEventListener('click',function(){
    const mensaje = "¿Desea finalizar su compra? La compra será enviada una vez termine el proceso."
    if(confirm(mensaje)){
        const finDeCompra = document.getElementById('finDeCompra')
        finDeCompra.submit()
    }
   })
})
