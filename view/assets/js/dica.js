$(document).ready(function(){

	$('a.empr').click(function(){
		$('div.paiDic').hide();
		$('div.paiCon').show();
		$('div.empresa').show();
		$('ul.filtro').find('li:eq(0)').hide();
	});

	$('a.net').click(function(){
		$('div.paiDic').hide();
		$('div.paiCon').show();
		$('div.network').show();
		$('ul.filtro').find('li:eq(1)').hide();

	});

	$('a.entr').click(function(){
		$('div.paiDic').hide();
		$('div.paiCon').show();
		$('div.balada').show();
		$('ul.filtro').find('li:eq(2)').hide();
	});

	$('a.saud').click(function(){
		$('div.paiDic').hide();
		$('div.paiCon').show();
		$('div.saude').show();
		$('ul.filtro').find('li:eq(3)').hide();
	});

	$('button.cliente').click(function(){
		$('#cli').show();
		$(this).css({
			color:'#444'
		});
		$('#cont').hide();

		$('button.contratar,button.sn').css({
				color:'#888'
		});
	});
	$('button.contratar').click(function(){
			$('#cli').hide();

			$('button.cliente,button.sn').css({
				color:'#888'
			});
			$('#cont').show();
			$(this).css({
				color:'#444'
			});
		});
	$('button.sn').click(function(){
			$('#cli').hide();

			$('button.cliente,button.cliente,button.contratar,button.cupons').css({
				color:'#888'
			});
			$('#cont').hide();
			$('#sn').show();
			$(this).css({
				color:'#444'
			});
		});
	$('button.cupons').click(function(){
			$('#cli').hide();

			$('button.cliente,button.cliente,button.contratar,button.sn').css({
				color:'#888'
			});
			$('#cont').hide();
			$('#sn').hide();

			$('#cupon').show();
			$(this).css({
				color:'#444'
			});
		});
});