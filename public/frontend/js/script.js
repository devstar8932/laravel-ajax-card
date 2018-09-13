// $(function () {
//     $('[data-toggle="tooltip"]').tooltip();

//     //$('.middle-ib span').css('visibility', 'hidden');

//     $('.img-body').click(function() {
//         $('.middle-ib span').css('visibility', 'inherit');
//     });

//     $('.bell-alert').click(function() {
//         $('[data-toggle="tooltip"]').tooltip();
//     });

//     $('.download').click(function() {
//         alert();
//     });
    
//     $('.available').click(function() {
//         alert();
//     });
// });
$(document).ready(function(){
    $(".bell-alert").hover(function(){ 
        $(this).tooltip({
            trigger: 'click'
        });
    });
    $(".left-info").hover(function(){ 
        $(this).tooltip({
            trigger: 'click'
        });
    });
    $(".right-info").hover(function(){ 
        $(this).tooltip({
            trigger: 'click'
        });
    });
    $(".img-body").click(function(){ 
        var card_id =$(this).data("id");
        var span_id = "#span" + card_id; 
        $(span_id).css("background-color"," #fc1680");
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'X-Requested-With': 'XMLHttpRequest'
            }
          });
        $.ajax({
            url: "/add-star",
            method: 'POST',
            data: {id: card_id},
            success: function(res){
                console.log(res.success);
                $("#count_star_id"+card_id).text(res.success);
            }
        });
    });

    $(".card").mouseleave(function(){
        var id =$(this).data("id");
        var span_id = "#span" + id; 
        $(span_id).css("background-color","");
        //$('[data-toggle="tooltip"]').tooltip();
    });
    $('[data-toggle="tooltip"]').tooltip();
});