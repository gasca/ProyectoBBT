function cargarPagina(url) {
    alert('si llega')
    var loading = document.getElementById('loading');
    loading.style.display = 'flex';
    
    setTimeout(function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.body.innerHTML = xhr.responseText;
                loading.style.display = 'none';
            }
        };
        xhr.send();
    }, 10000); // 5 segundos
}

document.getElementById('cargarCEquipo').addEventListener('click', function(event) {
    alert('que te pasa')
    event.preventDefault();
    cargarPagina('CEquipo.html');
});

document.getElementById('cargarTEquipo').addEventListener('click', function(event) {
    event.preventDefault();
    cargarPagina('TEquipo.html');
});

function mostrarLoading(url) {
    var loading = document.getElementById('loading');
    loading.style.display = 'flex';
    setTimeout(function() {
        window.location.href = url;
    }, 5000); // 5 segundos
}