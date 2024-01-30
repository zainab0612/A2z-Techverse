<?php
include('./src/header.php');
include('../database/dbcon.php');
include('../database/session.php');
$result = mysqli_query($con, "CALL sp_get_specific_user('" . $session_id . "')");
$row = mysqli_fetch_array($result);
?>
<div class="bg-dark">
    <div class="container-fluid bg-light border border-5 border-dark rounded-4">
        <div class="d-flex align-items-start pt-5">
            <div class="nav flex-column nav-pills pb-3 py-1 mx-1 me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="bg-danger text-white fs-1 px-3 fw-bold text-center rounded">HELLO! <br /> <span class="text-uppercase"><?php echo $row['name'] ?></span></div>
                <button class="nav-link fw-bold border border-5 border-light bg-dark panel-tabs my-1 py-3 px-3 active" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-comments" type="button" role="tab" aria-controls="v-pills-comments" aria-selected="false">Comments</button>
                <button class="nav-link fw-bold border border-5 border-light bg-dark panel-tabs my-1 py-3 px-3" id="v-pills-jobs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-jobs" type="button" role="tab" aria-controls="v-pills-jobs" aria-selected="true">JOBS</button>
                <button class="nav-link fw-bold border border-5 border-light bg-dark panel-tabs my-1 py-3 px-3" id="v-pills-bids-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bids" type="button" role="tab" aria-controls="v-pills-bids" aria-selected="false">BIDS</button>
                <button class="nav-link fw-bold border border-5 border-light bg-dark panel-tabs my-1 py-3 px-3" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="false">Users</button>
                <button class="nav-link fw-bold border border-5 border-light bg-dark panel-tabs my-1 py-3 px-3" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-admin" type="button" role="tab" aria-controls="v-pills-admin" aria-selected="false">Admin</button>
                <a href="./logout.php" class="btn btn-outline-danger panel-tabs bg-dark border border-5 border-danger my-1 py-3 px-3 fw-bold">Logout</a>
            </div>
            <div class="tab-content container-fluid w-auto" id="v-pills-tabContent" style="overflow-x:scroll !important;">
                <div class="tab-pane fade" id="v-pills-jobs" role="tabpanel" aria-labelledby="v-pills-jobs-tab" tabindex="0">
                    <table class="table table-striped-columns border border-5 border-dark  fw-bold fs-5 container text-center">
                        <thead class="border-bottom border-5 border-dark">
                            <tr>
                                <th class='px-5 text-uppercase' scope="col">Job Title</th>
                                <th class='px-5 text-uppercase' scope="col">Job Description</th>
                                <th class='px-5 text-uppercase' scope="col">Job Skills</th>
                                <th class='px-5 text-uppercase' scope="col">Job Budget</th>
                                <th class='px-5 text-uppercase' scope="col">Job Status</th>
                                <th class='px-5 text-uppercase' scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result->close();
                            $con->next_result();
                            $query = mysqli_query($con, "CALL sp_get_all_jobs()");
                            while ($row = mysqli_fetch_array($query)) {
                                echo "
                                <tr>
                                    <td class='px-5 text-uppercase'>" . $row['job_title'] . "</td>
                                    <td class='px-5'>" . $row['job_description'] . "</td>
                                    <td class='px-5 text-uppercase'>" . $row['job_skills'] . "</td>
                                    <td class='px-5'>" . $row['job_budget'] . "</td>";
                                if ($row['job_status'] == 'pending') echo "<td class='px-5 bg-warning fw-bold text-uppercase'>" . $row['job_status'] . "</td>";
                                else if ($row['job_status'] == 'active') echo "<td class='px-5 bg-primary fw-bold text-uppercase'>" . $row['job_status'] . "</td>";
                                else if ($row['job_status'] == 'completed') echo "<td class='px-5 bg-success fw-bold text-uppercase'>" . $row['job_status'] . "</td>";
                                echo "
                                    <td class='px-5'><a href='../database/admin_delete.php?job_id=$row[job_id]'><button type='button' class='btn btn-danger h5 text-decoration-none'><i class='bi bi-trash2-fill'></i></button></a></td>
                                </tr>";
                            }
                            $query->close();
                            $con->next_result();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">
                    <table class="table table-striped-columns  fw-bold mx-5 fs-5 container text-center">
                        <thead class="border-bottom border-5 border-dark">
                            <tr>
                                <th class='px-5 text-uppercase' scope="col">Name</th>
                                <th class='px-5 text-uppercase' scope="col">Email</th>
                                <th class='px-5 text-uppercase' scope="col">Country</th>
                                <th class='px-5 text-uppercase' scope="col">Role</th>
                                <th class='px-5 text-uppercase' scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $query = mysqli_query($con, "CALL sp_get_all_users()");
                            while ($row = mysqli_fetch_array($query)) {
                                echo "
                                <tr>
                                    <td class='px-5 text-uppercase'>" . $row['name'] . "</td>
                                    <td class='px-5 text-uppercase'>" . $row['email'] . "</td>
                                    <td class='px-5 text-uppercase'>" . $row['country'] . "</td>";
                                if ($row['role'] == 'client') echo "<td class='px-5 bg-warning fw-bold text-uppercase '>" . $row['role'] . "</td>";
                                else if ($row['role'] == 'developer') echo "<td class='px-5 bg-success fw-bold text-uppercase '>" . $row['role'] . "</td>";
                                echo "
                                    <td class='px-5'><a href='../database/admin_delete.php?user_id=$row[id]'><button type='button' class='btn btn-danger h5 text-decoration-none'><i class='bi bi-trash2-fill'></i></button></a></td>
                                </tr>";
                            }
                            $query->close();
                            $con->next_result();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-admin" role="tabpanel" aria-labelledby="v-pills-admin-tab" tabindex="0">
                    <div class="text-end mb-3">
                        <button class='btn btn-secondary w-25 fw-bold' data-bs-toggle="modal" data-bs-target="#newAdmin" title="Add New Admin"><i class="bi bi-person-plus h4"></i></button>
                    </div>
                    <table class="table table-striped-columns  fw-bold mx-5 fs-5 container text-center">
                        <thead class="border-bottom border-5 border-dark">
                            <tr>
                                <th class='px-5 text-uppercase' scope="col">Name</th>
                                <th class='px-5 text-uppercase' scope="col">Email</th>
                                <th class='px-5 text-uppercase' scope="col">Country</th>
                                <th class='px-5 text-uppercase' scope="col">Role</th>
                                <th class='px-5 text-uppercase' scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "CALL sp_get_admins()");
                            while ($row = mysqli_fetch_array($query)) {
                                echo "
                            <tr>
                                <td class='px-5 text-uppercase'>" . $row['name'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['email'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['country'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['role'] . "</td>
                                <td class='px-5'><a href='../database/admin_delete.php?admin_id=$row[id]'><button type='button' class='btn btn-danger h5 text-decoration-none'><i class='bi bi-trash2-fill'></i></button></a></td>
                            </tr>";
                            }
                            $query->close();
                            $con->next_result();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-bids" role="tabpanel" aria-labelledby="v-pills-bids-tab" tabindex="0">
                    <table class="table table-striped-columns  fw-bold mx-5 fs-5 container text-center">
                        <thead class="border-bottom border-5 border-dark">
                            <tr>
                                <th class='px-5 text-uppercase' scope="col">Bid Job</th>
                                <th class='px-5 text-uppercase' scope="col">Bid By</th>
                                <th class='px-5 text-uppercase' scope="col">Bid Budget</th>
                                <th class='px-5 text-uppercase' scope="col">Bid Timeline</th>
                                <th class='px-5 text-uppercase' scope="col">Bid Status</th>
                                <th class='px-5 text-uppercase' scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "CALL sp_get_all_bids()");
                            while ($row = mysqli_fetch_array($query)) {
                                echo "
                            <tr>
                                <td class='px-5 text-uppercase'>" . $row['job_title'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['name'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['bid_budget'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['bid_timeline'] . "</td>";
                                if ($row['bid_status'] == 'pending') echo "<td class='px-5 bg-warning fw-bold text-uppercase'>" . $row['bid_status'] . "</td>";
                                else if ($row['bid_status'] == 'accepted') echo "<td class='px-5 bg-success fw-bold text-uppercase'>" . $row['bid_status'] . "</td>";
                                if ($row['id'] == 0) echo "</tr>";
                                else {
                                    echo "
                                <td class='px-5'><a href='../database/admin_delete.php?bid_id=$row[bid_id]'><button type='button' class='btn btn-danger h5 text-decoration-none'><i class='bi bi-trash2-fill'></i></button></a></td>
                            </tr>";
                                }
                            }
                            $query->close();
                            $con->next_result();
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show active" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab" tabindex="0">
                    <table class="table table-striped-columns fw-bold mx-5 fs-5 container text-center">
                        <thead class="border-bottom border-5 border-dark">
                            <tr>
                                <th class='px-5 text-uppercase' scope="col">Comment By</th>
                                <th class='px-5 text-uppercase' scope="col">Comment Email</th>
                                <th class='px-5 text-uppercase' scope="col">Comment Subject</th>
                                <th class='px-5 text-uppercase' scope="col">Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "CALL sp_read_comment()");
                            while ($row = mysqli_fetch_array($query)) {
                                echo "
                            <tr>
                                <td class='px-5 text-uppercase'>" . $row['comment_by'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['comment_email'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['comment_subject'] . "</td>
                                <td class='px-5 text-uppercase'>" . $row['comment'] . "</td>
                            </tr>";
                            }
                            $query->close();
                            $con->next_result();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../database/insertAdmin.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="admin-role" value="admin">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded" onkeypress="return /[a-zA-Z ]/i.test(event.key)" name="admin-name" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded" name="admin-email" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control rounded" onkeypress="return /[0-9]/i.test(event.key)" name="admin-phone" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Phone #</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="admin-country" onkeypress="return /[a-zA-Z ]/i.test(event.key)" placeholder="Timezone" list="list-timezone" id="input-datalist" required>
                        <label for="input-datalist">Country</label>
                        <datalist id="list-timezone">
                            <option value="">Country</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D Ivoire">Cote D Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Curacao">Curacao</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Barthelemy">Saint Barthelemy</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Martin">Saint Martin</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Sint Maarten">Sint Maarten</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                            <option value="South Sudan">South Sudan</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-Leste">Timor-Leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </datalist>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="admin-password" class="form-control rounded" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" name="admin-save" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php
include('./src/footer.php')
?>