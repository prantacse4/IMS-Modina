
<script  src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script  src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script   src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script  src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            fixedHeader: true,
        } );
        new $.fn.dataTable.Responsive( table );
    } );
 </script>
