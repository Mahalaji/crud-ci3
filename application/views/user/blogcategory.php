<?php include("side_and_header.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/css/blogcategory.css') ?>">

<div class="info" style=" background: white;">


    <div class="header" style=" background: white;">
        <div id="back">
            <h1>Category-List
                <form align="right" method="post">
                    <a href="<?php echo base_url('blogcategoryadd'); ?>"style="padding: 10px; background: azure; text-decoration: none; color: black; border-radius: 5px; font-size: 14px; border: 1px solid black;">Add-Category</a>
            </h1>
            <table id="Categorytable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Seo Title</th>
                    <th>Meta Keyword</th>
                    <th>Seo Robat</th>
                    <th>Meta Description</th>
                    <th>Edit</th>
                    <th>Delete</th>

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
    const table = $('#Categorytable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('user/getBlogCategoryData') ?>",
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