$(document).ready(function(){
	$('ul.panel').find('li:eq(0)').click(function(){
		$(this).css({
			background:'#ecf0f1'
		});

		$(this).siblings().css({
			background:'#fff'
		});

		$('div.paiImg').find('div:eq(0)').fadeIn();
		$('div.paiImg').find('div:eq(0)').siblings().hide();
	});

	$('ul.panel').find('li:eq(1)').click(function(){
		$(this).css({
			background:'#ecf0f1'
		});

		$(this).siblings().css({
			background:'#fff'
		});

		$('div.paiImg').find('div:eq(1)').fadeIn();
		$('div.paiImg').find('div:eq(1)').siblings().hide();
	});


	$('ul.panel').find('li:eq(2)').click(function(){
		$(this).css({
			background:'#ecf0f1'
		});

		$(this).siblings().css({
			background:'#fff'
		});

		$('div.paiImg').find('div:eq(2)').fadeIn();
		$('div.paiImg').find('div:eq(2)').siblings().hide();
	});


	$('ul.panel').find('li:eq(3)').click(function(){
		$(this).css({
			background:'#ecf0f1'
		});

		$(this).siblings().css({
			background:'#fff'
		});

		$('div.paiImg').find('div:eq(3)').fadeIn();
		$('div.paiImg').find('div:eq(3)').siblings().hide();
	});
});