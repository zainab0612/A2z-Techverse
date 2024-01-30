<?php
include('./src/header.php');
include('./src/main-navbar.php');
include('../database/dbcon.php');
?>
<div class="modal fade" id="jobs_entry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h1 class="modal-title fs-2 fw-bold text-dark" id="staticBackdropLabel">ADD A JOB</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../database/insertJob.php" method="post">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="100" class="form-control" id="job-title" name="job-title" required placeholder="name@example.com">
                        <label for="job-title">Job Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" onkeypress="return /[0-9a-zA-Z ,'-.:/?!$@()]/i.test(event.key)" style="height: 100px;" id="job-description" name="job-description" placeholder="Leave a comment here" required></textarea>
                        <label for="job-description">Job Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="100" class="form-control text-uppercase" id="job-skills" name="job-skills" required placeholder="name@example.com">
                        <label for="job-skills">Job Primary Skill Required</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" min="<?= date('Y-m-d'); ?>" class="form-control" id="job-date" name="job-date" required placeholder="name@example.com">
                        <label for="job-date">Job DeadLine</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" min="100" class="form-control integer" id="job-budget" name="job-budget" required placeholder="name@example.com">
                        <label for="job-budget">Job Budget</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" min="1" max="5" class="form-control" id="job-workforce" name="job-workforce" required placeholder="name@example.com">
                        <label for="job-workforce">Job WorkForce</label>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" name="job-post" class="btn btn-danger w-25 fw-bold py-2 fs-5">POST</button>
                </div>
            </form>
        </div>
    </div>
</div>

<main id='main' class="py-5 pb-5 container-fluid bg-light">
    <?php
    if ($mainrow['role'] == 'client') {
        echo '
        <div class="text-end">
            <button type="button" class="btn btn-danger text-white btn-lg mt-5 py-3 px-5 mx-5 fw-bold" data-bs-toggle="modal" data-bs-target="#jobs_entry">POST A JOB</button>
        </div>
        ';
    }
    ?>
    <div class="row">
        <section class="col-sm-3 p-5">
            <div class="card bg-white border border-5 border-dark shadow-lg">
                <div class="card-body">
                    <form id="filter_form">
                        <h5 class="text-center">Filter</h5>
                        <?php
                        $res = mysqli_query($con, 'CALL sp_filteration_range');
                        $r = mysqli_fetch_array($res);
                        ?>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div id="from-range">
                                    <label for='fromRangeInputId' class='form-label fw-bold'>From Range</label>
                                    <input type='number' name='min_range' onchange="this.form.submit()" value='<?php echo $r['MIN'] ?>' min='<?php echo $r['MIN'] ?>' max='<?php echo $r['MAX'] ?>' onblur='fromRangeOutputId.value = fromRangeInputId.value' class='form-control integer' id='fromRangeInputId' onblur="this.form.submit()">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="to-range">
                                    <label for='toRangeInputId' class='form-label fw-bold'>To Range</label>
                                    <input type='number' name='max_range' onchange="this.form.submit()" value='<?php echo $r['MAX'] ?>' min='<?php echo $r['MIN'] ?>' max='<?php echo $r['MAX'] ?>' onblur='toRangeOutputId.value = toRangeInputId.value' class='form-control integer' id='toRangeInputId' onblur="this.form.submit()">
                                </div>
                            </div>
                        </div>
                        <?php
                        $res->close();
                        $con->next_result();
                        ?>
                        <div id="language">
                            <label for="language" class="fw-bold mb-2">Skill</label>
                            <select class="form-select h4 center toCenter rounded-pill" onchange="this.form.submit()" name="language" id="language">
                                <option value='' selected>Choose Skill</option>";
                                <?php
                                $q1 = mysqli_query($con, "CALL sp_filteration_all()");
                                while ($row = mysqli_fetch_array($q1)) {
                                    if (@$dfk == $row["job_skills"]) {
                                        echo "<option class='text-uppercase' value=" . urlencode($row["job_skills"]) . ">" . $row["job_skills"] . "</option>";
                                    } else {
                                        echo "<option class='text-uppercase' value=" . urlencode($row["job_skills"]) . ">" . $row["job_skills"] . "</option>";
                                    }
                                }
                                $q1->close();
                                $con->next_result();
                                ?>
                            </select>
                        </div>
                        <div class="form-floating my-3">
                            <input type="text" name="country" id="country" class="form-control rounded-pill" onchange="this.form.submit()" onkeypress="return /[a-zA-Z ]/i.test(event.key)" placeholder="Country" list="list-timezone">
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
                                <option value="North Korea">North Korea</option>
                                <option value="South Korea">South Korea</option>
                                <option value="Kosovo">Kosovo</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People Democratic Republic">Lao People Democratic Republic</option>
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
                    </form>
                </div>
            </div>
        </section>
        <section id="contact" class="col-sm-9 p-5 pb-5">
            <?php
            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            $total_records_per_page = 10;
            $offset = ($page_no - 1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";

            $result_count = mysqli_query($con, "SELECT COUNT(*) As total_records FROM jobs");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total page minus 1

            if (isset($_GET["language"]) || isset($_GET["min_range"]) || isset($_GET["max_range"]) || isset($_GET["country"])) {
                if ($_GET["country"]) {
                    $result = mysqli_query($con, "SELECT * FROM jobs INNER JOIN users ON jobs.job_by = users.id WHERE jobs.job_status = 'pending' AND users.country = '$_GET[country]'");
                } else if ($_GET["language"]) {
                    $new = urldecode($_GET['language']);
                    $result = mysqli_query($con, "SELECT * FROM jobs WHERE jobs.job_status = 'pending' AND job_skills = '$new'");
                } else {
                    $result = mysqli_query($con, "SELECT * FROM jobs WHERE jobs.job_status = 'pending' AND jobs.job_budget BETWEEN '$_GET[min_range]' AND '$_GET[max_range]'");
                }
            } else {
                $result = mysqli_query($con, "Call sp_get_jobs($offset,$total_records_per_page)");
            }
            while ($row = mysqli_fetch_array($result)) {
                echo "
                <div class='card shadow-lg border border-5 border-dark mb-1'>
                    <div class='card-header fs-4 text-capitalize bg-white fw-bold'>
                        " . $row['job_title'] . "
                    </div>
                    <div class='card-body'>
                        <h5 class='card-text'>" . $row['job_description'] . "</h5>
                        <div class='row'>
                            <div class='col-3 text-center fw-bold fs-5'>
                                <p class='card-text text-uppercase border bg-light'>" . $row['job_skills'] . "</p>
                            </div>
                            <div class='col text-end'>";
                if ($mainrow['role'] == 'developer') {
                    echo "<a href='./bid.php?id=$row[job_id]' class='btn btn-danger fw-bold'>PLACE BID</a>";
                } else {
                    echo "<a href='./bid.php?id=$row[job_id]' class='btn btn-danger fw-bold'>View</a>";
                }
                echo "
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            mysqli_close($con);
            ?>
            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <?php 
                    ?>

                    <li class="page-item fw-bold text-danger" <?php if ($page_no <= 1) {
                                                                    echo "class='disabled'";
                                                                } ?>>
                        <a class='page-link fw-bold text-danger' <?php if ($page_no > 1) {
                                                                        echo "href='?page_no=$previous_page'";
                                                                    } ?>>Previous</a>
                    </li>


                    <li class="page-item fw-bold text-danger" <?php if ($page_no >= $total_no_of_pages) {
                                                                    echo "class='disabled'";
                                                                } ?>>
                        <a class="page-link fw-bold text-danger" <?php if ($page_no < $total_no_of_pages) {
                                                                        echo "href='?page_no=$next_page'";
                                                                    } ?>>Next</a>
                    </li class="page-item">
                    <?php if ($page_no < $total_no_of_pages) {
                        echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                    } ?>
                </ul>
        </section>
    </div>
</main>
<?php
include('./src/footer.php')
?>