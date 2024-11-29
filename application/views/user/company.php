<?php include("side_and_header.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/company.css') ?>">
</head>

<body>
    <div class="info" style=" background: white;">


        <div class="header" style=" background: white;">
            <div id="back">
                <h1>Company-List


                    <form align="right" method="post">
                        <a href="<?php echo base_url('companyadd'); ?>"
                            style="padding: 10px; background: azure; text-decoration: none; color: black; border-radius: 5px; font-size: 14px; border: 1px solid black;">Add-Company</a>

                </h1>
                <table id="companytable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company Name</th>
                            <th>Company Type</th>
                            <th>Company Email</th>
                            <th>Add Address</th>
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

  
    <div id="address-overlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 9999; padding: 20px;">
        <div style="background-color: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: 0 auto;">
            <h1>Company Address Details</h1>

            
            <div id="form-container">
               
            </div>

            <div class="form1">
                <div class="input-group">
                    <label>Address</label>
                    <input type="text" id="address" name="address">
                    <div class="error-message"> <?= form_error('address') ?></div>
                </div>
                <div class="input-group">
                    <label>Mobile</label><br>
                    <input type="text" id="mobile" name="mobile">
                    <div class="error-message"><?= form_error('mobile'); ?></div>
                </div>

                <div class="input-group">
                    <label>Latitude</label>
                    <input type="text" id="latitude" name="latitude">
                    <div class="error-message"> <?= form_error('latitude') ?></div>
                </div>
                <div class="input-group">
                    <label>Longitude</label>
                    <input type="text" id="longitude" name="longitude">
                    <div class="error-message"> <?= form_error('longitude') ?></div>
                </div>

               
            </div>
            <button id="close-overlay"
            style="background-color: red; color: white; padding: 10px 20px; border: none; cursor: pointer;">Close</button>
            <button id="add-overlay"
                style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer;">Add</button>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
  $(document).ready(function() {
    $(document).on('click', '.view-address-btn', function(event) {
        event.preventDefault(); 
        $('#address-overlay').fadeIn();
    });

    
    $('#close-overlay').on('click', function() {
        $('#address-overlay').fadeOut();
    });

   
    $('#add-overlay').click(function(event) {
        event.preventDefault(); 
        
        var newForm = `
            <div class="form1">
                <div class="input-group">
                    <label>Address</label>
                    <input type="text" id="address" name="address">
                    <div class="error-message"> <?= form_error('address') ?></div>
                </div>
                <div class="input-group">
                    <label>Mobile</label><br>
                    <input type="text" id="mobile" name="mobile">
                    <div class="error-message"><?= form_error('mobile'); ?></div>
                </div>

                <div class="input-group">
                    <label>Latitude</label>
                    <input type="text" id="latitude" name="latitude">
                    <div class="error-message"> <?= form_error('latitude') ?></div>
                </div>
                <div class="input-group">
                    <label>Longitude</label>
                    <input type="text" id="longitude" name="longitude">
                    <div class="error-message"> <?= form_error('longitude') ?></div>
                </div>
            </div>
        `;

       
        $('#form-container').append(newForm);
    });

    
    $(document).on('click', '.close-overlay', function() {
        $(this).closest('.form1').remove(); 
    });
});

    $(document).ready(function() {
        const table = $('#companytable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('user/getCompanyData') ?>",
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

        $('#filterButton').on('click', function(e) {
            e.preventDefault();
            table.ajax.reload();
        });

    });
    </script>

</body>

</html>