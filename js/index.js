$('.toggle').click(function(e) {
  	e.preventDefault();
  
    var $this = $(this);
  
    if ($this.next().hasClass('show')) {
        $this.next().removeClass('show');
        $this.next().slideUp(350);
    } else {
        $this.parent().parent().find('li .inner').removeClass('show');
        $this.parent().parent().find('li .inner').slideUp(350);
        $this.next().toggleClass('show');
        $this.next().slideToggle(350);
    }
});

$("a:contains('Request')").each(function(i , v){
    // $(this).closest(".heading").css("height" , "200px");
    $(this).closest("ul li a.toggle").css("background-color" , "rgba(0, 0, 0, 0.3)");
});

$("p:contains('Ski')").each(function(i , v){
    // $(this).closest(".heading").css("height" , "200px");
    $(this).closest(".inner").css("background-color" , "rgba(0, 102, 255, 0.78)");
});

$("p:contains('SB')").each(function(i , v){
    // $(this).closest(".heading").css("height" , "200px");
    $(this).closest(".inner").css("background-color" , "rgba(255, 153, 0, 0.78)");
});

$("p:contains('Board')").each(function(i , v){
    // $(this).closest(".heading").css("height" , "200px");
    $(this).closest(".inner").css("background-color" , "rgba(255, 153, 0, 0.78)");
});

// Use the above in a series of IF's if ski, if ski request, if SB if SB request...
//maybe switch or case??
