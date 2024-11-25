<?php include("side_and_header.php");?>
<link rel="stylesheet" href="<?php echo base_url('public/css/newsrecycle.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="info" style=" background: white;">

    <div class="header" style=" background: white;">
        <div id="back">
            <h1>News-Recycle-List

            </h1>
            <div class="filter-container">
                <h4>Filter</h4>
                <div class="filter">
                    <label for="startDate">Start Date:</label>
                    <input type="date" id="startDate">
                    <label for="endDate">End Date:</label>
                    <input type="date" id="endDate">
                    <button id="filterButton">Filter</button>
                </div>
            </div>
            <table id="newstable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author_Name</th>
                        <th>Title</th>
                        <th>News Category</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Delete Status</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    const table = $('#newstable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('user/getNewsRecycleData') ?>",
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
                "data": 3
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
            },
            {
                "data": 7,
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