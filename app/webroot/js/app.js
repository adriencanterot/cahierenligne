$(document).ready(function() {
	
	$('.event_form').hide();
	$('.notice_form').hide();
	$('.accordion').accordion();
	$('.datepicker').datepicker();
	$('.richtext').wysiwyg({
		rmUnusedControls : true,
		initialContent : ''
	});
	$('.spinner').hide();
	$('.annonce-discussion').hide();

	// $('.ajax-subjects').live('click', function() {

	// 	$.get($(this).attr('href'), {}, function(data) {
	// 		$('#data').fadeOut(function() {
	// 			$('#data').empty().append(data);
	// 			$('#data').fadeIn();
	// 		});
			
	// 	});
	// 	return false;
	// });

	$('#NoticeIndexForm').live('submit', function(data) {
		obj = $(this);
		$.ajax({
			type : 'POST',
			url : obj.attr('action'),
			data : obj.serialize(),
			beforeSend: function() {
				$('#submit_notice').hide();
				$('#submit_notice_container .spinner').show();
			},
			success : function() {
				$(obj).parent().slideUp(function() {
					$.get('/cakephp2.0/notices/liste', {}, function(data) {
						$('#annoncelist').fadeOut(function() {
							$("#annoncelist").empty().append(data);
							$('.annonce-discussion').hide();
							$("#annoncelist").fadeIn();

						})
					})
				})
			},
			complete: function() {
				$('#submit_notice').show();
				$('#submit_notice_container .spinner').hide();
				$('#NoticeIndexForm textarea').val('');

			},
		})
		return false;
	})

	$('#EventAddForm').live('submit', function() {
		obj = $(this)
		
		$.ajax({
			type:'POST',
			url : obj.attr('action'),
			data : obj.serialize(),
			beforeSend : function() {
				$('#homeworks a').hide();
				$('#homeworks .spinner').show();
				$('.event_form').slideUp();

			},
			success : function() {
				$.get('/cakephp2.0/events/liste', {}, function(data) {
					$('#eventlist').fadeOut(function() {
						$("#eventlist").empty().append(data);
						$
						$("#eventlist").fadeIn(function() {
							$('.accordion').accordion();
						});
						
					})
				})
				
			},
			complete : function() {
				$("#EventAddForm").each(function() {
					this.reset();
				})
				$('#homeworks a').show();
				$('#homeworks .spinner').hide();

			}
		})
		
		return false;	
	})

	$('#DiscussionViewForm').live('submit', function() {
		obj = $(this);
		
		$.ajax({
			type: 'POST',
			url: obj.attr('action'),
			data: obj.serialize(),
			beforeSend: function() {
				$('#submit_discussion').hide();
				$('#submit_discussion_container .spinner').show();
			},

			success: function() {
				$.get('/cakephp2.0/discussions/liste/complete/'+$("#input_type_id").val()+"/"+$("#input_reference_id").val(), {}, function(data) {
					$("#discussionlist").empty().append(data).slideDown();
				})

			},
			complete: function() {
				$('#submit_discussion_container .spinner').hide();
				$('#submit_discussion').show();
				$('#DiscussionViewForm textarea').val('');
			}
		})
		return false;
	})



})


function sendnoticediscussion(obj) {
		element = $(obj);
		reference = element.find('.input_reference_id').val();
		$.ajax({
			type: 'POST',
			url: element.attr('action'),
			data: element.serialize(),
			beforeSend: function() {
				element.find('#submit_discussion').hide();
				element.find('.submit_discussion_container .spinner').show();
			},

			success: function() {
				$.get('/cakephp2.0/discussions/liste/compact/'+2+"/"+reference, {}, function(data) {
					$("#discussion-liste-"+reference).empty().append(data).slideDown();
				})

			},
			complete: function() {
				element.find('.submit_discussion_container .spinner').hide();
				element.find('#submit_discussion').show();
				element.find('.DiscussionListeForm textarea').val('');
			}
		})
		return false;
	
}
function add(text, into) {
	into.innerHTML += text;
}

function showhide(element) {
	if($(element).is(':hidden')) {
		$(element).slideDown('slow');
	} else {
		$(element).slideUp('slow')
	}
}
