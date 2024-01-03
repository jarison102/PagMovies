function UpdateDepartament() {
    var NewCountry = document.getElementById("NewCountry").value;
    var DepartamentSelect = document.getElementById("NewDepartament");

    // Eliminamos las opciones anteriores
    while (DepartamentSelect.options.length > 0) {
        DepartamentSelect.remove(0);
    }

    // Aquí debes tener una función que obtenga los departamentos del país ingresado desde tu base de datos
    // y los almacene en un array o un objeto JSON.
    var DepartametAndCountry = obtainDepartament(NewCountry);

    // Creamos las opciones en el select
    for (var i = 0; i < DepartametAndCountry.length; i++) {
        var option = document.createElement("option");
        option.text = DepartametAndCountry[i];
        DepartamentSelect.add(option);
    } 
}

// Esta función simula la obtención de los departamentos del país ingresado.
// Puedes reemplazar esta función con una llamada AJAX a tu servidor para obtener los departamentos reales.
function obtainDepartament(NewCountry) {
    var NewDepartament = [];
    if (NewCountry === "Colombia") {
        NewDepartament = ["Antioquia", "Bogotá D.C.", "Valle del Cauca", "Cundinamarca", "Santander", "Atlántico", "Nariño", "Córdoba"];
    } else if (NewCountry === "Peru") {
        NewDepartament = ["Lima", "Arequipa", "Cusco", "Piura", "La Libertad", "Lambayeque", "Junín", "Ancash"];
    } else if (NewCountry==="Ecuador"){
        NewDepartament = ["Azuay", "Bolívar", "Cañar", "Carchi", "Chimborazo", "El Oro", "Esmeraldas", "Guayas"];
    }// Agrega más países y sus departamentos según tus necesidades.

    return NewDepartament;
}
