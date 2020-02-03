function precio() {
    document.getElementById('btn-precio').disabled = true;
    document.getElementById('btn-area').disabled = false;
    var cuenta = document.getElementById('cuenta').value;
    var precio = [];
    for (let index = 1; index <= cuenta; index++) {
        precio.push(document.getElementById('precio'.concat(index)).value);
    }
    // percentil(precio);
    // let r = percentil(precio);
    document.getElementById('minimo').innerHTML = Math.min.apply(null, precio);
    document.getElementById('maximo').innerHTML = Math.max.apply(null, precio);

    document.getElementById('media').innerHTML = media(precio);
  }

function area() {
    document.getElementById('btn-area').disabled = true;
    document.getElementById('btn-precio').disabled = false;
    var x = percentil(25);
    alert(x);
}

function media(params) {
    suma = 0;
    params.forEach(function (numero) {
        suma += Number(numero);
    });
    return  (suma / params.length);

}

function cuartil(valores, indice){

}
