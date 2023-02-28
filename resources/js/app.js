import "./bootstrap";
import "../../node_modules/jquery/dist/jquery";
import "../../node_modules/bootstrap/dist/js/bootstrap";
import "../../node_modules/masonry-layout/dist/masonry.pkgd";

$(function () {
    console.log("ready!");

    setTimeout(function() {
        var $grid = $('.grid').masonry({
          // hack, select no items
        //   itemSelector: 'none',
        //   columnWidth: 160,
        //   stagger: 100,
        //   gutter: 10,
        });

        $grid.addClass('is-visible-items');

        // reset itemSelector
        $grid.masonry( 'option', {
          itemSelector: '.grid-item'
        });

        var $items = $grid.find('.grid-item');
        $grid.masonry( 'appended', $items );
      }, 1000);
});
