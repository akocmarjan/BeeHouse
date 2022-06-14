<div class="popup-bg" role="alert">
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <!-- <div class="units-wrapper"> -->
                <h2>Add Property</h2>
                <form action="include/add-units-inc.php" id="postForm" method="post" enctype="multipart/form-data">
                    <div class="form-step form-step-active w3-animate-fading w3-animate-opacity">
                        <h1>Name and Type</h1>
                        <p class="p-med">What is the name of your property?</p>
                        <div class="input-group">
                            <label for="propertyName">Property name</label>
                            <input type="text" name="propertyName" id="propertyName">
                        </div>
                        <div class="input-group">
                            <label for="property_name">Property type</label>
                            <div class="select">
                                <select name="categoryID" id="select_cat">
                                    <option selected disabled="">Choose unit type below</option>
                                    <?php
                                    foreach($category as $cat){
                                        echo "<option value='".$cat['id']."' >".$cat['category_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <a href="#" class="btn btn-next width-50 ml-auto"><span>Continue</span></a>
                        </div>
                        <hr class="line">
                    </div>
                    <div class="form-step w3-animate-right w3-animate-opacity">
                        <h1>Location</h1>
                        <p class="p-med">Where is your property located?</p>
                        <div class="input-group">
                            <label>Region</label>
                            <input type="hidden" name="regionSelected"/>
                            <div class="select">
                                <select name="region" id="region">
                                    <option selected disabled="">Choose below</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Province</label>
                            <input type="hidden" name="provinceSelected"/>
                            <div class="select">
                                <select name="province" id="province">
                                    <option selected disabled="">Choose below</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>City</label>
                            <input type="hidden" name="citySelected"/>
                            <div class="select">
                                <select name="city" id="city">
                                    <option selected disabled="">Choose below</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Barangay</label>
                            <input type="hidden" name="barangaySelected"/>
                            <div class="select">
                                <select name="barangay" id="barangay">
                                    <option selected disabled="">Choose below</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Postal Code</label>
                            <input type="text" name="postal">
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-prev"><span>Back</span></a>
                            <a href="#" class="btn btn-next"><span>Continue</span></a>
                        </div>
                    </div>
                    <!-- <div class="form-step w3-animate-right">
                        <h1>Map</h1>
                        <p class="p-med">Set location on the map.</p>
                        <div class="input-group">
                            <label>Pinpoint your property</label>
                            <div id="googleMap" style="width:320px;height:450px;"></div>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-prev"><span>Back</span></a>
                            <a href="#" class="btn btn-next"><span>Continue</span></a>
                        </div>
                    </div> -->
                    <div class="form-step w3-animate-right">
                        <h1>Criteria</h1>
                        <p class="p-med">Who can lease here?</p>
                        <div class="input-group">
                            <label>Available for</label>
                            <div class="select">
                                <select name="availableFor" id="select_cat">
                                <option selected disabled="">Choose below</option>
                                    <option value="0">Female</option>
                                    <option value="1">Male</option>
                                    <option value="2">Both</option>
                                </select>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-prev"><span>Back</span></a>
                            <button type="submit" name="submit" class="btn"><span>Add</span></button>
                        </div>
                    </div>
                </form>
            <!-- </div> -->
        </div>
    </div>
</div>