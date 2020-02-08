function precio() {
    document.getElementById('btn-precio').disabled = true;
    document.getElementById('btn-area').disabled = false;
    var cuenta = document.getElementById('cuenta').value;
    var precio = [];
    var comparable = [];
    for (let index = 1; index <= cuenta; index++) {
        precio.push(Number(document.getElementById('precio'.concat(index)).value));
        document.getElementById('comparable'.concat(index)).innerHTML = precio[index - 1].toFixed(2);
        comparable.push(document.getElementById('nombre'.concat(index)).value);
    }
    imprimir(precio);
    graficos(precio, ordenarNombre(cuenta));
}

function area() {
    document.getElementById('btn-area').disabled = true;
    document.getElementById('btn-precio').disabled = false;
    var cuenta2 = document.getElementById('cuenta').value;
    var parea = [];
    var comparable = [];
    for (let index = 1; index <= cuenta2; index++) {
        p = Number(document.getElementById('precio'.concat(index)).value);
        a = Number(document.getElementById('area'.concat(index)).value);
        parea.push(Number(p / a));
        document.getElementById('comparable'.concat(index)).innerHTML = parea[index - 1].toFixed(2);
        comparable.push(document.getElementById('nombre'.concat(index)).value);
    }
    imprimir(parea);
    graficos(parea, ordenarNombre2(cuenta2));
}

function imprimir(params) {
    document.getElementById('minimo').innerHTML = parseFloat(Math.min.apply(null, params)).toFixed(2);
    document.getElementById('primerq').innerHTML = parseFloat(jstat.percentile(params, 0.25, false)).toFixed(2);
    document.getElementById('segundoq').innerHTML = parseFloat(jstat.median(params)).toFixed(2);
    document.getElementById('tercerq').innerHTML = parseFloat(jstat.percentile(params, 0.75, false)).toFixed(2);
    document.getElementById('maximo').innerHTML = parseFloat(Math.max.apply(null, params)).toFixed(2);
    document.getElementById('media').innerHTML = parseFloat(media(params)).toFixed(2);
    document.getElementById('median.geo').innerHTML = parseFloat(jstat.median(params)).toFixed(2);
    document.getElementById('st.dev').innerHTML = parseFloat(jstat.stdev(params, true)).toFixed(2);
    document.getElementById('valor').innerHTML = "Valor";
}

function media(datos) {
    let suma = 0;
    datos.forEach(function (numero) {
        suma += Number(numero);
    });
    return (suma / datos.length);
}

function graficos(datos, Label) {
    var ctx = document.getElementById('grafico').getContext('2d');
    datos.unshift(0);
    Label.unshift('');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Label,
            datasets: [{
              label: 'Grafico de Precios',
              borderColor: 'rgba(30, 130, 76, 1)',
              backgroundColor : 'rgba(30, 130, 76, 0.4)',
              data: datos.sort(),
            }]
          },
    });
}

function ordenarNombre(cuenta) {
    let datosUnsort = [];
    let datos = [];
    for (let index = 1; index <= cuenta; index++) {
        datosUnsort.push(Number(document.getElementById('precio'.concat(index)).value));
        datos.push(Number(document.getElementById('precio'.concat(index)).value));
    }
    datosSort = datosUnsort.sort();
    let comparableSorted = [];
    datos.forEach(element => {
        index = datosSort.indexOf(element);
        value = document.getElementById('nombre'.concat(index + 1)).value;
        document.getElementById('n.comparable'.concat(index + 1)).innerHTML = value;
        comparableSorted.push(document.getElementById('nombre'.concat(index + 1)).value);
    });
    return comparableSorted;
}

function ordenarNombre2(cuenta) {
    let datosUnsort = [];
    let datos = [];
    for (let index = 1; index <= cuenta; index++) {
        p = Number(document.getElementById('precio'.concat(index)).value);
        a = Number(document.getElementById('area'.concat(index)).value);
        datosUnsort.push(Number(p / a));
        datos.push(Number(p / a));
    }
    datosSort = datosUnsort.sort();
    let comparableSorted = [];
    datos.forEach(element => {
        index = datosSort.indexOf(element);
        value = document.getElementById('nombre'.concat(index + 1)).value;
        document.getElementById('n.comparable'.concat(index + 1)).innerHTML = value;
        comparableSorted.push(document.getElementById('nombre'.concat(index + 1)).value);
    });
    return comparableSorted;
}
