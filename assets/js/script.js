$(document).ready(function() {
    $('#control').on('keyup','#texthautinput', function() {
        $('#texthaut').text($(this).val());
    });
    $('#control').on('keyup','#textbasinput', function() {
        $('#textbas').text($(this).val());
    });
    $('#control').on('keyup','#textbasinput', function() {
        $('#textbas','#texthaut').css("font-size").text($(this).val());
    });


$('#meme-samples').on('click','img', function() {
    $('#meme-image').attr('src', $(this).attr('src')); /*oN A compris ce code là CHIQUE BOOM*/
    $('#meme-image').show();})



});