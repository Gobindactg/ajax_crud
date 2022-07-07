<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <h3 class="card card-body text-info">Student Information</h3>
            <h3 id="successMessage"></h3>
            <button type="button" class="btn btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#customerModal">
                Add Customer
            </button>
            <table class="table table-bordered text-center" id="customerTable">
                <thead>
                    <tr>
                        <th>S.L</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th>Customer Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer as $customers)
                    <tr id="customer{{$customers->id}}">
                        <td>{{$loop->index+1}}</td>
                        <td>{{$customers->id}} </td>
                        <td>{{$customers->name}}</td>
                        <td>{{$customers->email}}</td>
                        <td>{{$customers->phone}}</td>
                        <td>{{$customers->address}}</td>
                        <td>
                            <a href="javascript:void(0)" id="showData" data-url="{{route('showCustomer', $customers->id)}}" class="btn btn-primary">Show</a>
                            <a href="javascript:void(0)" class="btn btn-info" onclick="updateCustomer({{ $customers->id }})">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteCustomer({{ $customers->id }})">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--  Start Modal Section -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCustomer">
                        @csrf
                        <div class="mb-12">
                            <label for="recipient-name" class="col-form-label">Customer Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-12">
                            <label for="recipient-name" class="col-form-label">Customer Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-12">
                            <label for="recipient-name" class="col-form-label">Customer Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="mb-12">
                            <label for="message-text" class="col-form-label">Customer Address:</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Customer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Section -->


    <!-- The Modal  for show data-->

    <div class="modal" id="showCostomers">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal body -->

                <div class="modal-body">
                    <button onclick="window.print()">Print</button>
                    <h3 class="text-center" style="font-family: tahoma; font-style:italic; font-weight:900; font-size:25px; color:teal">Customer Information</h3>
                    <hr style="font-size: 18px; color:black; padding:2px; margin:0;">
                    <table class="table information">
                        <tr>
                            <th>Name</th>
                            <th id="cname" style="font-family: tahoma; font-style:italic; font-size:15px; color:teal"></th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th id="cemail" style="font-family: tahoma; font-style:italic; font-size:15px; color:teal"></th>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <th id="cphone" style="font-family: tahoma; font-style:italic; font-size:15px; color:teal"></th>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <th id="caddress" style="font-family: tahoma; font-style:italic; font-size:15px; color:teal"></th>
                        </tr>

                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
    <!-- end data Show modal -->

    <!-- start data update Modal -->
    <!-- Modal -->
    <div class="modal fade" id="customerEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="EditCustomer">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="mb-12">
                            <label for="recipient-name" class="col-form-label">Customer Name:</label>
                            <input type="text" class="form-control" id="name2" name="name1">
                        </div>
                        <div class="mb-12">
                            <label for="recipient-name" class="col-form-label">Customer Email:</label>
                            <input type="text" class="form-control" id="email2" name="email1">
                        </div>
                        <div class="mb-12">
                            <label for="recipient-name" class="col-form-label">Customer Phone:</label>
                            <input type="text" class="form-control" id="phone2" name="phone1">
                        </div>

                        <div class="mb-12">
                            <label for="message-text" class="col-form-label">Customer Address:</label>
                            <textarea class="form-control" id="address2" name="address1"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Customer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Section -->

    <!-- end data update Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>

    <script>
        $('#addCustomer').submit(function(e) {
            e.preventDefault();
            let name = $("#name").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let address = $("#address").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{route('addCustomer')}}",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        window.location.reload();
                        var message = "Your Data Hasbeen Submited Successfully";
                        document.getElementById('successMessage').innerHTML = message;
                        // location.reload(true);
                        // $("#customerTable tbody").prepend('<tr><td></td> </tr>');

                        // $("#customerModal").modal('hide');
                        // $('#customerTable')[0].reset();

                    }
                }
            })
        })
    </script>

    <!-- for show data in modal -->
    <script>
        $(document).ready(function() {
            $('body').on('click', '#showData', function() {

                var customerURL = $(this).data('url');
                $.get(customerURL, function(data) {

                    $('#showCostomers').modal('show');
                    $('#cname').text(data.name);
                    $('#cemail').text(data.email);
                    $('#cphone').text(data.phone);
                    $('#caddress').text(data.address);

                })
            })
        })
    </script>
    <!-- end show data in modal -->

    <!-- start data update function -->
    <script>
        function updateCustomer(id) {

            $.get('http://localhost/My_Web/My_Web/public/updateCustomer/' + id, function(customer) {
                $("#id").val(customer.id);
                $("#name2").val(customer.name);
                $("#email2").val(customer.email);
                $("#phone2").val(customer.phone);
                $("#address2").val(customer.address);
                $("#customerEditModal").modal('toggle');
            })
        }
    </script>
    <!-- end data Update function -->

    <!-- update data -->
    <script>
        $('#EditCustomer').submit(function(e) {
            e.preventDefault();
            let id = $('#id').val();

            let name = $("#name2").val();
            let email = $("#email2").val();
            let phone = $("#phone2").val();
            let address = $("#address2").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{route('updateData')}}",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        // window.location.reload();
                        var message = "Your Data Hasbeen Submited Successfully";
                        document.getElementById('successMessage').innerHTML = message;
                        window.location.reload();
                        // $("#customerTable tbody").prepend('<tr><td></td><td></td><td> ' + response.name + ' </td><td>' + response.email + '</td> <td>' + response.phone + '</td><td>' + response.address + '</td><td></td> </tr>');
                        $('#addCustomer')[0].reset();
                        $("#customerEditModal").modal('hide');

                    }
                }
            })
        })
    </script>
    <!-- end update data -->

    <!--  start delete function -->
    <script>
        function deleteCustomer(id) {
            if (confirm("Do You want to delete this Customer")) {

                let _token = $("input[name=_token]").val();
                $.ajax({
                    url: 'http://localhost/My_Web/My_Web/public/deleteCustomers/' + id,
                    type: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(response) {

                        $("#customer" + id).remove();

                    }
                });
            }
        }
    </script>
    <!-- End delete function -->

</body>

</html>