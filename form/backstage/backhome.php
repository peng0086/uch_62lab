<?php include './top.php'; ?>


	<h1 class="ml1">
		<span class="text-wrapper">
			<span class="line line1"></span>
			<span class="letters letters-left">歡迎來到</span>
			<span class="letters ampersand">&amp;</span>
			<span class="letters letters-right">後臺管理</span>
			<span class="line line2"></span>
		</span>
	</h1>

	<script>
	// Wrap every letter in a span
	anime.timeline({loop: true})
	  .add({
	    targets: '.ml1 .line',
	    opacity: [0.5,1],
	    scaleX: [0, 1],
	    easing: "easeInOutExpo",
	    duration: 700
	  }).add({
	    targets: '.ml1 .line',
	    duration: 600,
	    easing: "easeOutExpo",
	    translateY: (el, i) => (-0.625 + 0.625*2*i) + "em"
	  }).add({
	    targets: '.ml1 .ampersand',
	    opacity: [0,1],
	    scaleY: [0.5, 1],
	    easing: "easeOutExpo",
	    duration: 600,
	    offset: '-=600'
	  }).add({
	    targets: '.ml1 .letters-left',
	    opacity: [0,1],
	    translateX: ["0.5em", 0],
	    easing: "easeOutExpo",
	    duration: 600,
	    offset: '-=300'
	  }).add({
	    targets: '.ml1 .letters-right',
	    opacity: [0,1],
	    translateX: ["-0.5em", 0],
	    easing: "easeOutExpo",
	    duration: 600,
	    offset: '-=600'
	  }).add({
	    targets: '.ml1',
	    opacity: 0,
	    duration: 1000,
	    easing: "easeOutExpo",
	    delay: 2000
	  });
	</script>
    
<?php include './foot.html'; ?>