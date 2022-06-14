<div class="update-popup-bg" role="alert">
    <div class="update-popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Update property</h2>
            <form class="popup-update" action="include/update-property-inc.php" method="post" id="manage-property">  
                <p>Press update to save the changes.</p>
                <input type="hidden" name="propertyID_updt" id="propertyID_updt">
                <div class="input-group">
                    <label for="propertyName_updt">Property name</label>
                    <input type="text" name="propertyName_updt" id="propertyName_updt">
                </div>
                <div class="input-group">
                    <label for="categoryID_updt">Property type</label>
                    <div class="select">
                        <select name="categoryID_updt" id="categoryID_updt">
                            <option selected disabled="">Choose unit type below</option>
                            <?php
                            foreach($category as $cat){
                                echo "<option value='".$cat['id']."' >".$cat['category_name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <label>Region</label>
                    <input type="text" name="region_updt" id="region_updt">
                </div>
                <div class="input-group">
                    <label>Province</label>
                    <input type="text" name="province_updt" id="province_updt">
                </div>
                <div class="input-group">
                    <label>City</label>
                    <input type="text" name="city_updt" id="city_updt">
                </div>
                <div class="input-group">
                    <label>Barangay</label>
                    <input type="text" name="barangay_updt" id="barangay_updt">
                </div>
                <div class="input-group">
                    <label>Postal Code</label>
                    <input type="text" name="postal_updt" id="postal_updt">
                </div>
                <div class="input-group">
                    <label>Available for</label>
                    <div class="select">
                        <select name="availableFor_updt" id="availableFor_updt">
                            <option selected disabled value="">Choose below</option>
                            <option value=0>Female</option>
                            <option value=1>Male</option>
                            <option value=2>Both</option>
                        </select>
                    </div>
                </div>
                <ul class="cd-buttons" style="list-style: none;">
                    <li><input name="submit" type="submit" class="cd-button-yes" value="Update"></input></li>
                    <li><input type="button" class="cd-button-no" value="Cancel"></input></li>
                </ul>
                <a href="#0" class="cd-popup-close img-replace">Close</a>
            </form>
        </div>
    </div>
</div>