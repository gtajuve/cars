$(document).ready( $ => {

    //send delete request
    $('.delete').click(e =>{
        e.preventDefault();
        let element = e.target;
        const elementId = $(element).data('id');
        const typeOfElement = $(element).data('type');
        let response =  confirm('Delete entry?');
        if (response == true){
            $.ajax({
                url: typeOfElement+'/'+elementId,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    let result = JSON.parse(response);
                    if(result.statusCode==200){
                        $(element).closest('tr').remove();
                    }
                }
            });
        }
    });
    //bodywork logic
    $('.bodywork').click(e => {
        let element = e.target;
        $('.bodywork').removeClass('active');
        $(element).addClass('active');
        const selectedBodywork = $(element).data('type');
        $( "input[name='bodywork']" ).val(selectedBodywork);
        searchCars();
    });
    $('.searchableSelect').change(e => {
        searchCars();
    });
//send search cars
    function searchCars() {
        const bodywork =  $( "input[name='bodywork']" ).val();
        const brand =  $( "#selectBrand :selected").val();
        const model =  $( "#selectModel :selected" ).val();
        const engine =  $( "#selectEngine :selected" ).val();
        const minPrice = $( "input[name='min_price']" ).val();
        const maxPrice = $( "input[name='max_price']" ).val();

        $.ajax({
            url: 'search',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                bodywork: bodywork,
                brand: brand,
                model: model,
                engine: engine,
                minPrice: minPrice,
                maxPrice: maxPrice
            },
            success: function(response){
                let result = JSON.parse(response);
                if(result.statusCode==200){

                    $("#result").text(result.data+' cars found!');
                }
            }
        });
    };

    //slider init
    $( "#slider-3" ).slider({
        range:true,
        min: 0,
        max: 100000,
        step: 1000,
        values: [ 1000, 50000 ],
        slide: function( event, ui ) {
            $( "#price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );

            $( "input[name='min_price']" ).val( ui.values[ 0 ]);
            $( "input[name='max_price']" ).val( ui.values[ 1 ]);
            searchCars();
        }
    });
    $( "#price" ).val( "$" + $( "#slider-3" ).slider( "values", 0 ) +
        " - $" + $( "#slider-3" ).slider( "values", 1 ) );
    $( "input[name='min_price']" ).val( $( "#slider-3" ).slider( "values", 0 ));
    $( "input[name='max_price']" ).val( $( "#slider-3" ).slider( "values", 1 ));

    $( "input[type='checkbox']" ).click(e => {
        let element = e.target;
        console.log($(element).is(":checked"));
        if ($(element).is(":checked") ){
            $(element).val(1);
        } else {
            $(element).val(0);
        }
        console.log($(element).val());

    });

    //get model for brand
    $(".brand").change(e =>{
        let elenment = e.target;
        const brandId = $(elenment).find("option:selected").val();
        const originUrl = window.location.origin;
        $.ajax({
            url: originUrl+'/models/brand/'+brandId,
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                let result = JSON.parse(response);
                if(result.statusCode == 200){

                    let data = result.data;
                    $('#selectModel')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="">Select Models</option>')
                        .val('');

                    $.each(data, ( index, item ) => {
                        $('#selectModel').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                }
            }
        });
    })

});




