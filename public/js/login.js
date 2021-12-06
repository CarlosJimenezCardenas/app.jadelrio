$(document).ready( function () {
    $('#btnIngresa').click(function(){
        $("#forma").prop("method","POST");
        $("#forma").prop("action","/respuestaLogin");
        $('#forma').submit();
    });
    setTimeout(function(){ $('#mensaje').fadeOut(1000); }, 3000);
    $("#video2").hide();
    $("#video3").hide();
    $("#video4").hide();
    $("#video5").hide(); 
    $("#video1").on('ended', function(){
        $("#video1").fadeTo( "slow", 0 );        
        $("#video1").hide();
        $("#video2").show();
        $("#video3").hide();
        $("#video4").hide();
        $("#video5").hide(); 
        $('#video2').trigger('play');  
        $("#video2").css({ opacity: 1 });
    });
     
    $("#video2").on('ended', function(){
        $("#video2").fadeTo( "slow", 0 );        
        $("#video1").hide();
        $("#video2").hide();
        $("#video3").show();
        $("#video4").hide();
        $("#video5").hide(); 
        $('#video3').trigger('play');  
        $("#video3").css({ opacity: 1 });
    });
     
    $("#video3").on('ended', function(){
        $("#video3").fadeTo( "slow", 0 );        
        $("#video1").hide();
        $("#video2").hide();
        $("#video3").hide();
        $("#video4").show();
        $("#video5").hide(); 
        $('#video4').trigger('play');  
        $("#video4").css({ opacity: 1 });
    });
     
    $("#video4").on('ended', function(){
        $("#video4").fadeTo( "slow", 0 );        
        $("#video1").hide();
        $("#video2").hide();
        $("#video3").hide();
        $("#video4").hide();
        $("#video5").show(); 
        $('#video5').trigger('play');  
        $("#video5").css({ opacity: 1 });
    });
     
    $("#video5").on('ended', function(){
        $("#video5").fadeTo( "slow", 0 );        
        $("#video1").show();
        $("#video2").hide();
        $("#video3").hide();
        $("#video4").hide();
        $("#video5").hide(); 
        $('#video1').trigger('play');  
        $("#video1").css({ opacity: 1 });
    });
});
