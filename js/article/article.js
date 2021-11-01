$(function(){
    new Article();
});


class Article {

    constructor () {
  
      this.init();
  
    }

    init() {
        $('input:radio[name="colorRadio"]').change(function(){
            var colorNr = $(this).attr('data-value');
            $('.sizesForColors').hide();
            $('#sizesFor'+colorNr).show();
            $('#'+colorNr+'sizeRadio1').prop("checked", true).trigger("change").trigger("click");
            $('#sizeCaption').html($('#'+colorNr+'sizeRadio1').val());


            var smallflckty = new Flickity('#smallImgFlickity');
            var bigflckty = new Flickity('#articleSlider');
            smallflckty.selectCell('#smallImgFlickity'+colorNr);
            bigflckty.selectCell('#bigImgFlickity'+colorNr);
        })

        $('input:radio[name="sizeRadio"]').change(function(){
            $('#addToCartBtn').attr('data-id2', $(this).attr('data-id'));
            $('#addToWishlistBtn').attr('data-id2', $(this).attr('data-id'));
            $('.articlePrices').hide();
            $('#priceFor'+$(this).attr('data-id')).show();

        })
    }


}