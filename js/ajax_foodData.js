 $(document).ready(function(){
        $.ajax({
            url: "../includes/foodData.inc.php",
            dataType: 'json',
            type: "GET",
            success: function(data){


                for(let i =0; i < data['foods'].length; i++){

                    var foodname = data['foods'][i].foodname;
                    var unit = data['foods'][i].unit;

                    var option = document.createElement("option");
                    option.text = unit;
                    option.setAttribute("value", foodname );
                    option.setAttribute('data-unit', unit);

                    document.getElementById("foodlist").appendChild(option);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#p1").text(textStatus + " " + errorThrown
                              + jqXHR.responseText);
            }

        });

    //$(document).on('change', 'foodlist', function(){
        $('#searchedFood').change(function(){
            var description = $(this).val();
            var product = $('#foodlist > option[value="' + description + '"]').data('unit');

            $('#autoUnit').val(product);
        });

    });