<script src="assets/admin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="assets/admin/vendor/metisMenu/metisMenu.min.js"></script>

<script src="assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="assets/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Morris Charts JavaScript -->
<script src="assets/admin/vendor/raphael/raphael.min.js"></script>
<script src="assets/admin/vendor/morrisjs/morris.min.js"></script>
<script src="assets/admin/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="assets/admin/dist/js/sb-admin-2.js"></script>

<script>


    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'">\n' +
                '\n' +
                '                                <td>\n' +
                '                                    <div class="form-group">\n' +
                '                                        <input type="text" class="form-control" name="player[]" placeholder="Add Player name">\n' +
                '                                    </div>\n' +
                '                                </td>\n' +
                '                                <td>\n' +
                '                                    <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button>\n' +
                '                                </td>\n' +
                '\n' +
                '                            </tr>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    });


    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });


    $(document).on('click','.delete',function () {
        var id = $(this);
        $('#delete').val(id.data('id'));
    });
</script>

</body>

</html>

