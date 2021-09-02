function ValidarFechas() {

    var toret = true;

    var startDate = document.getElementById("fechai").value;
    var endDate = document.getElementById("fechaf").value;

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    
    if (!startDate){
        document.getElementById("fechai").value = "1980-01-01";
        startDate = document.getElementById("fechai").value;
    }
    if (!endDate) {
        document.getElementById("fechaf").value = today;
        endDate = document.getElementById("fechaf").value;
    }
        if ((Date.parse(endDate) <= Date.parse(startDate))) {
            toret = false;
            alert("La Fecha Inicio no puede ser posterior a la Fecha Fin");
            document.getElementById("fechaf").value = today;
            document.getElementById("fechai").value = "1980-01-01";
        }

    return toret;
}

