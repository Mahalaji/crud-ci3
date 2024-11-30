<?php include("side_and_header.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/company.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="info" style="background: white;">
        <div class="header" style="background: white;">
            <div id="back">
                <h1>Company-List
                    <form align="right" method="post">
                        <a href="<?php echo base_url('companyadd'); ?>" 
                            style="padding: 10px; background: azure; text-decoration: none; color: black; border-radius: 5px; font-size: 14px; border: 1px solid black;">Add-Company</a>
                    </form>
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
                        <!-- Data will be populated via DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Address Overlay -->
    <div id="address-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 9999; padding: 20px;">
        <div style="background-color: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: 0 auto;">
            <h1>Company Address Details</h1>

            <!-- Form for dynamically added address fields -->
            <form id="address-form" method="POST">
                <div id="form-container"></div>

                
                

                <button type="button" id="add-overlay" style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer;">Add Another Address</button>
                <button type="button" id="submit-over" style="background-color: blue; color: white; padding: 10px 20px; border: none; cursor: pointer;">Submit</button>
            </form>

            <button id="close-overlay" style="background-color: red; color: white; padding: 10px 20px; border: none; cursor: pointer;">Close</button>
        </div>
    </div>

    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>    
        $(document).ready(function () {
    // Initialize DataTable
    const table = $('#companytable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('user/getCompanyData') ?>",
            "type": "POST",
            "data": function (d) {
                d.start_date = $('#startDate').val();
                d.end_date = $('#endDate').val();
            }
        },
        "columns": [
            { "data": 0 },
            { "data": 1 },
            { "data": 2 },
            { "data": 3, "orderable": false },
            { "data": 4, "orderable": false },
            { "data": 5, "orderable": false },
            { "data": 6, "orderable": false }
        ],
        "pageLength": 4,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "order": [[0, 'asc']],
        "info": true
    });

    // Open Address Overlay
    $(document).on('click', '.view-address-btn', function () {
        var company_id = $(this).data('company-id');
        $('#address-overlay').fadeIn();

        // Fetch existing address data from the server
        $.ajax({
            url: '<?= base_url("user/getAddressData") ?>',
            type: 'POST',
            data: { company_id: company_id },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    const addressData = response.data;
                    $('#form-container').empty();  // Clear the form

                    // Add existing address data to the form
                    addressData.forEach(function (address, index) {
                        const newRow = `
                            <div class="form1" data-index="${index}">
                                <input type="hidden" name="id" value="${address.id}" required>
                                <div class="input-group">
                                    <label>Address</label>
                                    <input type="text" name="address[${index}]" value="${address.address}" required>
                                </div>
                                <div class="input-group">
                                    <label>Mobile</label>
                                    <input type="text" name="mobile[${index}]" value="${address.mobile}" required>
                                </div>
                                <div class="input-group">
                                    <label>Latitude</label>
                                    <input type="text" name="latitude[${index}]" value="${address.latitude}" required>
                                </div>
                                <div class="input-group">
                                    <label>Longitude</label>
                                    <input type="text" name="longitude[${index}]" value="${address.longitude}" required>
                                </div>
                            </div>
                        `;
                        $('#form-container').append(newRow);
                    });
                } else {
                    alert('No address data found');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching address data:', error);
                alert('Error fetching address data');
            }
        });
    });

    // Add new address form when "Add Another Address" is clicked
    $('#add-overlay').click(function (event) {
        event.preventDefault();
        var newIndex = $('#form-container .form1').length;
        var newForm = `
            <div class="form1" data-index="${newIndex}">
                <div class="input-group">
                    <label>Address</label>
                    <input type="text" name="address[${newIndex}]">
                </div>
                <div class="input-group">
                    <label>Mobile</label>
                    <input type="text" name="mobile[${newIndex}]">
                </div>
                <div class="input-group">
                    <label>Latitude</label>
                    <input type="text" name="latitude[${newIndex}]">
                </div>
                <div class="input-group">
                    <label>Longitude</label>
                    <input type="text" name="longitude[${newIndex}]">
                </div>
            </div>
        `;
        $('#form-container').append(newForm);
    });

    // Submit the form data when "Submit" is clicked
    $('#submit-over').on('click', function () {
        var formData = $('#address-form').serializeArray();
        console.log(formData);  // Log form data

        // Convert the form data to the correct structure
        var data = {};
        formData.forEach(function (item) {
            if (!data[item.name]) {
                data[item.name] = [];
            }
            data[item.name].push(item.value);
        });
        console.log(data);  // Log the final data object

        // Send the data via AJAX
        $.ajax({
            url: '<?= base_url("user/saveCompanyAddress") ?>',
            type: 'POST',
            data: data,  // Send the data object
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert('Data saved successfully!');
                    $('#address-overlay').fadeOut();
                    table.ajax.reload();
                } else {
                    alert(response.message || 'Failed to save data');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
                alert('An error occurred while saving the data');
            }
        });
    });

    // Close the overlay
    $('#close-overlay').on('click', function () {
        $('#address-overlay').fadeOut();
    });
});

    </script>

</body>

</html>
