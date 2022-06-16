<div class="popup-bg" role="alert">
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Add Room</h2>
            <form action="include/add-rooms-inc.php" id="postForm" method="" enctype="multipart/form-data">
                <div class="form-step form-step-active w3-animate-fading w3-animate-opacity">
                    <h1>Room name</h1>
                    <p class="p-med">Input a room name or room number to easily identify rooms.</p>
                    <div class="input-group">
                        <label for="propertyID">Property name</label>
                        <div class="select">
                            <select name="propertyID" id="propertyID">
                                <option selected disabled="">Choose unit type below</option>
                                <?php
                                foreach($property as $properties){
                                    echo "<option value='".$properties['property_id']."' >".$properties['property_name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                            <label>Room number</label>
                        <input type="text" name="roomNumber">
                    </div>
                    <div class="">
                        <a href="#" class="btn btn-next width-50 ml-auto"><span>Continue</span></a>
                    </div>
                    <hr class="line">
                </div>
                <div class="form-step w3-animate-right w3-animate-opacity">
                    <h1>Room details</h1>
                    <p class="p-med">How many guest can stay in this room?</p>
                    <div class="input-group">
                        <label>Slots</label>
                        <input type="text" name="slots">
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-prev"><span>Back</span></a>
                        <a href="#" class="btn btn-next"><span>Continue</span></a>
                    </div>
                </div>
                <div class="form-step w3-animate-right">
                    <h1>Pricing</h1>
                    <p class="p-med">Customer payment options</p>
                    <div class="input-group">
                        <label>Price / Guest</label>
                        <input type="text" name="price">
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-prev"><span>Back</span></a>
                        <a href="#" class="btn btn-next"><span>Continue</span></a>
                    </div>
                </div>
                <div class="form-step w3-animate-right">
                    <h1>Photos</h1>
                    <p class="p-med">What does your room look like?</p>
                    <div class="input-group">
                        <label>Add atleast one photo now. You can always add more later.</label>
                        <div class="cord">
                            <div class="top">
                                <p>Drag & drop image uploading</p>
                            </div>
                            <form action="/upload" class="upload_img">
                                <span class="inner">Drag & drop image here or <span class="selectt">Browse</span></span>
                                <input type="file" name="image[]" id="files" multiple>
                            </form>
                            <div class="containerr"></div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-prev"><span>Back</span></a>
                        <button type="submit" name="" class="btn"><span>Add</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>