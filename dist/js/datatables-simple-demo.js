window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
       let datatable = new simpleDatatables.DataTable(datatablesSimple,{
            searchable:false
       }
    );
    }
});
