<?php include("side_and_header.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/css/user-data.css') ?>">

<div class="header">
    <h1 id="user">User List
        <form align="right" method="post">
            <a href="<?php echo base_url('userregister'); ?>" style="    padding: 3px;
                                       background: grey;
                                       border-radius: 5px;
                                     font-size: 23px;
                                       border: 1px solid grey;">Add</a>
    </h1>

    <table id="usertable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Password Change</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    const table = $('#usertable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('user/getUserData') ?>",
            "type": "POST",
            "data": function(d) {
                d.start_date = $('#startDate').val();
                d.end_date = $('#endDate').val();
            }
        },
        "columns": [{
                "data": 0
            },
            {
                "data": 1
            },
            {
                "data": 2
            },
         
            {
                "data": 3,
                "orderable": false
            },
            {
                "data": 4,
                "orderable": false
            },
            {
                "data": 5,
                "orderable": false
            },
            {
                "data": 6,
                "orderable": false
            }
        ],
        "pageLength": 4,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "order": [
            [0, 'asc']
        ],
        "info": true
    });

    $('#filterButton').on('click', function() {
        table.ajax.reload();
    });
});
</script>