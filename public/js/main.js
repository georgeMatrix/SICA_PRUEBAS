window.onload = function () {
   $('#datablegeneral').DataTable({
      "responsive": true,
      "autoWidth": false,
      "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"}
   });
   $('#nav-tab_category_permission').tab('show');

   $('.tooltip').tooltip();
};
