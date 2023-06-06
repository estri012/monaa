// Call the dataTables jQuery plugin
// $(document).ready(function() {
//   $('#dataTable').DataTable();
// 	select: true
// });
$(document).ready(function () {
  var t = $('#example').DataTable({
  dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      columnDefs: [
          {
              searchable: false,
              orderable: false,
              targets: 0,
          },
      ],
      order: [[1, 'asc']],
  });

  t.on('order.dt search.dt', function () {
      let i = 1;

      t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
          this.data(i++);
      });
  }).draw();


});
