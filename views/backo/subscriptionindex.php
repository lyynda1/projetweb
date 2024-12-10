<?php
require_once('../../config.php');
require_once('../../controllers/AvailableSubscriptionC.php');
require_once('../../controllers/subscriptionC.php');
require_once('../../controllers/couponC.php');
$subscriptionC = new SubscriptionC();
$subscription = $subscriptionC->getAllSubscriptions();


$error = "";

 $sub= null;
 $AvailableSubscriptionC = new AvailableSubscriptionC();

 if (
    isset($_POST["name"])  && $_POST["description"] && $_POST["price"]
) {
    if (
        !empty($_POST["name"])  && !empty($_POST["description"])  && !empty($_POST["price"])
        ) {
            $sub = new AvailableSubscription(
                null,
                $_POST['name'],
                $_POST['description'],
                $_POST['price'],
            );
            //
                
            $AvailableSubscriptionC->addAvailableSubscription($sub);
    
           
        } else
            $error = "Missing information";
    }
    $subs = $AvailableSubscriptionC->getAllAvailableSubscriptions();
    $totalRevenue = $subscriptionC->getTotalRevenue();
?>


<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kanzi - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Jhon Doe</h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="subscriptionindex.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Subscriptions</a>
                <a href="coupongestionindex.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Coupons</a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">

        <!-- Dashboard Title -->
        <div class="container-fluid pt-4 px-4">
            <h2 class="text-light text-center">Subscription Management</h2>
        </div>

        <!-- Subscriber Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row bg-secondary rounded p-4">
                <h4 class="text-primary mb-3">Subscribers</h4>
                <table class="table table-bordered table-dark">
                    <!-- Modal for editing subscription expiry date -->
<div id="editSubscriptionModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Modify Subscription</h2>
        <form id="editSubscriptionForm">
            <input type="hidden" id="subscriptionId" name="id">
            <div class="form-group">
                <label for="expiry_date">New Expiry Date:</label>
                <!-- Use datetime-local to get both date and time -->
                <input type="datetime-local" id="expiry_date" name="expiry_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>
                    <thead>
                        <tr>
                            
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Subscription Type</th>
                            <th>Payment Method</th>
                            <th>Subscription Date</th>
                            <th>Expiry Date</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($subscription as $subscription) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($subscription['first_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($subscription['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($subscription['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($subscription['SubscriptionName']) . "</td>";
                            echo "<td>" . htmlspecialchars($subscription['payment_method']) . "</td>";
                            echo "<td>" . htmlspecialchars($subscription['created_at']) . "</td>";
                            echo "<td>" . htmlspecialchars($subscription['expiry_date']) . "</td>";
                            echo "<td>" . htmlspecialchars($subscription['prix']) . "</td>";
                            echo '<td><button class="btn btn-primary" onclick="openEditSubs(' . htmlspecialchars($subscription['id']) . ')">Modify</button>';
                            echo '<td><button class="btn btn-danger" onclick="deleteSubs(' . htmlspecialchars($subscription['id']) . ')">Delete</button></td>';
                            echo "</tr>";
                        }
                        ?>
                                  </tbody>
                                  <div class="revenue-section">
    <h4>Total Subscription Revenue: $<?php echo number_format($totalRevenue, 2); ?></h4>
</div>
                </table>
            </div>
        </div>

        <!-- Subscriber Table End -->

        <!-- Add Subscription Type Form Start -->
        <div class="container-fluid pt-4 px-4">
        <div class="btn-group" role="group" aria-label="Event Actions">
               
                                        <button type="button" class="btn btn-primary" onclick="showAddSubscriptionModal()">Add Subscription type</button>
                                        <div id="editSubModal" style="display:none;">
    <div class="container-fluid pt-4 px-4">
        <h2 class="text-primary mb-3">Edit Subscription :</h2>
        <form id="editSubForm">
            <input type="hidden" id="editsubId" name="editsubId" />
            <label for="editSubname">Subscription Name:</label>
            <input type="text" id="editSubname" name="editSubname"  />
            
            <label for="editSubdescription">Subscription Desription:</label>
            <input type="text" id="editSubdescription" name="editSubdescription"  />

            <label for="editSubprice">Subscription Price:</label>
            <input type="number" id="editSubprice" name="editSubprice" />

            <button type="submit">Save Changes</button>
            <button type="button" onclick="closeEditModal()">Cancel</button>
        </form>
    </div>
</div>
                                </div>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Name of Subscription</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Price</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                        foreach ($subs as $sub) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($sub['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($sub['description']) . "</td>";
                            echo "<td>" . htmlspecialchars($sub['price']) . "</td>";
                            echo '<td><button class="btn btn-primary" onclick="openEditSubModal(' . htmlspecialchars($sub['id']) . ')">Modify</button>';
                            echo '<td><button class="btn btn-danger" onclick="deleteSubtype(' . htmlspecialchars($sub['id']) . ')">Delete</button></td>';
                            echo "</tr>";
                        }
                        ?>
                                  </tbody>
                            </table>
                        </div>
                        

                            </div>
                        </div>
                    </div>
                </div>
                
             
        <!-- Add Subscription Type Form End -->
        <div class="modal" id="AddSubscriptionModal" tabindex="-1" role="dialog" aria-labelledby="AddSubscriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-primary mb-3" id="AddSubscriptionModalLabel">Add New Subscription</h5>
                <button type="button" class="close" onclick="closeModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="addSubForm" method="POST" action="path_to_your_php_script.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Subscription Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter subscription name" >
        </div>
        <div class="form-group">
            <label for="description">Description </label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" >
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" >
        </div>
        <div class="form-group">
            <label for="image_path">Subscription Image</label>
            <input type="file" class="form-control" id="image_path" name="image" accept="image/*" >
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
    <button type="button" class="btn btn-primary" onclick="submitForm()">Save Subscription</button>
</div>

            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" onclick="showAddSubscriptionModal()">Add Subscription type</button>
        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

    </div>
    <!-- Content End -->
<script>
        function showAddSubscriptionModal() {
    const modal = document.getElementById('AddSubscriptionModal');
    modal.style.display = 'block';
}

function closeModal() {
    const modal = document.getElementById('AddSubscriptionModal');
    modal.style.display = 'none';
}

function validateForm() {
    const name = document.getElementById('name').value.trim();
    const description = document.getElementById('description').value.trim();
    const price = document.getElementById('price').value;

    const nameRegex = /^[a-zA-Z0-9 ]{1,254}$/; // Only alphanumeric and spaces, max 50 chars
    const placesRegex = /^\d+\/\d+$/; // Matches "number/number"
    let isValid = true;

    // Clear previous error messages
    clearErrorMessages();

    // Validate Event Name
    if (!nameRegex.test(name)) {
        displayErrorMessage('name', "Event Name must be between 1 and 50 characters long and contain no special symbols.");
        isValid = false;
    }

    // Validate Event Location
    if (!nameRegex.test(description)) {
        displayErrorMessage('description', "Location must be between 1 and 254 characters long and contain no special symbols.");
        isValid = false;
    }

    // Validate Event Price
    if (!/^\d+$/.test(price)) {
        displayErrorMessage('price', "Price must contain only numeric characters.");
        isValid = false;
    }
    return isValid; // If all validations pass, return true
}

// Function to display error messages next to form fields
    function displayErrorMessage(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorSpan = document.createElement('span');
    errorSpan.classList.add('error-message');
    errorSpan.style.color = 'red';
    errorSpan.textContent = message;

    // Append error message after the input field
    field.parentNode.appendChild(errorSpan);
}

// Function to clear any previous error messages
    function clearErrorMessages() {
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(error => error.remove());
}

function submitForm() {
    // First, validate the form
    if (validateForm()) {
        // Grab the form data
        const formData = new FormData(document.getElementById('addSubForm'));

        // Use fetch to send data to the server
        fetch('path_to_your_php_script.php', {
            method: 'POST',
            body: formData // This sends the form data to the PHP backend
        })
        .then(response => response.json()) // Assuming the server sends back a JSON response
        .then(data => {
            // Handle the server response
            if (data.success) {
                alert('Subscription Type saved successfully!');
                closeModal();  // Close the modal if the event is saved
                location.reload();
            } else {
                alert('Error: ' + data.message); // Show error message returned by PHP
            }
        })
        .catch(error => {
            alert('Error: ' + error); // Handle any errors with the request
        });
    }
}
function deleteSubtype(subId) {
    // Confirm the deletion
    if (confirm('Are you sure you want to delete this event?')) {
        // Use fetch to send the delete request to deleteSubtype.php
        fetch('deleteSubtype.php?id=' + subId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Event deleted successfully!');
                    // Reload the page to reflect the change
                    location.reload();
                } else {
                    alert('Error: ' + data.error);
                }
            })
            .catch(error => {
                alert('Error: ' + error);  // Handle any errors
            });
    }
}
function deleteSubs(id) {
    // Confirm the deletion
    if (confirm('Are you sure you want to delete this reservation?')) {
        // Use fetch to send the delete request to deleteSubscription.php
        fetch('deleteSubscription.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Subscriber deleted successfully!');
                    // Reload the page to reflect the change
                    location.reload();
                } else {
                    alert('Error: ' + data.error);
                }
            })
            .catch(error => {
                alert('Error: ' + error); // Handle any errors
            });
    }
}
</script>
<script>
        function openEditSubModal(subId) {
    // Fetch the sub data from the server using the sub ID
    fetch('getsubData.php?id=' + subId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Fill the form fields with the sub data
                document.getElementById('editsubId').value = data.sub.id;
                document.getElementById('editSubname').value = data.sub.name;
                document.getElementById('editSubdescription').value = data.sub.description;
                document.getElementById('editSubprice').value = data.sub.price;

                // Show the edit modal
                document.getElementById('editSubModal').style.display = 'block';
            } else {
                alert('Error fetching sub data.');
            }
        })
        .catch(error => {
            alert('Error: ' + error);
        });
}

function closeEditModal() {
    document.getElementById('editSubModal').style.display = 'none';
}
document.getElementById('editSubForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(document.getElementById('editSubForm'));

    fetch('updatesub.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('sub updated successfully!');
            closeEditModal();  // Close the modal
            location.reload();  // Reload the page to reflect the changes
        } else {
            alert('Error: ' + data.error);
        }
    })
    .catch(error => {
        alert('Error: ' + error);
    });
});

    </script>
    <script>
function openEditSubs(id, currentExpiryDate) {
    // Open the modal
    document.getElementById("editSubscriptionModal").style.display = "block";
    
    // Set the subscription ID
    document.getElementById("subscriptionId").value = id;
    
    // Set the current expiry date (format: yyyy-mm-ddThh:mm)
    let expiryDate = currentExpiryDate.split(" ");
    let date = expiryDate[0];  // yyyy-mm-dd
    let time = expiryDate[1];  // hh:mm:ss
    document.getElementById("expiry_date").value = date + "T" + time.substr(0, 5);  // Set the value for datetime-local input
}

document.querySelector(".close").onclick = function() {
    document.getElementById("editSubscriptionModal").style.display = "none";
}

// Handle form submission
document.getElementById("editSubscriptionForm").addEventListener("submit", function(e) {
    e.preventDefault();
    
    const id = document.getElementById("subscriptionId").value;
    const expiry_date = document.getElementById("expiry_date").value;
    
    // Send the update request to the server
    fetch("updateSubscription.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            id: id,
            expiry_date: expiry_date
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Subscription updated successfully!");
            location.reload(); // Refresh the page to show the updated subscription
        } else {
            alert("Error updating subscription: " + data.error);
        }
    })
    .catch(error => {
        alert("Error: " + error);
    });
});
</script>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>
