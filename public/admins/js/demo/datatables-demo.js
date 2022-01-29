// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
      "language": {
          "info": "Hiển thị _START_ đến _END_ trong số _TOTAL_ bản ghi",
          "search":"Tìm Kiếm:",
          "lengthMenu":     "Hiển thị _MENU_ bản ghi",
          "paginate": {
              "first":      "First",
              "last":       "Last",
              "next":       "Kế Tiếp",
              "previous":   "Trước"
          },
      }
  });
});
