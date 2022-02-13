window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki
    /*
        function dataTables() {
            new simpleDatatables.DataTable("#datatablesSimple", {
                columns: [{
                    select: [2, 3],
                    hidden: true
                }]
            })
        }
        dataTables()*/

    const datatablesSimple = document.getElementById('datatablesSimple');

    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
            labels: {
                placeholder: 'Buscar...',
                perPage: "{select} Seleccionar",
                noRows: "No se encontraron registros",
                info: "Mostrando {start} a {end} de {rows} entradas"
            }
        });
    }
});