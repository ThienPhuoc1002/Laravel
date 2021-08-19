$(document).ready(function() {
    $('#example').dataTable( {
        "lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "Tất cả"] ]
      } );
} );

$(document).ready(function() {
    $('#example1').dataTable( {
        "lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "Tất cả"] ]
      } );
} );

$( function() {
    $( "#datepicker" ).datepicker();
} );

$( function() {
    $( "#datepicker1" ).datepicker();
} );

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

$(document).ready(function(){
  $('.toast').toast('show');

  $("#myCarousel1").carousel({interval: 3000, pause: "hover"});
  $("#myCarousel2").carousel({interval: 2000, pause: "hover"});

  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $('#1').owlCarousel({
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      dots:false,
      responsive:{
          100:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:4
          }
      }
  })

  $('#2').owlCarousel({
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      dots:false,
      responsive:{
          100:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:4
          }
      }
  })

  $('#3').owlCarousel({
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      dots:false,
      responsive:{
          100:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:5
          }
      }
  })

  var owl1 = $('#1');
  owl1.owlCarousel();
  // Go to the next item
  $('.owl-next1').click(function() {
      owl1.trigger('next.owl.carousel');
  })
  // Go to the previous item
  $('.owl-prev1').click(function() {
      // With optional speed parameter
      // Parameters has to be in square bracket '[]'
      owl1.trigger('prev.owl.carousel', [300]);
  })

  var owl2 = $('#2');
  owl2.owlCarousel();
  // Go to the next item
  $('.owl-next2').click(function() {
      owl2.trigger('next.owl.carousel');
  })
  // Go to the previous item
  $('.owl-prev2').click(function() {
      // With optional speed parameter
      // Parameters has to be in square bracket '[]'
      owl2.trigger('prev.owl.carousel', [300]);
  })

});

