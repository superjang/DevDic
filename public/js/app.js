$(function(){
    var elGnb = $('.global_navigation');
    var toggleGnb = function(e){
        elGnb.stop(true).slideToggle();
        // if(elGnb.hasClass('global_navigation--on')){
        //     elGnb
        //         .removeClass('global_navigation--on')
        //         .addClass('global_navigation--off');
        // }else{
        //     elGnb
        //         .removeClass('global_navigation--off')
        //         .addClass('global_navigation--on');
        // }
    };

    $('.btn__global_navigation_title').on('click', toggleGnb);
})
