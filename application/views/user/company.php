<?php include("side_and_header.php"); ?>
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
    <div id="address-overlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 9999; padding: 20px;">
        <div style="background-color: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: 0 auto;">
            <h1>Company Address Details</h1>
            <form id="address-form">
                <div id="form-row">
                    <!-- Address rows will be appended dynamically here -->
                </div>
            </form>
            <button type="button" id="add-overlay"
                style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer;">Add
                Another Address</button>
            <button type="button" id="submit-over"
                style="background-color: blue; color: white; padding: 10px 20px; border: none; cursor: pointer;">Submit</button>
            <button id="close-overlay"
                style="background-color: red; color: white; padding: 10px 20px; border: none; cursor: pointer;">Close</button>
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
                $('#submit-over').data('company-id', company_id);
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
                            $('#address-form').empty(); // Clear the form

                            // Add existing address data to the form
                            addressData.forEach(function (address,index) {
                                const newRow = `
                                    <div class="form-row" data-id="${address.id}">
                                    <div class="input-group">
                                        <input type="hidden" name="id[]" value="${address.id}">
                                        <label>Address</label>
                                        <input type="text" name="address[]" value="${address.address}" required>
                                        <label>Mobile</label>
                                        <input type="text" name="mobile[]" value="${address.mobile}" required>
                                        <label>Latitude</label>
                                        <input type="text" name="latitude[]" value="${address.latitude}" required>
                                        <label>Longitude</label>
                                        <input type="text" name="longitude[]" value="${address.longitude}" required>
                                    
                                        <button type="button" class="delete-address-btn">Delete</button>
                                    </div>
                                    </div>
                                `;
                                $('#address-form').append(newRow);
                            });
                        } else {
                            alert('No address data found');
                        }
                    },
                    error: function () {
                        alert('Error fetching address data');
                    }
                });
            });

            // Add new address form when "Add Another Address" is clicked
            $('#add-overlay').click(function (event) {
                event.preventDefault();

                var newForm = `
                    <div class="form-row">
                        <div class="input-group">
                            <label>Address</label>
                            <input type="text" name="address[]" required>
                        
                        
                            <label>Mobile</label>
                            <input type="text" name="mobile[]" required>
                       
                        
                            <label>Latitude</label>
                            <input type="text" name="latitude[]" required>
                            <label>Longitude</label>
                            <input type="text" name="longitude[]" required>
                    
                        <button type="button" class="delete-address-btn">Delete</button>
                        </div>
                    </div>
                `;
                $('#address-form').append(newForm);
            });

            // Delete Address
            $(document).on('click', '.delete-address-btn', function () {
                const row = $(this).closest('.form-row');
                const addressId = row.find('input[name="id[]"]').val();

                if (addressId) {
                    $.ajax({
                        url: '<?= base_url("user/deleteCompanyAddress") ?>',
                        type: 'POST',
                        data: { address_id: addressId },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {
                                alert('Address deleted successfully!');
                                row.remove();
                            } else {
                                alert('Failed to delete address');
                            }
                        },
                        error: function () {
                            alert('An error occurred while deleting the address');
                        }
                    });
                } else {
                    row.remove(); // If the address wasn't saved, just remove the row
                }
            });

            // Save Address
            $('#submit-over').on('click', function () {
                var companyid = $(this).data('company-id');
                var formData = $('#address-form').serializeArray();

                // Group serialized data into an object format
                var data = {};
                formData.forEach(function (item) {
                    if (!data[item.name]) {
                        data[item.name] = [];
                    }
                    data[item.name].push(item.value);
                });

                data.company_id = companyid;
                console.log(data);
                // AJAX request to save data
                $.ajax({
                    url: '<?= base_url("user/saveCompanyAddress") ?>',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            alert('Data saved successfully!');
                            $('#address-overlay').fadeOut();
                        } else {
                            alert('Failed to save data');
                        }
                    },
                    error: function () {
                        alert('An error occurred while saving the data');
                    }
                });
            });

            // Close Overlay
            $('#close-overlay').click(function () {
                $('#address-overlay').fadeOut();
            });
        });
    </script>
</body>

</html>
