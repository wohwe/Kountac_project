$("document").ready(function(){

	$('.chat_head').click(function(){
		$('.chat_body').slideToggle('slow');
	});
	$('.msg_head').click(function(){
		$('.msg_wrap').slideToggle('slow');
	});
	
	$('.msg_head2').click(function(){
		$('.msg_wrap2').slideToggle('slow');
	});
	
	$('.close').click(function(){
		$('.msg_box').hide();
	});
	
	$('.close2').click(function(){
		$('.msg_box2').hide();
	});
	
	$('.user').click(function(){

		$('.msg_wrap').show();
		$('.msg_box').show();
		$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
		updateInterval();
	});
	
	$('.user1').click(function(){

		//$('.msg_wrap1').show();
		$('.msg_box1').show('slow');
		updateChat_Author();
	});
	
	/*$('.user2').click(function(){
		//var aut = $('.auteur').html();
		
		//$('.msg_head2').html(aut);
		$('.msg_wrap2').show();
		$('.msg_box2').show();
		$('.u').hide();
		$('.msg').hide();
		$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
		updateInterval();
	});*/
	
	
	$(document).on('click', '#chat .user2', function () {
		var rep=$(this).children('.u').html();
		$("#idmarq").val(rep);
		var test = $("#idmarq").val();
		updateChat();
		$('.msg_head2').html($(this).html());
		$('.msg_wrap2').show();
		$('.msg_box2').show();
		$('.u').hide();
		$('.msg').hide();
		$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
		updateInterval();
	});
	
	
	$('textarea').keypress(
    function(e){
        if (e.keyCode == 13) {
            var msg = $(this).val();
			var marque_id = $("#idmarq").val();
			$(this).val('');
			if(msg!='')
			$('<div class="msg_a">'+marque_id+'</div>').insertBefore('.msg_push');
			$.post('http://localhost/kountac_new/web/chat/post/xl', {
            'message': msg,
			'marque_id': marque_id},
			
			function(data){

                if(data === 'Successful'){
					
                     updateChat();
                }
                else{
                  alert("<p>Erreur lors de la connexion...</p>");
                }
        
            },

         );
			
			/*var datetime = new Date().toLocaleString();
		   $('<div>'+datetime+'</div>').insertBefore('.msg_push');
		   $('<div class="msg_a">'+msg+'</div>').insertBefore('.msg_push');
			$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);*/
        }
    });
	
	function updateChat()
{
	var marque_id = $("#idmarq").val();
    $.post('http://localhost/kountac_new/web/chat/list/xl', {
			'marque_id': marque_id},
			function(data) {
        $('#msg_body').html(data);
		$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
    });
}


	function updateChat_Author()
{
    $.post('http://localhost/kountac_new/web/chat/list_autor/xl',
			function(data) {
        $('#msg_body1').html(data);
    });
}

var myVar;
function updateInterval() {
    myVar = setInterval(updateChat, 5000);
}
updateChat();
//updateChat_Author();
});