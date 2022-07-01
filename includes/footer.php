<script src="assets/lib/jquery.min.js"></script>
<script src="assets/lib/all.min.js"></script>
<script src="assets/lib/jquery.dataTables.min.js"></script>
<script src="assets/lib/main.js"></script>
<script src="assets/lib/ajax.js"></script>
<script>
    $(document).ready( function () {
    $('#table').DataTable({
        "sort":false,
        "lengthChange":false,
        "pageLength":5,
    });
} );
</script>
</body>
</html>
