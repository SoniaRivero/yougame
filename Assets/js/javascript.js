/*BARRA NAVEGACION*/

let lastScrollTop = 0; 
const navbar = document.querySelector('.navbar');


window.addEventListener('scroll', () => {
    let st = window.pageYOffset || document.documentElement.scrollTop;

    if (st > lastScrollTop) {
        
        navbar.classList.remove('hide'); 
    } else if (st < lastScrollTop && st > 100) {
        
        navbar.classList.add('hide'); 
    }

    
    if (st <= 0) {
        navbar.classList.remove('hide'); 
    }

    lastScrollTop = st <= 0 ? 0 : st; 
});


/*ELIMINAR PRODUCTO CARRITO*/


function eliminarProducto(idProducto) {
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?url=carrito/eliminarProducto", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                
                console.log(xhr.responseText); 
                
                location.reload(); 
            } else {
                console.error("Error al eliminar el producto");
            }
        }
    };

    xhr.send("idProducto=" + idProducto); 
}

/*ELIMINAR PRODUCTO ME GUSTA*/


function eliminarProductomg(idProducto) {
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?url=megusta/eliminarProductomg", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                
                console.log(xhr.responseText); 
                
                location.reload(); 
            } else {
                console.error("Error al eliminar el producto");
            }
        }
    };

    xhr.send("idProducto=" + idProducto); 
}