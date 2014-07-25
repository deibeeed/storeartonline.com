<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="../images/logo_32x32.png">
        <link rel = "stylesheet" href="../css/stylesheet.css">
        <title>Add product</title>
    </head>

    <body>
        <!-- container -->
        <div class="container2">

            <h2>Add Product</h2>

            <!-- row1 -->
            <div class="details-container" style="border-bottom: 0px;">
                <!-- cell1-->
                <div style="float: left;">
                    product code
                </div>
                <!-- cell2 -->
                <div>
                    <input type="text" />
                </div>
            </div>

            <!-- row2 -->
            <div class="details-container" style="border-bottom: 0px;">
                <!-- cell1-->
                <div style="float: left;">
                    product name
                </div>
                <!-- cell2 -->
                <div>
                    <input type="text" />
                </div>
            </div>

            <!-- row3 -->
            <div class="details-container" style="border-bottom: 0px;">
                <!-- cell1-->
                <div style="float: left;">
                    product description
                </div>
                <!-- cell2 -->
                <div>
                    <input type="text" />
                </div>
            </div>

            <!-- row4 -->
            <div class="details-container" style="border-bottom: 0px;">
                <!-- cell1-->
                <div style="float: left;">
                    product manufacturer
                </div>
                <!-- cell2 -->
                <div>
                    <input type="text" />
                </div>
            </div>

            <!-- row5 -->
            <div class="details-container" style="border-bottom: 0px;">
                <!-- cell1-->
                <div style="float: left;">
                    product price
                </div>
                <!-- cell2 -->
                <div>
                    <input type="text" />
                </div>
            </div>

            <!-- row6 -->
            <div class="details-container" style="border-bottom: 0px;">
                <!-- cell1-->
                <div style="float: left;">
                    product tags
                </div>
                <!-- cell2 -->
                <div>
                    <input type="text" />
                </div>
            </div>

            <br/>
            <br/>
            version 2<br>
            <div class="details-container" style="border-bottom: 0px; width: auto;">

                <div style="float: left; line-height: 2em;">
                    <div >
                        Product Code
                    </div>
                    <div>
                        Product Name
                    </div>
                    <div>
                        Product Description
                    </div>
                    <div>
                        Specs
                    </div>
                    <div>
                        Category
                    </div>
                    <div>
                        Type
                    </div>
                    <div>
                        Make
                    </div>
                    <div>
                        Brand
                    </div>
                    <div>
                        Product Price
                    </div>
                    <div>
                        Product Tags
                    </div>
                    <div>
                        Photos
                    </div>
                </div>

                <div style="float: left;">
                    <div>
                        <input id="code" type="text" />
                    </div>
                    <div>
                        <input id="name" type="text" />
                    </div>
                    <div>
                        <input id="description" type="text" />
                    </div>
                    <div>
                        <input id="specs" type="text">
                    </div>
                    <div>
                        <input id="category" type="text">
                    </div>
                    <div>
                        <input id="type" type="text">
                    </div>
                    <div>
                        <input id="make" type="text">
                    </div>
                    <div>
                        <input id="brand" type="text" />
                    </div>
                    <div>
                        <input id="price" type="text" />
                    </div>
                    <div>
                        <input id="tags" type="text" />
                    </div>
                    <div id="uploadFile">Upload</div>
                </div>
                <div>
                    <button id="btnAdd" class="button-template" style="float: right; margin-right: 5px;">Add</button>
                </div>

            </div>

        </div>

        <!-- scripts -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../js/jquery.uploadfile.min.js"></script>
        <script>
            var uploadedFile = '';

            $('#price').keypress(function(){
                if(event.which >= 48 && event.which <= 57){
//                    console.log(String.fromCharCode(event.which));
//                    var oldVal = $(this).val();
//                    $(this).val(oldVal + String.fromCharCode(event.which));

                }
                else
                    event.preventDefault();

            });

            $('#uploadFile').uploadFile({
                url             : '../model/upload.php',
                formData        : 'action=product&folder=' + $("#name").val(),
                acceptFiles     : 'png,gif,jpg,jpeg',
                fileName        : 'myFile',
                multiple        : true,
                onSuccess: function (files, response, xhr, pd) {
                    console.log(response + files);
                    var arr = {};
                    var jsonResp = JSON.parse(response);
//                    uploadedFile += files;
//                    console.log(uploadedFile);
                    if(jsonResp.status == 'success'){
                        uploadedFile += files + ',';
                    }

                }

            });

            $('#btnAdd').click(function(){
                $.ajax({
                    type: 'POST',
                    data: 'action=product&data=' + constructData(),
                    url: '../controller/AddUser_Controller.php',
                    success: function(msg){
                        console.log(msg);

                        var result = JSON.parse(msg);

                        if(result.status == 'success')
                            alert("successfully added product");
                    },
                    error: function(msg){
                        console.log(msg);
                        alert("error in adding product");
                    }
                });
            });

            function constructData(){
                var arr = {};

                if($('#code').val() != '')
                    arr['code'] = $('#code').val();
                if($('#name').val() != '')
                    arr['name'] = $('#name').val();
                if($('#description').val() != '')
                    arr['description'] = $('#description').val();
                if($('#specs').val() != '')
                    arr['specs'] = $('#specs').val();/*.replace(/"/g, '\"');*/
                if($('#category').val() != '')
                    arr['category'] = $('#category').val();
                if($('#type').val() != '')
                    arr['type'] = $('#type').val();
                if($('#make').val() != '')
                    arr['make'] = $('#make').val();
                if($('#brand').val() != '')
                    arr['brand'] = $('#brand').val();
                if($('#price').val() != '')
                    arr['price'] = $('#price').val();
                if($('#tags').val() != '')
                    arr['tags'] = $('#tags').val();

                arr['photo'] = uploadedFile.replace('[', '').replace(']', '');

                return JSON.stringify(arr);
            }
        </script>
    </body>
</html>
<!--
<tr>
    <td class="td-label col-sm-2">General</td>
    <td class="col-sm-10">
        <ul>
            <li>50W x 4 High Power Amplifier</li>
            <li>Eco media (Mecha-less)</li>
            <li>LCD Display</li>
            <li>2 PreOuts (Full/Sub selectable)</li>
            <li>Detachable Front Panel</li>
            <li>Tag Language (Eng only)</li>
            <i>Remote control incl.</i>
        </ul>
    </td>
</tr>
<tr>
    <td class="td-label col-sm-2">Bluetooth</td>
    <td class="col-sm-10">
        <ul>
           <li>BT Auto connecting</li>
            <li>Hands-free phone (HFP)</li>
            <li>Audio Streaming (A2DP)</li>
            <li>
                Audio Streaming control (AVRCP1.3)
                <ul>
                    <li>Play/Pause</li>
                    <li>Forward/Backward</li>
                    <li>Folder up/down</li>
                </ul>
            </li>
            <li>Pin Code Less Pairing (SSP)</li>
            <li>Phonebook Alphabet Search</li>
            <li>Max pairing device 5 Phones</li>
            <li>Max Phonebook names(1,000 x 5)</li>
            <li>Voice dial / Preset dial</li>
            <li>Auto answer</li>
            <li>Adjust MIC gain</li>
            <li>Adjust volume</li>
            <li>Speaker selectable</li>
            <li>Multi Language (TBC)</li>
            <li>
                Phone list
                <ul>
                    <li>Phonebook call</li>
                    <li>Dialed call</li>
                    <li>Received call</li>
                    <li>Missed call</li>
                </ul>
            </li>
            <li>Microphone Included</li>
        </ul>
    </td>
</tr>
<tr>
    <td class="td-label col-sm-2">Sound Tuning</td>
    <td class="col-sm-10">
        <b>BassEngine®</b>
        <ul>
            <li>
                Bass center adjustment
                <ul>
                    60/80/100/120 Hz
                </ul>
            </li>
            <li>
                Bass width adjustment
                <ul>
                    Q 0.5/1/1.5/2
                </ul>
            </li>
            <li>
                Mid center adjustment
                <ul>
                    100/1K/1.5K/2K Hz
                </ul>
            </li>
            <li>
                Mid width adjustment
                <ul>
                    Q 0.75/1/1.25/1.5
                </ul>
            </li>
            <li>
                Treble center adjustment
                <ul>
                    7.5K/10K/12.5K/15K Hz
                </ul>
            </li>
            <li>
                Treble width adjustment
                <ul>
                    Q Q 0.75/1.25
                </ul>
            </li>
            <li>Subwoofer Level Adjustment</li>
            <li>MediaXpander™</li>
        </ul>
    </td>
</tr>
-->