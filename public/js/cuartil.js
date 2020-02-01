function precio() {
    document.getElementById('btn-precio').disabled = true;
    document.getElementById('btn-area').disabled = false;
    alert('Prueba de precio');
  }

function area() {
    document.getElementById('btn-area').disabled = true;
    document.getElementById('btn-precio').disabled = false;
    var x = percentil(25);
    alert(x);
}

function percentil(percentil){
    return percentil/4;
}
