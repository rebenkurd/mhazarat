<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="assets/lib/all.min.js"></script>
<script src="assets/lib/main.js"></script>
<script src="assets/lib/ajax.js"></script>
<script src="assets/lib/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#table').DataTable({        
        
    });
    $('#tableInfo').DataTable({    
        paging: false,
        info: false,
        sort:false,
        searching:false
    });
} );
</script>
</body>
</html>
